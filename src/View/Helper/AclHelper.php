<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper;

class AclHelper extends Helper
{

    public function actions($acos)
    {
        $output = '';
        foreach ($acos as $aco)
        {
            $status = $aco['allowed']?'success':'danger';

            $output .= '<li>';
            $output .= '<span class="text-'.$status.'">' . $aco->alias . '</span>';

            if(!$aco['inherited']) {
                $output .= ' <span class="text-muted small">(defined)</span>';
            }
            $output .= '</li>';

            if (isset($aco['children'])) {
                $output .= '<ul>';
                $output .= $this->actions($aco['children']);
                $output .= '</ul>';
            }
        }
        return $output;
    }

}
