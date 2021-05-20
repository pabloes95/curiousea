<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
/**
 * Etiquetas Controller
 *
 * @property \App\Model\Table\EtiquetasTable $Etiquetas
 *
 * @method \App\Model\Entity\Etiqueta[] paginate($object = null, array $settings = [])
 */
class EtiquetasController extends AppController
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
        $etiquetas = $this->paginate($this->Etiquetas);

        $this->set(compact('etiquetas'));
        $this->set('_serialize', ['etiquetas']);
    }

    /**
     * View method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etiqueta = $this->Etiquetas->get($id, [
            'contain' => ['Articulos']
        ]);

        $this->set('etiqueta', $etiqueta);
        $this->set('_serialize', ['etiqueta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etiqueta = $this->Etiquetas->newEntity();
        if ($this->request->is('post')) {
            $etiqueta = $this->Etiquetas->patchEntity($etiqueta, $this->request->getData());
            if ($this->Etiquetas->save($etiqueta)) {
                $this->Flash->success(__('The etiqueta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etiqueta could not be saved. Please, try again.'));
        }
        $articulos = $this->Etiquetas->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('etiqueta', 'articulos'));
        $this->set('_serialize', ['etiqueta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etiqueta = $this->Etiquetas->get($id, [
            'contain' => ['Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etiqueta = $this->Etiquetas->patchEntity($etiqueta, $this->request->getData());
            if ($this->Etiquetas->save($etiqueta)) {
                $this->Flash->success(__('The etiqueta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etiqueta could not be saved. Please, try again.'));
        }
        $articulos = $this->Etiquetas->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('etiqueta', 'articulos'));
        $this->set('_serialize', ['etiqueta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etiqueta = $this->Etiquetas->get($id);
        if ($this->Etiquetas->delete($etiqueta)) {
            $this->Flash->success(__('The etiqueta has been deleted.'));
        } else {
            $this->Flash->error(__('The etiqueta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
