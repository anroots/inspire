<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-random" data-toggle="tab"><?=__('Random words')?></a></li>
        <li><a href="#tab-sentences" data-toggle="tab"><?=__('Sentences')?></a></li>
        <li><a href="#tab-locations" data-toggle="tab"><?=__('Locations')?></a></li>
        <li><a href="#tab-activities" data-toggle="tab"><?=__('Activities')?></a></li>
        <li><a href="#tab-nouns" data-toggle="tab"><?=__('Nouns')?></a></li>
        <li><a href="#tab-professions" data-toggle="tab"><?=__('Professions')?></a></li>
        <li><a href="#tab-adjectives" data-toggle="tab"><?=__('Adjectives')?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-random">
            <?=View::factory('dash/tab')?>
        </div>
    </div>
</div>

<ul class="pager">
    <li class="previous">
        <a href="#">&larr; <?=__('Previous Category')?></a>
    </li>
    <li>
        <a href="#" class="btn-large btn-primary"><?=__('Re-inspire me!')?></a>
    </li>
    <li class="next">
        <a href="#"><?=__('Next Category')?> &rarr;</a>
    </li>
</ul>