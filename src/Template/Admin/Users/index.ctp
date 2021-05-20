<?php
/**
  * @var \App\View\AppView $this
  */

  $this->layout = 'administracion';
  $cakeDescription = __('Administracion de usuarios curiousea');
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comentarios'), ['controller' => 'Comentarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comentario'), ['controller' => 'Comentarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Curiosidads'), ['controller' => 'Curiosidads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Curiosidad'), ['controller' => 'Curiosidads', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0" id="tabla" class="display">
        <thead>
            <tr>
                <th scope="col"  class="actions"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('apellidos') ?></th>
                <th scope="col"  class="search"><?= $this->Paginator->sort('fecha_nacimiento') ?></th>

                <th scope="col" class="search"><?= $this->Paginator->sort('imagen') ?></th>
                <th scope="col" class="search"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="search"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td class="<?= $user->activo? 'no-activo' : 'activo' ?>"><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellidos) ?></td>
                <td><?= h($user->fecha_nacimiento) ?></td>

                <td><?= h($user->imagen) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td><a href="<?php echo $this->Url->build(["action" => "edit",  $user->id]); ?>"  class="waves-effect waves-light btn"><i class="material-icons right">mode_edit</i></a></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="contextMenu" class="dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
      <li><a tabindex="-1" href="#">Ver</a></li>
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
