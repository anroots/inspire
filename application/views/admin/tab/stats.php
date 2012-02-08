
<table class="table-condensed span3">
    <tbody>
    <? foreach ($languages as $lang): ?>
    <tr>
        <th colspan="2"><?= __($lang->name) ?></th>
    </tr>
        <? foreach ($categories as $category): ?>
        <tr>
            <td><?=__($category->name)?></td>
            <td><?=Model_Word::count_category_words($category->id, $lang->id)?></td>
        </tr>

            <? endforeach ?>
        <? endforeach?>

    </tbody>
</table>