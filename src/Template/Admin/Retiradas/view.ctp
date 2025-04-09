<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $retirada->id], ['class' => 'list-group-item glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
        <?= $this->Form->postLink(__(' Deletar'), ['action' => 'delete', $retirada->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $retirada->id),
                                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
    </ul>
</nav>
<div class="retiradas view col-lg-10 col-md-9">
    <h3><?= h($retirada->id) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>'Id</th>
            <td><?= $this->Number->format($retirada->id) ?></td>
        </tr>
        <tr>
            <th>'Qtde</th>
            <td><?= $this->Number->format($retirada->qtde) ?></td>
        </tr>
        <tr>
            <th>'Id Users</th>
            <td><?= $this->Number->format($retirada->id_users) ?></td>
        </tr>
        <tr>
            <th>'Id Lotes</th>
            <td><?= $this->Number->format($retirada->id_lotes) ?></td>
        </tr>
        <tr>
            <th>'Id Pacientes</th>
            <td><?= $this->Number->format($retirada->id_pacientes) ?></td>
        </tr>
        <tr>
            <th>Created</th>
            <td><?= h($retirada->created) ?></tr>
        </tr>
        <tr>
            <th>Modified</th>
            <td><?= h($retirada->modified) ?></tr>
        </tr>
    </table>
</div>
<br>