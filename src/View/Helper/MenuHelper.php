<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;
use AdminTheme\Menu\Ul;

class MenuHelper extends Helper
{
    public function create($menu, $config)
    {
        $menu = new Ul($menu, $config);
        return $menu->render();
    }
}
