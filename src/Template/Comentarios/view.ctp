<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comentario'), ['action' => 'edit', $comentario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comentario'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comentario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comentarios view large-9 medium-8 columns content">
    <h3><?= h($comentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $comentario->has('user') ? $this->Html->link($comentario->user->id, ['controller' => 'Users', 'action' => 'view', $comentario->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Articulo') ?></th>
            <td><?= $comentario->has('articulo') ? $this->Html->link($comentario->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $comentario->articulo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comentario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respuesta A') ?></th>
            <td><?= $this->Number->format($comentario->respuesta_a) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comentario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comentario->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $comentario->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($comentario->comentario)); ?>
    </div>
</div>
