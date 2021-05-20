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
        <?= $this->Html->css('flash.css') ?>


        <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') ?>
        <?= $this->Html->css('https://fonts.googleapis.com/css?family=Roboto') ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css') ?>

        <?= $this->Html->css('articulos.css') ?>

    <!-- <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default barra-nav" data-topbar role="navigation">
      <div class="container-fluid">
        <div class="container">
          <ul class="nav navbar-nav">
              <li class="">
                <a class="curiousea" href="" >Curiousea</a>
              </li>
          </ul>
          <div class="nav navbar-nav navbar-right">
              <ul class="nav">
                  <li><a target="_blank" class="btn-volver"  href="<?php echo $this->Url->build(["controller" => "Pages","action" => "display"]); ?>">Volver</a></li>

              </ul>
          </div>
        </div>

      </div>
    <?= $this->Flash->render() ?>
    </nav>

    <div class="container-fluid">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>


    <?= $this->Html->script('https://code.jquery.com/jquery-3.2.1.min.js') ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js') ?>
    <?= $this->Html->script('articulos.js') ?>


</body>
</html>
