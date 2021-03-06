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






    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Roboto') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') ?>

    <?= $this->Html->css('principal.css') ?>

    <!-- <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div style="display:none">
  <?= $this->Flash->render() ?>
</div>


    <nav class="navbar-fixed">
       <div class="nav-wrapper">
         <a href="/" class="brand-logo">Curiousea</a>
         <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></i></a>

         <ul id="nav-mobile" class="right hide-on-med-and-down">

         </ul>
       </div>
     </nav>

<?php if ($user == false): ?>
  <ul id="slide-out" class="side-nav fixed">
  <li><div class="userView">
    <div class="background">
      <img src="/img/Categorias/electronica/img_fondo_electronica.jpg">
    </div>
    <a href="/login"><img class="circle" src="/img/usuarios/sin_perfil.png"></a>
    <a href=""><span class="white-text name">No estas identificado.</span></a>
    <a href=""><span class="white-text email">??Unete a nosotros y podras realizar busquedas personalizadas!</span></a>
  </div></li>
  <li><a href="/login">Login</a></li>
  <li><a href="/users/registrar">??Registrate!</a></li>
  <li><div class="divider"></div></li>

</ul>
  <?php else: ?>
    <ul id="slide-out" class="side-nav fixed">
    <li><div class="userView">
      <div class="background">
        <img src="/img/Categorias/electronica/img_fondo_electronica.jpg">
      </div>
      <?php if ($user->imagen): ?>
          <a href="/users"><img class="circle" src="/<?= h($user->imagen)?>"></a>
        <?php else: ?>
          <a href="/users"><img class="circle" src="/img/usuarios/sin_perfil.png"></a>
      <?php endif; ?>


      <a href="/users" ><span id="username" class="white-text name"><?= h($user->username)?></span></a>
    </div></li>
    <li><a href="/users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?= h($user->role)?></a></li>



    <li>
      <li><div class=" input-field col-xs-12">
        <input id="etiquetas"  type="text" name="etiquetas" value="" placeholder="introduce las etiquetas separadas por ;">
        <label  for="etiquetas" class="etiquetas">Etiquetas</label>
      </div>
      </li>
      <li>  <div class=" input-field col-xs-12">
        <select id="select-categoria"   name="categoria">
            <option value="-1">Elige una categoria</option>
          <?php foreach ($categorias as $categoria): ?>
            <option value="<?= h($categoria->id) ?>"><?= h($categoria->categoria) ?></option>
          <?php endforeach; ?>
        </select>

      </div>
      </li>
      <li><div class="row">
        <button id="btnEnviar" class="btn waves-effect waves-light btn-enviar"  type="submit" >Buscar</button>
      </div></li>

    </li>


    <li><a class="waves-effect" href="/logout">Cerrar sesion</a></li>

  </ul>

<?php endif; ?>




  <div class="container-fluid">
      <?= $this->fetch('content') ?>
  </div>


    <footer>
    </footer>
      <?= $this->Html->script('https://code.jquery.com/jquery-3.2.1.min.js') ?>
      <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>
      <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js') ?>
      <?= $this->Html->script('https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js') ?>



      <?= $this->Html->script('principal.js') ?>

</body>
</html>
