<header class="main-header">

<!-- Logo -->
<a href="#" class="logo">
  <?= $this->Html->image('GintonicCMS.g.png',['class'=> 'logo-mini']) ?>
  <?= $this->Html->image('GintonicCMS.gintonic-white.png',['class'=> 'logo-lg']) ?>
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
                    <img src="/gintonic_c_m_s/img/avatar.jpg" class="user-image" alt="User Image"/>
                    <span class="hidden-xs">
                        <?= $this->request->session()->read('Auth.User.first') ?>
                        <?= $this->request->session()->read('Auth.User.last') ?>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="/gintonic_c_m_s/img/avatar.jpg" class="img-circle" alt="User Image" />
                        <p>
                            <?= $this->request->session()->read('Auth.User.first') ?>
                            <?= $this->request->session()->read('Auth.User.last') ?>
                            <small>
                                <?= $this->request->session()->read('Auth.User.role') ?>
                            </small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <?= $this->Html->link(
                                'Back to website',
                                ['controller' => 'Users', 'action' => 'view', 'prefix' => false],
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
