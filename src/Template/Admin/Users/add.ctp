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
                <h3 class="box-title">Create User</h3>
            </div>
            <?= $this->Form->create() ?>
                <div class="box-body">
                    <?= $this->Form->input('first', ['label' => 'First Name']) ?>
                    <?= $this->Form->input('last', ['label' => 'Last Name']) ?>
                    <?= $this->Form->input('email', ['label' => 'Email address']) ?>
                    <?= $this->Form->input('password', ['label' => 'Password']) ?>
                </div>
                <div class="box-footer">
                    <?= $this->Form->submit('Save', ['class' => 'btn btn-primary']) ?> 
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

