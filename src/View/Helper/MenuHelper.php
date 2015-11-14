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

    /**
     * Creates a menu with a single level of submenus
     *
     * todo: this code is not stable. Should be refactored to get n-level of
     * nesting, and parent item should be flexible. Currently, only the
     * controller name is allowed.
     */
    public function add($name, $icon, $actions = [])
    {
        $menu = $this->Knp->get('sidebar')
            ->setChildrenAttribute('class', 'sidebar-menu');

        $menu->addChild($name, ['uri' => ['controller' => $name]])
            ->setExtra('template', ['sidebar' => ['left' => $icon]])
            ->setAttribute('class', 'treeview')
            ->setChildrenAttribute('class', 'treeview-menu');

        foreach ($actions as $key => $action) {
            $menu[$name]
                ->addChild($key, ['uri' => $action])
                ->setExtra('template', 'sidebar');
        }
    }

    /**
     * todo: this code is not stable. Renders the menu generated with add()
     */
    public function get()
    {
        return $this->Knp->render('sidebar', [
            'renderer' => '\AdminTheme\Menu\Renderer\ListRenderer'
        ]);
    }
}
