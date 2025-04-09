<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
    </ul>
</nav>
<div class="pacientes index col-md-10 columns content table-responsive">

<div class="panel panel-info">
            <div class="panel-heading">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
                <b>Buscar por:</b>
                <label class="radio-inline">
                    <input type="radio" checked="true" name="optionSearch" id="opcaoBuscaNome" value="Pacientes.nome"> Nome
                </label>
                <label class="radio-inline">
                    <input type="radio"  name="optionSearch" id="opcaoBuscaNome" value="Pacientes.cpf"> CPF
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaNome" value="Pacientes.cartaoSus"> Cartão Sus
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
                $this->Html->link(__(' PDF'), ['controller' => 'pacientes', 'action' => 'index', '_ext' => 'pdf', '?' => ['optionSearch' => $this->request->query('optionSearch'),
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
                    <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
                    <th><?= $this->Paginator->sort('cartaoSus', 'Cartão Sus') ?></th>
                    <th><?= $this->Paginator->sort('dataNascimento', 'Data de Nascimento') ?></th>
                    <th><?= $this->Paginator->sort('telefone') ?></th>

                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= h($paciente->nome) ?></td>
                        <td><?= h($paciente->cpf) ?></td>
                        <td><?= h($paciente->cartaoSus) ?></td>
                        <td><?= h(date_format($paciente->dataNascimento, "d/m/Y")) ?></td>
                        <td><?= h($paciente->telefone) ?></td>
                        <td class="actions" style="white-space:nowrap">
                            <?= $this->Html->link(__(''), ['action' => 'view', $paciente->id], ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-search', 'title' => 'Ver']) ?>
                            <?= $this->Html->link(__(''), ['action' => 'edit', $paciente->id], ['class' => 'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                            <?= $this->Form->postLink(__(''), ['action' => 'delete', $paciente->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $paciente->id), 'class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('&laquo; ' . __('anterior'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('proximo') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
        </div>
</div>
</div>