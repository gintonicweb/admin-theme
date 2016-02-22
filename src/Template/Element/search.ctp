<?php
if (empty($searchInputs)) {
    return;
}

// updated last minute to avoid overriding the SearchListener
foreach ($searchInputs as $key => $searchInput) {
    $searchInputs[$key]['placeholder'] = $searchInput['label'];
    $searchInputs[$key]['label'] = false;
}

?>

<?php
$searchOptions = isset($searchOptions) ? $searchOptions : [];
$searchOptions += ['class' => 'form-inline', 'id' => 'searchFilter'];

echo $this->Form->create(null, $searchOptions);
echo $this->Form->hidden('_search');

?>

<?= $this->Form->inputs($searchInputs, ['fieldset' => false]); ?>
<?= $this->Form->button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary']); ?>

<?= $this->Form->end(); ?>
