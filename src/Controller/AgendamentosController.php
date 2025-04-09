<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Agendamentos Controller
 *
 * @property \App\Model\Table\AgendamentosTable $Agendamentos
 */
class AgendamentosController extends AppController
{

    public function agendar()
    {
        $agendamento = $this->Agendamentos->newEntity();
        if ($this->request->is('post')) {
            $agendamento = $this->Agendamentos->patchEntity($agendamento, $this->request->data);
            if ($this->Agendamentos->save($agendamento)) {
                $this->Flash->success(__('Agendamento salvo com sucesso.'));
                return $this->redirect(['action' => 'agendar']);
            } else {
                $this->Flash->error(__('O agendamento não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $turnos = $this->Agendamentos->Turnos->find('list', ['limit' => 100]);
        $this->set(compact('agendamento', 'turnos'));
        $this->set('_serialize', ['agendamento']);
    }
    
}
