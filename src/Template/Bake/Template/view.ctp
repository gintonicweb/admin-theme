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

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
<?php $this->Html->addCrumb('<%= $pluralHumanName %>', ['action' => 'index']) ?>
<?php $this->Html->addCrumb('view') ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h2 class="box-title"><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h2>
                <div class="box-tools">
                    <?= $this->Html->link(
                        __('<i class="fa fa-pencil"></i>'), 
                        ['action' => 'edit', <%= $pk %>],
                        [
                            'class' => 'btn btn-primary',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Form->postLink(
                        __('<i class="fa fa-times"></i>'), 
                        ['action' => 'delete', <%= $pk %>],
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>),
                            'class' => 'btn btn-primary',
                            'escape' => false
                        ]
                    ) ?>
                </div>
            </div>
            <div class="box-body">
                <div class="<%= $pluralVar %> view row">
                <% if ($groupedFields['string']) : %>
                    <div class="col-md-4 strings">
                <% foreach ($groupedFields['string'] as $field) : %>
                <% if (isset($associationFields[$field])) :
                        $details = $associationFields[$field];
                %>
                        <strong class="subheader"><?= __('<%= Inflector::humanize($details['property']) %>') ?></strong><br>
                        <p><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></p>
                <% else : %>
                        <strong class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></strong><br>
                        <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
                <% endif; %>
                <% endforeach; %>
                    </div>
                <% endif; %>
                <% if ($groupedFields['number']) : %>
                    <div class="col-md-4 numbers">
                <% foreach ($groupedFields['number'] as $field) : %>
                        <strong class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></strong><br>
                        <p><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></p>
                <% endforeach; %>
                    </div>
                <% endif; %>
                <% if ($groupedFields['date']) : %>
                    <div class="col-md-4 dates end">
                <% foreach ($groupedFields['date'] as $field) : %>
                        <strong class="subheader"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></strong><br>
                        <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
                <% endforeach; %>
                    </div>
                <% endif; %>
                <% if ($groupedFields['boolean']) : %>
                    <div class="col-md-4 booleans">
                <% foreach ($groupedFields['boolean'] as $field) : %>
                        <strong class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></strong><br>
                        <p><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></p>
                <% endforeach; %>
                    </div>
                <% endif; %>
                <% if ($groupedFields['text']) : %>
                <% foreach ($groupedFields['text'] as $field) : %>
                    <div class="row texts">
                        <div class="col-md-12">
                            <strong class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></strong><br>
                            <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)) ?>
                        </div>
                    </div>
                <% endforeach; %>
                <% endif; %>
                </div>
            </div>
            <div class="box-footer clearfix">
                <div class="btn-group pull-left">
                    <?= $this->Html->link(
                        __('List <%= $pluralHumanName %>'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-primary']
                    ) ?>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add']) ?> </li>
                    <%
                        $done = [];
                        foreach ($associations as $type => $data) {
                            foreach ($data as $alias => $details) {
                                if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
                    %>
                            <li><?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New <%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?> </li>
                    <%
                                    $done[] = $details['controller'];
                                }
                            }
                        }
                    %>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<%
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
    %>
<div class="related row">
    <div class="col-md-12">
        <h4 class="subheader"><?= __('Related <%= $otherPluralHumanName %>') ?></h4>
        <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
        <table class="table">
            <tr>
    <% foreach ($details['fields'] as $field): %>
                <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
    <% endforeach; %>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
            <tr>
                <%- foreach ($details['fields'] as $field): %>
                <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
                <%- endforeach; %>

                <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                <td class="actions">
                    <?= $this->Html->link(
                        '<i class="fa fa-eye"></i>',
                        [
                            'controller' => '<%= $details['controller'] %>',
                            'action' => 'view',
                            <%= $otherPk %>
                        ],
                        ['escape' => false, 'class' => 'btn btn-default']
                    ) %>
                    <?= $this->Html->link(
                        '<i class="fa fa-pencil"></i>',
                        [
                            'controller' => '<%= $details['controller'] %>',
                            'action' => 'edit',
                            <%= $otherPk %>
                        ],
                        ['escape' => false, 'class' => 'btn btn-default']
                    ) %>
                    <?= $this->Form->postLink(
                        '<i class="fa fa-times"></i>',
                        [
                            'controller' => '<%= $details['controller'] %>',
                            'action' => 'delete',
                            <%= $otherPk %>
                        ], 
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)
                            'escape' => false,
                            'class' => 'btn btn-default'
                        ]
                    ) %>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<% endforeach; %>
