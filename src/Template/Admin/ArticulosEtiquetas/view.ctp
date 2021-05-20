<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articulos Etiqueta'), ['action' => 'edit', $articulosEtiqueta->articulo_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articulos Etiqueta'), ['action' => 'delete', $articulosEtiqueta->articulo_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulosEtiqueta->articulo_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articulos Etiquetas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulos Etiqueta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['controller' => 'Etiquetas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etiqueta'), ['controller' => 'Etiquetas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articulosEtiquetas view large-9 medium-8 columns content">
    <h3><?= h($articulosEtiqueta->articulo_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Articulo') ?></th>
            <td><?= $articulosEtiqueta->has('articulo') ? $this->Html->link($articulosEtiqueta->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $articulosEtiqueta->articulo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Etiqueta') ?></th>
            <td><?= $articulosEtiqueta->has('etiqueta') ? $this->Html->link($articulosEtiqueta->etiqueta->id, ['controller' => 'Etiquetas', 'action' => 'view', $articulosEtiqueta->etiqueta->id]) : '' ?></td>
        </tr>
    </table>
</div>
