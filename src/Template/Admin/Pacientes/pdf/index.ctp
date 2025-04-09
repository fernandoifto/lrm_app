<?php if ($user_auth['role'] == 'Farmacêutico(a)') { ?>
        <div class="users index col-md-12 columns content table-responsive">
            <h3>Lista de Pacientes</h3>
            <table border="1" style="width:100%; padding: 5px">
                <thead>
                    <tr style="background-color: #3A87AD">
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Cartão Sus</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientes as $paciente): ?>
                        <tr>
                            <td><?= h($paciente->nome) ?></td>
                            <td><?= h($paciente->cpf) ?></td>
                            <td><?= h($paciente->cartaoSus) ?></td>
                            <td><?= h(date_format($paciente->dataNascimento, "d/m/Y")) ?></td>
                            <td><?= h($paciente->telefone) ?></td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">Você não tem acesso de administrador!!!</div>
<?php } ?>
