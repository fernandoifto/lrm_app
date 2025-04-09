<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>       
    </ul>
</nav>
<div class="agendamentos form col-md-10 columns content">
    <?= $this->Form->create($agendamento) ?>
    <fieldset>
        <legend><?= 'Cadastro de Agendamento' ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('endereco', ['label' => 'Endereço']);
            echo $this->Form->input('numero', ['label' => 'Número']);
            echo $this->Form->input('setor');
            echo $this->Form->input('cep', [
                'maxlength' => '8',
                'placeholder' => '00000-000'
            ]);
            echo $this->Form->input('telefone', [
                'label' => 'Telefone/WhatsApp', 'maxlength' => '15',
                'placeholder' => '(00) 0 0000-0000',
                'maxlength' => '15'
            ]);
            echo $this->Form->input('dataVisita', ['label' => 'Melhor data']);
            echo $this->Form->input('id_turno', ['options' => $turnos, 'label' => 'Turno']);     
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
