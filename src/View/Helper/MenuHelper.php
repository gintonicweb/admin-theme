<?php

namespace AdminTheme\View\Helper;

use AdminTheme\Menu\MenuFactory;
use Gourmet\KnpMenu\View\Helper\MenuHelper as GourmetHelper;

class MenuHelper extends GourmetHelper 
{
    public function get($name, array $options = [])
    {
        if (empty($this->_factory)) {
            $this->_factory = new MenuFactory();
        }
        if (empty($this->_menus[$name])) {
            $this->_menus[$name] = $this->_factory->createItem($name, $options);
        }
        return $this->_menus[$name];
    }
}
