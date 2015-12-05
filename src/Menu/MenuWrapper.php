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

    public function __construct(array $config = [])
    {
        $this->config($config);
    }

    public function render($data)
    {
        if (isset($data['content'])) {
            $this->config(['content' => $data['content']]);
            $content = new MenuContent($this->config());
            $group = isset($data['group'])? $data['group'] : null;
            $contents = $content->render($group);
            $this->config('wrapper.wrapper', $contents);
        }

        return $this->formatTemplate('wrapper', $this->config('wrapper'));
    }
}
