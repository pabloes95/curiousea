<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Imagens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imagens form large-9 medium-8 columns content">
    <?= $this->Form->create($imagen) ?>
    <fieldset>
        <legend><?= __('Add Imagen') ?></legend>
        <?php
            echo $this->Form->control('url');
            echo $this->Form->control('articulo_id', ['options' => $articulos]);
            echo $this->Form->control('usada');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
