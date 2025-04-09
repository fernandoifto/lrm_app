<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pacientes Controller
 *
 * @property \App\Model\Table\PacientesTable $Pacientes
 */
class PacientesController extends AppController
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
            'filename' => 'pacientes.pdf'
        ];
        $this->set('pacientes', $this->paginate($this->Pacientes));
        $this->set('_serialize', ['pacientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Paciente id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paciente = $this->Pacientes->get($id, [
            'contain' => ['Retiradas' => [
                'Users', 'Lotes' => [
                            'Medicamentos'
                    ]
                ]
            ]
        ]);
        $this->set('paciente', $paciente);
        $this->set('_serialize', ['paciente']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paciente = $this->Pacientes->newEntity();
        if ($this->request->is('post')) {
            $paciente = $this->Pacientes->patchEntity($paciente, $this->request->data);

            $paciente->dataNascimento = $this->convertDate($this->request->data('dataNascimento'));

            if ($this->Pacientes->save($paciente)) {
                $this->Flash->success(__('Paciente salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O paciente não pode ser salvo, por favor, tente novamente.'));
            }
        }
        $this->set(compact('paciente'));
        $this->set('_serialize', ['paciente']);
    }

    // Função para converter a data de 'd/m/yyyy' para '/yyyy-mm-dd'
    private function convertDate($date)
    {
        $parts = explode('/', $date);
        if (count($parts) === 3) {
            $year = $parts[2];
            $month = str_pad($parts[1], 2, '0', STR_PAD_LEFT);
            $day = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
            return '' . $year . '-' . $month . '-' . $day;
        }
        return $date; // Retorna a data original se o formato for inválido
    }

    /**
     * Edit method
     *
     * @param string|null $id Paciente id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paciente = $this->Pacientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paciente = $this->Pacientes->patchEntity($paciente, $this->request->data);

            $paciente->dataNascimento = $this->convertDate($this->request->data('dataNascimento'));
            if ($this->Pacientes->save($paciente)) {
                $this->Flash->success(__('Paciente salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O paciente não pode ser salvo, por favor, tente novamente.'));
            }
        }
        $this->set(compact('paciente'));
        $this->set('_serialize', ['paciente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paciente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paciente = $this->Pacientes->get($id);
        if ($this->Pacientes->delete($paciente)) {
            $this->Flash->success(__('Paciente deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Paciente não pode ser. Please, por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
