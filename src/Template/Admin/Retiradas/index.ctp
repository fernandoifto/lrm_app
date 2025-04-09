<div class="row">
    <nav class="col-md-2" id="actions-sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        </ul>
    </nav>

    <div class="retiradas index col-md-10 columns content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
                <b>Buscar por:</b>
                <label class="radio-inline">
                    <input type="radio" checked="true" name="optionSearch" id="opcaoBuscaNome" value="Pacientes.nome"> Paciente
                </label>
                <label class="radio-inline">
                    <input type="radio"  name="optionSearch" id="opcaoBuscaNome" value="Medicamentos.descricao"> Medicamento
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaNome" value="Lotes.numero"> Lote
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaNome" value="Users.username"> Responsável
                </label>
            </div>

            <div class="panel-body">
                <div class="pull-left">
                    <?=
                    $this->Form->input('search', ['class' => 'form-control input-sm', 'size' => '30', 'label' => false,
                        'placeholder' => 'Digite aqui sua pesquisa', 'value' => $this->request->query('search')])
                    ?>
                </div>
                <?= $this->Form->button('', ['class' => 'btn btn-sm btn-primary glyphicon glyphicon-search', 'title' => 'Buscar']) ?>

                <?=
                $this->Form->end();
                ?>
            </div>
        </div>
        <div class="content table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_pacientes', 'Paciente') ?></th>
                        <th><?= h('Medicamento') ?></th>
                        <th><?= $this->Paginator->sort('id_lotes', 'Lote') ?></th>
                        <th><?= $this->Paginator->sort('qtde', 'Quantidade') ?></th>
                        <th><?= $this->Paginator->sort('id_users', 'Responsável') ?></th>
                        <th><?= $this->Paginator->sort('created', 'Data') ?></th>
                        <th><?= $this->Paginator->sort('modified', 'Ultima alteração') ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retiradas as $retirada): ?>

                        <tr>
                            <td><?= h($retirada->paciente->nome) ?></td> 
                            <td><?= h($retirada->lote->medicamento->descricao) ?></td>
                            <td><?= h($retirada->lote->numero) ?></td>
                            <td><?= h($retirada->qtde) ?></td>
                            <td><?= h($retirada->user->username) ?></td>
                            <td><?= h(date_format($retirada->created, "d/m/Y - H:i:s")) ?></td>
                            <td><?= h(date_format($retirada->modified, "d/m/Y - H:i:s")) ?></td>
                            <td class="actions" style="white-space:nowrap">
                                <?= $this->Html->link(__(''), ['action' => 'edit', $retirada->id], ['class' => 'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                                <?= $this->Form->postLink(__(''), ['action' => 'delete', $retirada->id], ['confirm' => __('Tem certeza que deseja deletar ?'), 'class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('&laquo; ' . __('anterior'), ['escape' => false]) ?>
                    <?= $this->Paginator->numbers(['escape' => false]) ?>
                    <?= $this->Paginator->next(__('proximo') . ' &raquo;', ['escape' => false]) ?>
                </ul>
        </div>
    </div>
</div>