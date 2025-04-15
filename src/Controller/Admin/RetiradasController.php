<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use DateTime;

/**
 * Retiradas Controller
 *
 * @property \App\Model\Table\RetiradasTable $Retiradas
 */
class RetiradasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
        
    public function index() {
        $search = null;
        $retiradas = $this->Retiradas->find('all')->contain(['Users', 'Pacientes', 'Lotes' => [
            'Medicamentos'
        ]]);
        if (isset($this->request->query['search'])) {
            $search = $this->request->query('search');
            $optionSearch = $this->request->query('optionSearch');
            if (!empty($search) && !empty($optionSearch)) {
                $retiradas->where(['CAST(' . $optionSearch . ' AS CHAR ) LIKE ' => '%' . $search . '%']);
            }
        }
        
        $this->pdfConfig = [
            'orientation' => 'landscape',
            'filename' => 'lotes.pdf'
        ];
        $this->set('retiradas', $this->paginate($retiradas));
        $this->set('_serialize', ['retiradas']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $retirada = $this->Retiradas->newEntity();
        // Obter a data atual
        $hoje = new DateTime();

        if ($this->request->is('post')) {
            $retirada = $this->Retiradas->patchEntity($retirada, $this->request->data());

            // Obter a quantidade do lote atual
            $lote = $this->Retiradas->Lotes->get($retirada->id_lotes);
            $qtdeLoteAtual = $lote->qdte;

            // Verificar se a quantidade a ser retirada é válida
            if ($retirada->qtde > $qtdeLoteAtual) {
                $this->Flash->error(__('Quantidade de retirada maior que a quantidade disponível no lote.'));
            } else {
                // Subtrair a quantidade retirada do lote
                $novaQtdeLote = $qtdeLoteAtual - $retirada->qtde;
                $lote->qdte = $novaQtdeLote;

                // Iniciar uma transação
                $connection = ConnectionManager::get('default');
                $connection->begin();

                try {
                    // Salvar a retirada
                    $this->Retiradas->save($retirada);

                    // Atualizar a quantidade do lote
                    $this->Retiradas->Lotes->save($lote);

                    // Commit da transação
                    $connection->commit();

                    $this->Flash->success(__('Retirada salva com sucesso. A quantidade do lote foi atualizada.'));
                    return $this->redirect(['action' => 'index']);
                } catch (\Exception $e) {
                    // Rollback em caso de erro
                    $connection->rollback();
                    $this->Flash->error(__('Erro ao salvar a retirada. Por favor, tente novamente.'));
                }
            }
        }

        // Carregar os lotes para a caixa de seleção com informações adicionais
        $lotes = $this->Retiradas->Lotes
            ->find('list', [
                'conditions' => ['dataVencimento >=' => $hoje->format('Y-m-d H:i:s')],
                'limit' => 200,
            ])
            ->contain(['Medicamentos']);

        $users = $this->Retiradas->Users->find('list', ['limit' => 200]);
        $pacientes = $this->Retiradas->Pacientes->find('list', ['limit' => 200]);

        $this->set(compact('retirada', 'users', 'lotes', 'pacientes'));
        $this->set('_serialize', ['retirada']);
    }

    public function doar($id_lote = null)
    {
        $retirada = $this->Retiradas->newEntity();
        $hoje = new DateTime();

        if ($id_lote !== null) {
            $retirada->id_lotes = $id_lote;
        }

        // Obtém os dados necessários para preencher o formulário
        $pacientes = $this->Retiradas->Pacientes->find('list')->toArray();
        $lotes = $this->Retiradas->Lotes->find('list')->toArray();

        if ($this->request->is('post')) {
            // Corrigido para usar $this->request->data
            $retirada = $this->Retiradas->patchEntity($retirada, $this->request->data);

            // Debug para verificar os dados recebidos
            //debug($this->request->data);

            // Obter a quantidade do lote atual
            $lote = $this->Retiradas->Lotes->get($retirada->id_lotes);
            $qtdeLoteAtual = $lote->qdte;

            // Verificar se a quantidade a ser retirada é válida
            if ($retirada->qtde > $qtdeLoteAtual) {
                $this->Flash->error(__('Quantidade de retirada maior que a quantidade disponível no lote.'));
            } else {
                // Subtrair a quantidade retirada do lote
                $novaQtdeLote = $qtdeLoteAtual - $retirada->qtde;
                $lote->qdte = $novaQtdeLote;

                // Iniciar uma transação
                $connection = ConnectionManager::get('default');
                $connection->begin();

                try {
                    // Salvar a retirada
                    if ($this->Retiradas->save($retirada)) {
                        // Atualizar a quantidade do lote
                        $this->Retiradas->Lotes->save($lote);

                        // Commit da transação
                        $connection->commit();

                        $this->Flash->success(__('Retirada salva com sucesso. A quantidade do lote foi atualizada.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        // Debug para verificar erros de validação
                        debug($retirada);
                        throw new \Exception('Erro ao salvar a retirada.');
                    }
                } catch (\Exception $e) {
                    // Rollback em caso de erro
                    $connection->rollback();
                    $this->Flash->error(__('Erro ao salvar a retirada. Por favor, tente novamente.'));
                }
            }
        }

        $users = $this->Retiradas->Users->find('list', ['limit' => 200]);
        $lotes = $this->Retiradas->Lotes
            ->find('list', [
                'conditions' => ['dataVencimento >=' => $hoje->format('Y-m-d H:i:s')],
                'limit' => 200,
            ]);
        $pacientes = $this->Retiradas->Pacientes->find('list', ['limit' => 200]);

        $this->set(compact('retirada', 'users', 'lotes', 'pacientes', 'id_lote'));
        $this->set('_serialize', ['retirada']);
    }



    /**
     * Edit method
     *
     * @param string|null $id Retirada id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $retirada = $this->Retiradas->get($id, [
            'contain' => []
        ]);
        
         // Obter a data atual
        $hoje = new DateTime();

        $originalQtdeRetirada = $retirada->qtde;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $retirada = $this->Retiradas->patchEntity($retirada, $this->request->data());

            // Calcular a diferença na quantidade
            $diferencaQtde = $originalQtdeRetirada - $retirada->qtde;

            // Obter o lote relacionado à retirada
            $lote = $this->Retiradas->Lotes->get($retirada->id_lotes);

            // Verificar se a quantidade ajustada é válida
            if ($lote->qdte + $diferencaQtde < 0) {
                $this->Flash->error(__('Quantidade ajustada resultaria em um valor negativo para o lote.'));
            } else {
                // Atualizar a quantidade do lote
                $lote->qdte += $diferencaQtde;

                // Iniciar uma transação
                $connection = ConnectionManager::get('default');
                $connection->begin();

                try {
                    // Salvar a retirada
                    $this->Retiradas->save($retirada);

                    // Atualizar a quantidade do lote
                    $this->Retiradas->Lotes->save($lote);

                    // Commit da transação
                    $connection->commit();

                    $this->Flash->success(__('Retirada editada com sucesso. A quantidade do lote foi ajustada.'));
                    return $this->redirect(['action' => 'index']);
                } catch (\Exception $e) {
                    // Rollback em caso de erro
                    $connection->rollback();
                    $this->Flash->error(__('Erro ao salvar a retirada. Por favor, tente novamente.'));
                }
            }
        }

        $users = $this->Retiradas->Users->find('list', ['limit' => 200]);
         $lotes = $this->Retiradas->Lotes
        ->find('list', [
            'conditions' => ['dataVencimento >=' => $hoje->format('Y-m-d H:i:s')],
            'limit' => 200,
        ]);
        $pacientes = $this->Retiradas->Pacientes->find('list', ['limit' => 200]);

        $this->set(compact('retirada', 'users', 'lotes', 'pacientes'));
        $this->set('_serialize', ['retirada']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Retirada id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retirada = $this->Retiradas->get($id, ['contain' => ['Lotes']]);

        // Guardar a quantidade a ser devolvida
        $qtdeDevolvida = $retirada->qtde;

        if ($this->Retiradas->delete($retirada)) {
            // Acrescentar a quantidade devolvida ao lote
            $lote = $this->Retiradas->Lotes->get($retirada->id_lotes);
            $lote->qdte += $qtdeDevolvida;
            $this->Retiradas->Lotes->save($lote);

            $this->Flash->success(__('Retirada deletada com sucesso. A quantidade foi devolvida ao estoque.'));
        } else {
            $this->Flash->error(__('Retirada não foi deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
