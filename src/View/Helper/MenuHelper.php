<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;
use AdminTheme\Menu\MenuGroup;

class MenuHelper extends Helper
{
    public function create($config, $data)
    {
        $here = $this->_View->request->here();
        $menu = new MenuGroup($config, $here);
        return $menu->render($data);
    }
}
