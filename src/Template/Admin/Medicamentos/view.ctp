<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $medicamento->id], ['class' => 'list-group-item glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
        <?= $this->Form->postLink(__(' Deletar'), ['action' => 'delete', $medicamento->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $medicamento->descricao),
                                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>

    </ul>
</nav>
<div class="medicamentos view col-lg-10 col-md-9">
    <h3><?= h($medicamento->descricao) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Descricao</th>
            <td><?= h($medicamento->descricao) ?></td>
        </tr>
        <tr>
            <th>PrincipioAtivo</th>
            <td><?= h($medicamento->principioAtivo) ?></td>
        </tr>
    </table>
   
    <div class="related table-responsive">
        <h4><?= __('{0}', ['Lotes relacionados ']) ?></h4>
        <?php if (!empty($medicamento->lotes)): ?>
        <table class="table table-striped table-hover">
            <tr>
                <th>Lote</th>
                <th>Vencimento</th>
                <th>Fabricação</th>
                <th>Dias p/ vencimento</th>
                <th>QTDE</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($medicamento->lotes as $lotes): ?>
            <tr>
                <td><?= h($lotes->numero) ?></td>
                <td><?= h(date_format($lotes->dataVencimento, "d/m/Y")) ?></td>
                <td><?= h(date_format($lotes->dataFabricacao, "d/m/Y")) ?></td>
                <td>
                    <?php
                        echo $dias = $this->Lotes->calcularDiferencaVencimento($lotes->dataVencimento);
                    ?>
                </td>
                <td><?= $this->Number->format($lotes->qdte) ?></td>
                <td class="actions">
                <?php
                    if($this->Lotes->diasParaVencer($lotes->dataVencimento) > 0){
                        echo $this->Html->link(__(''), ['controller' => 'Retiradas' ,'action' => 'doar', $lotes->id], ['class' => 'btn btn-info btn-sm glyphicon glyphicon-share', 'title' => 'Doar Medicamento']);
                    }else{
                        echo $this->Html->link(__(''), ['controller' => 'Retiradas' ,'action' => 'doar', $lotes->id], ['class' => 'disabled btn btn-info btn-sm glyphicon glyphicon-share', 'title' => 'Doar Medicamento']);
                                }
                ?>        
                    <?= $this->Html->link(__(''), ['controller' => 'Lotes', 'action' => 'view', $lotes->id], ['class'=>'btn btn-primary btn-sm glyphicon glyphicon-search', 'title' => 'Ver']) ?>
                    <?= $this->Html->link(__(''), ['controller' => 'Lotes', 'action' => 'edit', $lotes->id], ['class'=>'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink(__(''), ['controller' => 'Lotes', 'action' => 'delete', $lotes->id], ['confirm' => __('Tem certeza que deseja Deletar?'), 'class'=>'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>  
<br>