<?php defined('SYSPATH') or die('No direct script access.') ?>

<label><?=__('Current word')?>
    <input type="text" autofocus required tabindex="1" id="txt-new-word" class="span4" maxlength="255" placeholder="<?=__('Enter your word here')?>" />
</label>

<div class="clearfix"></div>
<label><?=__('Word category')?>
    <?= Form::select('word-category', Helper_Template::word_categories(), NULL, array('id' => 'select-category-id')) ?>
</label>
<div class="clearfix"></div>

<button class="btn btn-primary btn-large" id="btn-add-word"><?=__('Add word')?></button>
<div class="clearfix"></div>

<p class="help-block justify">
    <?=__('Add new words to the database here. Added words have to be approved. The word will be added to the current language words database.')?>
</p>