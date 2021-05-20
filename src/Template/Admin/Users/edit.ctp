<?php
/**
  * @var \App\View\AppView $this
  */
  $this->layout = "administracion";
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
            echo $this->Form->control('role');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellidos');
            echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
            echo $this->Form->control('activo');
            echo $this->Form->control('imagen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
