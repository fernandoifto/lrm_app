<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Form->postLink(
                __(' Deletar'),
                ['action' => 'delete', $turno->id],
                ['confirm' => __('Tem certeza que deseja deletar o turno {0}?', $turno->descricao),
                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Listar']
            )
        ?>
        
    </ul>
</nav>
<div class="turnos form col-md-10 columns content">
    <?= $this->Form->create($turno) ?>
    <fieldset>
        <legend><?= 'Editar Turno' ?></legend>
        <?php
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
