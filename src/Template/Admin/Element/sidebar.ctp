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
            <?= $this->Menu->adminTree('Users', ['Index', 'Add', 'Permissions'], 'fa fa-users') ?>
            <?= $this->fetch('sidebar') ?>
        </ul>
    </section>
</aside>

