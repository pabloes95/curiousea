<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comentarios'), ['controller' => 'Comentarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comentario'), ['controller' => 'Comentarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Imagens'), ['controller' => 'Imagens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Imagen'), ['controller' => 'Imagens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['controller' => 'Etiquetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etiqueta'), ['controller' => 'Etiquetas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articulos index large-9 medium-8 columns content">
    <h3><?= __('Articulos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publicado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulos as $articulo): ?>
            <tr>
                <td><?= $this->Number->format($articulo->id) ?></td>
                <td><?= h($articulo->titulo) ?></td>
                <td><?= $articulo->has('user') ? $this->Html->link($articulo->user->id, ['controller' => 'Users', 'action' => 'view', $articulo->user->id]) : '' ?></td>
                <td><?= $articulo->has('categoria') ? $this->Html->link($articulo->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $articulo->categoria->id]) : '' ?></td>
                <td><?= h($articulo->publicado) ?></td>
                <td><?= h($articulo->imagen) ?></td>
                <td><?= h($articulo->slug) ?></td>
                <td><?= h($articulo->created) ?></td>
                <td><?= h($articulo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articulo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articulo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]) ?>
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
