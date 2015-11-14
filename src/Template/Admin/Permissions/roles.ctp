<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Roles</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th><a href="/admin/users?sort=id&amp;direction=asc">Role</a></th>
                        <th><a href="/admin/users?sort=email&amp;direction=asc">Count</a></th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role) : ?>
                    <tr>
                        <td><?= $role->alias ?></td>
                        <td><?= $role->count ?></td>
                        <td class="actions pull-right">
                            <a href="#" class="btn btn-default">
                                <i class="fa fa-list-ul"></i>
                            </a> 
                            <?= $this->Html->link(
                                '<i class="fa fa-trash"></i>', 
                                ['controller' => 'permissions', 'action' => 'removeRole'],
                                ['class' => 'btn btn-default', 'escape' => false]
                            ) ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="btn-group pull-left">
                <?= $this->Html->link(
                    'Add', 
                    ['controller' => 'permissions', 'action' => 'addRole'],
                    ['class' => 'btn btn-primary']
                ) ?>
            </div>
        </div>
    </div>
</div>

