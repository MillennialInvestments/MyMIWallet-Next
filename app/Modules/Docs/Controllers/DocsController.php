<?php
namespace App\Modules\Docs\Controllers;

use App\Controllers\BaseController;

class DocsController extends BaseController
{
    private function dir(): string
    {
        $d = getenv('DOCS_DIR') ?: (ROOTPATH.'docs');
        if (!is_dir($d)) @mkdir($d,0755,true);
        return rtrim($d,'/');
    }

    public function index()
    {
        $files = $this->walk();
        return view('App\Modules\Docs\Views\index', ['files'=>$files]);
    }

    public function view($slug='')
    {
        $file = $this->resolvePath($slug ?: 'README');
        if (!is_file($file)) return redirect()->to('/Docs');
        $md = file_get_contents($file) ?: '';
        $html = (new \Parsedown())->text($md);
        return view('App\Modules\Docs\Views\doc', ['html'=>$html,'slug'=>$slug]);
    }

    public function search()
    {
        $q = trim((string)$this->request->getGet('q'));
        $hits = [];
        if ($q !== '') {
            foreach ($this->walk() as $f) {
                $txt = file_get_contents($f['path']) ?: '';
                if (stripos($txt, $q) !== false) {
                    $hits[] = ['title'=>$f['title'],'slug'=>$f['slug']];
                }
            }
        }
        return $this->response->setJSON(['status'=>'success','data'=>['hits'=>$hits],'csrf'=>csrf_hash()]);
    }

    private function walk(): array
    {
        $out=[]; $base=$this->dir();
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($base, \FilesystemIterator::SKIP_DOTS));
        foreach ($it as $f) {
            if (strtolower($f->getExtension()) !== 'md') continue;
            $rel = ltrim(str_replace($base, '', $f->getPathname()), '/');
            $slug = str_replace(['.md',' '], ['', '-'], $rel);
            $out[] = ['title'=>basename($rel),'slug'=>$slug,'path'=>$f->getPathname()];
        }
        return $out;
    }

    private function resolvePath(string $slug): string
    {
        $slug = trim($slug,'/');
        $p = str_replace('-', ' ', $slug);
        return $this->dir().'/'.$p.'.md';
    }
}
