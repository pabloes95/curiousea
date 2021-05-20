<?php foreach ($comentarios as $comentario): ?>



  <div class="row">
     <div class="col-lg-12">
       <div class="card">
         <div class="card-content ">
           <span class="card-title"><?= h($comentario->user->username) ?></span>
           <p><?= h($comentario->comentario) ?></p>
         </div>

       </div>
     </div>
   </div>
<?php endforeach; ?>
