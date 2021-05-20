<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\I18n\Time;
use Cake\View\Helper\UrlHelper;
/**
 * Articulos Controller
 *
 * @property \App\Model\Table\ArticulosTable $Articulos
 *
 * @method \App\Model\Entity\Articulo[] paginate($object = null, array $settings = [])
 */
class ArticulosController extends AppController
{
  static $ids = "";
  public function isAuthorized($user){

    // if ($this->request->getParam('action') == 'ver') {
    //      return true;
    //  }


      if (isset($user['role'])) {
          return true;
      }
      // Default deny
      return parent::isAuthorized($user);
  }

  public function beforeFilter(Event $event)
   {
       //parent::beforeFilter($event);
       // Allow users to register and logout.
       // You should not add the "login" action to allow list. Doing so would
       // cause problems with normal functioning of AuthComponent.
       $this->Auth->allow(['ver', 'pagina']);
   }

   public function pagina($indice=null){
     $respuesta = false;
     $articulos ="";
     $curiosidad ="";
      if($indice!=null){
        $curiosidadsT = TableRegistry::get('Curiosidads');

        $curiosidad = $curiosidadsT->find('all')->order('rand()')->first();


        $articulos = $this->Articulos->find()
          ->where(['publicado'=> true])
          ->order(['modified' => 'DESC'])->limit(8)->page($indice);
          $respuesta = true;

      }

      $this->set('articulos', $articulos);
      $this->set('respuesta', $respuesta);
      $this->set('curiosidad', $curiosidad);


     $this->set('_jsonOptions', JSON_FORCE_OBJECT);
     $this->set('_serialize', ['articulos','respuesta','curiosidad']);
   }

   public function busqueda(){
     $etiquetasT = TableRegistry::get('etiquetas');
     $categoria = $this->request->data['categoria'];
     $etiquetas = $this->request->data['etiquetas'];
     $respuesta = false;
     $articulos = "";
     global $ids;
      $etiquetasAux = "";
      $entrado ="nada";
       if((isset($categoria) && $categoria!= null && $categoria>0)&& (isset($etiquetas) && $etiquetas!= null)){
           $respuesta = true;
         $etiquetas = explode(";",$etiquetas);

          $ids = "";
            $etiquetas = $etiquetasT->find()->select(['id'])->where(['etiqueta IN' => $etiquetas]);
            foreach ($etiquetas as $etiqueta) {
              $ids[] =$etiqueta->id;
            }


          $entrado ="arriba";
          $articulos = $this->Articulos->find()->where(['categoria_id' => $categoria])->andWhere(['publicado'=> true])
          ->matching('Etiquetas', function ($query) {
                global $ids;
                 return $query->where(['Etiquetas.id IN' => $ids]);
             })->group(['Articulos.id'])
           ->order(['modified' => 'DESC'])->limit(50);
       }else if(isset($categoria) && $categoria!= null && $categoria>0){
          $respuesta = true;
          $articulos = $this->Articulos->find()
            ->where(['categoria_id' => $categoria])->andWhere(['publicado'=> true])
            ->order(['modified' => 'DESC'])->limit(50);
              $entrado ="categoria";
       }else if(isset($etiquetas) && $etiquetas!= null ){

         $entrado ="etiqueta";
         $etiquetas = explode(";",$etiquetas);

          $ids = "";
          $etiquetas = $etiquetasT->find()->select(['id'])->where(['etiqueta IN' => $etiquetas]);
          foreach ($etiquetas as $etiqueta) {
              $ids[] =$etiqueta->id;
          }

          $respuesta = true;
          $articulos = $this->Articulos->find()->where(['publicado'=> true])
          ->matching('Etiquetas', function ($query) {
                global $ids;
                 return $query->where(['Etiquetas.id IN' => $ids]);
             })->group(['Articulos.id'])
           ->order(['modified' => 'DESC'])->limit(50);
       }

       $this->set('articulos', $articulos);
       $this->set('respuesta', $respuesta);


      $this->set('_jsonOptions', JSON_FORCE_OBJECT);
      $this->set('_serialize', ['articulos','respuesta','ids','etiquetas','entrado']);

   }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categorias']
        ];
        $articulos = $this->paginate($this->Articulos);

        $this->set(compact('articulos'));
        $this->set('_serialize', ['articulos']);
    }

    /**
     * View method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $articulo = $this->Articulos->find()->contain(['Users', 'Categorias', 'Etiquetas', 'Comentarios', 'Imagens'])->where(["slug"=>$id])->first();
         $usuariosT = TableRegistry::get('Users');
         // $categoriasT = TableRegistry::get('Categorias');
         // $categorias = $categoriasT->find('all');
         $usuario = $usuariosT->get($articulo->user_id);
         $idUsuario = $this->Auth->user('id');
         $user ="";
         if($idUsuario == null){
           $user=false;
         }else{
           $user = $usuariosT->get($this->Auth->user('id'));
         }

        $this->set('articulo', $articulo);
        $this->set('usuario', $usuario);
        $this->set('user', $user);
        $this->set('_serialize', ['articulo','usuario','user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function nuevoArticulo()
    {
        $articulo = $this->Articulos->newEntity();
        // $categoriasT = TableRegistry::get('Categorias');
        // $categorias = $categoriasT->find('all');

        if ($this->request->is('post')) {
            $articulo = $this->rellenarArticulo($articulo, $this->request);
            if($articulo != false){
              $articulo->dirty('etiquetas', true);

              if ($this->Articulos->save($articulo, ['associated' => ['Etiquetas']])) {//guarda el articulo asociandolo a las etiquetas
                  $this->Flash->success(__('Articulo guardado'));

                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'index'
                    ]);
              }
              $this->Flash->error(__('No se ha podido guardar el articulo'));
            }


        }

        $categoriasT = TableRegistry::get('Categorias');
        $categorias = $categoriasT->find('all');
        $categoriasAux= "";
        foreach ($categorias as $categoria) {
          $categoriasAux[] = $categoria;
        }

        $this->set(compact('categorias'));
        $this->set('_serialize', ['categorias']);
    }


    /*
    * Obtiene los datos del formulario, y tras comprobar que no estan vacios rellena el articulo
    */
    private function rellenarArticulo($articulo, $post){
      $titulo = $post->data['titulo'];
      $cuerpo = $post->data['cuerpo'];
      $categoria = $post->data['categoria'];
      $etiquetas =$post->data['etiquetas'];
      $fuente =$post->data['fuente'];
      if((isset($titulo) && $titulo!= null) &&
         (isset($cuerpo) && $cuerpo!= null) &&
         (isset($categoria) && $categoria!= null) &&
         (isset($etiquetas) && $etiquetas!= null) &&
         (isset($fuente) && $fuente!= null)){
           $articulo->titulo = $titulo;
           $articulo->cuerpo = $cuerpo;
           $articulo->fuente = $fuente;
           $articulo->categoria_id = $categoria;
           $articulo->slug = $this->slugger($titulo);
           $imagen = $this->obtenerImagen($articulo);
           if($imagen != false){
             $articulo->imagen = $imagen;
             $etiquetas = $this->devolverEtiquetas($etiquetas);

             $articulo->user_id = $this->Auth->user('id');

             if($etiquetas != false){
                 $this->Articulos->save($articulo);
                $this->Articulos->Etiquetas->link($articulo, $etiquetas);//asocia las etiquetas con el articulo
                return $articulo;
             }else{
               $this->Flash->error(__('Introduce como minimo una etiqueta'));
             }
           }else{
             $this->Flash->error(__('Por favor elige una imagen para el articulo'));
           }
      }else{
          $this->Flash->error(__('Algun campo del formulario estaba vacio'));
          return false;
      }
      //var_dump($_FILES["imagen"]);
      return false;
    }


    private function slugger($titulo){
      $slug = Text::slug($titulo);
      if($this->Articulos->exists(['slug' => $slug])){
        $time = Time::now();
        $slug = $slug. "-" .   $time->i18nFormat('yyyy-MM-dd');
        return $slug;
      }else{
        return $slug;
      }
    }
    private function obtenerImagen($articulo){

      if(!($_FILES["imagen"]["error"]>0)){
        $tipos = ['image/jpeg','image/png','image/jpg'];

          if (in_array($_FILES["imagen"]["type"], $tipos)){
            $carpeta = WWW_ROOT . 'img/articulos/'.$articulo->slug."/";
            $rutaImg = $carpeta . $_FILES["imagen"]["name"];
            if (!is_dir($carpeta)) {
                  mkdir($carpeta);
              }

            // echo $rutaImg;
            $imgURL =  'img/articulos/'.$articulo->slug."/".$_FILES["imagen"]["name"];
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImg);
            return $imgURL;
          }
        return false;
      }
    }

    /*
    * Recorre las etiquetas separandolas por ";" de no existir crea la etiqueta en la base de datos
    */
    private function devolverEtiquetas($etiquetas){
      $etiquetasAux= explode(";", $etiquetas);
      if(count($etiquetasAux) > 0){
        $etiquetasEntities = [];
        foreach ($etiquetasAux as $value) {
            if($this->Articulos->Etiquetas->exists(['etiqueta' => trim($value)])){
              $etiqueta =  $this->Articulos->Etiquetas->find()->where(['etiqueta' => trim($value)])->first();

              $etiquetasEntities[] = $etiqueta;
            }else{
              $etiqueta = $this->Articulos->Etiquetas->newEntity();
              $etiqueta->etiqueta = $value;
                $this->Articulos->Etiquetas->save($etiqueta);
              $etiquetasEntities[] = $etiqueta;
            }
        }
        return $etiquetasEntities;
      }else{
        return false;
      }
    }

    /**
     * Edit method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => ['Etiquetas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articulo = $this->editarArticulo($articulo, $this->request);
            if($articulo != false){
              $articulo->dirty('etiquetas', true);

              if ($this->Articulos->save($articulo, ['associated' => ['Etiquetas']])) {//guarda el articulo asociandolo a las etiquetas
                  $this->Flash->success(__('Articulo actualizado'));

                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'index'
                    ]);
              }
              $this->Flash->error(__('No se ha podido guardar el articulo'));
            }else{
                    $this->Flash->error(__('No se ha podido guardar el articulo'));
            }


        }

        $categoriasT = TableRegistry::get('Categorias');
        $categorias = $categoriasT->find('all');
        $categoriasAux= "";
        foreach ($categorias as $categoria) {
          $categoriasAux[] = $categoria;
        }

        $etiquetas = $this->Articulos->Etiquetas->find('list', ['limit' => 200]);
        $categoria = $this->Articulos->Categorias->find('list', ['limit' => 200])->first();
            //debug($categoria);
            $articulo->categoria = $categoria;
        $etiquetasString ="";
        $separador = "";


        foreach ($articulo->etiquetas as  $etiqueta) {


            $etiquetasString =$etiquetasString. $separador . $etiqueta->etiqueta;
              $separador = ";";
        }

        $etiquetas = $etiquetasString;
        $this->set(compact('articulo', 'users', 'categorias', 'etiquetas'));
        $this->set('_serialize', ['articulo']);
    }

    private function editarArticulo($articulo, $post){
      $titulo = $post->data['titulo'];

      $cuerpo = $post->data['cuerpo'];
      $categoria = $post->data['categoria'];
      $etiquetas =$post->data['etiquetas'];
      $fuente =$post->data['fuente'];

      if((isset($titulo) && $titulo!= null)){
        $articulo->titulo = $titulo;
        $articulo->slug = $this->slugger($titulo);
      }
      if((isset($cuerpo) && $cuerpo!= null)){
           $articulo->cuerpo = $cuerpo;
      }
      if((isset($categoria) && $categoria!= null)){
         $articulo->categoria_id = $categoria;
      }
      $imagen = $this->obtenerImagen($articulo);
      if($imagen != false){

         $articulo->imagen = $imagen;
      }
      if((isset($etiquetas) && $etiquetas!= null)){
        $etiquetas = $this->devolverEtiquetas($etiquetas);
      }

      if((isset($fuente) && $fuente!= null)){
           $articulo->fuente = $fuente;
      }



             if($etiquetas != false){
                 $this->Articulos->save($articulo);
                $this->Articulos->Etiquetas->link($articulo, $etiquetas);//asocia las etiquetas con el articulo
                return $articulo;
             }else{
               $this->Flash->error(__('Introduce como minimo una etiqueta'));

                 //var_dump($_FILES["imagen"]);
                 return false;
             }


    }

    /**
     * Delete method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function eliminar($id = null)

    {
        $articulo = $this->Articulos->get($id);
        if ($this->Articulos->delete($articulo)) {
            $this->Flash->success(__('Articulo eliminado con exito.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error al eliminar el articulo'));
        }

        return $this->redirect([
            'controller' => 'Users',
            'action' => 'index'
        ]);
    }


    /**
     * Delete method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function publicar($id = null)

    {
        $articulo = $this->Articulos->get($id);
        $articulo->publicado = !$articulo->publicado;
        if ($this->Articulos->save($articulo)) {
          if($articulo->publicado){
            $this->Flash->success(__('Articulo pubicado'));
          }else{
              $this->Flash->success(__('Articulo despubicado'));
          }
            $this->Flash->success(__('Articulo pubicado'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error al publicar el articulo'));
        }

        return $this->redirect([
            'controller' => 'Users',
            'action' => 'index'
        ]);
    }
}
