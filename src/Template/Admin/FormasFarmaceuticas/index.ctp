<div class="row">
    <nav class="col-md-2" id="actions-sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'list-group-item glyphicon glyphicon-plus', 'title' => 'Novo']) ?>
        </ul>
    </nav>   
    <div class="formasFarmaceuticas index col-md-10 columns content table-responsive">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
                <b>Buscar:</b>
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
                $this->Form->end();
                ?>
            </div>
        </div>

        <div class="content table-responsive">  
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('descricao', 'Descrição') ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formasFarmaceuticas as $formasFarmaceutica): ?>
                        <tr>
                            <td><?= h($formasFarmaceutica->descricao) ?></td>
                            <td class="actions" style="white-space:nowrap">
                                <?= $this->Html->link(__(''), ['action' => 'edit', $formasFarmaceutica->id], ['class' => 'btn btn-success btn-sm glyphicon glyphicon-edit', 'title' => 'Editar']) ?>
                                <?= $this->Form->postLink(__(''), ['action' => 'delete', $formasFarmaceutica->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $formasFarmaceutica->descricao), 'class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'title' => 'Deletar']) ?>
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