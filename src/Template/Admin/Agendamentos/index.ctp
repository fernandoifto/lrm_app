<div class="row">
    <nav class="col-md-2" id="actions-sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        </ul>
    </nav>
    <div class="agendamentos index col-md-10 columns content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
                <b>Buscar por:</b>
                <label class="radio-inline">
                    <input type="radio" checked="true" name="optionSearch" id="opcaoBuscaNome" value="Agendamentos.nome"> Nome
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaEmail" value="Agendamentos.endereco"> Endereço
                </label>
                <label class="radio-inline ">
                    <input type="radio" name="optionSearch" id="opcaoBuscaPerfil" value="Agendamentos.setor"> Setor
                </label>
                <label class="radio-inline ">
                    <input type="radio" name="optionSearch" id="opcaoBuscaPerfil" value="Agendamentos.telefone"> Fone/WhatsApp
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" value="Agendamentos.dataVisita"> Melhor data
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" value="turnos.descricao"> Turno
                </label>
            </div>

            <div class="panel-body">
                <div class="pull-left">
                    <?=
                    $this->Form->input('search', ['class' => 'form-control input-sm', 'size' => '30', 'label' => false,
                        'placeholder' => 'Digite aqui sua pesquisa', 'value' => $this->request->query('search')])
                    ?>
                </div>
                <?= $this->Form->button('', ['class' => 'btn btn-sm glyphicon glyphicon-search', 'title' => 'Buscar']) ?>

                <?=
                $this->Html->link(__(' PDF'), ['controller' => 'Agendamentos/index', '_ext' => 'pdf', '?' => ['optionSearch' => $this->request->query('optionSearch'),
                        'search' => $this->request->query('search')]], ['class' => 'btn btn-sm btn-warning glyphicon glyphicon-print', 'title' => 'Gerar Pdf'])
                ?>

                <?=
                $this->Form->end();
                ?>
            </div>
        </div>
        <div class="content table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('nome') ?></th>
                        <th><?= $this->Paginator->sort('endereco', 'Endereço') ?></th>
                        <th><?= $this->Paginator->sort('numero') ?></th>
                        <th><?= $this->Paginator->sort('setor') ?></th>
                        <th><?= $this->Paginator->sort('telefone') ?></th>
                        <th><?= $this->Paginator->sort('dataVisita', 'Melhor data') ?></th>
                        <th> Recebido </th>
                        <th><?= $this->Paginator->sort('Turno') ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= h($agendamento->nome) ?></td>
                            <td><?= h($agendamento->endereco) ?></td>
                            <td><?= h($agendamento->numero) ?></td>
                            <td><?= h($agendamento->setor) ?></td>
                            <td><?= h($agendamento->telefone) ?></td>
                            <td><?= h($agendamento->dataVisita) ?></td>
                            <td><?= h(!is_null($agendamento->id_user) ? __('Sim') : __('Não')) ?></td>
                            <td><?= h($agendamento->turno->descricao) ?></td>
                            <td class="actions" style="white-space:nowrap">
                                <?= $this->Html->link(__(''), ['action' => 'view', $agendamento->id], ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-search', 'title' => 'Ver']) ?>
                                <?= $this->Html->link(__(''), ['action' => 'edit', $agendamento->id], ['class' => 'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                                <?= $this->Form->postLink(__(''), ['action' => 'delete', $agendamento->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $agendamento->nome), 'class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
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