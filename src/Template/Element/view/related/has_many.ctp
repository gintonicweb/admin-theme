<?php
use Cake\Utility\Inflector;

if (empty($associations['manyToMany'])) {
    $associations['manyToMany'] = [];
}

if (empty($associations['oneToMany'])) {
    $associations['oneToMany'] = [];
}
$relations = array_merge($associations['oneToMany'], $associations['manyToMany']);

$i = 0;
foreach ($relations as $alias => $details):
    $otherSingularVar = $details['propertyName'];
    ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __d('crud', 'Related {0}', [Inflector::humanize($details['controller'])]); ?></h3>
        </div>
        <?php
        if (${$viewVar}->{$details['entities']}):
            ?>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <?php
                            $otherFields = array_keys(${$viewVar}->{$details['entities']}[0]->toArray());
                            if (isset($details['with'])) {
                                $index = array_search($details['with'], $otherFields);
                                unset($otherFields[$index]);
                            }
                    
                            foreach ($otherFields as $field) {
                                echo "<th>" . Inflector::humanize($field) . "</th>";
                            }
                            ?>
                            <th class="actions text-right">Actions</th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach (${$viewVar}->{$details['entities']} as ${$otherSingularVar}) :
                            ?>
                            <tr>
                                <?php
                                foreach ($otherFields as $field) {
                                    ?>
                                    <td><?= $this->CrudView->process($field, ${$otherSingularVar}); ?></td>
                                    <?php
                                }
                                ?>
                                <td class="actions pull-right text-nowrap">
                                    <?= $this->Html->link(
                                        __d('crud', '<i class="fa fa-eye"></i>'), 
                                        [
                                            'plugin' => $details['plugin'],
                                            'controller' => $details['controller'],
                                            'action' => 'view',
                                            ${$otherSingularVar}[$details['primaryKey']]
                                        ],
                                        [
                                            'class' => 'btn btn-default',
                                            'escape' => false
                                        ]
                                    ) ?>
                                    <?= $this->Html->link(
                                        __d('crud', '<i class="fa fa-pencil"></i>'),
                                        [
                                            'plugin' => $details['plugin'],
                                            'controller' => $details['controller'],
                                            'action' => 'edit',
                                            ${$otherSingularVar}[$details['primaryKey']]
                                        ],
                                        [
                                            'class' => 'btn btn-default',
                                            'escape' => false
                                        ]
                                    )?>
                                    <?= $this->Html->link(
                                        __d('crud', '<i class="fa fa-trash"></i>'),
                                        [
                                            'plugin' => $details['plugin'],
                                            'controller' => $details['controller'],
                                            'action' => 'delete',
                                            ${$otherSingularVar}[$details['primaryKey']]
                                        ],
                                        [
                                            'class' => 'btn btn-default',
                                            'escape' => false
                                        ]
                                    ); ?>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
            <?php
        endif;
        ?>

        <div class="box-footer clearfix">
        <?= $this->Html->link(
            __d('crud', 'Add {0}', [Inflector::singularize(Inflector::humanize(Inflector::underscore($alias)))]),
            [
                'plugin' => $details['plugin'],
                'controller' => $details['controller'],
                'action' => 'add',
                '?' => [
                    $details['foreignKey'] => $this->get('primaryKeyValue'),
                    '_redirect_url' => $this->request->here
                ]
            ],
            [
                'escape' => false,
                'class' => 'btn btn-primary'
            ]
        ) ?>
        </div>
    </div>
<?php endforeach; ?>
