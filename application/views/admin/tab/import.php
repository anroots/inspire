<p>
    <?=__('You can populate the words database by parsing a text file.')?>
</p>

<p>
    <?=__('Every row in the file is treated as a single entry.
    Please choose a textfile and word category where you\'d like to insert <strong>all the words</strong> from that textfile.
    Double entries - words that already exist in the same category - will be ignored.
    Words will be inserted to the current language <em>(:lang)</em>.', array(
    ':lang' => I18n::lang()
))?>
</p>

<p>
    <?=__('The following is a list of all <em>.txt</em> files found in <em>:dir</em> directory.', array(
    ':dir' => DOCROOT . 'import/'
))?>
</p>

<? if (!empty($files)): ?>

<form action="<?=URL::base()?>admin/import" method="post">
    <label><?=__('Select file...')?></label>

    <div class="controls">
        <?foreach ($files as $file): ?>
        <label class="radio">
            <?=Form::radio('file', $file) . $file?>
        </label>
        <? endforeach?>
    </div>
    <div class="clearfix"></div>

    <label><?=__('Category')?></label>
    <?=Form::select('category_id', Helper_Template::word_categories(), NULL, array('required'))?>
    <div class="clearfix"></div>

    <input type="submit" class="btn btn-primary" name="btn-import" value="<?=__('Import selected file')?>">
</form>

<? else: ?>

<div class="alert alert-info">
    <strong><?=__('Info')?></strong> <?=__('Kaustas ei ole ühtegi tekstifaili.')?>
</div>

<?endif ?>