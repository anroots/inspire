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
			<div class="clearfix"></div>
			<p><?=__('There\'s also an Android app (min required version 1.6) that\'s still under heavy development.')?></p>
			<a href="<?=URL::base()?>assets/inspire-1.0.apk" title="<?=__('Download Android App')?>" class="pull-right">
				<img src="<?=URL::base()?>assets/img/android_launcher.png" alt="Android"/>
			</a>
		</div>
	</div>
</div>

<? if (Model_Word::dict_file()): ?>
<div id="options" class="collapse">
	<div class="well">
		<label class="checkbox">
			<input type="checkbox" value="1" id="use-dictionary"/>
			<?=__('Use words from the <em>:lang</em> dictionary', array(
			':lang' => strtoupper(I18n::lang())
		))?>
		</label>
        <span class="help-block">
            <?=__('Check this if you want random words from the :lang dictionary', array(
	        ':lang' => strtoupper(I18n::lang())
        ))?>
        </span>
	</div>
</div>
<? endif ?>

<!-- Begin pager-->
<ul class="pager">

	<? if (Model_Word::dict_file()): ?>
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