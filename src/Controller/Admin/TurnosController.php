<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Turnos Controller
 *
 * @property \App\Model\Table\TurnosTable $Turnos
 */
class TurnosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    
    public function index() {
        $search = null;
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
            'filename' => 'turnos.pdf'
        ];
        $this->set('turnos', $this->paginate($this->Turnos));
        $this->set('_serialize', ['turnos']);
    }

    /**
     * View method
     *
     * @param string|null $id Turno id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turno = $this->Turnos->get($id, [
            'contain' => ['Agendamentos']
        ]);
        $this->pdfConfig = [
            'orientation' => 'portrait',
            'filename' => 'Turno_' . $id . '.pdf'
        ];
        $this->set('turno', $turno);
        $this->set('_serialize', ['turno']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turno = $this->Turnos->newEntity();
        if ($this->request->is('post')) {
            $turno = $this->Turnos->patchEntity($turno, $this->request->data);
            if ($this->Turnos->save($turno)) {
                $this->Flash->success(__('Turno salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Turno não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('turno'));
        $this->set('_serialize', ['turno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Turno id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turno = $this->Turnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turno = $this->Turnos->patchEntity($turno, $this->request->data);
            if ($this->Turnos->save($turno)) {
                $this->Flash->success(__('Turno salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Turno não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('turno'));
        $this->set('_serialize', ['turno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Turno id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turno = $this->Turnos->get($id);
        if ($this->Turnos->delete($turno)) {
            $this->Flash->success(__('Turno deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Turno não foi deletado. Por favor, Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
