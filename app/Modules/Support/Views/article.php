<h1><?= esc($article['title']) ?></h1>
<div><?= $article['content'] ?></div>
<?= view('App/Modules/Support/Views/partials/_feedback', ['article' => $article]) ?>