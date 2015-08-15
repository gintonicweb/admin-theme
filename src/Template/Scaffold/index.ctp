<?= $this->fetch('before_index'); ?>

<div class="<?= $this->CrudView->getCssClasses(); ?>">

    <?php if (!$this->exists('search')) {
        $this->start('search');
            echo $this->element('search');
        $this->end();
    } ?>
    <?= $this->fetch('search'); ?>
    <?= $this->element('index/bulk_actions/form_start', compact('bulkActions')); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $this->get('title') ?></h3>
                    <div class="box-tools">
                        <div class="input-group" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tr>
                            <?= $this->element('index/bulk_actions/table', compact('bulkActions', 'primaryKey', 'singularVar')); ?>
                    
                            <?php foreach ($fields as $field => $options) : ?>
                                <th><?= $this->Paginator->sort($field, isset($options['title']) ? $options['title'] : null, $options); ?></th>
                            <?php endforeach; ?>

                            <?php if ($actionsExist = !empty($actions['entity'])): ?>
                                <th></th>
                            <?php endif; ?>
                        </tr>
                    
                        <?php foreach (${$viewVar} as $singularVar) : ?>
                            <tr>
                                <?= $this->element('index/bulk_actions/record', compact('bulkActions', 'primaryKey', 'singularVar')); ?>
                                <?= $this->element('index/table_columns', compact('singularVar')); ?>
                                <?php if ($actionsExist): ?>
                                    <td class="actions"><?= $this->element('actions', [
                                        'singularVar' => $singularVar,
                                        'actions' => $actions['entity']
                                    ]); ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <div class="btn-group pull-left">
                        <?= $this->element('index/action-footer') ?>
                    </div>
                    <div class="pull-right">
                        <ul class="pagination pagination no-margin">
                            <?= $this->Paginator->prev('< ') ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(' >') ?>
                        </ul>
                    </div>
                    <p class="text-center"><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>

    <?= $this->element('index/bulk_actions/form_end', compact('bulkActions')); ?>
    <?= $this->fetch('action_link_forms') ?>
    <?= $this->element('index/pagination'); ?>
</div>

<?= $this->fetch('after_index'); ?>
