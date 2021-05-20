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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

// $this->layout = false;


$cakeDescription = 'CakePHP: the rapid development PHP framework';
$curiosidad = $this->cell('Curiosidad');
$articulos = $this->cell('Articulos');
?>
<div class="row grid">
  <?= $curiosidad ?>
  <?= $articulos ?>
</div>
<div class="row lineaBoton">
  <div class="col-lg-3 col-md-3">

  </div>
  <div class="col-lg-6 col-md-6 btnCargarMas">
    <button class="waves-effect waves-light btn" id="btnCargar" type="button" name="button">Cargar mas articulos</button>
  </div>
  <div class="col-lg-3 col-md-3">

  </div>
</div>
