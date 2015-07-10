<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
%>
<?php $this->Html->addCrumb('<%= $pluralHumanName %>', ['action' => 'index']) ?>
<?php $this->Html->addCrumb('Add') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></h3>
            </div>
            <?= $this->Form->create($<%= $singularVar %>, [
                'templates' => [
                    'submitContainer' => '{{content}}'
                ],
            ]) ?>
                <div class="box-body">
                    <?php
            <%
                    foreach ($fields as $field) {
                        if (in_array($field, $primaryKey)) {
                            continue;
                        }
                        if (isset($keyFields[$field])) {
                            $fieldData = $schema->column($field);
                            if (!empty($fieldData['null'])) {
            %>
                        echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
            <%
                            } else {
            %>
                        echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
            <%
                            }
                            continue;
                        }
                        if (!in_array($field, ['created', 'modified', 'updated'])) {
                            $fieldData = $schema->column($field);
                            if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
            %>
                        echo $this->Form->input('<%= $field %>', ['empty' => true, 'default' => '']);
            <%
                            } else {
            %>
                        echo $this->Form->input('<%= $field %>');
            <%
                            }
                        }
                    }
                    if (!empty($associations['BelongsToMany'])) {
                        foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
            %>
                        echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
            <%
                        }
                    }
            %>
                    ?>
                </div>
                <div class="box-footer">
                    <?= $this->Form->submit(
                        __('Submit'),
                        [
                            'class' => 'btn btn-primary',
                        ]
                    ) ?> 
                    <div class="btn-group">
                        <?= $this->Html->link(
                            __('Cancel'),
                            ['action' => 'index'],
                            ['class' => 'btn btn-default']
                        );?>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index']) ?></li>
                            <hr/>
                            <% if (strpos($action, 'add') === false): %>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
                                    [
                                        'confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>),
                                        'class' => 'btn btn-default'
                                    ]
                                )?>
                                <hr/>
                            <% endif; %>
                    <%
                            $done = [];
                            $typeCount = count($associations);
                            $i=0;
                            foreach ($associations as $type => $data) :
                                foreach ($data as $alias => $details) :
                                    if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) :
                    %>
                            <li><?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) %></li>
                            <li><?= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) %></li>
                    <%
                                        $done[] = $details['controller'];
                                    endif;
                                endforeach;
                                if (++$i < $typeCount) :
                    %>
                                <li class="divider"></li>
                    <%
                                endif;
                            endforeach;
                    %>
                        </ul>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
