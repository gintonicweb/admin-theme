<?php if (!isset($params['class'])) {
    $params['class'] = false;
}
if (!isset($params['close'])) {
    $params['close'] = true;
}
?>

<div class="alert<?php echo ($params['class']) ? ' ' . $params['class'] : null; ?>">
    <?php if ($params['close']): ?>
        <button class="close" data-dismiss="alert" href="#">×</button>
    <?php endif; ?>
    <?php echo $message; ?>
</div>
