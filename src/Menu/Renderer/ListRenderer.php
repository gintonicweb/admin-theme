<?php
// Extend original to fix UL attributes

namespace AdminTheme\Menu\Renderer;

use Cake\Core\InstanceConfigTrait;
use Cake\View\StringTemplateTrait;
use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\MatcherInterface;
use Knp\Menu\Renderer\ListRenderer as KnpListRenderer;

class ListRenderer extends KnpListRenderer
{
    use StringTemplateTrait;
    use InstanceConfigTrait;

    protected $_defaultConfig = [
        'templates' => [
            'sidebar' => '<i class="{{left}}"></i><span>{{label}}</span><i class="{{right}} pull-right"></i>'
        ]
    ];

    public function __construct(MatcherInterface $matcher, array $defaultOptions = array(), $charset = null)
    {
        $defaultOptions = array_merge(array(
            'currentClass' => 'active'
        ), $defaultOptions);
        parent::__construct($matcher, $defaultOptions, $charset);
    }

    protected function renderLabel(ItemInterface $item, array $options)
    {
        $template = $item->getExtra('template');
        if ($template) {

            $templateName = $template;
            $templateOptions = [];
            if (is_array($template)) {
                $templateName = key($template);
                $templateOptions = $template[$templateName];
            }

            return $this->{$templateName . 'Template'}($item, $options, $templateOptions);
        }
        return $item->getLabel();
    }

    protected function sidebarTemplate(ItemInterface $item, array $options, $templateOptions)
    {
        if (!array_key_exists('left', $templateOptions)) {
            $templateOptions['left'] = 'fa fa-angle-right';
        }

        if (!array_key_exists('label', $templateOptions)) {
            $templateOptions['label'] = $item->getLabel();
        }

        if (!array_key_exists('right', $templateOptions) && $item->hasChildren()) {
            $templateOptions['right'] = 'fa fa-angle-left';
        }

        return $this->templater()->format('sidebar', $templateOptions);
    }


}
