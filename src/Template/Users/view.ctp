<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comentarios'), ['controller' => 'Comentarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comentario'), ['controller' => 'Comentarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Curiosidads'), ['controller' => 'Curiosidads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curiosidad'), ['controller' => 'Curiosidads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($user->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagen') ?></th>
            <td><?= h($user->imagen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Nacimiento') ?></th>
            <td><?= h($user->fecha_nacimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $user->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articulos') ?></h4>
        <?php if (!empty($user->articulos)): ?>
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
            <?php foreach ($user->articulos as $articulos): ?>
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
        <h4><?= __('Related Comentarios') ?></h4>
        <?php if (!empty($user->comentarios)): ?>
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
            <?php foreach ($user->comentarios as $comentarios): ?>
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
        <h4><?= __('Related Curiosidads') ?></h4>
        <?php if (!empty($user->curiosidads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Curiosidad') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->curiosidads as $curiosidads): ?>
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
