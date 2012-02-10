<!-- Dashboard index -->
<div class="tabbable tabs-left">
    <!-- Begin tab headers -->
    <ul class="nav nav-tabs">
        <? foreach ($categories as $category): ?>
        <li>
            <a href="#tab-<?=$category->id?>" data-toggle="tab">
                <span class="<?=$category->icon?>"></span> <?=__($category->name)?>
            </a>
        </li>
        <? endforeach?>
        <li class="active yellow">
            <a href="#tab-about" data-toggle="tab">
                <span class="icon-italic"></span> <?=__('About')?>
            </a>
        </li>
    </ul>

    <!-- Begin tab content -->
    <div class="tab-content">
        <div class="tab-pane" id="tab-1">
            <?=View::factory('dash/tab')?>
        </div>

        <div class="tab-pane active" id="tab-about">
            <?=View::factory('dash/about/' . I18n::lang())?>
        </div>
    </div>
</div>

<? if (I18n::lang() == 'ee'): ?>
<div id="options" class="collapse">
    <div class="well">
        <label class="checkbox">
            <input type="checkbox" value="1" id="use-dictionary"/> <?=__('Use words from the Estonian dictionary')?>
        </label>
        <span class="help-block">
            <?=__('Check this if you want random words from the Estonian dictionary')?>
        </span>
    </div>
</div>
<? endif ?>

<!-- Begin pager-->
<ul class="pager">

    <? if (I18n::lang() == 'ee'): ?>
    <li>
        <a href="#" data-toggle="collapse" data-target="#options">
            <?=__('Options')?>
        </a>
    </li>
    <? endif?>

    <li>
        <a href="#" id="btn-inspire" class="btn-large btn-primary">
            <span class="icon-refresh"></span> <?=__('Re-inspire me!')?>
        </a>
    </li>
</ul>