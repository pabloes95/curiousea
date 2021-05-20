<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Curiosidads'), ['controller' => 'Curiosidads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curiosidad'), ['controller' => 'Curiosidads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($categoria->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articulos') ?></h4>
        <?php if (!empty($categoria->articulos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Cuerpo') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('Publicado') ?></th>
                <th scope="col"><?= __('Imagen') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->articulos as $articulos): ?>
            <tr>
                <td><?= h($articulos->id) ?></td>
                <td><?= h($articulos->titulo) ?></td>
                <td><?= h($articulos->cuerpo) ?></td>
                <td><?= h($articulos->user_id) ?></td>
                <td><?= h($articulos->categoria_id) ?></td>
                <td><?= h($articulos->publicado) ?></td>
                <td><?= h($articulos->imagen) ?></td>
                <td><?= h($articulos->slug) ?></td>
                <td><?= h($articulos->created) ?></td>
                <td><?= h($articulos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articulos', 'action' => 'view', $articulos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articulos', 'action' => 'edit', $articulos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articulos', 'action' => 'delete', $articulos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Curiosidads') ?></h4>
        <?php if (!empty($categoria->curiosidads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Curiosidad') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->curiosidads as $curiosidads): ?>
            <tr>
                <td><?= h($curiosidads->id) ?></td>
                <td><?= h($curiosidads->titulo) ?></td>
                <td><?= h($curiosidads->curiosidad) ?></td>
                <td><?= h($curiosidads->categoria_id) ?></td>
                <td><?= h($curiosidads->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Curiosidads', 'action' => 'view', $curiosidads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Curiosidads', 'action' => 'edit', $curiosidads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Curiosidads', 'action' => 'delete', $curiosidads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curiosidads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
