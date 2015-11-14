<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

class IconsHelper extends Helper
{
    protected $_defaultConfig = [
        'substitutes' => [
            'add' => 'fa fa-plus',
            'edit' => 'fa fa-pencil',
            'index' => 'fa fa-list-ul',
            'view' => 'fa fa-eye',
            'delete' => 'fa fa-trash',
        ]
    ];

    /**
     * This method replaces a string by an action icon. Mainly used for action
     * icons
     */
    public function actions($actions)
    {
        $substitutes = $this->config('substitutes');

        foreach ($actions as $name => $config) {
            if (array_key_exists($name, $substitutes)) {
                $actions[$name]['title'] = '<i class="' . $substitutes[$name] . '"></i>';
            }
        }

        return $actions;
    }
}
