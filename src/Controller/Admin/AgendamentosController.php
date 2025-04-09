<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Agendamentos Controller
 *
 * @property \App\Model\Table\AgendamentosTable $Agendamentos
 */
class AgendamentosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {   
        $search = null;
        $agendamentos = $this->Agendamentos->find('all')->contain(['Turnos']);
        if(isset($this->request->query['search'])){
            $search = $this->request->query('search');
            $optionSearch = $this->request->query('optionSearch');
            
            if (!empty($search) && !empty($optionSearch)) {
                $agendamentos->where(['CAST('.$optionSearch.' AS CHAR ) LIKE ' => '%'.$search.'%']);
            }
        }
        $this->pdfConfig = [
            'orientation' => 'landscape',
            'filename' => 'agendamentos.pdf'
        ];
        $this->set('agendamentos', $this->paginate($agendamentos));
        $this->set('_serialize', ['agendamentos']);
    }


    public function visitar()
    {
        $search = null;
        $agendamentos = $this->Agendamentos->find('all')->contain(['Turnos'])
        ->where(['id_user IS NULL']);

        if(isset($this->request->query['search'])){
            $search = $this->request->query('search');
            $optionSearch = $this->request->query('optionSearch');
            
            if (!empty($search) && !empty($optionSearch)) {
                $agendamentos->where(['CAST('.$optionSearch.' AS CHAR ) LIKE ' => '%'.$search.'%']);
            }
        }
        $this->pdfConfig = [
            'orientation' => 'landscape',
            'filename' => 'agendamentos_a_visitar.pdf'
        ];
        $this->set('agendamentos', $this->paginate($agendamentos));
        $this->set('_serialize', ['agendamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Agendamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agendamento = $this->Agendamentos->get($id, [
            'contain' => ['Turnos']
        ]);
        if(!is_null($agendamento->id_user)){
            $agendamento = $this->Agendamentos->get($id, [
                'contain' => ['Turnos', 'Users']
            ]);
        }
        $this->pdfConfig = [
            'orientation' => 'portrait',
            'filename' => 'Agendamento' . $id . '.pdf'
        ];
        $this->set('agendamento', $agendamento);
        $this->set('_serialize', ['agendamento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agendamento = $this->Agendamentos->newEntity();
        if ($this->request->is('post')) {
            $agendamento = $this->Agendamentos->patchEntity($agendamento, $this->request->data);
            if ($this->Agendamentos->save($agendamento)) {
                $this->Flash->success(__('Agendamento salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O agendamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $turnos = $this->Agendamentos->Turnos->find('list', ['limit' => 100]);
        $users = $this->Agendamentos->Users->find('list', ['limit' => 100]);
        $this->set(compact('agendamento', 'turnos', 'users'));
        $this->set('_serialize', ['agendamento']);
    }
    
    public function agendar()
    {
        $agendamento = $this->Agendamentos->newEntity();
        if ($this->request->is('post')) {
            $agendamento = $this->Agendamentos->patchEntity($agendamento, $this->request->data);
            if ($this->Agendamentos->save($agendamento)) {
                $this->Flash->success(__('Agendamento salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O agendamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $turnos = $this->Agendamentos->Turnos->find('list', ['limit' => 100]);
        $users = $this->Agendamentos->Users->find('list', ['limit' => 100]);
        $this->set(compact('agendamento', 'turnos'));
        $this->set('_serialize', ['agendamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agendamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agendamento = $this->Agendamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agendamento = $this->Agendamentos->patchEntity($agendamento, $this->request->data);
            if ($this->Agendamentos->save($agendamento)) {
                $this->Flash->success(__('Agendamento salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O agendamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $turnos = $this->Agendamentos->Turnos->find('list', ['limit' => 100]);
        $users = $this->Agendamentos->Users->find('list', ['limit' => 100]);
        $this->set(compact('agendamento', 'turnos', 'users'));
        $this->set('_serialize', ['agendamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Agendamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agendamento = $this->Agendamentos->get($id);
        if ($this->Agendamentos->delete($agendamento)) {
            $this->Flash->success(__('O agendamento deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O agendamento não foi deletado. Por favor, Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
