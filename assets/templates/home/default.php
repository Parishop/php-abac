<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/uikit.gradient.min.css">
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/uikit.min.js"></script>
    <title><?= $this->title(); ?></title>
    <?= implode(PHP_EOL, $this->getMeta()); ?>
    <?= implode(PHP_EOL, $this->getLinks()); ?>
    <?= implode(PHP_EOL, $this->getScripts()); ?>
</head>
<body>
    Home
</body>
</html>