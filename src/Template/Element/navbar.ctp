<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
        <?= $this->Html->image('AdminTheme.g.png', ['class' => 'logo-mini']) ?>
        <?= $this->Html->image('AdminTheme.gintonic-white.png', ['class' => 'logo-lg']) ?>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= $this->Html->image('AdminTheme.avatar.jpg', ['class' => 'user-image']) ?>
                        <span class="hidden-xs">
                        <?= $this->request->session()->read('Auth.User.username') ?>
                    </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= $this->Html->image('AdminTheme.avatar.jpg', ['class' => 'img-circle']) ?>
                            <p>
                                <?= $this->request->session()->read('Auth.User.username') ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= $this->Html->link(
                                    'Back to website',
                                    '/',
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= $this->Html->link(
                                    'Signout',
                                    ['controller' => 'Users', 'action' => 'signout', 'prefix' => false],
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>

    </nav>
</header>
