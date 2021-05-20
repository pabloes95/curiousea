<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articulo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['action' => 'index']) ?></li>
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
<div class="articulos form large-9 medium-8 columns content">
    <?= $this->Form->create($articulo) ?>
    <fieldset>
        <legend><?= __('Edit Articulo') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('cuerpo');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => true]);
            echo $this->Form->control('publicado');
            echo $this->Form->control('imagen');
            echo $this->Form->control('slug');
            echo $this->Form->control('etiquetas._ids', ['options' => $etiquetas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
