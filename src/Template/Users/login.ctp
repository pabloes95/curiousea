<?php

  $this->layout = 'registro';
 ?>


 <div class="container">
   <div class="row">

   </div>
   <div class="row">
     <div class="col-sm-2 col-lg-3">

     </div>
     <div class="col-sm-8 col-lg-6 formulario">
       <h2>Iniciar Sesion</h2>
       <form class="" action="<?php echo $this->Url->build(["controller" => "Users","action" => "login"]); ?>" method="post">
         <div class="row">
           <div class="input-field  col-xs-12">

                <input type="text" name="username" value="" >
               <label  for="username">Nombre de usuario</label>

           </div>
         </div>
         <div class="row">
           <div class="input-field  col-xs-12">

                <input type="password" name="password" value="" >
               <label  for="username">Contraseña</label>

           </div>
         </div>
         <div class="row">
           <div class="boton" >
             <button class="btn waves-effect waves-light btn-enviar"  type="submit" name="button">Enviar</button>
           </div>
         </div>
       </form>
     </div>
     <div class="col-sm-2 col-lg-3">

     </div>
   </div>


</div>
