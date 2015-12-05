<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;
use AdminTheme\Menu\MenuGroup;

class MenuHelper extends Helper
{
    public function create($config, $data)
    {
        $menu = new MenuGroup($config);
        return $menu->render($data);
    }
}
