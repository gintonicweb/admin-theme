<?php
if (!$this->exists('actions')) {
    $this->start('actions');
        echo $this->element('actions', [
            'actions' => $actions['table'],
            'singularVar' => false,
            'btnClass' => 'btn btn-primary',
            'iconify' => (isset($iconify) && $iconify)
        ]);
        // to make sure ${$viewVar} is a single entity, not a collection
        if (${$viewVar} instanceof \Cake\Datasource\EntityInterface && !${$viewVar}->isNew()) {
            echo $this->element('actions', [
                'actions' => $actions['entity'],
                'singularVar' => ${$viewVar},
                'btnClass' => 'btn btn-primary',
                'iconify' => (isset($iconify) && $iconify)
            ]);
        }
    $this->end();
}
if (!$this->exists('search')) {
    $this->start('search');
        echo $this->element('search');
    $this->end();
}
?>

<div class="box-header">
    <h3 class="box-title"><?= $this->get('title'); ?></h3>
    <div class="box-tools">
        <?= (isset($tools)) ? $tools : $this->fetch('actions') ?>
        <?= (isset($search)) ? $search: $this->fetch('search') ?>
    </div>
</div>
