<?php defined('SYSPATH') or die('No direct script access.') ?>
<!-- Admin page -->
<div class="tabbable tabs-left">
    <!-- Begin tab headers -->
    <ul class="nav nav-tabs">
        <li>
            <a href="#tab-add-words" data-toggle="tab">
                <span class="icon-edit"></span> <?=__('Add words')?>
            </a>
        </li>

        <? if (Auth::instance()->logged_in('admin')): ?>
        <li>
            <a href="#tab-import-words" data-toggle="tab">
                <span class="icon-file"></span> <?=__('Import from file')?>
            </a>
        </li>
        <? endif?>

        <li>
            <a href="#tab-stats" data-toggle="tab">
                <span class="icon-signal"></span> <?=__('Stats')?>
            </a>
        </li>

        <li class="active yellow">
            <a href="#tab-about" data-toggle="tab">
                <span class="icon-lock"></span> <?=__('Admin')?>
            </a>
        </li>
        <li>
            <a href="<?=URL::base()?>">
                <span class="icon-chevron-left"></span> <?=__('Back')?>
            </a>
        </li>
    </ul>

    <!-- Begin tab content -->
    <div class="tab-content fix-tab-padding">
        <div class="tab-pane active" id="tab-about">
            <?=View::factory('admin/tab/about')?>
        </div>

        <div class="tab-pane" id="tab-add-words">
            <?=View::factory('admin/tab/add')?>
        </div>

        <div class="tab-pane" id="tab-stats">
            <?=View::factory('admin/tab/stats', array(
            'languages' => $languages,
            'categories' => $categories
        ))?>
        </div>

        <div class="tab-pane" id="tab-import-words">
            <?=View::factory('admin/tab/import', array(
            'files' => $files
        ))?>
        </div>
    </div>
</div>
