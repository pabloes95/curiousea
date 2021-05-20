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
                ['action' => 'delete', $articulosEtiqueta->articulo_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articulosEtiqueta->articulo_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articulos Etiquetas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['controller' => 'Etiquetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etiqueta'), ['controller' => 'Etiquetas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articulosEtiquetas form large-9 medium-8 columns content">
    <?= $this->Form->create($articulosEtiqueta) ?>
    <fieldset>
        <legend><?= __('Edit Articulos Etiqueta') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
