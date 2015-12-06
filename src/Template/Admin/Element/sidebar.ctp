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
            [   // level 1
                'templates' => [
                    'group' => '<ul class="{{class}}">{{group}}</ul>',
                    'wrapper' => '<li class="{{class}}">{{wrapper}}</li>',
                    'content' => '<a href="{{url}}"><i class="{{left}}"></i><span>{{name}}</span><i class="{{right}} pull-right"></i></a>',
                ],
                'group' => ['class' => 'sidebar-menu'],
                'wrapper' => ['class' => 'treeview'],
                'content' => [
                    'left' => 'fa fa-angle-right',
                    'right' => 'fa fa-angle-left',
                ],
            ],
            [   // level 2
                'templates' => [
                    'group' => '<ul class="treeview-menu">{{group}}</ul>',
                    'wrapper' => '<li class="{{class}}">{{wrapper}}</li>',
                ],
                'content' => [
                    'left' => 'fa fa-angle-right',
                    'right' => '',
                ],
            ],
        ];
        $menu = [
            [
                'content' => ['left' => 'fa fa-users', 'name' => 'users'],
                'group' => [
                    [
                        'content' => [
                            'name' => 'index',
                            'url' => ['controller' => 'users', 'action' => 'index'],
                        ],
                    ],
                    [
                        'content' => [
                            'name' => 'add',
                            'url' => ['controller' => 'users', 'action' => 'add'],
                        ],
                    ],
                ],
            ],
            [
                'content' => ['left' => 'fa fa-image', 'name' => 'images'],
                'group' => [
                    [
                        'content' => [
                            'name' => 'index',
                            'url' => ['controller' => 'images', 'action' => 'index'],
                        ]
                    ],
                    [
                        'content' => [
                            'name' => 'add',
                            'url' => ['controller' => 'images', 'action' => 'add'],
                        ]
                    ],
                ],
            ],
        ];
        $this->loadHelper('AdminTheme.Menu');
        echo $this->Menu->create($config, $menu); 
        ?>

    </section>
</aside>

