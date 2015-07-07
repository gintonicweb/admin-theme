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
        return !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
%>
<?php $this->Html->addCrumb('<%= $pluralHumanName %>', ['action' => 'index']) ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><%= $pluralHumanName %></h3>
                <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                <tbody>
                    <tr>
                    <% foreach ($fields as $field): %>
                        <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
                    <% endforeach; %>
                        <th></th>
                    </tr>
                <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                    <tr>
            <%        foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['BelongsTo'])) {
                            foreach ($associations['BelongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
            %>
                        <td>
                            <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
                        </td>
            <%
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
            %>
                        <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
            <%
                            } else {
            %>
                        <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
            <%
                            }
                        }
                    }
        
                    $pk = '$' . $singularVar . '->' . $primaryKey[0];
            %>
                        <td>
                            <div class="pull-right">
                                <?= $this->Html->link(
                                    '<button class="btn btn-primary"><i class="fa fa-eye"></i></button>',
                                    ['action' => 'view', <%= $pk %>],
                                    ['escape' => false]
                                )?>
                                <?= $this->Html->link(
                                    '<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', <%= $pk %>],
                                    ['escape' => false]
                                )?>
                                <?= $this->Form->postLink(
                                    '<button class="btn btn-primary"><i class="fa fa-times"></i></button>',
                                    ['action' => 'delete', <%= $pk %>],
                                    [
                                        'escape' => false,
                                        'confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)
                                    ]
                                )?>
                            </div>
                        </td>
                    </tr>
        
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <div class="btn-group pull-left">
                    <?= $this->Html->link(
                        __('New <%= $singularHumanName %>'),
                        ['action' => 'add'],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    );?>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                <%
                    $done = [];
                    $typeCount = count($associations);
                    $i=0;
                    foreach ($associations as $type => $data):
                        foreach ($data as $alias => $details):
                            if (!empty($details['navLink']) && $details['controller'] !== $this->name && !in_array($details['controller'], $done)):
                %>
                        <li><?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?></li>
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
