<?= $this->fetch('before_index') ?>

<div class="<?= $this->CrudView->getCssClasses(); ?>">
    <div class="box box-primary">

        <?= $this->element('action-header', ['tools' => false]) ?>

        <?= $this->element('index/bulk_actions/form_start', compact('bulkActions')); ?>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <?= $this->element('index/bulk_actions/table', compact('bulkActions', 'primaryKey', 'singularVar')); ?>
            
                        <?php
                        foreach ($fields as $field => $options) :
                            ?>
                            <th><?= $this->Paginator->sort($field, isset($options['title']) ? $options['title'] : null, $options); ?></th>
                            <?php
                            endforeach;
                        ?>
                        <?php if ($actionsExist = !empty($actions['entity'])): ?>
                            <th class="text-right"><?= __d('crud', 'Actions'); ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
            
                    <?php
                    foreach (${$viewVar} as $singularVar) :
                        ?>
                        <tr>
                            <?= $this->element('index/bulk_actions/record', compact('bulkActions', 'primaryKey', 'singularVar')); ?>
                            <?= $this->element('index/table_columns', compact('singularVar')); ?>
            
                            <?php if ($actionsExist): ?>
                                <td class="actions pull-right text-nowrap"><?= $this->element('actions', [
                                    'singularVar' => $singularVar,
                                    'actions' => $actions['entity'],
                                    'iconify' => true
                                ]); ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
            <?= $this->element('index/bulk_actions/form_end', compact('bulkActions')); ?>
            <?= $this->element('action-footer'); ?>
        </div>
    </div>
</div>

<?= $this->fetch('after_index'); ?>
