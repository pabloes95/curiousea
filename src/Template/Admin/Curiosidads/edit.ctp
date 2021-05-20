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
                ['action' => 'delete', $curiosidad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $curiosidad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Curiosidads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="curiosidads form large-9 medium-8 columns content">
    <?= $this->Form->create($curiosidad) ?>
    <fieldset>
        <legend><?= __('Edit Curiosidad') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('curiosidad');
            echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
