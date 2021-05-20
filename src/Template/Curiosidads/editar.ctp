<?php
/**
  * @var \App\View\AppView $this
  */
  $this->layout = 'articulos';
  ?>


<div class="container">
  <h2>Editar Curiosidad</h2>
  <form class="" action="<?php echo $this->Url->build(["controller" => "Curiosidads","action" => "editar",$curiosidad->id]); ?>" method="post" enctype="multipart/form-data">
      <div class="row">
          <div class="col-sm-6 col-md-4  input-field">
            <input  type="text" name="titulo" value="<?= h($curiosidad->titulo) ?>" required="">
            <label  for="titulo">Titulo</label>
          </div>
      </div>
      <div class="row">
        <div class="input-field  col-xs-12">

            <textarea class="materialize-textarea" type="text" rows= "20" id="cuerpo" name="cuerpoCuriosidad"><?= h($curiosidad->curiosidad) ?></textarea>
            <label  for="cuerpo">Curiosidad</label>

        </div>
      </div>
      <div class="row">
        <div class=" input-field col-xs-12">
          <select id="select-categoria"   name="categoria">
              <option value="-1">Elige una categoria</option>
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?= h($categoria->id) ?>" <?php echo ($categoria->id == $curiosidad->categoria)? "selected":""; ?>><?= h($categoria->categoria) ?></option>
            <?php endforeach; ?>
          </select>
           <label>Categoria</label>
        </div>

        <div class=" input-field col-xs-12">
          <input  type="url" name="fuente" value="<?= h($curiosidad->fuente) ?>" placeholder="http://www.ejemplo.com/ejemplo">
          <label  for="fuente">Fuente</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light btn-enviar"  type="submit" >Guardar</button>
      </div>
  </form>

</div>
