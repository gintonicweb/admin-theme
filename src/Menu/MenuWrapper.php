<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\MenuContent;
use Cake\Core\InstanceConfigTrait;
use Cake\View\StringTemplateTrait;

class MenuWrapper
{
    use StringTemplateTrait;
    use InstanceConfigTrait;

    protected $_defaultConfig = [
        'templates' => [
            'wrapper' => '<li class="{{class}}">{{wrapper}}</li>',
        ],
        'wrapper' => [
            'class' => '',
            'wrapper' => 'empty wrapper',
        ],
    ];

    protected $_here;

    protected $_active;

    public function __construct(array $config = [], $here)
    {
        $this->_here = $here;
        $this->config($config);
    }

    public function render($data)
    {
        if (isset($data['content'])) {
            $this->config(['content' => $data['content']]);
            $content = new MenuContent($this->config(), $this->_here);
            $group = isset($data['group'])? $data['group'] : null;
            $contents = $content->render($group);
            $this->_active = $this->_active || $content->active();
            $this->config('wrapper.wrapper', $contents);
        }

        if ($this->_active) {
            $class = $this->config('wrapper.class') . ' active';
            $this->config('wrapper.class', $class);
        }

        return $this->formatTemplate('wrapper', $this->config('wrapper'));
    }

    public function active()
    {
        return $this->_active;
    }
}
