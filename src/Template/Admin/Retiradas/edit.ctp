<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Form->postLink(
                __(' Deletar'),
                ['action' => 'delete', $retirada->id],
                ['confirm' => __('Tem certeza que deseja deletar # {0}?', $retirada->id),
                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Listar']
            )
        ?>
        
    </ul>
</nav>
<div class="retiradas form col-md-10 columns content">
    <?= $this->Form->create($retirada) ?>
    <fieldset>
        <legend><?= 'Editar Doação' ?></legend>
        <?php
           echo $this->Form->input('id_pacientes', [
                'options' => $pacientes,
                'label' => 'Paciente'
            ]);
            echo $this->Form->input('id_lotes', [
                'options' => $lotes,
                'label' => 'Lotes'
            ]);

            echo $this->Form->input('qtde',['label' => 'Quantidade']);
            echo $this->Form->hidden('id_users', ['value' => $user_auth['id']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
