<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a class="list-group-item-info active glyphicon glyphicon-th-large"><?= __(' Ações') ?></a></li>
        <?= $this->Html->link(__(' Listar'), ['action' => 'index'],['class' => 'list-group-item glyphicon glyphicon-th-list', 'title' => 'Listar']) ?>
    </ul>
</nav>
<div class="pacientes view col-lg-10 col-md-9">
    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
        <fieldset>
            <h3><?= h($paciente->nome) ?></h3>
            <?= $this->Form->hidden('id_users', ['value' => $user_auth['id']]);  ?>
            <?= $this->Form->hidden('id_pacientes', ['value' => $paciente->id]);  ?>  
        </fieldset>
    <?= $this->Form->end(); ?>
</div>
<br>

