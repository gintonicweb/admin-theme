<?php
if (!$this->exists('actions')) {
    $this->start('actions');
        echo $this->element('index/new-button', [
            'actions' => $actions['table'],
            'btnClass' => 'btn btn-primary',
            'singularVar' => false,
        ]);
        // to make sure ${$viewVar} is a single entity, not a collection
        if (${$viewVar} instanceof \Cake\Datasource\EntityInterface && !${$viewVar}->isNew()) {
            echo $this->element('index/new-button', [
                'actions' => $actions['entity'],
                'btnClass' => 'btn btn-primary',
                'singularVar' => ${$viewVar},
            ]);
        }
    $this->end();
}
?>
<div class="actions-wrapper">
    <?= $this->fetch('actions'); ?>
    <div style="clear: both;"></div>
</div>
