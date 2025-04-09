<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        
    </ul>
</nav>
<div class="pacientes form col-md-10 columns content">
    <?= $this->Form->create($paciente) ?>
    <fieldset>
        <legend><?= 'Cadastro de Paciente' ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>    
        <p>
            <?= $this->Form->input('cpf', [
                'label' => 'CPF',
                'placeholder' => '000.000.000-00',
                'id' => 'cpf', 
                'type' => 'text', 'maxlength' => '14',  
                'onkeydown' => 'javascript: fMasc(this, mCPF);'
                ]) 
            ?>
            <span id="cpfResponse"></span>
        </p>
        <?php
            echo $this->Form->input('cartaoSus', [
                'type' => 'text',
                'id' => 'cartaoSus',
                'maxlength' => '18',
                'placeholder' => '00000000000 0000 0'
            ]);
            echo $this->Form->label('dataNascimento','Data de Nascimento');
            echo $this->Form->control('dataNascimento', ['type' => 'date']);
            echo '<br>';
            echo $this->Form->input('telefone',  [
                'label' => 'Telefone/WhatsApp',
                'placeholder' => '(00) 0 0000-0000',
                'maxlength' => '15', 
                'id' => 'telefone', 
            ]); 
        ?>
        
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>




    
