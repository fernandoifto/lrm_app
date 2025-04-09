<div class="row">
    <nav class="col-md-2" id="actions-sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        </ul>
    </nav>
    <div class="lotes index col-md-10 columns content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
                <b>Buscar por:</b>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaNome" value="Lotes.numero"> Lote
                </label>
                <label class="radio-inline">
                    <input type="radio" checked="true" name="optionSearch" id="opcaoBuscaNome" value="Medicamentos.descricao"> Medicamento
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaNome" value="TiposMedicamentos.descricao"> Tipos de Medicamentos
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionSearch" id="opcaoBuscaNome" value="FormasFarmaceuticas.descricao"> Formas Farmacêuticas
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
                $this->Html->link(__(' PDF'), ['controller' => 'lotes', 'action' => 'index', '_ext' => 'pdf', '?' => ['optionSearch' => $this->request->query('optionSearch'),
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
                    <th><?= $this->Paginator->sort('numero', 'Lote') ?></th>
                    <th><?= $this->Paginator->sort('id_medicamento', 'Medicamento') ?></th>
                    <th><?= $this->Paginator->sort('id_tipo_medicamento', 'Tipo') ?></th>
                    <th><?= $this->Paginator->sort('id_forma_farmaceutica', 'Forma') ?></th>
                    <th><?= $this->Paginator->sort('dataVencimento', 'Vencimento') ?></th>
                    <th><?= $this->Paginator->sort('dataFabricacao', 'Fabricação') ?></th>
                    <th> Dias p/ vencimento </th>
                    <th><?= $this->Paginator->sort('qdte', 'QTDE') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lotes as $lote): ?>
                    <tr>
                        <td><?= h($lote->numero) ?></td>
                        <td><?= h($lote->medicamento->descricao) ?></td>
                        <td><?= h($lote->tipomedicamento->descricao) ?></td>
                        <td><?= h($lote->formafarmaceutica->descricao) ?></td>
                        <td><?= h(date_format($lote->dataVencimento, "d/m/Y")) ?></td>
                        <td><?= h(date_format($lote->dataFabricacao, "d/m/Y")) ?></td>
                        <td>
                            <?php
                                echo $dias = $this->Lotes->calcularDiferencaVencimento($lote->dataVencimento);
                            ?>
                        </td>
                        <td><?= $this->Number->format($lote->qdte) ?></td>
                        <td class="actions" style="white-space:nowrap">

                            <?php
                                if($this->Lotes->diasParaVencer($lote->dataVencimento) > 0){
                                    echo $this->Html->link(__(''), ['controller' => 'Retiradas' ,'action' => 'doar', $lote->id], ['class' => 'btn btn-info btn-sm glyphicon glyphicon-share', 'title' => 'Doar Medicamento']);
                                }else{
                                    echo $this->Html->link(__(''), ['controller' => 'Retiradas' ,'action' => 'doar', $lote->id], ['class' => 'disabled btn btn-info btn-sm glyphicon glyphicon-share', 'title' => 'Doar Medicamento']);
                                }
                            ?>
                            <?= $this->Html->link(__(''), ['action' => 'view', $lote->id], ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-search', 'title' => 'Ver']) ?>
                            <?= $this->Html->link(__(''), ['action' => 'edit', $lote->id], ['class' => 'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                            <?= $this->Form->postLink(__(''), ['action' => 'delete', $lote->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $lote->numero), 'class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
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