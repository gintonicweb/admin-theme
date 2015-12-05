<?php

namespace AdminTheme\Menu;

use AdminTheme\Menu\MenuGroup;
use Cake\Core\InstanceConfigTrait;
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

    public function __construct(array $config = [])
    {
        $this->config($config);
    }

    public function render($group = null)
    {
        $this->config('content.url', Router::url($this->config('content.url')));
        $content = $this->formatTemplate('content', $this->config('content'));

        if ($group) {
            $this->config(array_shift($this->_config['childConfig']));
            $menu = new MenuGroup([$this->config()]);
            $content .= $menu->render($group);
        }

        return $content;
    }
}
