<div class="container">
    <div class="agendamentos form col-md-11">
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
                    'label' => 'Telefone/WhatsApp',
                    'placeholder' => '(00) 00000-0000',
                     'maxlength' => '15'
                ]);
            echo $this->Form->input('dataVisita', ['label' => 'Melhor data']);
            echo $this->Form->input('id_turno', ['options' => $turnos, 'label' => 'Turno']);
            ?>
        </fieldset>
        <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
