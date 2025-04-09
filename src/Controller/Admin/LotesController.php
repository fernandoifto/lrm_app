<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\I18n\Time;
use DateTime;

/**
 * Lotes Controller
 *
 * @property \App\Model\Table\LotesTable $Lotes
 */
class LotesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {   
        $search = null;
        $lotes = $this->Lotes->find('all')->contain(['Medicamentos','TiposMedicamentos','FormasFarmaceuticas']);
        if(isset($this->request->query['search'])){
            $search = $this->request->query('search');
            $optionSearch = $this->request->query('optionSearch');
            
            if (!empty($search) && !empty($optionSearch)) {
                $lotes->where(['CAST('.$optionSearch.' AS CHAR ) LIKE ' => '%'.$search.'%']);
            }
        }
        $this->pdfConfig = [
            'orientation' => 'landscape',
            'filename' => 'lotes.pdf'
        ];
        $this->set('lotes', $this->paginate($lotes));
        $this->set('_serialize', ['lotes']);
    }

    /**
     * View method
     *
     * @param string|null $id Lote id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lote = $this->Lotes->get($id, [
            'contain' => ['Medicamentos','TiposMedicamentos','FormasFarmaceuticas']
        ]);
        $this->set('lote', $lote);
        $this->set('_serialize', ['lote']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $lote = $this->Lotes->newEntity();
        if ($this->request->is('post')) {
            $lote = $this->Lotes->patchEntity($lote, $this->request->data);

            $lote->dataVencimento = $this->convertDate($this->request->data('dataVencimento'));
            $lote->dataFabricacao = $this->convertDate($this->request->data('dataFabricacao'));
            

            if ($this->Lotes->save($lote)) {
                $this->Flash->success(__('Lote salvo com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O Lote não pode ser salvo, por favor, tente novamente.'));
            }
        }
        $medicamentos = $this->Lotes->Medicamentos->find('list', ['limit' => 200]);
        $tipos_medicamentos = $this->Lotes->TiposMedicamentos->find('list', ['limit' => 200]);
        $formas_farmaceuticas = $this->Lotes->FormasFarmaceuticas->find('list', ['limit' => 200]);
        $this->set(compact('lote', 'medicamentos', 'tipos_medicamentos', 'formas_farmaceuticas'));
        $this->set('_serialize', ['lote']);
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
     * @param string|null $id Lote id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    
    public function edit($id = null)
    { 
        $lote = $this->Lotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lote = $this->Lotes->patchEntity($lote, $this->request->data);

            $lote->dataVencimento = $this->convertDate($this->request->data('dataVencimento'));
            $lote->dataFabricacao = $this->convertDate($this->request->data('dataFabricacao'));

            if ($this->Lotes->save($lote)) {
                $this->Flash->success(__('Lote salvo com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O Lote não pode ser salvo, por favor, tente novamente.'));
            }
        }
        $medicamentos = $this->Lotes->Medicamentos->find('list', ['limit' => 200]);
        $tipos_medicamentos = $this->Lotes->TiposMedicamentos->find('list', ['limit' => 200]);
        $formas_farmaceuticas = $this->Lotes->FormasFarmaceuticas->find('list', ['limit' => 200]);
        $this->set(compact('lote', 'medicamentos', 'tipos_medicamentos', 'formas_farmaceuticas'));
        $this->set('_serialize', ['lote']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lote id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lote = $this->Lotes->get($id);
        if ($this->Lotes->delete($lote)) {
            $this->Flash->success(__('Lote deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Lote não pode ser. Please, por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}


    