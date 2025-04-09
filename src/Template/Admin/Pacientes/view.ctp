<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $paciente->id], ['class' => 'list-group-item glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
        <?= $this->Form->postLink(__(' Deletar'), ['action' => 'delete', $paciente->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $paciente->id),
                                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
    </ul>
</nav>
<div class="pacientes view col-lg-10 col-md-9">
    <h3><?= h($paciente->nome) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <td><?= h($paciente->nome) ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?= h($paciente->cpf) ?></td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td><?= h($paciente->telefone) ?></td>
        </tr>
        <tr>
            <th>Cartão Sus</th>
            <td><?= h($paciente->cartaoSus) ?></td>
        </tr>
        <tr>
            <th>Data de Nascimento</th>
            <td><?= h(date_format($paciente->dataNascimento, "d/m/Y")) ?></tr>
        </tr>
    </table>

       <div class="related table-responsive">
        <h4><?= __('{0}', ['Doações recebidas']) ?></h4>
        <?php if (!empty($paciente->retiradas)): ?>
        
        <table class="table table-striped table-hover">
            <tr>
                <th>Medicamento</th>
                <th>Lote</th>
                <th>Quantidade</th>
                <th>Responsável</th>
                <th>Data</th>
                <th>Ultima alteração</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($paciente->retiradas as $retirada): ?>
            <tr>
                <td><?= h($retirada->lote->medicamento->descricao) ?></td>
                <td><?= h($retirada->lote->numero) ?></td>
                <td><?= h($retirada->qtde) ?></td>
                <td><?= h($retirada->user->username) ?></td>
                <td><?= h(date_format($retirada->created, "d/m/Y")) ?></td>
                <td><?= h(date_format($retirada->modified, "d/m/Y")) ?></td>                
                <td class="actions">
                    <?= $this->Html->link(__(''), ['controller' => 'Retiradas', 'action' => 'edit', $retirada->id], ['class'=>'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink(__(''), ['controller' => 'Retiradas', 'action' => 'delete', $retirada->id], ['confirm' => __('Tem certeza que deseja Deletar?'), 'class'=>'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>   
</div>
<br>