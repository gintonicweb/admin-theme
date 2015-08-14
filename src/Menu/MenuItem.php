<?php

namespace AdminTheme\Menu;

use Cake\Routing\Router;
use Knp\Menu\MenuItem as KnpMenuItem;

class MenuItem extends KnpMenuItem
{

    public $template = null;
    public $templateOptions = null;

    public function setUri($uri)
    {
        if (is_array($uri)) {
            $uri = Router::url($uri);
        }
        return parent::setUri($uri);
    }

    public function addChild($child, array $options = [])
    {
        if (!empty($options['route'])) {
            $options['uri'] = ['_name' => $options['route']];
            unset($options['route']);
        }
        return parent::addChild($child, $options);
    }

    public function setTemplateLabel($template, array $options = [])
    {
        $this->template = $template;
        $this->templateOptions = $options;
        return $this;
    }
}
