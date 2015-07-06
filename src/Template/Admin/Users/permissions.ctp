<?php $this->Html->addCrumb('Users', [
    'controller' => 'users',
    'action' => 'index',
    'prefix' => 'admin'
]) ?>
<?php $this->Html->addCrumb('Permissions', [
    'controller' => 'users',
    'action' => 'permissions',
    'prefix' => 'admin'
]) ?>
<?php $this->Helpers()->load('GintonicCMS.Require') ?>
<?php $this->Helpers()->load('GintonicCMS.Threaded') ?>

<div class="row">
    <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles (Access Request Objects)</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <?= $this->Threaded->ul($roles, 'alias'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permissions (Access Control Objects)</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <?= $this->Threaded->ul($permissions, 'alias'); ?>
            </div>
        </div>
    </div>
</div>
