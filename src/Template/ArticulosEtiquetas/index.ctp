<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articulos Etiqueta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['controller' => 'Etiquetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etiqueta'), ['controller' => 'Etiquetas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articulosEtiquetas index large-9 medium-8 columns content">
    <h3><?= __('Articulos Etiquetas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('articulo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('etiqueta_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulosEtiquetas as $articulosEtiqueta): ?>
            <tr>
                <td><?= $articulosEtiqueta->has('articulo') ? $this->Html->link($articulosEtiqueta->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $articulosEtiqueta->articulo->id]) : '' ?></td>
                <td><?= $articulosEtiqueta->has('etiqueta') ? $this->Html->link($articulosEtiqueta->etiqueta->id, ['controller' => 'Etiquetas', 'action' => 'view', $articulosEtiqueta->etiqueta->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articulosEtiqueta->articulo_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articulosEtiqueta->articulo_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articulosEtiqueta->articulo_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulosEtiqueta->articulo_id)]) ?>
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
