<h1>Documentation</h1>
<form class="mb-3" action="/Docs/Search" method="get">
  <input type="text" class="form-control" name="q" placeholder="Search docs…">
</form>
<ul>
  <?php foreach ($files as $f): ?>
    <li><a href="/Docs/View/<?= esc($f['slug']) ?>"><?= esc($f['title']) ?></a></li>
  <?php endforeach; ?>
</ul>
