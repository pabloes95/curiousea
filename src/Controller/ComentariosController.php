<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Comentarios Controller
 *
 * @property \App\Model\Table\ComentariosTable $Comentarios
 *
 * @method \App\Model\Entity\Comentario[] paginate($object = null, array $settings = [])
 */
class ComentariosController extends AppController
{
  public function isAuthorized($user){

      if (isset($user['role'])) {
          return true;
      }
      // Default deny
      return parent::isAuthorized($user);
  }
  /**
   * Edit method
   *
   * @param string|null $id Comentario id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
  public function anadir($id = null)
  {

      $articulosT = TableRegistry::get('Articulos');
      $articulo = $articulosT->get($id);
      $comentarioO = $this->Comentarios->newEntity();

      if ($this->request->is(['patch', 'post', 'put'])) {
        $comentarioO->user_id = $this->Auth->user('id');
        $comentarioO->articulo_id = $id;
        $comentarioO->activo = true;

        $comentario = $this->request->data['comentario'];
            if(isset($comentario) && $comentario!= null){
              $comentarioO->comentario = $comentario;

              if ($this->Comentarios->save($comentarioO)) {
                  $this->Flash->success(__('Comentario enviado'));

                  return $this->redirect(["controller" => "Articulos","action" => "ver", $articulo->slug]);
              }
              $this->Flash->error(__('El comentario no se ha podido guardar'));
            }

      }

      return $this->redirect(["controller" => "Articulos","action" => "ver", $articulo->slug]);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Articulos']
        ];
        $comentarios = $this->paginate($this->Comentarios);

        $this->set(compact('comentarios'));
        $this->set('_serialize', ['comentarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Comentario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comentario = $this->Comentarios->get($id, [
            'contain' => ['Users', 'Articulos']
        ]);

        $this->set('comentario', $comentario);
        $this->set('_serialize', ['comentario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comentario = $this->Comentarios->newEntity();
        if ($this->request->is('post')) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->getData());
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('The comentario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
        }
        $users = $this->Comentarios->Users->find('list', ['limit' => 200]);
        $articulos = $this->Comentarios->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('comentario', 'users', 'articulos'));
        $this->set('_serialize', ['comentario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comentario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comentario = $this->Comentarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->getData());
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('The comentario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
        }
        $users = $this->Comentarios->Users->find('list', ['limit' => 200]);
        $articulos = $this->Comentarios->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('comentario', 'users', 'articulos'));
        $this->set('_serialize', ['comentario']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Comentario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comentario = $this->Comentarios->get($id);
        if ($this->Comentarios->delete($comentario)) {
            $this->Flash->success(__('The comentario has been deleted.'));
        } else {
            $this->Flash->error(__('The comentario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
