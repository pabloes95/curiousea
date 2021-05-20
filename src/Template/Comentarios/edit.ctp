<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comentario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($comentario) ?>
    <fieldset>
        <legend><?= __('Edit Comentario') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('comentario');
            echo $this->Form->control('activo');
            echo $this->Form->control('respuesta_a');
            echo $this->Form->control('articulo_id', ['options' => $articulos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
