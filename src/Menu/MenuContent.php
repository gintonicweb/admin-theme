<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\MenuGroup;
use Cake\Core\InstanceConfigTrait;
use Cake\Network\Request;
use Cake\Routing\Router;
use Cake\View\StringTemplateTrait;

class MenuContent
{
    use StringTemplateTrait;
    use InstanceConfigTrait;

    protected $_defaultConfig = [
        'templates' => [
            'content' => '<a href="{{url}}">{{name}}</a>',
        ],
        'content' => [
            'name' => '',
            'url' => '#',
        ],
    ];

    protected $_here = null;

    protected $_active = false;

    public function __construct(array $config = [], $here)
    {
        $this->_here = $here;
        $this->config($config);

        if ($here === Router::url($this->config('content.url'))) {
            $this->_active = true;
        }
    }

    public function render($group = null)
    {
        $this->config('content.url', Router::url($this->config('content.url')));
        $content = $this->formatTemplate('content', $this->config('content'));

        if ($group) {
            $this->config(array_shift($this->_config['childConfig']));
            $menu = new MenuGroup([$this->config()], $this->_here);
            $content .= $menu->render($group);
            $this->_active = $this->_active || $menu->active();
        }

        return $content;
    }

    public function active()
    {
        return $this->_active;
    }
}
