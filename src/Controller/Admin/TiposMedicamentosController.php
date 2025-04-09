<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TiposMedicamentos Controller
 *
 * @property \App\Model\Table\TiposMedicamentosTable $TiposMedicamentos
 */
class TiposMedicamentosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('tiposMedicamentos', $this->paginate($this->TiposMedicamentos));
        $this->set('_serialize', ['tiposMedicamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipos Medicamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiposMedicamento = $this->TiposMedicamentos->get($id, [
            'contain' => []
        ]);
        $this->set('tiposMedicamento', $tiposMedicamento);
        $this->set('_serialize', ['tiposMedicamento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiposMedicamento = $this->TiposMedicamentos->newEntity();
        if ($this->request->is('post')) {
            $tiposMedicamento = $this->TiposMedicamentos->patchEntity($tiposMedicamento, $this->request->data);
            if ($this->TiposMedicamentos->save($tiposMedicamento)) {
                $this->Flash->success(__('Tipos medicamento foi salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Tipo de medicamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('tiposMedicamento'));
        $this->set('_serialize', ['tiposMedicamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipos Medicamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiposMedicamento = $this->TiposMedicamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiposMedicamento = $this->TiposMedicamentos->patchEntity($tiposMedicamento, $this->request->data);
            if ($this->TiposMedicamentos->save($tiposMedicamento)) {
                $this->Flash->success(__('Tipos medicamento foi salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Tipo de medicamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('tiposMedicamento'));
        $this->set('_serialize', ['tiposMedicamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipos Medicamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposMedicamento = $this->TiposMedicamentos->get($id);
        if ($this->TiposMedicamentos->delete($tiposMedicamento)) {
            $this->Flash->success(__('Tipo medicamento deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Tipo medicamento não foi deletado. Por favor, Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
