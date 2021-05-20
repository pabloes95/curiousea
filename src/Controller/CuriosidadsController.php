<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Curiosidads Controller
 *
 * @property \App\Model\Table\CuriosidadsTable $Curiosidads
 *
 * @method \App\Model\Entity\Curiosidad[] paginate($object = null, array $settings = [])
 */
class CuriosidadsController extends AppController
{
  public function isAuthorized($user){

      if (isset($user['role'])) {
          return true;
      }
      // Default deny
      return parent::isAuthorized($user);
  }

  public function añadirCuriosidad()
  {
    if ($this->request->is('post')) {
      $cuerpoCuriosidad = $this->request->data['cuerpoCuriosidad'];
      $titulo = $this->request->data['titulo'];
      $categoria = $this->request->data['categoria'];
      $fuente = $this->request->data['fuente'];


      if((isset($cuerpoCuriosidad) && $cuerpoCuriosidad != null) &&
         (isset($titulo) && $titulo != null) &&
         (isset($categoria) && $categoria != null) &&
         (isset($fuente) && $fuente != null) ){

           $curiosidad = $this->Curiosidads->newEntity();

           $curiosidad->curiosidad = $cuerpoCuriosidad;
           $curiosidad->fuente = $fuente;
           $curiosidad->titulo = $titulo;
           $curiosidad->user_id = $this->Auth->user('id');
           $curiosidad->categoria_id = $categoria;

           if ($this->Curiosidads->save($curiosidad)) {
               $this->Flash->success(__('Curiosidad guardada con exito'));
           }else{
             $this->Flash->error(__('Ha ocurrido un error'));
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

  public function editar($id = null)
  {
      $curiosidad = $this->Curiosidads->get($id, [
          'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $curiosidad = $this->editarCuriosidad($curiosidad, $this->request);
          if($curiosidad != false){


            if ($this->Curiosidads->save($curiosidad)) {//guarda el articulo asociandolo a las etiquetas
                $this->Flash->success(__('Curiosidad actualizada'));

                  return $this->redirect([
                      'controller' => 'Users',
                      'action' => 'index'
                  ]);
            }
            $this->Flash->error(__('No se ha podido guardar la curiosidad'));
          }else{
                  $this->Flash->error(__('No se ha podido guardar la curiosidad'));
          }


      }

      $categoriasT = TableRegistry::get('Categorias');
      $categorias = $categoriasT->find('all');
      $categoriasAux= "";
      foreach ($categorias as $categoria) {
        $categoriasAux[] = $categoria;
      }


      $categoria = $this->Curiosidads->Categorias->find('list', ['limit' => 200])->first();
          //debug($categoria);
          $curiosidad->categoria = $categoria;


      $this->set(compact('curiosidad', 'categorias'));
      $this->set('_serialize', ['articulo']);
  }

  private function editarCuriosidad($curiosidad, $post){
    $titulo = $post->data['titulo'];

    $cuerpo = $post->data['cuerpoCuriosidad'];
    $categoria = $post->data['categoria'];
    $fuente =$post->data['fuente'];

    if((isset($titulo) && $titulo!= null)){
      $curiosidad->titulo = $titulo;
    }
    if((isset($cuerpo) && $cuerpo!= null)){
         $curiosidad->curiosidad = $cuerpo;
    }
    if((isset($categoria) && $categoria!= null)){
       $curiosidad->categoria_id = $categoria;
    }

    if((isset($fuente) && $fuente!= null)){
         $curiosidad->fuente = $fuente;
    }
    return  $curiosidad;
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
      $curiosidad = $this->Curiosidads->get($id);
      if ($this->Curiosidads->delete($curiosidad)) {
          $this->Flash->success(__('Curiosidad eliminada correctamente.'));
      } else {
          $this->Flash->error(__('Ha ocurrido un error al eliminar la Curiosidad'));
      }

      return $this->redirect([
          'controller' => 'Users',
          'action' => 'index'
      ]);
  }

}
