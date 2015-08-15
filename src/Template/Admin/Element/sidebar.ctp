<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/gintonic_c_m_s/img/avatar.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="info">
                <p>
                    <?= $this->request->session()->read('Auth.User.first') ?>
                    <?= $this->request->session()->read('Auth.User.last') ?>
                </p>
                <?= $this->Html->link(
                    '<i class="fa fa-angle-left"></i> Back to website',
                    ['controller'=>'users', 'action' => 'view', 'prefix' => false],
                    ['escape' => false]
                ) ?>
            </div>
        </div>

        <?php
            $this->loadHelper('AdminTheme.Menu');
            $this->Menu->add('Statistics', 'fa fa-bar-chart');
            $this->Menu->add('Users', 'fa fa-users', ['index', 'add', 'permissions']);
            $this->Menu->add('Plans', 'fa fa-users', ['index', 'add']);
            echo $this->Menu->get();
        ?>

    </section>
</aside>
