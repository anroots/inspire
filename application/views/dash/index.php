<!-- Dashboard index -->
<div class="tabbable tabs-left">
    <!-- Begin tab headers -->
    <ul class="nav nav-tabs">
        <li><a href="#tab-random" data-toggle="tab"><?=__('Random words')?></a></li>
        <li><a href="#tab-sentences" data-toggle="tab"><?=__('Sentences')?></a></li>
        <li><a href="#tab-locations" data-toggle="tab"><?=__('Locations')?></a></li>
        <li><a href="#tab-activities" data-toggle="tab"><?=__('Activities')?></a></li>
        <li><a href="#tab-nouns" data-toggle="tab"><?=__('Nouns')?></a></li>
        <li><a href="#tab-professions" data-toggle="tab"><?=__('Professions')?></a></li>
        <li><a href="#tab-adjectives" data-toggle="tab"><?=__('Adjectives')?></a></li>
        <li class="active"><a href="#tab-about" data-toggle="tab"><?=__('About')?></a></li>
    </ul>

    <!-- Begin tab content -->
    <div class="tab-content fix-tab-padding">
        <div class="tab-pane" id="tab-random">
            <?=View::factory('dash/tab')?>
        </div>

        <div class="tab-pane active" id="tab-about">
           <?=View::factory('dash/about/'.I18n::lang())?>
        </div>
    </div>
</div>

<!-- Begin pager-->
<ul class="pager">
    <li class="previous">
        <a href="#">&larr; <?=__('Previous Category')?></a>
    </li>
    <li>
        <a href="#" id="btn-inspire" class="btn-large btn-primary"><?=__('Re-inspire me!')?></a>
    </li>
    <li class="next">
        <a href="#"><?=__('Next Category')?> &rarr;</a>
    </li>
</ul>