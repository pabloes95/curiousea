<?php
/**
  * @var \App\View\AppView $this
  */
    $this->layout = 'perfil-usuarios';
?>
<?= $this->Flash->render() ?>


    <div class="col-lg-12 art-com">
      <div class="panel-group" id="accordion">
        <?php if ($user->role =="autor"): ?>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#articulos">Articulos</a>
              </h4>
            </div>
            <div id="articulos" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="row">
                    <p><a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "nuevoArticulo"]); ?>" class="nueva-curiosidad" >Nuevo Articulo</a></p>
                </div>

                <div class="row">
                  <table cellpadding="0"  id="tablaArticulos" class="display responsive nowrap" cellspacing="0" >
                      <thead>
                          <tr>

                              <th scope="col"  class="search">Titulo</th>
                              <th scope="col"  class="search">Creado</th>
                              <th scope="col"  class="search">editado</th>
                              <th scope="col"  class="search">Categoria</th>
                              <th scope="col" class="actions">Aciones</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php if ($articulos!=""): ?>


                          <?php foreach ($articulos as $articulo): ?>
                          <tr>

                              <td><?= h($articulo->titulo) ?></td>
                              <td><?= h($articulo->created) ?></td>
                              <td><?= h($articulo->modified) ?></td>
                              <td><?= h($categorias[$articulo->categoria_id]->categoria) ?></td>
                              <td>
                                <a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "ver",  $articulo->slug ]); ?>"  class="waves-effect waves-light btn"><i class="material-icons right">visibility</i></span></a>
                                <a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "editar",  $articulo->id ]); ?>"  class="waves-effect waves-light btn"><i class="material-icons right">mode_edit</i></a>

                                <?php if ($articulo->publicado): ?>
                                  <a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "publicar", $articulo->id ]); ?>"   class="waves-effect waves-light btn"><i class="material-icons right">close</i></span></a>
                                  <?php else: ?>
                                        <a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "publicar", $articulo->id ]); ?>"   class="waves-effect waves-light btn"><i class="material-icons right">done</i></span></a>
                                <?php endif; ?>
                                  <a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "eliminar", $articulo->id ]); ?>"   class="waves-effect waves-light btn"><i class="material-icons right">delete</i></a>

                              </td>


                          </tr>
                          <?php endforeach; ?>
                              <?php endif; ?>
                      </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#curiosidades">Curiosidades</a>
            </h4>
          </div>
          <div id="curiosidades" class="panel-collapse collapse  in">
            <div class="panel-body">
              <div class="row">
                  <p><a href="#" class="nueva-curiosidad" data-toggle="modal" data-target="#modalCuriosidad">Nueva Curiosidad</a></p>
              </div>
              <div class="row">
                <table cellpadding="0" cellspacing="0" id="tabla" class="display responsive">
                    <thead>
                        <tr>

                            <th scope="col"  class="search">Titulo</th>
                            <th scope="col"  class="search">Curiosidad</th>
                            <th scope="col"  class="search">Categoria</th>
                            <th scope="col" class="actions">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if ($curiosidades!=""): ?>


                        <?php foreach ($curiosidades as $curiosidad): ?>
                        <tr>


                            <td><?= h($curiosidad->titulo) ?></td>
                            <td><?= h($curiosidad->curiosidad) ?></td>
                            <td><?= h($categorias[$curiosidad->categoria_id]->categoria) ?></td>
                            <td>
                              <a href="<?php echo $this->Url->build(["controller" => "Curiosidads","action" => "editar", $curiosidad->id ]); ?>"  class="waves-effect waves-light btn"><i class="material-icons right">mode_edit</i></a>
                              <a href="<?php echo $this->Url->build(["controller" => "Curiosidads","action" => "eliminar",  $curiosidad->id ]); ?>"   class="waves-effect waves-light btn"><i class="material-icons right">delete</i></a>

                            </td>


                        </tr>
                        <?php endforeach; ?>
                          <?php endif; ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <?php endif; ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#comentarios">Comentarios</a>

            </h4>
          </div>
          <div id="comentarios" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="row">
                <table cellpadding="0" cellspacing="0" id="tablaComentarios" class="display responsive">
                    <thead>
                        <tr>

                            <th scope="col"  class="search">Comentario</th>
                            <th scope="col"  class="search">articulo</th>
                            <th scope="col"  class="search">acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php if ($comentarios!=""): ?>


                        <?php foreach ($comentarios as $comentario): ?>
                        <tr>


                            <td><?= h($comentario->comentario) ?></td>
                            <td><?= h($comentario->articulo->titulo) ?></td>

                            <td>


                            <a href="<?php echo $this->Url->build(["controller" => "Articulos","action" => "ver",  $comentario->articulo->slug ]); ?>"  class="waves-effect waves-light btn"><i class="material-icons right">visibility</i></span></a>

                            </td>


                        </tr>
                        <?php endforeach; ?>
                          <?php endif; ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>
<div class="modal fade" id="modalCuriosidad" tabindex="-1" role="dialog" aria-labelledby="myModalCuriosidad">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo $this->Url->build(["controller" => "Curiosidads","action" => "añadirCuriosidad"]); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalCuriosidad">Nueva Curiosidad</h4>
        </div>
        <div class="modal-body">

            <div class="row">
              <div class="input-field  col-xs-12">

                   <input  type="text" name="titulo" value="" >
                  <label  for="username">Titulo</label>

              </div>
            </div>
            <div class="row">
              <div class="input-field  col-xs-12">

                  <textarea class="materialize-textarea" type="text" rows= "5" id="cuerpo" name="cuerpoCuriosidad"></textarea>
                  <label  for="cuerpo">Curiosidad</label>

              </div>

            </div>
            <div class="row">
              <div class=" input-field col-xs-12">
                <select id="select-categoria"   name="categoria">
                    <option value="-1">Elige una categoria</option>
                  <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= h($categoria->id) ?>"><?= h($categoria->categoria) ?></option>
                  <?php endforeach; ?>
                </select>
                 <label>Categoria</label>
              </div>
              <div class="input-field  col-xs-12">

                   <input  type="url" name="fuente" value="" >
                  <label  for="fuente">Fuente</label>

              </div>

            </div>




        </div>
        <div class="modal-footer">

          <button class="btn waves-effect waves-light btn-cancelar"  data-dismiss="modal">Cancelar</button>
          <button class="btn waves-effect waves-light btn-enviar"  type="submit" >Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalContraseña" tabindex="-1" role="dialog" aria-labelledby="myModalContraseña">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo $this->Url->build(["controller" => "Users","action" => "cambiarContrasena"]); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="font-size:18px;" id="myModalContraseña">Cambiar Contraseña</h4>
        </div>
        <div class="modal-body">

            <div class="row">
              <div class="input-field  col-xs-12">

                   <input type="password" name="passwordOld" value="" >
                  <label  for="username">Contraseña</label>

              </div>
            </div>
            <div class="row">
              <div class=" input-field col-xs-12">

                   <input   type="password" name="passwordNew1" value="" >
                  <label   for="passwordNew1">Nueva Contraseña</label>

              </div>
            </div>
            <div class="row">
              <div class=" input-field col-xs-12">

                   <input type="password" name="passwordNew2" value="" >
                  <label   for="passwordNew2">Repetir nueva Contraseña</label>

              </div>
            </div>

        </div>
        <div class="modal-footer">

          <button class="btn waves-effect waves-light btn-cancelar"  data-dismiss="modal">Cancelar</button>
          <button class="btn waves-effect waves-light btn-enviar"  type="submit" >Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalUsuario">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo $this->Url->build(["controller" => "Users","action" => "actualizarUsuario"]); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="font-size:18px;" id="myModalUsuario">Informacion personal</h4>
        </div>
        <div class="modal-body">

            <div class="row">
              <div class="input-field  col-xs-12">

                   <input type="date" class="datepicker" name="fecha_nacimiento" value="" >
                  <label  for="fecha_nacimiento">Fecha de nacimiento</label>

              </div>
            </div>
            <div class="row">
              <div class=" input-field col-xs-12">

                   <input   type="text" name="nombre" value="" >
                  <label   for="nombre">Nombre</label>

              </div>
            </div>
            <div class="row">
              <div class=" input-field col-xs-12">

                   <input type="text" name="apellidos" value="" >
                  <label   for="apellidos">Apellidos</label>

              </div>
            </div>
            <div class="row">
              <div class=" input-field col-xs-12">

                   <input type="email" name="email" value="" >
                  <label   for="email">Email</label>

              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 input-field file-field">
                <div class="btn btn-enviar waves-effect waves-light" >
                  <span >Imagen</span>
                  <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate"  name="txt" type="text">
                </div>
              </div>


            </div>
            <div class="row">
              <div class="input-field  col-xs-12">

                   <input type="password" name="password" value="" >
                  <label  for="username">Por favor introdice tu contraseña para verificar que eres tu:</label>

              </div>
            </div>

        </div>
        <div class="modal-footer">

          <button class="btn waves-effect waves-light btn-cancelar"  data-dismiss="modal">Cancelar</button>
          <button class="btn waves-effect waves-light btn-enviar"  type="submit" >Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
