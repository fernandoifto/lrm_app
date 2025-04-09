<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        <?= $this->Form->postLink(
                __(' Deletar'),
                ['action' => 'delete', $agendamento->id],
                ['confirm' => __('Tem certeza que deseja deletar {0}?', $agendamento->nome),
                    'class' => 'list-group-item glyphicon glyphicon-trash', 'title' => 'Listar']
            )
        ?>
        
    </ul>
</nav>
<div class="agendamentos form col-md-10 columns content">
    <?= $this->Form->create($agendamento) ?>
    <fieldset>
        <legend><?= 'Editar Agendamento' ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('endereco', ['label' => 'Endereço']);
            echo $this->Form->input('numero', ['label' => 'Número']);
            echo $this->Form->input('setor');
            echo $this->Form->input('cep');
            echo $this->Form->input('telefone', ['label' => 'Telefone/WhatsApp', 'maxlength' => '15']);
            echo $this->Form->input('dataVisita', ['label' => 'Melhor data']);
            echo $this->Form->input('id_user', [
                'options' => $users,
                'label' => 'Recebido por:',
                'empty' => 'Selecione um usuário',
            ]);
            echo $this->Form->input('id_turno', ['options' => $turnos, 'label' => 'Turno']);
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
