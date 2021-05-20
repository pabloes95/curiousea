<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Etiqueta'), ['action' => 'edit', $etiqueta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Etiqueta'), ['action' => 'delete', $etiqueta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etiqueta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etiqueta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="etiquetas view large-9 medium-8 columns content">
    <h3><?= h($etiqueta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Etiqueta') ?></th>
            <td><?= h($etiqueta->etiqueta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($etiqueta->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articulos') ?></h4>
        <?php if (!empty($etiqueta->articulos)): ?>
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
            <?php foreach ($etiqueta->articulos as $articulos): ?>
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
</div>
