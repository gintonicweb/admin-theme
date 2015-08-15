<?= $this->fetch('before_form'); ?>

<div class="<?= $this->CrudView->getCssClasses(); ?>">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><?= $this->get('title') ?></h3>
        </div>
        <div class="box-body">

            <?= $this->Form->create(${$viewVar}, ['role' => 'form', 'url' => $formUrl, 'data-dirty-check' => $enableDirtyCheck]); ?>
            <?= $this->CrudView->redirectUrl(); ?>
            <?= $this->Form->inputs($fields, ['legend' => false]); ?>
            <div class="form-group">
                <?php 
                    echo $this->Form->button(
                        __d('crud', 'Save'), 
                        ['class' => 'btn btn-primary', 'name' => '_save']
                    );
                ?>
                <?php 
                    if (!in_array('back', $extraButtonsBlacklist)) { 
                        echo $this->Html->link(
                            __d('crud', 'Back'),
                            ['action' => 'index'],
                            ['class' => 'btn btn-default', 'role' => 'button']
                        );
                    }
                ?>
            </div>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<?= $this->fetch('after_form'); ?>
