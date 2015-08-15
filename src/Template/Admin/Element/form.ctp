<?= $this->fetch('before_form'); ?>

<div class="<?= $this->CrudView->getCssClasses(); ?>">
    <div class="box box-primary">
        <?= $this->element('action-header', ['tools' => false]) ?>
        <div class="box-body">
            <?= $this->Form->create(${$viewVar}, ['role' => 'form', 'url' => $formUrl, 'data-dirty-check' => $enableDirtyCheck]); ?>
            <?= $this->CrudView->redirectUrl(); ?>
            <?= $this->Form->inputs($fields, ['legend' => false]); ?>
        </div>
        <div class="box-footer clearfix">
            <div class="form-group">
                <div class="pull-left">
                    <?= $this->Form->button(__d('crud', 'Save'), ['class' => 'btn btn-primary', 'name' => '_save']); ?>
                    <?php
                        if (empty($disableExtraButtons)) {
                            if (!in_array('save_and_continue', $extraButtonsBlacklist)) {
                                echo $this->Form->button(__d('crud', 'Save & continue editing'), ['class' => 'btn btn-success btn-save-continue', 'name' => '_edit']) . ' ';
                            }
                            if (!in_array('save_and_create', $extraButtonsBlacklist)) {
                                echo $this->Form->button(__d('crud', 'Save & create new'), ['class' => 'btn btn-success', 'name' => '_add']) . ' ';
                            }
                            if (!in_array('back', $extraButtonsBlacklist)) {
                                echo $this->Html->link(__d('crud', 'Back'), ['action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button']) . ' ';
                            }
                        }
                    ?>
                </div>
            </div>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<?= $this->fetch('after_form'); ?>
