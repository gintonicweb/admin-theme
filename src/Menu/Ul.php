<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\Li;

class Ul
{
    protected $_lis = [];

    protected $_config = [];

    public function __construct($lis, $config)
    {
        $this->_config = $config[0];
        
        foreach ($lis as $name => $options) {
            $this->_lis[] = new Li($name, $options, $config);
        }
    }

    public function render()
    {
        $output = sprintf('<ul class="%s">', $this->_config['ul']);
        foreach ($this->_lis as $li) {
            $output .= $li->render();
        }
        return $output . '</ul>';
    }
}
