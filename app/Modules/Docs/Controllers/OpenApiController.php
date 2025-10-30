<?php
namespace App\Modules\Docs\Controllers;

use App\Controllers\BaseController;
use Symfony\Component\Yaml\Yaml;

class OpenApiController extends BaseController
{
    public function json()
    {
        $yaml = FCPATH . 'openapi.yaml';
        if (!is_file($yaml)) {
            return $this->response->setStatusCode(404)->setJSON(['status'=>'error','message'=>'OpenAPI not found']);
        }
        if (class_exists(Yaml::class)) {
            $arr = Yaml::parse(file_get_contents($yaml));
            return $this->response->setJSON($arr);
        }
        return $this->response->setHeader('Content-Type','text/yaml')->setBody(file_get_contents($yaml));
    }

    public function ui()
    {
        return view('App\Modules\Docs\Views\openapi');
    }
}
