<?php
    $this->loadHelper('AdminTheme.Acl');
    $this->Require->module('AdminTheme.permissions/tree');
?>


<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <?php foreach($aros as $role) : ?>
            <?php $active = ($aro->alias !== $role->alias) ?: 'class="active"' ?>
            <li <?= $active ?>>
                <?= $this->Html->link($role->alias, [
                    'controller' => 'permissions',
                    'action' => 'actions',
                    $role->alias
                ]) ?>
            </li>
        <?php endforeach ?>
    </ul>
    <div class="tab-content">
        <table class="table">
            <div id="tree" data-aro-alias="<?= $aro->alias?>"></div>
        </table>
    </div>
    <div class="box-footer clearfix"></div>
</div>
