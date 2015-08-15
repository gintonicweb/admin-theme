<?php

namespace AdminTheme\View\Helper;

use Cake\View\StringTemplateTrait;
use Cake\View\Helper;

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

    public function actions($actions)
    {
        $substitutes = $this->config('substitutes');

        foreach ($actions as $name => $config) {
            if(array_key_exists($name, $substitutes)) {
                $actions[$name]['title'] = '<i class="' . $substitutes[$name] . '"></i>';
            }
        }

        return $actions;
    }
}
