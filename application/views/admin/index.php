<?php defined('SYSPATH') or die('No direct script access.') ?>
<!-- Admin page -->
<div class="tabbable tabs-left">
    <!-- Begin tab headers -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-add-words" data-toggle="tab"><?=__('Add words')?></a></li>
        <li><a href="#tab-buffer" data-toggle="tab"><?=__('Add to buffer')?></a></li>
    </ul>

    <!-- Begin tab content -->
    <div class="tab-content fix-tab-padding">
        <div class="tab-pane active" id="tab-add-words">
            <?=View::factory('admin/tab/add')?>
        </div>

        <div class="tab-pane" id="tab-buffer">
            <?=View::factory('admin/tab/buffer')?>
        </div>
    </div>
</div>
