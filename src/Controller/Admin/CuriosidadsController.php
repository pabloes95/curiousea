<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
/**
 * Curiosidads Controller
 *
 * @property \App\Model\Table\CuriosidadsTable $Curiosidads
 *
 * @method \App\Model\Entity\Curiosidad[] paginate($object = null, array $settings = [])
 */
class CuriosidadsController extends AppController
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
            'contain' => ['Categorias', 'Users']
        ];
        $curiosidads = $this->paginate($this->Curiosidads);

        $this->set(compact('curiosidads'));
        $this->set('_serialize', ['curiosidads']);
    }

    /**
     * View method
     *
     * @param string|null $id Curiosidad id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curiosidad = $this->Curiosidads->get($id, [
            'contain' => ['Categorias', 'Users']
        ]);

        $this->set('curiosidad', $curiosidad);
        $this->set('_serialize', ['curiosidad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curiosidad = $this->Curiosidads->newEntity();
        if ($this->request->is('post')) {
            $curiosidad = $this->Curiosidads->patchEntity($curiosidad, $this->request->getData());
            if ($this->Curiosidads->save($curiosidad)) {
                $this->Flash->success(__('The curiosidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The curiosidad could not be saved. Please, try again.'));
        }
        $categorias = $this->Curiosidads->Categorias->find('list', ['limit' => 200]);
        $users = $this->Curiosidads->Users->find('list', ['limit' => 200]);
        $this->set(compact('curiosidad', 'categorias', 'users'));
        $this->set('_serialize', ['curiosidad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Curiosidad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curiosidad = $this->Curiosidads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curiosidad = $this->Curiosidads->patchEntity($curiosidad, $this->request->getData());
            if ($this->Curiosidads->save($curiosidad)) {
                $this->Flash->success(__('The curiosidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The curiosidad could not be saved. Please, try again.'));
        }
        $categorias = $this->Curiosidads->Categorias->find('list', ['limit' => 200]);
        $users = $this->Curiosidads->Users->find('list', ['limit' => 200]);
        $this->set(compact('curiosidad', 'categorias', 'users'));
        $this->set('_serialize', ['curiosidad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Curiosidad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curiosidad = $this->Curiosidads->get($id);
        if ($this->Curiosidads->delete($curiosidad)) {
            $this->Flash->success(__('The curiosidad has been deleted.'));
        } else {
            $this->Flash->error(__('The curiosidad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
