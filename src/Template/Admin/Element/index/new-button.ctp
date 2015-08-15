<?php
$links = [];
foreach ($actions as $name => $config) {

    $config += ['method' => 'GET'];

    if ((empty($config['url']['controller']) || $this->request->controller === $config['url']['controller']) &&
        (!empty($config['url']['action']) && $this->request->action === $config['url']['action'])
    ) {
        continue;
    }

    $linkOptions = [];
    if (isset($config['options'])) {
        $linkOptions = $config['options'];
    }

    if ($config['method'] === 'DELETE') {
        $linkOptions += [
            'block' => 'action_link_forms',
            'confirm' => __d('crud', 'Are you sure you want to delete record #{0}?', [$singularVar->{$primaryKey}])
        ];
    }

    if ($config['method'] !== 'GET') {
        $linkOptions += [
            'method' => $config['method']
        ];
    }

    if (!empty($config['callback'])) {
        $callback = $config['callback'];
        unset($config['callback']);
        $config['options'] = $linkOptions;
        $links[$name] = $callback($config, !empty($singularVar) ? $singularVar : null, $this);
        continue;
    }

    $url = $config['url'];
    if (!empty($singularVar)) {
        $url[] = $singularVar->{$primaryKey};
    }

    $links[$name] = [
        'title' => $config['title'],
        'url' => $url,
        'options' => $linkOptions,
        'method' => $config['method']
    ];
}
?>
<div class="btn-group pull-left">

    <?= $this->Html->link(
        'New ' . $this->get('singularVar'),
        $actions['add']['url'],
        ['class' => 'btn btn-primary']
    ) ?>

    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">

        <?php if (count($actionGroups) == 1 && count($links) == 1) : ?>
            <li><a href="#">No associated action</a></li>
        <?php endif; ?>

        <?php 
        foreach ($actionGroups['primary'] as $action) :
            if (isset($links[$action]) && $action != 'add')  : 
            ?>
                <li>
                    <?= $this->Html->link($links[$action]['title'], $links[$action]['url']); ?>
                </li>
            <?php 
            endif;
        endforeach;

        unset($actionGroups['primary']);

        // check if groups are not empty
        foreach ($actionGroups as $key => $group) {
            $exists = false;
            foreach ($group as $action) {
                if (array_key_exists($action, $links)) {
                    $exists = true;
                }
            }
            if (!$exists) {
                unset($actionGroups[$key]);
            }
        }

        foreach ($actionGroups as $key => $group) { ?>
            <hr>
            <?= $this->Html->link($key, '#') ?>
            <?php 
            foreach ($group as $subaction) {
                if (array_key_exists($subaction, $links)) { ?>
                    <li><?= $this->Html->link($links[$action]['title'], $links[$action]['url']); ?></li>
                <?php 
                }
            }
        }
        ?>
    </ul>
</div>

