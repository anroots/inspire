<?php defined('SYSPATH') or die('No direct script access.') ?>
<!-- Admin page -->
<div class="tabbable tabs-left">
    <!-- Begin tab headers -->
    <ul class="nav nav-tabs">
        <li><a href="#tab-add-words" data-toggle="tab"><?=__('Add words')?></a></li>

        <li class="active yellow"><a href="#tab-about" data-toggle="tab"><?=__('Admin')?></a></li>
    </ul>

    <!-- Begin tab content -->
    <div class="tab-content fix-tab-padding">
        <div class="tab-pane active" id="tab-about">
            <?=View::factory('admin/tab/about')?>
        </div>

        <div class="tab-pane" id="tab-add-words">
            <?=View::factory('admin/tab/add')?>
        </div>

    </div>
</div>
