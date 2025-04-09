<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
        
    </ul>
</nav>
<div class="lotes form col-md-10 columns content">
    <?=  $this->Form->create($lote) ?>
    <fieldset>
        <legend><?= 'Cadastro de Lote' ?></legend>
  
            <div class="row">
                    <?= $this->Form->input('numero', ['label' => 'Lote']); ?>
            </div>
            
            <div class="row">
                    <?= $this->Form->label('id_medicamento', 'Medicamentos'); ?>
                    <?= $this->Form->control('id_medicamento', ['type' => 'select', 'options' => $medicamentos]); ?>
                    <?= $this->Html->link(__(' Novo'), ['controller' => 'medicamentos', 'action' => 'add'], ['class' => 'glyphicon glyphicon-plus btn btn-outline btn-xs', 'title' => 'Novo medicamento']); ?>
            </div><br>
            
            <div class="row">
                <?= $this->Form->label('id_medicamento', 'Tipo de Medicamento'); ?>
                <?= $this->Form->control('id_tipo_medicamento', ['type' => 'select', 'options' => $tipos_medicamentos,]); ?>
                <?= $this->Html->link(__(' Novo'), ['controller' => 'tipos_medicamentos', 'action' => 'add'], ['class' => 'glyphicon glyphicon-plus btn btn btn-outline btn-xs', 'title' => 'Novo']); ?> 
            </div><br>

            <div class="row">
                <?= $this->Form->label('id_forma_farmaceutica', 'Forma Farmacêutica'); ?>
                <?= $this->Form->control('id_forma_farmaceutica', ['type' => 'select', 'options' => $formas_farmaceuticas]); ?>
                <?= $this->Html->link(__(' Novo'), ['controller' => 'formas_farmaceuticas', 'action' => 'add'], ['class' => 'glyphicon glyphicon-plus btn btn btn-outline btn-xs', 'title' => 'Novo']); ?> 
            </div><br>
            
            <div class="row">
                <?= $this->Form->label('dataVencimento','Data de Vencimento');?>
                <?= $this->Form->control('dataVencimento', ['type' => 'date']);?>    
            </div><br>
            
            <div class="row">
                <?= $this->Form->label('dataFabricacao','Data de Fabicação');?>
                <?= $this->Form->control('dataFabricacao', ['type' => 'date']);?>
            </div><br>
            
            <div class="row">
                <?= $this->Form->input('qdte', ['label' => 'Quantidade']);  ?>
            </div>
             
    </fieldset>
    <?= $this->Form->button(__(' Salvar'), ['class' => 'glyphicon glyphicon-floppy-save']) ?>
    <?= $this->Form->end() ?>
</div>
