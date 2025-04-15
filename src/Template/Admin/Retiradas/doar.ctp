<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        
    </ul>
</nav>
<div class="retiradas form col-md-10 columns content">    
    <?= $this->Form->create($retirada) ?>
    <fieldset>
        <legend><?= 'Cadastro de Doação' ?></legend>
            
        <!--Inicio DateList-->
            <label for="paciente" class="form-label">Paciente</label>
            <input class="form-control" list="pacienteOptions" id="paciente" name="paciente_nome" placeholder="Digite para buscar..." oninput="updateHiddenInput(this.value)">
            <input type="hidden" name="id_pacientes" id="pacienteId">

            <datalist id="pacienteOptions">
                <?php foreach ($pacientes as $pacienteId => $pacienteNome): ?>
                    <option value="<?= h($pacienteNome) ?>" data-id="<?= $pacienteId ?>">
                <?php endforeach; ?>
            </datalist>

            <script>
            function updateHiddenInput(value) {
                const options = document.querySelectorAll('#pacienteOptions option');
                for (let option of options) {
                    if (option.value === value) {
                        document.getElementById('pacienteId').value = option.getAttribute('data-id');
                        return;
                    }
                }
                document.getElementById('pacienteId').value = ''; // Limpa se não houver correspondência
            }
            </script>
        <!--Fim DateList-->

        <?php
            echo $this->Form->input('id_lotes', [
                'options' => $lotes,
                'label' => 'Lotes',
                'default' => isset($id_lote) ? $id_lote : null,
            ]);
            
            echo $this->Form->input('qtde',['label' => 'Quantidade']);
            echo $this->Form->hidden('id_users', ['value' => $user_auth['id']]); 
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>


