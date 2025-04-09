<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Novo'), ['action' => 'add'],['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
    </ul>
</nav>
<div class="turnos index col-md-10 columns content table-responsive">
    <div class="panel panel-info">
        <div class="panel-heading">
            <?php 
                    
                echo $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']);
                echo '<b>Buscar por:</b>
                      <label class="radio-inline">
                            <input type="radio" checked="true" name="optionSearch" id="opcaoBuscaDescricao" value="Turnos.descricao"> Descrição
                      </label>
                            
                    </div>
                    <div class="panel-body">';
                
                    echo ' <div class="pull-left">';
                    echo $this->Form->input('search', ['class' => 'form-control input-sm', 'size' => '30', 'label' => false,
                        'placeholder' => 'Digite aqui sua pesquisa', 'value' => $this->request->query('search')]);
                    echo '</div>';
                    echo $this->Form->button('', ['class' => 'btn btn-sm glyphicon glyphicon-search', 'title' => 'Buscar']);
                    echo ' ';
                    echo $this->Html->link(__(' PDF'), ['action' => 'index', '_ext' => 'pdf', '?' => ['optionSearch' => $this->request->query('optionSearch'),
                            'search' => $this->request->query('search')]], ['class' => 'btn btn-sm btn-warning glyphicon glyphicon-print', 'title' => 'Gerar Pdf']);

                echo $this->Form->end();
            ?>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($turnos as $turno): ?>
            <tr>
                <td><?= h($turno->descricao) ?></td>
                <td class="actions" style="white-space:nowrap">
                    <?= $this->Html->link(__(''), ['action' => 'view', $turno->id], ['class'=>'btn btn-primary btn-sm glyphicon glyphicon-search', 'title' => 'Ver']) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $turno->id], ['class'=>'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $turno->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $turno->id), 'class'=>'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('&laquo; ' . __('anterior'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('proximo') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
        </div>
</div>
</div>