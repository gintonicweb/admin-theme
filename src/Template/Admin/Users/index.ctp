<?php $this->Html->addCrumb('Users', ['controller' => 'users', 'action' => 'index']) ?>
<?php $this->Helpers()->load('GintonicCMS.Require') ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
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
                <table class="table table-hover"><tbody>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('first',__('First Name')); ?></th>
                    <th><?= $this->Paginator->sort('last',__('Last Name')); ?></th>
                    <th><?= $this->Paginator->sort('role'); ?></th>
                    <th><?= $this->Paginator->sort('email'); ?></th>
                    <th><?= $this->Paginator->sort('modified',__('Last Updated')); ?></th>
                    <th></th>
                </tr>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->first ?></td>
                    <td><?= $user->last ?></td>
                    <td>
                        <?php $roles = [] ?>
                        <?php foreach($user->roles as $role): ?>
                            <?php $roles[] = $role['alias'] ?>
                        <?php endforeach ?>
                        <?= implode(', ', $roles) ?>
                    </td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->modified ?></td>
                    <td>
                        <div class="pull-right">
                            <?= $this->Html->link(
                                '<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>',
                                ['controller' => 'Users', 'action' => 'edit', $user->id],
                                ['escape' => false]
                            )?>
                            <?= $this->Html->link(
                                '<button class="btn btn-primary"><i class="fa fa-times"></i></button>',
                                ['controller' => 'Users', 'action' => 'delete', $user->id],
                                ['escape' => false]
                            )?>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody></table>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Html->link(
                    '<i class="fa fa-plus"></i> Add User',
                    ['action' => 'Add'],
                    ['class' => 'btn btn-primary btn-sm', 'escape' => false]
                );?>
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
