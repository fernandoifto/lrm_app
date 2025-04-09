<?php if ($user_auth['role'] == 'Farmacêutico(a)') { ?>
        <div class="users index col-md-12 columns content table-responsive">
            <h3>Lista de Agendamentos</h3>
            <table border="1" style="width:100%; padding: 5px">
                <thead>
                    <tr style="background-color: #3A87AD">
                        <th><b>Nome</b></th>
                        <th><b>End</b></th>
                        <th><b>Núm</b></th>
                        <th><b>Setor</b></th>
                        <th><b>Cep</b></th>
                        <th><b>Fone</b></th>
                        <th><b>Melhor data</b></th>
                        <th><b>Turno</b></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= h($agendamento->nome) ?></td>
                            <td><?= h($agendamento->endereco) ?></td>
                            <td><?= h($agendamento->numero) ?></td>
                            <td><?= h($agendamento->setor) ?></td>
                            <td><?= h($agendamento->cep) ?></td>
                            <td><?= h($agendamento->telefone) ?></td>
                            <td><?= h($agendamento->dataVisita) ?></td>
                            <td><?= h($agendamento->turno->descricao) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">Você não tem acesso de administrador!!!</div>
<?php } ?>
