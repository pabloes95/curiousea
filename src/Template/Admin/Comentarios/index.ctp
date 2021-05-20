<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comentario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comentarios index large-9 medium-8 columns content">
    <h3><?= __('Comentarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respuesta_a') ?></th>
                <th scope="col"><?= $this->Paginator->sort('articulo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comentarios as $comentario): ?>
            <tr>
                <td><?= $this->Number->format($comentario->id) ?></td>
                <td><?= $comentario->has('user') ? $this->Html->link($comentario->user->id, ['controller' => 'Users', 'action' => 'view', $comentario->user->id]) : '' ?></td>
                <td><?= h($comentario->activo) ?></td>
                <td><?= $this->Number->format($comentario->respuesta_a) ?></td>
                <td><?= $comentario->has('articulo') ? $this->Html->link($comentario->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $comentario->articulo->id]) : '' ?></td>
                <td><?= h($comentario->created) ?></td>
                <td><?= h($comentario->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comentario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comentario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
