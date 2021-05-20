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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta(
    'favicon.ico',
    '/interrogacion.png',
    ['type' => 'icon']
); ?>




    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') ?>
  <?= $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Roboto') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css') ?>
    <?= $this->Html->css('https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.css') ?>
    <?= $this->Html->css('https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css') ?>
    <?= $this->Html->css('flash.css') ?>
    <?= $this->Html->css('perfiles.css') ?>

    <!-- <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

      <nav class="navbar-fixed">
         <div class="nav-wrapper">
           <a href="/" class="brand-logo">Curiousea</a>
           <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></i></a>

           <ul id="nav-mobile" class="right hide-on-med-and-down">

           </ul>
         </div>
       </nav>

  <?php if ($user != false): ?>
      <ul id="slide-out" class="side-nav fixed">
      <li><div class="userView">
        <div class="background">
          <img src="/img/Categorias/electronica/img_fondo_electronica.jpg">
        </div>
        <?php if ($user->imagen): ?>
            <a href="/#"><img class="circle" src="<?= h($user->imagen)?>"></a>
          <?php else: ?>
            <a href="/#"><img class="circle" src="/img/usuarios/sin_perfil.png"></a>
        <?php endif; ?>
        <a href="/users" ><span id="username" class="white-text name"><?= h($user->username)?></span></a>
      </div></li>
      <li><a href="/#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?= h($user->role)?></a></li>
      <li class="nombreApellidos"><?= h($user->nombre) ?></li>
      <li class="nombreApellidos"><?= h($user->apellidos) ?></li>
      <li><a class="nueva-curiosidad" data-toggle="modal" data-target="#modalContraseña">Cambiar Contraseña</a></li>
      <li><a  class="nueva-curiosidad" data-toggle="modal" data-target="#modalUsuario">Cambiar Informacion del usuario</a></li>
      <li><a href="/logout" class="nueva-curiosidad">Cerrar sesion</a></li>

    </ul>
<?php endif; ?>

  <div class="container-fluid">
    <?= $this->fetch('content') ?>
  </div>


    <footer>
    </footer>


      <?= $this->Html->script('https://code.jquery.com/jquery-3.2.1.min.js') ?>
      <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>

      <?= $this->Html->script('https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.js') ?>
      <?= $this->Html->script('https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js') ?>

      <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js') ?>



      <?= $this->Html->script('perfil.js') ?>

</body>
</html>
