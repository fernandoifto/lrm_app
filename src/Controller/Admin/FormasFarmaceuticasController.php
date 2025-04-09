<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FormasFarmaceuticas Controller
 *
 * @property \App\Model\Table\FormasFarmaceuticasTable $FormasFarmaceuticas
 */
class FormasFarmaceuticasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $search = null;
        if(isset($this->request->query['search'])){
                $search = $this->request->query['search'];
                
            $this->paginate = [
                'conditions' => ['and' => [
                    'descricao LIKE ' => '%' . $search . '%'
                ]]
            ];
        }
        $this->pdfConfig = [
            'orientation' => 'portrait',
            'filename' => 'formas_farmaceuticas.pdf'
        ];
        $this->set('formasFarmaceuticas', $this->paginate($this->FormasFarmaceuticas));
        $this->set('_serialize', ['formasFarmaceuticas']);
    }

    /**
     * View method
     *
     * @param string|null $id Formas Farmaceutica id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formasFarmaceutica = $this->FormasFarmaceuticas->get($id, [
            'contain' => []
        ]);
        $this->set('formasFarmaceutica', $formasFarmaceutica);
        $this->set('_serialize', ['formasFarmaceutica']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formasFarmaceutica = $this->FormasFarmaceuticas->newEntity();
        if ($this->request->is('post')) {
            $formasFarmaceutica = $this->FormasFarmaceuticas->patchEntity($formasFarmaceutica, $this->request->data);
            if ($this->FormasFarmaceuticas->save($formasFarmaceutica)) {
                $this->Flash->success(__('Forma farmaceutica salva com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Forma farmaceutica não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('formasFarmaceutica'));
        $this->set('_serialize', ['formasFarmaceutica']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Formas Farmaceutica id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formasFarmaceutica = $this->FormasFarmaceuticas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formasFarmaceutica = $this->FormasFarmaceuticas->patchEntity($formasFarmaceutica, $this->request->data);
            if ($this->FormasFarmaceuticas->save($formasFarmaceutica)) {
                $this->Flash->success(__('Forma farmaceutica salva com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Forma farmaceutica não foi salvo. Por favor, Tente novamente.'));
            }
        }
        $this->set(compact('formasFarmaceutica'));
        $this->set('_serialize', ['formasFarmaceutica']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formas Farmaceutica id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formasFarmaceutica = $this->FormasFarmaceuticas->get($id);
        if ($this->FormasFarmaceuticas->delete($formasFarmaceutica)) {
            $this->Flash->success(__('Forma farmaceutica deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Forma farmaceutica não foi deletada. Por favor, Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
