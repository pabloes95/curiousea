<?php foreach ($articulos as $articulo): ?>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item">

  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?= h($articulo->imagen) ?>">
    </div>
    <div class="card-content">

            <span class="card-title activator grey-text text-darken-4 ojo">
              <?= h($articulo->titulo) ?>
              <i class="material-icons right">visibility</i>
            </span>
            <p>
              <a href="<?= h($articulo->fuente) ?>">Ir a la fuente</a>
            </p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?= h($articulo->titulo) ?><i class="material-icons right">close</i></span>
      <p><?= h($articulo->cuerpo) ?></p>
      <p><a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "ver",$articulo->slug ]); ?>">Ver articulo</a></p>
    </div>
  </div>

  </div>

<?php endforeach; ?>
