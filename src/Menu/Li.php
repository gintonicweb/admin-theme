<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\Ul;

class Li
{
    protected $_name = null;

    protected $_options = [];

    protected $_ul = null;


    public function __construct($name, $options, $config)
    {
        $this->_name = $name;
        $this->_options = $options;
        $this->_config = $config[0];

        if (isset($options['children'])) {

            if (isset($config[1])) {
                unset($config[0]);
                $config = array_values($config);
            }
            $this->_ul = new Ul($options['children'], $config);
        }
    }

    public function render()
    {
        $ul = '';
        if (!is_null($this->_ul)) {
            $ul = $this->_ul->render();
        }

        $name = '<a href="#">' . $this->_name . '</a>';

        return sprintf('<li class="%s">', $this->_config['li']) . $name . $ul . '</li>';
    }
}

