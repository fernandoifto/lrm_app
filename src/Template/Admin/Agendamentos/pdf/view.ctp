<div class="users view col-lg-12 col-md-12">
    <h3>Nome: <?= h($agendamento->nome) ?></h3>
    <table border="1" style="width:100%; padding: 5px">
        <tr>
            <th>Nome</th>
            <td><?= $agendamento->nome ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td><?= $agendamento->endereco ?></td>
        </tr>
        <tr>
            <th>Número</th>
            <td><?= $agendamento->numero ?></td>
        </tr>
        <tr>
            <th>Setor</th>
            <td><?= $agendamento->setor ?></td>
        </tr>
        <tr>
            <th>Cep</th>
            <td><?= $agendamento->cep ?></td>
        </tr>
        <tr>
            <th>Telefone/WhatsApp</th>
            <td><?= $agendamento->telefone ?></td>
        </tr>
        <tr>
            <th>Turno</th>
            <td><?= $agendamento->turno->descricao ?></td>
        </tr>
        <tr>
            <th>Data do Agendamento</th>
            <td><?= h(date_format($agendamento->created, "d/m/Y H:i:s")) ?></td>
        </tr>
        <tr>
            <th>Recebido</th>
            <td><?= h(!is_null($agendamento->id_user) ? __('Sim') : __('Não')) ?></td>
         </tr>
          <?php if(!is_null($agendamento->id_user)){ ?>
         <tr>
            <th>Recebido pelo(a):</th>
            <td><?=  h($agendamento->user->username); ?></td>
         </tr>
          <?php }?>
    </table>
    <div class="row">
        <h4>Melhor data</h4>
        <?= $this->Text->autoParagraph(h($agendamento->dataVisita)); ?>
    </div>
</div>
