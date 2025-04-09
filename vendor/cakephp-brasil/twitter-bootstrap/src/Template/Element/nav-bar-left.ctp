
<?php if($user_auth){ ?>
<ul class="nav navbar-nav">
    <li><?php //$this->Html->link('Movimentações', ['prefix' => 'admin', 'controller' => 'movimentacoes', 'action' => 'index']) ?></li>
    <li><?php // $this->Html->link('Turnos', ['prefix' => 'admin', 'controller' => 'turnos', 'action' => 'index']) ?></li>
    
    
    <li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agendamentos <span class="caret"></span></a>
	  <ul class="dropdown-menu">
	    <li><?= $this->Html->link('Agendamentos', ['prefix' => 'admin', 'controller' => 'agendamentos', 'action' => 'index']) ?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Não recebidos', ['prefix' => 'admin', 'controller' => 'agendamentos', 'action' => 'visitar']) ?></li>
	  </ul>
    </li>
    <?php if($user_auth['role'] == 'Farmacêutico(a)'){ ?>
    <li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Medicamentos <span class="caret"></span></a>
	  <ul class="dropdown-menu">
	    <li><?= $this->Html->link('Medicamentos', ['prefix' => 'admin', 'controller' => 'medicamentos', 'action' => 'index']) ?></li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link('Lotes de Medicamentos', ['prefix' => 'admin', 'controller' => 'lotes', 'action' => 'index']) ?></li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link('Doações realizadas', ['prefix' => 'admin', 'controller' => 'retiradas', 'action' => 'index']) ?></li>
        
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link('Tipos de Medicamentos', ['prefix' => 'admin', 'controller' => 'TiposMedicamentos', 'action' => 'index']) ?></li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link('Formas Farmacêuticas', ['prefix' => 'admin', 'controller' => 'FormasFarmaceuticas', 'action' => 'index']) ?></li>
	  </ul>
    </li>
    <li><?= $this->Html->link('Pacientes', ['prefix' => 'admin', 'controller' => 'pacientes', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link('Usuários', ['prefix' => 'admin', 'controller' => 'users', 'action' => 'index']) ?></li>
    <?php } ?>
    
</ul>
<?php } ?>