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
            'group' => '<ul>{{group}}</ul>',
        ],
        'group' => [
            'group' => 'empty group',
        ],
    ];

    protected $_here = null;

    protected $_active = false;

    public function __construct(array $config = [], $here)
    {
        $this->_here = $here;
        $this->config(array_shift($config));

        if (!empty($config)) {
            $this->config('childConfig', $config);
        }
    }

    public function render($items)
    {
        $wrappers = '';

        foreach ($items as $item) {
            $wrapper = new MenuWrapper($this->config(), $this->_here);
            $wrappers .= $wrapper->render($item);
            $this->_active = $this->_active || $wrapper->active();
        }

        $this->config('group.group', $wrappers);
        return $this->formatTemplate('group', $this->config('group'));
    }

    public function active()
    {
        return $this->_active;
    }
}
