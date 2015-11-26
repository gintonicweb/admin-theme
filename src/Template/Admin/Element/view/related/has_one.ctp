<?php
use Cake\Utility\Inflector;
if (empty($associations['oneToOne'])) {
    return;
}
?>
<?php foreach ($associations['oneToOne'] as $alias => $details) : ?>

    <?php $alias = $details['propertyName'] ?>
    <?php if (!empty(${$viewVar}->{$alias})) : ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __d('crud', 'Related {0}', [Inflector::humanize($details['controller'])]); ?></h3>
            </div>

            <div class="box-body">
                <dl>
                    <?php
                    $i = 0;
                    $otherFields = array_keys(${$viewVar}->{$alias}->toArray());
                    foreach ($otherFields as $field) {
                        ?>
                        <dt><?= Inflector::humanize($field); ?></dt>
                        <dd><?= $this->CrudView->process($field, ${$viewVar}->{$alias}, $details); ?>&nbsp;</dd>
                        <?php
                    }
                ?>
                </dl>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Html->link(
                    __d('crud', 'View {0}', [Inflector::humanize(Inflector::underscore($alias))]),
                    ['plugin' => $details['plugin'], 'controller' => $details['controller'], 'action' => 'view', ${$viewVar}[$alias][$details['primaryKey']]],
                    ['class' => 'btn btn-primary']
                ) ?>
            </div>
        </div>
    <?php endif ?>

<?php endforeach ?>
