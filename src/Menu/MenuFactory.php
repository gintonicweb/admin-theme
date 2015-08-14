<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\MenuItem;
use Gourmet\KnpMenu\Menu\MenuFactory as GourmetMenuFactory;

class MenuFactory extends GourmetMenuFactory
{
    public function createItem($name, array $options = array())
    {
        foreach ($this->getExtensions() as $extension) {
            $options = $extension->buildOptions($options);
        }
        $item = new MenuItem($name, $this);
        foreach ($this->getExtensions() as $extension) {
            $extension->buildItem($item, $options);
        }
        return $item;
    }
}
