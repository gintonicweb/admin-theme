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
        $config = [
            [
                'ul' => 'sidebar-menu',
                'li' => 'treeview',
                'leaf' => false,
                'template' => '<i class="{{left}}"></i>{{label}}<i class="{{right}} pull-right"></i>'
            ],
            [
                'ul' => 'treeview-menu',
                'li' => false,
                'leaf' => false,
                'template' => '<i class="{{left}}"></i>{{label}}<i class="{{right}} pull-right"></i>',
            ],
        ];

        $menu = [
            'users' => [
                'children' => [
                    'index' => [
                        'url' => [
                            'controller' => 'users',
                            'action' => 'index',
                        ],
                    ],
                    'add' => [
                        'url' => [
                            'controller' => 'users',
                            'action' => 'add',
                        ],
                    ],
                ],
            ],
            'images' => [
                'children' => [
                    'index' => [
                        'url' => [
                            'controller' => 'images',
                            'action' => 'index',
                        ],
                    ],
                    'add' => [
                        'url' => [
                            'controller' => 'images',
                            'action' => 'add',
                        ],
                    ],
                ],
            ],
        ];
        $this->loadHelper('AdminTheme.Menu');
        echo $this->Menu->create($menu, $config); 
        ?>

    </section>
</aside>

