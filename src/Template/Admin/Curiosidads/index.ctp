<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Curiosidad'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="curiosidads index large-9 medium-8 columns content">
    <h3><?= __('Curiosidads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($curiosidads as $curiosidad): ?>
            <tr>
                <td><?= $this->Number->format($curiosidad->id) ?></td>
                <td><?= h($curiosidad->titulo) ?></td>
                <td><?= $curiosidad->has('categoria') ? $this->Html->link($curiosidad->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $curiosidad->categoria->id]) : '' ?></td>
                <td><?= $curiosidad->has('user') ? $this->Html->link($curiosidad->user->id, ['controller' => 'Users', 'action' => 'view', $curiosidad->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $curiosidad->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $curiosidad->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $curiosidad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curiosidad->id)]) ?>
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
