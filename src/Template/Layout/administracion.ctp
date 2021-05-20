<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Curiousea | enterate de las ultimas novedades';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta(
    'favicon.ico',
    '/interrogacion.png',
    ['type' => 'icon']
); ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') ?>
      <?= $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons') ?>
      <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('administracion.css') ?>




    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>


    <?= $this->Html->script('jquery-1.12.4.min.js') ?>
      <?= $this->Html->script('https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js') ?>

      <?= $this->Html->script('tablas.js') ?>
      <?= $this->Html->script('admin/usuarios/usuarios.js') ?>
</body>
</html>
