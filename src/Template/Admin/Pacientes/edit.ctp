<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Form->postLink(
                __(' Deletar'),
                ['action' => 'delete', $paciente->id],
                ['confirm' => __('Tem certeza que deseja deletar # {0}?', $paciente->id),
                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Listar']
            )
        ?>
        
    </ul>
</nav>
<div class="pacientes form col-md-10 columns content">
    <?= $this->Form->create($paciente) ?>
    <fieldset>
        <legend><?= 'Editar Paciente' ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('cpf');

            echo $this->Form->label('dataNascimento', 'Data de Nascimento');
            echo $this->Form->control('dataNascimento', [
                    'type' => 'text',
                    'dateFormat' => 'd/m/Y',
                    'value' => $paciente->dataNascimento->format('d/m/Y'),
                    'onchange' => 'validateDate(this)'
                ]); 
            echo "<br>";
            echo $this->Form->input('telefone');
            echo $this->Form->input('cartaoSus');
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
