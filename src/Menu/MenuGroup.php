<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\MenuWrapper;
use Cake\Core\InstanceConfigTrait;
use Cake\View\StringTemplateTrait;

class MenuGroup
{
    use StringTemplateTrait;
    use InstanceConfigTrait;

    protected $_defaultConfig = [
        'templates' => [
            'group' => '<ul class="{{class}}">{{group}}</ul>',
        ],
        'group' => [
            'class' => '',
            'group' => 'empty group',
        ],
    ];

    public function __construct(array $config = [])
    {
        $this->config(array_shift($config));

        if (!empty($config)) {
            $this->config('childConfig', $config);
        }
    }

    public function render($items)
    {
        $wrappers = '';

        foreach ($items as $item) {
            $wrapper = new MenuWrapper($this->config());
            $wrappers .= $wrapper->render($item);
        }

        $this->config('group.group', $wrappers);
        return $this->formatTemplate('group', $this->config('group'));
    }
}
