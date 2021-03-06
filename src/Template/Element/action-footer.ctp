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
?>

<div class="box-footer clearfix">
    <div class="btn-group pull-left">
        <?= $this->fetch('actions'); ?>
    </div>
    <div class="pull-right">
        <ul class="pagination pagination no-margin">
        <?php if ($this->Paginator->hasPage(2)) : ?>
            <?= $this->Paginator->numbers([
                'prev' => true,
                'next' => true,
            ]) ?>
        <?php endif ?>
        </ul>
    </div>
    <p class="text-center"><?= $this->Paginator->counter() ?></p>
</div>
