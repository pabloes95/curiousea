<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Imagen'), ['action' => 'edit', $imagen->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Imagen'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Imagens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Imagen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="imagens view large-9 medium-8 columns content">
    <h3><?= h($imagen->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($imagen->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Articulo') ?></th>
            <td><?= $imagen->has('articulo') ? $this->Html->link($imagen->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $imagen->articulo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($imagen->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usada') ?></th>
            <td><?= $imagen->usada ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
