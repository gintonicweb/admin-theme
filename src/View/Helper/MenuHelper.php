<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;

class MenuHelper extends Helper
{
    /**
     * List of helpers used by this helper
     *
     * @var array
     */
    public $helpers = [
        'Knp' => ['className' => 'Gourmet/KnpMenu.Menu'],
    ];

    public function add($controller, $icon, $actions = [])
    {
        $menu = $this->Knp->get('sidebar')
            ->setChildrenAttribute('class', 'sidebar-menu');

        $menu->addChild($controller, ['uri' => ['controller' => $controller]])
            ->setExtra('template', ['sidebar' => ['left' => $icon]])
            ->setAttribute('class', 'treeview')
            ->setChildrenAttribute('class', 'treeview-menu');

        foreach ($actions as $action) {
            $menu[$controller]
                ->addChild($action, ['uri' => ['controller' => $controller, 'action' => $action]])
                ->setExtra('template', 'sidebar');
        }
    }

    public function get($name)
    {
        return $this->Knp->render('sidebar', [
            'renderer' => '\AdminTheme\Menu\Renderer\ListRenderer'
        ]);
    }
}
