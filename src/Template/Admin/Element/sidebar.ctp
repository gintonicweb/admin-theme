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

        <?php
            $this->loadHelper('Gourmet/KnpMenu.Menu');
            $menu = $this->Menu->get('sidebar')
                ->setChildrenAttribute('class', 'sidebar-menu');

            $menu->addChild('Statistics', ['uri' => ['controller' => 'Statistics']])
                ->setExtra('template', ['sidebar' => ['left' => 'fa fa-bar-chart']])
                ->setAttribute('class', 'treeview')
                ->setChildrenAttribute('class', 'treeview-menu');

            $menu->addChild('Users', ['uri' => ['controller' => 'Users']])
                ->setExtra('template', ['sidebar' => ['left' => 'fa fa-user']])
                ->setAttribute('class', 'treeview')
                ->setChildrenAttribute('class', 'treeview-menu');

            $menu['Users']
                ->addChild('index', ['uri' => ['controller' => 'Users', 'action' => 'index']])
                ->setExtra('template', 'sidebar');

            $menu['Users']
                ->addChild('add', ['uri' => ['controller' => 'Users', 'action' => 'add']])
                ->setExtra('template', 'sidebar');

            $menu['Users']
                ->addChild('permissions', ['uri' => ['controller' => 'Users', 'action' => 'permissons']])
                ->setExtra('template', 'sidebar');

            echo $this->Menu->render('sidebar', [
                'renderer' => '\AdminTheme\Menu\Renderer\ListRenderer'
            ]);
        ?>

    </section>
</aside>

