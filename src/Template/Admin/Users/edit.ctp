<?php $this->Html->addCrumb('Users', [
    'controller' => 'Users',
    'action' => 'index',
    'prefix' => 'admin'
])?>
<?php $this->Html->addCrumb('Add', [
    'controller' => 'Users',
    'action' => 'add',
    'prefix' => 'admin'
])?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3>Edit: <?= $user->full_name?></h3>
            </div>
            <?= $this->Form->create($user) ?>
                <div class="box-body">
                    <?= $this->Form->input('email', ['label' => 'Email']) ?>
                    <?= $this->Form->input('pwd', [
                        'label' => 'Password',
                        'type' => 'password',
                        'default' => 'dummy'
                    ]) ?>
                    <?= $this->Form->input('first', ['label' => 'First Name']) ?>
                    <?= $this->Form->input('last', ['label' => 'Last Name']) ?>
                </div>
                <div class="box-footer">
                    <?= $this->Form->submit('Save', [
                        'div' => false,
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
                <?= $this->Form->end() ?>
        </div>
    </div>
</div>
