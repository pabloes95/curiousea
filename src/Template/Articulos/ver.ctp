<?php
/**
  * @var \App\View\AppView $this
  */
  $articulos = $this->cell('Comentarios',[$articulo->id] );
  $this->layout = "ver-articulo";
?>
<div class="container">


  <div class="row">
    <div class="col-lg-12">
      <img class="imagen-articulo img img-responsive" src="/<?= h($articulo->imagen) ?>" alt="imganen">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h2><?= h($articulo->titulo) ?></h2>

    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h5><?= h($articulo->cuerpo) ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p><a href="<?= h($articulo->fuente) ?>">Fuente</a></p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p>Colaborador: <?= h($usuario->username) ?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p>Categoria: <?= h($articulo->categoria->categoria) ?></p>
    </div>
  </div>
  <div class="row">
    <h3>Comentarios:</h3>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <?php if ($user == false): ?>
        <h6>¿Quieres dejar un comentario? <a href="/users/registrar">¡Registrate!</a></h6>

        <?php else: ?>
          <a  role="button" data-toggle="collapse" href="#collapseComentario" aria-expanded="false" aria-controls="collapseComentario">
            Dejar un comentario
          </a>
          <div class="collapse" id="collapseComentario">

              <form class="" action="<?php echo $this->Url->build(["controller" => "Comentarios","action" => "anadir", $articulo->id]); ?>" method="post">
                <div class="input-field  col-xs-12">

                    <textarea class="materialize-textarea" type="text" rows= "20" id="cuerpo" name="comentario"></textarea>
                    <label  for="comentario">Comentario:</label>

                </div>
                <div class="col-xs-12">
                    <button class="btn waves-effect waves-light btn-enviar"  type="submit" >Enviar</button>
                </div>
              </form>

          </div>
          <?php endif; ?>

    </div>
  </div>

  <?= $articulos; ?>
</div>
