<?php defined('SYSPATH') or die('No direct script access.') ?>
<label><?=__('Current word')?></label>
<div class="well"><?=$word?></div>
<div class="clearfix"></div>
<label><?=__('Word category')?>
    <?= Form::select('word-category', $categories) ?>
</label>
<div class="clearfix"></div>
<button class="btn btn-primary btn-large" id="add-word"><?=__('Add word')?></button>
<button class="btn btn-danger btn-large" id="delete-word"><?=__('Delete word')?></button>