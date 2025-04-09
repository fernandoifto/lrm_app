<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Medicamentos Controller
 *
 * @property \App\Model\Table\MedicamentosTable $Medicamentos
 */
class MedicamentosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        if(isset($this->request->query['search'])){
                $search = $this->request->query['search'];
                $optionSearch = $this->request->query['optionSearch'];
                
            $this->paginate = [
                'conditions' => ['and' => [
                     $optionSearch .' LIKE ' => '%' . $search . '%'
                ]]
            ];
        }
        $this->pdfConfig = [
            'orientation' => 'portrait',
            'filename' => 'medicamentos.pdf'
        ];
        $this->set('medicamentos', $this->paginate($this->Medicamentos));
        $this->set('_serialize', ['medicamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Medicamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicamento = $this->Medicamentos->get($id, [
            'contain' => ['Lotes']
        ]);
                
        $this->set('medicamento', $medicamento);
        $this->set('_serialize', ['medicamento']);
        
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicamento = $this->Medicamentos->newEntity();
        if ($this->request->is('post')) {
            $medicamento = $this->Medicamentos->patchEntity($medicamento, $this->request->data);
            if ($this->Medicamentos->save($medicamento)) {
                $this->Flash->success(__('Medicamento salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Medicamento não foi salvo. Por favor, Tente novamente.'));
            }
        }

        $this->set(compact('medicamento'));
        $this->set('_serialize', ['medicamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicamento = $this->Medicamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicamento = $this->Medicamentos->patchEntity($medicamento, $this->request->data);
            if ($this->Medicamentos->save($medicamento)) {
                $this->Flash->success(__('Medicamento salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Medicamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('medicamento'));
        $this->set('_serialize', ['medicamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medicamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicamento = $this->Medicamentos->get($id);
        if ($this->Medicamentos->delete($medicamento)) {
            $this->Flash->success(__('Medicamento deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Medicamento  não foi deletada. Por favor, Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
