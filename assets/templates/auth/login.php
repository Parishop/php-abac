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
<body class="uk-height-1-1">
<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle" style="width: 250px;">
        <form action="<?= $this->url('auth/login') ?>" class="uk-panel uk-panel-box uk-form" method="post">
            <div class="uk-form-row">
                <input class="uk-width-1-1 uk-form-large" type="text" name="login" placeholder="Логин">
            </div>
            <div class="uk-form-row">
                <input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="Пароль">
            </div>
            <div class="uk-form-row">
                <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Войти</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>