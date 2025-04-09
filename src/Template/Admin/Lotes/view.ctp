<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $lote->id], ['class' => 'list-group-item glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
        <?= $this->Form->postLink(__(' Deletar'), ['action' => 'delete', $lote->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $lote->numero),
                                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
    </ul>
</nav>
<div class="lotes view col-lg-10 col-md-9">
    <h3><?= h($lote->numero) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Numero</th>
            <td><?= h($lote->numero) ?></td>
        </tr>
        <tr>
            <th>Quantidade</th>
            <td><?= $this->Number->format($lote->qdte) ?></td>
        </tr>
        <tr>
            <th>Medicamento</th>
            <td><?= h($lote->medicamento->descricao) ?></td>
        </tr>
        <tr>
            <th>Tipo Medicamento</th>
            <td><?= h($lote->tipomedicamento->descricao) ?></td>
        </tr>
        <tr>
            <th>Forma Farmaceutica</th>
            <td><?= h($lote->formafarmaceutica->descricao) ?></td>
        </tr>
        <tr>
            <th>Data de vencimento</th>
            <td><?= h(date_format($lote->dataVencimento,"d/m/Y")) ?></tr>
        </tr>
        <tr>
            <th>Data de fabricação</th>
            <td><?= h(date_format($lote->dataFabricacao,"d/m/Y")) ?></tr>
        </tr>
        <tr>
            <th>Dias para vencimento</th>
            <td>
                <?php
                        echo $dias = $this->Lotes->calcularDiferencaVencimento($lote->dataVencimento);
                 ?>
            </td>
        </tr>
    </table>
</div>
<br>