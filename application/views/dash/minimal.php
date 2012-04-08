<h4>
    <?= __('Your inspiration is...') ?>
</h4>

<div class="well">
    <h1 id="the-word"><?=$word?></h1>
</div>

<form action="<?=URL::base()?>dash/minimal" method="get">

    <!-- Inspire button -->
    <div class="offset1">

        <!-- Options -->
        <? if (Model_Word::dict_file()): ?>

        <label class="checkbox">
            <?=Form::checkbox('use_dictionary', 1, (bool)Request::current()->query('use_dictionary'))?>
            <?=__('Use words from the <em>:lang</em> dictionary', array(
            ':lang' => strtoupper(I18n::lang())
        ))?>
        </label>

        <? endif ?>

        <label><?=__('Category')?></label>
        <?= Form::select('category_id', Helper_Template::word_categories(), Request::current()->query('category_id'), array('required')) ?>

        <input type="submit" class="btn-large btn-primary" value="<?=__('Re-inspire me!')?>"/>

    </div>
</form>

<div class="clearfix"></div>