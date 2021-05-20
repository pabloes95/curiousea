<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
/**
 * Articulos Controller
 *
 * @property \App\Model\Table\ArticulosTable $Articulos
 *
 * @method \App\Model\Entity\Articulo[] paginate($object = null, array $settings = [])
 */
class ArticulosController extends AppController
{


  public function initialize()
  {
      parent::initialize();
  }



    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

    }


    public function isAuthorized($user)    {

          return parent::isAuthorized($user);
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
    public function view($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => ['Users', 'Categorias', 'Etiquetas', 'Comentarios', 'Imagens']
        ]);

        $this->set('articulo', $articulo);
        $this->set('_serialize', ['articulo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articulo = $this->Articulos->newEntity();
        if ($this->request->is('post')) {
            $articulo = $this->Articulos->patchEntity($articulo, $this->request->getData());
            if ($this->Articulos->save($articulo)) {
                $this->Flash->success(__('The articulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articulo could not be saved. Please, try again.'));
        }
        $users = $this->Articulos->Users->find('list', ['limit' => 200]);
        $categorias = $this->Articulos->Categorias->find('list', ['limit' => 200]);
        $etiquetas = $this->Articulos->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('articulo', 'users', 'categorias', 'etiquetas'));
        $this->set('_serialize', ['articulo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => ['Etiquetas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articulo = $this->Articulos->patchEntity($articulo, $this->request->getData());
            if ($this->Articulos->save($articulo)) {
                $this->Flash->success(__('The articulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articulo could not be saved. Please, try again.'));
        }
        $users = $this->Articulos->Users->find('list', ['limit' => 200]);
        $categorias = $this->Articulos->Categorias->find('list', ['limit' => 200]);
        $etiquetas = $this->Articulos->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('articulo', 'users', 'categorias', 'etiquetas'));
        $this->set('_serialize', ['articulo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articulo = $this->Articulos->get($id);
        if ($this->Articulos->delete($articulo)) {
            $this->Flash->success(__('The articulo has been deleted.'));
        } else {
            $this->Flash->error(__('The articulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
