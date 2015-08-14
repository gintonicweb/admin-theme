<?php

namespace AdminTheme\View\Helper;

use Cake\View\StringTemplateTrait;
use Cake\View\Helper;

class IconsHelper extends Helper
{
    protected $_defaultConfig = [
        'substitutes' => [
            'edit' => 'fa fa-pencil',
            'view' => 'fa fa-eye',
            'delete' => 'fa fa-times',
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
