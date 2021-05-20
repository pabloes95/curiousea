<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Curiosidad'), ['action' => 'edit', $curiosidad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Curiosidad'), ['action' => 'delete', $curiosidad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curiosidad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Curiosidads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curiosidad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="curiosidads view large-9 medium-8 columns content">
    <h3><?= h($curiosidad->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($curiosidad->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $curiosidad->has('categoria') ? $this->Html->link($curiosidad->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $curiosidad->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $curiosidad->has('user') ? $this->Html->link($curiosidad->user->id, ['controller' => 'Users', 'action' => 'view', $curiosidad->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($curiosidad->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Curiosidad') ?></h4>
        <?= $this->Text->autoParagraph(h($curiosidad->curiosidad)); ?>
    </div>
</div>
