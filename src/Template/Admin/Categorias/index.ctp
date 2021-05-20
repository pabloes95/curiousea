<?php
/**
  * @var \App\View\AppView $this
  */


  $this->layout = 'administracion';
  $cakeDescription = __('Administracion de categorias curiousea');
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Curiosidads'), ['controller' => 'Curiosidads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Curiosidad'), ['controller' => 'Curiosidads', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="categorias index large-9 medium-8 columns content">
    <h3><?= __('Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0" id="tabla" class="display">
        <thead>
            <tr>
                <th scope="col" class="actions"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="search"><?= $this->Paginator->sort('categoria') ?></th>
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $this->Number->format($categoria->id) ?></td>
                <td><?= h($categoria->categoria) ?></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoria->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoria->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="contextMenu" class="dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
      <li><a tabindex="-1" href="#">Action</a></li>
      <li><a tabindex="-1" href="#">Another action</a></li>
      <li><a tabindex="-1" href="#">Something else here</a></li>
      <li class="divider"></li>
      <li><a tabindex="-1" href="#">Separated link</a></li>
    </ul>
  </div>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->
</div>
