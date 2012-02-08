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
        <li class="active yellow"><a href="#tab-about" data-toggle="tab"><?=__('About')?></a></li>
    </ul>

    <!-- Begin tab content -->
    <div class="tab-content fix-tab-padding">
        <div class="tab-pane" id="tab-random">
            <?=View::factory('dash/tab')?>
        </div>

        <div class="tab-pane active" id="tab-about">
            <?=View::factory('dash/about/' . I18n::lang())?>
        </div>
    </div>
</div>

<!-- Begin pager-->
<ul class="pager">
    <li class="previous">
        <a href="#" onclick="$('#modal-still-in-dev').modal('show');">&larr; <?=__('Previous Category')?></a>
    </li>
    <li>
        <a href="#" id="btn-inspire" class="btn-large btn-primary"><?=__('Re-inspire me!')?></a>
    </li>
    <li class="next">
        <a href="#" onclick="$('#modal-still-in-dev').modal('show');"><?=__('Next Category')?> &rarr;</a>
    </li>
</ul>


<!-- Still in dev modal -->
<div class="modal hide fade" id="modal-still-in-dev">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>

        <h3><?=__('Still in development!')?></h3>
    </div>
    <div class="modal-body">
        <p><?=__('This app is still in development - meaning some functionality is not complete yet.')?></p>

        <p>
            <em><?=__('but...')?></em>
        </p>

        <p><?=__('You can help! The software is open source and on GitHub so feel free to :fork and submit a pull request.', array(
            ':fork' => HTML::anchor('https://github.com/anroots/inspire', __('fork it'))
        ))?></p>
    </div>
    <div class="modal-footer">
        <a href="https://github.com/anroots/inspire" class="btn btn-primary"><?=__('I want to help!')?></a>
        <a href="#" id="btn-close-dev-modal" class="btn"><?=__('Hide')?></a>
    </div>
</div>