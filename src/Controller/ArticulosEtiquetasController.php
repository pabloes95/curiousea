<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ArticulosEtiquetas Controller
 *
 * @property \App\Model\Table\ArticulosEtiquetasTable $ArticulosEtiquetas
 *
 * @method \App\Model\Entity\ArticulosEtiqueta[] paginate($object = null, array $settings = [])
 */
class ArticulosEtiquetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articulos', 'Etiquetas']
        ];
        $articulosEtiquetas = $this->paginate($this->ArticulosEtiquetas);

        $this->set(compact('articulosEtiquetas'));
        $this->set('_serialize', ['articulosEtiquetas']);
    }

    /**
     * View method
     *
     * @param string|null $id Articulos Etiqueta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articulosEtiqueta = $this->ArticulosEtiquetas->get($id, [
            'contain' => ['Articulos', 'Etiquetas']
        ]);

        $this->set('articulosEtiqueta', $articulosEtiqueta);
        $this->set('_serialize', ['articulosEtiqueta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articulosEtiqueta = $this->ArticulosEtiquetas->newEntity();
        if ($this->request->is('post')) {
            $articulosEtiqueta = $this->ArticulosEtiquetas->patchEntity($articulosEtiqueta, $this->request->getData());
            if ($this->ArticulosEtiquetas->save($articulosEtiqueta)) {
                $this->Flash->success(__('The articulos etiqueta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articulos etiqueta could not be saved. Please, try again.'));
        }
        $articulos = $this->ArticulosEtiquetas->Articulos->find('list', ['limit' => 200]);
        $etiquetas = $this->ArticulosEtiquetas->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('articulosEtiqueta', 'articulos', 'etiquetas'));
        $this->set('_serialize', ['articulosEtiqueta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articulos Etiqueta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articulosEtiqueta = $this->ArticulosEtiquetas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articulosEtiqueta = $this->ArticulosEtiquetas->patchEntity($articulosEtiqueta, $this->request->getData());
            if ($this->ArticulosEtiquetas->save($articulosEtiqueta)) {
                $this->Flash->success(__('The articulos etiqueta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articulos etiqueta could not be saved. Please, try again.'));
        }
        $articulos = $this->ArticulosEtiquetas->Articulos->find('list', ['limit' => 200]);
        $etiquetas = $this->ArticulosEtiquetas->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('articulosEtiqueta', 'articulos', 'etiquetas'));
        $this->set('_serialize', ['articulosEtiqueta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articulos Etiqueta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articulosEtiqueta = $this->ArticulosEtiquetas->get($id);
        if ($this->ArticulosEtiquetas->delete($articulosEtiqueta)) {
            $this->Flash->success(__('The articulos etiqueta has been deleted.'));
        } else {
            $this->Flash->error(__('The articulos etiqueta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
