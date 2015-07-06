<?php $this->loadHelper('GintonicCMS.Menu')?>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/gintonic_c_m_s/img/avatar.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>
                    <?= $this->request->session()->read('Auth.User.first') ?>
                    <?= $this->request->session()->read('Auth.User.last') ?>
                </p>
                <a href="#">
                    <?= $this->Html->link(
                        '<i class="fa fa-angle-left"></i> Back to website',
                        ['controller'=>'users', 'action' => 'view', 'prefix' => false],
                        ['escape' => false]
                    ) ?>
                </a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>Statistics</span>
                </a>
            </li>
            <li class="treeview<?= $this->Menu->active(['controller' => 'Users'])?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?= $this->Menu->li(
                        '<i class="fa fa-circle-o"></i> Index',
                        ['controller' => 'Users', 'action' => 'index']
                    ) ?>
                    <?= $this->Menu->li(
                        '<i class="fa fa-circle-o"></i> Add',
                        ['controller' => 'Users', 'action' => 'add']
                    ) ?>
                    <?= $this->Menu->li(
                        '<i class="fa fa-circle-o"></i> Permissions',
                        ['controller' => 'Users', 'action' => 'permissions']
                    ) ?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Config</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                </ul>
            </li>
        </ul>
    </section>
</aside>

