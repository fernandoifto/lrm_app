<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        
    </ul>
</nav>
<div class="formasFarmaceuticas form col-md-10 columns content">
    <?= $this->Form->create($formasFarmaceutica) ?>
    <fieldset>
        <legend><?= 'Cadastro de Formas Farmaceutica' ?></legend>
        <?php
            echo $this->Form->input('descricao', ['label' => 'Descrição']);
        ?>
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
