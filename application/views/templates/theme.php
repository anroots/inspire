<?php defined('SYSPATH') or die('No direct script access.')?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?=$title?></title>
    <meta name="description" content="<?=Kohana::$config->load('app.description')?>">
    <meta name="author" content="Ando Roots">
    <link rel="shortcut icon" href="<?=URL::base()?>assets/img/favicon.png"/>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="<?=URL::base()?>assets/bootstrap-2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL::base()?>assets/css/theme.css">
    <?=Assets::render(Assets::CSS)?>
    <!-- end CSS-->

    <script src="<?=URL::base()?>assets/js/libs/modernizr-2.0.6.min.js"></script>
    <script src="<?=URL::base()?>assets/js/libs/jquery-1.7.1.min.js"></script>
    <script type="text/javascript">
        var base_url = '<?=URL::base()?>';
        var current_lang = '<?=I18n::lang()?>';
    </script>
</head>

<body>

<a href="http://jaa.ee" title="Improgrupp Jaa!">
    <img src="<?=URL::base()?>assets/img/jaa_logo.png" alt="Jaa! logo" width="150" height="113"/>
</a>

<div class="row">
    <div class="span2 offset10">
        <div class="btn-group">
            <? foreach ($langs as $code): ?>
            <?= Helper_Template::lang_btn($code) ?>
            <? endforeach?>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Main content -->
    <div class="row">
        <div class="span7 offset3">
            <?=Notify::render()?>
            <div id="main">
                <?=$content?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="row">
        <div class="span4 offset6">
            <footer>
                <?=Kohana::$config->load('app.codename')?> <?=__('version')?> <?=Kohana::$config->load('app.version')?>
                | <a href="https://github.com/anroots/inspire" title="GitHub">GitHub</a> |
                <a href="https://github.com/anroots/inspire/wiki/API-documentation"
                   title="<?=__('API documentation for developers')?>">
                    <?=__('API')?>
                </a> |
                <? if (Auth::instance()->logged_in()): ?>
                <a href="<?=URL::base()?>auth/logout" title="Log out"><?=__('Log out')?></a>
                <? else: ?>
                <a href="<?=URL::base()?>auth" title="Admin"><?=__('Admin')?></a>
                <?endif?>
            </footer>
        </div>
    </div>

</div>
<script src="<?=URL::base()?>assets/bootstrap-2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=URL::base()?>assets/js/libs/jquery.i18n.min.js" type="text/javascript"></script>
<script src="<?=URL::base()?>assets/js/i18n.js" type="text/javascript"></script>
<?=Assets::render(Assets::SCRIPT)?>
</body>
</html>