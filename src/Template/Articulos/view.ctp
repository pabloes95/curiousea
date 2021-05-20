<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articulo'), ['action' => 'edit', $articulo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articulo'), ['action' => 'delete', $articulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comentarios'), ['controller' => 'Comentarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comentario'), ['controller' => 'Comentarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Imagens'), ['controller' => 'Imagens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Imagen'), ['controller' => 'Imagens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Etiquetas'), ['controller' => 'Etiquetas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etiqueta'), ['controller' => 'Etiquetas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articulos view large-9 medium-8 columns content">
    <h3><?= h($articulo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($articulo->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $articulo->has('user') ? $this->Html->link($articulo->user->id, ['controller' => 'Users', 'action' => 'view', $articulo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $articulo->has('categoria') ? $this->Html->link($articulo->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $articulo->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagen') ?></th>
            <td><?= h($articulo->imagen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($articulo->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articulo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articulo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articulo->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publicado') ?></th>
            <td><?= $articulo->publicado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cuerpo') ?></h4>
        <?= $this->Text->autoParagraph(h($articulo->cuerpo)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comentarios') ?></h4>
        <?php if (!empty($articulo->comentarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Comentario') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col"><?= __('Respuesta A') ?></th>
                <th scope="col"><?= __('Articulo Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($articulo->comentarios as $comentarios): ?>
            <tr>
                <td><?= h($comentarios->id) ?></td>
                <td><?= h($comentarios->user_id) ?></td>
                <td><?= h($comentarios->comentario) ?></td>
                <td><?= h($comentarios->activo) ?></td>
                <td><?= h($comentarios->respuesta_a) ?></td>
                <td><?= h($comentarios->articulo_id) ?></td>
                <td><?= h($comentarios->created) ?></td>
                <td><?= h($comentarios->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comentarios', 'action' => 'view', $comentarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comentarios', 'action' => 'edit', $comentarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comentarios', 'action' => 'delete', $comentarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Imagens') ?></h4>
        <?php if (!empty($articulo->imagens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Articulo Id') ?></th>
                <th scope="col"><?= __('Usada') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($articulo->imagens as $imagens): ?>
            <tr>
                <td><?= h($imagens->id) ?></td>
                <td><?= h($imagens->url) ?></td>
                <td><?= h($imagens->articulo_id) ?></td>
                <td><?= h($imagens->usada) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Imagens', 'action' => 'view', $imagens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Imagens', 'action' => 'edit', $imagens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Imagens', 'action' => 'delete', $imagens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Etiquetas') ?></h4>
        <?php if (!empty($articulo->etiquetas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Etiqueta') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($articulo->etiquetas as $etiquetas): ?>
            <tr>
                <td><?= h($etiquetas->id) ?></td>
                <td><?= h($etiquetas->etiqueta) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Etiquetas', 'action' => 'view', $etiquetas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Etiquetas', 'action' => 'edit', $etiquetas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etiquetas', 'action' => 'delete', $etiquetas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etiquetas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
