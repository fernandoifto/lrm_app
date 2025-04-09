<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $user->id], ['class' => 'list-group-item glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
        <?= $this->Form->postLink(__(' Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $user->id),
                                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
        <li><?= $this->Html->link(__(' PDF'), ['action' => 'view', $user->id, '_ext' => 'pdf'], ['class' => 'list-group-item glyphicon glyphicon-print', 'title' => 'Exportar para pdf']); ?> </li>

    </ul>
</nav>
<div class="users view col-lg-10 col-md-9">
    <h3><?= h($user->username) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome:</th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th>E-Mail:</th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th>Perfil:</th>
            <td><?= h($user->role) ?></td>
        </tr>
    </table>
</div>
<br>