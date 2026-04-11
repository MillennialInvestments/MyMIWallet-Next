<h1><?= esc($article['title']) ?></h1>
<div><?= $article['content'] ?></div>
<?= view('App\\Modules\\Support\\Views\\_partials\\_feedback', ['article' => $article]) ?>
