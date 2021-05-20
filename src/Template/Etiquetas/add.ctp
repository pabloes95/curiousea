<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="etiquetas form large-9 medium-8 columns content">
    <?= $this->Form->create($etiqueta) ?>
    <fieldset>
        <legend><?= __('Add Etiqueta') ?></legend>
        <?php
            echo $this->Form->control('etiqueta');
            echo $this->Form->control('articulos._ids', ['options' => $articulos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
