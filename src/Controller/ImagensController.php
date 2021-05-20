<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Imagens Controller
 *
 * @property \App\Model\Table\ImagensTable $Imagens
 *
 * @method \App\Model\Entity\Imagen[] paginate($object = null, array $settings = [])
 */
class ImagensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articulos']
        ];
        $imagens = $this->paginate($this->Imagens);

        $this->set(compact('imagens'));
        $this->set('_serialize', ['imagens']);
    }

    /**
     * View method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagen = $this->Imagens->get($id, [
            'contain' => ['Articulos']
        ]);

        $this->set('imagen', $imagen);
        $this->set('_serialize', ['imagen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagen = $this->Imagens->newEntity();
        if ($this->request->is('post')) {
            $imagen = $this->Imagens->patchEntity($imagen, $this->request->getData());
            if ($this->Imagens->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $articulos = $this->Imagens->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('imagen', 'articulos'));
        $this->set('_serialize', ['imagen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagen = $this->Imagens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagen = $this->Imagens->patchEntity($imagen, $this->request->getData());
            if ($this->Imagens->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $articulos = $this->Imagens->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('imagen', 'articulos'));
        $this->set('_serialize', ['imagen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagen = $this->Imagens->get($id);
        if ($this->Imagens->delete($imagen)) {
            $this->Flash->success(__('The imagen has been deleted.'));
        } else {
            $this->Flash->error(__('The imagen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
