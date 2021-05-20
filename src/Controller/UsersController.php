<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

/**

 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
  public function isAuthorized($user){

      if (isset($user['role'])) {
          return true;
      }
      // Default deny
      return parent::isAuthorized($user);
  }

      public function beforeFilter(Event $event){
        parent::beforeFilter($event);
         $this->Auth->allow(['registrar','login']);
      }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Articulos', 'Comentarios', 'Curiosidads']
        ]);
        $categoriasT = TableRegistry::get('Categorias');
        $comentariosT = TableRegistry::get('Comentarios');
        $categorias = $categoriasT->find('all');
        $curiosidades = "";
        $articulos = "";
        $comentarios = "";
        if($user->role == "autor"){
          foreach ($user->curiosidads as $curiosidad) {
            $curiosidades[] = $curiosidad;
          }
          foreach ($user->articulos as $articulo) {
            $articulos[] = $articulo;
          }
        }
        // foreach ($user->comentarios as $comentario) {
        //   $comentarios[] = $comentario;
        // }
        $comentarios=$comentariosT->find()->where(['Comentarios.user_id'=> $user->id])->contain(['Articulos']);

        $categoriasAux= "";
        foreach ($categorias as $categoria) {
          $categoriasAux[$categoria->id] = $categoria;
        }
        $categorias = $categoriasAux;




        $this->set(compact('user'));
        $this->set(compact('categorias'));
        $this->set(compact('curiosidades'));
        $this->set(compact('articulos'));
        $this->set(compact('comentarios'));
        $this->set('_serialize', ['user','categorias','curiosidades','articulos','comentarios']);
    }



    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articulos', 'Comentarios', 'Curiosidads']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function login(){
        if ($this->request->is('post')) {
          $user = $this->Auth->identify();
          if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
          }
          $this->Flash->error(__('Invalid username or password, try again'));
        }
    }


    public function registrar(){
        if ($this->request->is('post')) {
          $nombre = $this->request->data['username'];
          $email = $this->request->data['email'];
          $pass1 = $this->request->data['password1'];
          $pass2 = $this->request->data['password2'];

          if((isset($nombre) && $nombre!= null) &&
             (isset($email) && $email!= null) &&
             (isset($pass1) && $pass1!= null) &&
             (isset($pass2) && $pass2!= null)){
               $usuarios = $this->Users->find()->where(['username' => $nombre]);
            if(0 === $usuarios->count()){
              $usuarios = $this->Users->find()->where(['email' => $email]);
              if(0 === $usuarios->count()){
                if($pass2 == $pass1){
                      $usuario = $this->Users->newEntity();
                      $usuario->username = $nombre;
                      $usuario->password = $pass2;
                      $usuario->email = $email;
                      $usuario->role = "usuario";
                      if ($this->Users->save($usuario)) {
                          $this->Flash->success(__('Usuario guardado con exito.'));

                          return $this->redirect([
                              'controller' => 'Pages',
                              'action' => 'display'
                          ]);
                      }
                      $this->Flash->error(__('No pudo guardarse el usuario.'));
                }else{
                    $this->Flash->error(__('Las contraseñas no coinciden'));
                }
              }else{
                  $this->Flash->error(__('Correo electronico ya en uso'));
              }
            }else{
              $this->Flash->error(__('Nombre de usuario  ya en uso'));
            }
          }else{
            $this->Flash->error(__('Algun campo estaba vacio, por favor vuelve a rellenar el formulario'));
          }
        }
    }



    public function logout(){

        return $this->redirect($this->Auth->logout());
    }

    public function cambiarContrasena(){

      if ($this->request->is('post')) {
        $oldPass = $this->request->data['passwordOld'];
        $newPass1 = $this->request->data['passwordNew1'];
        $newPass2 = $this->request->data['passwordNew2'];


        if((isset($oldPass) && $oldPass!= null) &&
           (isset($newPass1) && $newPass1!= null) &&
           (isset($newPass2) && $newPass2!= null)){
             $user =$this->Users->get($this->Auth->user('id'));


          if ((new DefaultPasswordHasher)->check($oldPass, $user->password)) {
              if($newPass1 == $newPass2){

                  $user->password = $newPass1;
                  if($this->Users->save($user)){
                    $this->Flash->success(__('Contraseña cambiada correctamente, por favor vuelva a identificarse'));

                    return $this->redirect($this->Auth->logout());
                  }else{
                    $this->Flash->error(__('Ha ocurrido un error al guardar la contraseña'));
                  }
                  $this->Flash->error(__('Las nuevas contraseñas no coinciden'));
              }
            }else{
                  $this->Flash->error(__('La contraseña del usuario no es correcta'));
            }



        }else{
          $this->Flash->error(__('Algun campo estaba vacio, por favor vuelve a rellenar el formulario'));
        }
      }
      return $this->redirect([
          'controller' => 'Users',
          'action' => 'index'
      ]);
    }


    private function cambiarImagen($user){

      if(!($_FILES["imagen"]["error"]>0)){
        $tipos = ['image/jpeg','image/png','image/jpg'];

          if (in_array($_FILES["imagen"]["type"], $tipos)){
            $carpeta = WWW_ROOT . 'img/usuarios/perfiles/'.$user->username."/";
            $rutaImg = $carpeta . $_FILES["imagen"]["name"];
            if (!is_dir($carpeta)) {
                  mkdir($carpeta);
              }

            // echo $rutaImg;
            $imgURL =  'img/usuarios/perfiles/'.$user->username."/".$_FILES["imagen"]["name"];
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImg);
            return $imgURL;
          }
        return false;
      }
    }


    public function actualizarUsuario(){

      if ($this->request->is('post')) {
        $pass = $this->request->data['password'];
        if((isset($pass) && $pass!= null)){
           $user =$this->Users->get($this->Auth->user('id'));
             if ((new DefaultPasswordHasher)->check($pass, $user->password)) {


               $email = $this->request->data['email'];
               $nombre = $this->request->data['nombre'];
               $apellidos = $this->request->data['apellidos'];
               $fechaNac = $this->request->data['fecha_nacimiento'];
               $imagen = $this->cambiarImagen($user);
               if($imagen != false){
                  $user->imagen = $imagen;
               }

               if((isset($email) && $email!= null) ){
                    $user->email = $email;
               }

               if((isset($nombre) && $nombre!= null) ){
                    $user->nombre = $nombre;
               }

               if((isset($apellidos) && $apellidos!= null) ){
                    $user->apellidos = $apellidos;
               }

               if((isset($fechaNac) && $fechaNac!= null) ){
                    $user->fecha_nacimiento = $fechaNac;
               }

               if($this->Users->save($user)){
                 $this->Flash->success(__('Usuario atualizado con exito'));


               }else{
                 $this->Flash->error(__('Ha habido un problema al actualizar el usuario'));
               }

             }else{
                 $this->Flash->error(__('La contraseña introducida no cincide con la del usuario'));
             }
        }else{
          $this->Flash->error(__('Introduce una contraseña para poder validar tu identidad'));
        }
    }
    return $this->redirect([
        'controller' => 'Users',
        'action' => 'index'
    ]);
  }



}
