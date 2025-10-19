<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>MyMI API Docs</title>
  <style <?= $nonce['style'] ?? '' ?>>body,html{margin:0;height:100%} redoc{height:100%}</style>
  <script src="https://cdn.redoc.ly/redoc/latest/bundles/redoc.standalone.js" crossorigin="anonymous"></script>
</head>
<body>
  <redoc spec-url="/openapi.json"></redoc>
</body>
</html>
