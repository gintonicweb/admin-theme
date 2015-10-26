<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

class AclHelper extends Helper
{
    use StringTemplateTrait;

    protected $_defaultConfig = [
        'templates' => [
            'li' => '<li><span class="text-{{status}}">{{alias}}</span> {{defined}}</li>'
        ]
    ];

    public function actions($acos)
    {
        $output = '';
        foreach ($acos as $aco)
        {
            $status = $aco['allowed']?'success':'danger';
            $defined = '';
            if (!$aco['inherited']) {
                $defined = '<span class="small text-muted">(defined)</span>';
            }

            $output .= $this->templater()->format('li',[
                'status' => $status,
                'alias' => $aco->alias,
                'defined' => $defined
            ]);

            if (isset($aco['children'])) {
                $output .= '<ul>';
                $output .= $this->actions($aco['children']);
                $output .= '</ul>';
            }
        }
        return $output;
    }
}
