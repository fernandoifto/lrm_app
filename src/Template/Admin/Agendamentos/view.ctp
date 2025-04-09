<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $agendamento->id], ['class' => 'list-group-item glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
        <?= $this->Form->postLink(__(' Deletar'), ['action' => 'delete', $agendamento->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $agendamento->nome),
                                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
        <li><?= $this->Html->link(__(' PDF'), ['action' => 'view', $agendamento->id, '_ext' => 'pdf'], ['class' => 'list-group-item glyphicon glyphicon-print', 'title' => 'Exportar para pdf']); ?> </li>
    </ul>
</nav>
<div class="agendamentos view col-lg-10 col-md-9">
    <h3><?= h($agendamento->nome) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <td><?= h($agendamento->nome) ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td><?= h($agendamento->endereco) ?></td>
        </tr>
        <tr>
            <th>Número</th>
            <td><?= h($agendamento->numero) ?></td>
        </tr>
        <tr>
            <th>Setor</th>
            <td><?= h($agendamento->setor) ?></td>
        </tr>
        <tr>
            <th>Cep</th>
            <td><?= h($agendamento->cep) ?></td>
        </tr>
        <tr>
            <th>Telefone/WhatsApp</th>
            <td><?= h($agendamento->telefone) ?></td>
        </tr>
        <tr>
            <th>Turno</th>
            <td><?= h($agendamento->turno->descricao) ?></td>
        </tr>
        <tr>
            <th>Data do Agendamento</th>
            <td><?= h(date_format($agendamento->created, "d/m/Y H:i:s")) ?></tr>
        </tr>
        <tr>
            <th>Recebido</th>
            <td><?= h(!is_null($agendamento->id_user) ? __('Sim') : __('Não')) ?></td>
         </tr>
          <?php if(!is_null($agendamento->id_user)){ ?>
         <tr>
            <th>Recebido pelo(a):</th>
            <td><?=  h($agendamento->user->username); ?></td>
         </tr>
          <?php }?>
    </table>
    <div class="row">
        <h4>Melhor data</h4>
        <?= $this->Text->autoParagraph(h($agendamento->dataVisita)); ?>
    </div>
</div>
<br>