<?= $this->Flash->render() ?>
<div class="users form">

<form class="" action="./login" method="post">
  <fieldset>
    <div class="">
      <p>Nombre de Usuario:</p>
      <input type="text" name="username" value="" placeholder="Nombre de usuario">
    </div>
    <div class="">
      <p>Contraseña:</p>
      <input type="password" name="password" value="" placeholder="Nombre de usuario">
    </div>
    <div class="">
      <input type="submit" name="Enviar" value="Enviar">
    </div>
  </fieldset>
</form>

</div>
