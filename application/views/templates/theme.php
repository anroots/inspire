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

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="<?=URL::base()?>assets/bootstrap-2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL::base()?>assets/css/theme.css">
    <?=Assets::render(Assets::CSS)?>
    <!-- end CSS-->

    <script src="<?=URL::base()?>assets/js/libs/modernizr-2.0.6.min.js"></script>
    <script src="<?=URL::base()?>assets/js/libs/jquery-1.7.1.min.js"></script>
    <script type="text/javascript">
        var base_url = '<?=URL::base()?>';
    </script>
</head>

<body>

<div class="container-fluid">

    <!-- Header -->
    <div class="row-fluid">
        <div class="span4">
            <header>
                <h1>
                    <a href="<?=URL::base()?>">
                        <?=Kohana::$config->load('app.title')?>
                    </a>
                </h1>
            </header>
        </div>
    </div>

    <!-- Main content -->
    <div class="row">
        <div class="span2">
            <!--Sidebar content-->
        </div>
        <div class="span10 offset2">
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
                <a href="https://github.com/anroots/inspire" title="GitHub">Fork me on GitHub</a>
            </footer>
        </div>
    </div>

</div>

<?=Assets::render(Assets::SCRIPT)?>
</body>
</html>