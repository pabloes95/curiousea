<?php
/**
  * @var \App\View\AppView $this
  */
  $this->layout = 'articulos';
  ?>


<div class="container">
  <h2>Nuevo Articulo</h2>
  <form class="" action="<?php echo $this->Url->build(["controller" => "Articulos","action" => "editar" , $articulo->id]); ?>" method="post" enctype="multipart/form-data">
      <div class="row">
          <div class="col-sm-12   input-field">
            <input  type="text" name="titulo" value="<?= h($articulo->titulo) ?>" required="true">
            <label  for="titulo">Titulo</label>
          </div>
        
          <div class="col-sm-12  input-field file-field ">
            <!-- <input type="file" name="imagen" value=""> -->
            <div class="btn btn-enviar waves-effect waves-light" >
              <span >Imagen</span>
              <input type="file" name="imagen" value="">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate"  name="txt" type="text">
            </div>
          </div>
      </div>
      <div class="row">
        <div class="input-field  col-xs-12">

            <textarea class="materialize-textarea" type="text" rows= "20" id="cuerpo" name="cuerpo"><?= h($articulo->cuerpo) ?></textarea>
            <label  for="cuerpo">Cuerpo</label>

        </div>
      </div>
      <div class="row">
        <div class=" input-field col-xs-12">
          <select id="select-categoria"   name="categoria">
              <option value="-1">Elige una categoria</option>
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?= h($categoria->id) ?>" <?php echo ($articulo->categoria == $categoria->id )? "selected" : ""  ?>><?= h($categoria->categoria) ?></option>
            <?php endforeach; ?>
          </select>
           <label>Categoria</label>
        </div>
        <div class=" input-field col-xs-12">
          <input  type="text" name="etiquetas" value="<?= h($etiquetas) ?>" placeholder="introduce las etiquetas separadas por ;">
          <label  for="etiquetas">Etiquetas</label>
        </div>
        <div class=" input-field col-xs-12">
          <input  type="url" name="fuente" value="<?= h($articulo->fuente) ?>" placeholder="http://www.ejemplo.com/ejemplo">
          <label  for="fuente">Fuente</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light btn-enviar"  type="submit" >Guardar</button>
      </div>
  </form>

</div>
