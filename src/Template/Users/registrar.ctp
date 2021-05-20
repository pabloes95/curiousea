<?php

  $this->layout = 'registro';
 ?>

<div class="container">
  <div class="row pregunta">
      <h1>¿quieres formar parte de nuestra comunidad?</h1>
  </div>
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8 formulario">
      <h2>¡Registrate!</h2>
      <form class="" action="<?php echo $this->Url->build(["controller" => "Users","action" => "registrar"]); ?>" method="post">

          <div class="row">
            <div class="col-md-6 input-field ">
                <input   type="text" name="username" value="" placeholder="">
                <label  for="username">Nombre de usuario:</label>
            </div>
            <div class="col-md-6 input-field">
              <input  type="email" name="email" value="" placeholder="">
              <label for="email">Correo Electronico: </label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6  input-field">
              <input  class="form-control"  type="password" name="password1" value="" placeholder="">
              <label   for="password1">Contraseña: </label>
            </div>
            <div class="col-md-6 input-field">
              <input class="form-control"  type="password" name="password2" value="" placeholder="">
              <label   for="password2">Repite tu Contraseña: </label>
            </div>
          </div>
          <div class="row">
            <div class="boton" >
              <button class="btn waves-effect waves-light btn-enviar"  type="submit" name="button">Enviar</button>
            </div>
          </div>



      
      </form>
    </div>
    <div class="col-md-2">

    </div>
  </div>


</div>
