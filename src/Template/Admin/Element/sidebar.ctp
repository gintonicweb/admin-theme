<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?= $this->Html->image('TwbsTheme.avatar.jpg',['class'=> 'img-circle']) ?>
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
            $this->Menu->add('Users', 'fa fa-users', [
                'index' => ['controller' => 'users', 'action' => 'index'], 
                'add' => ['controller' => 'users', 'action' => 'add'], 
            ]);
            echo $this->Menu->get();
        ?>

    </section>
</aside>

