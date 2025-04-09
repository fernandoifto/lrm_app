<?php if ($user_auth['role'] == 'Farmacêutico(a)') { ?>
        <div class="users index col-md-12 columns content table-responsive">
            <h3>Lista de Medicamentos</h3>
            <table border="1" style="width:100%; padding: 5px">
                <thead>
                    <tr style="background-color: #3A87AD">
                        <th><b>Descrição</b></th>
                        <th><b>Princípio ativo</b></th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medicamentos as $medicamento): ?>
                        <tr>
                            <td><?= h($medicamento->descricao) ?></td>
                            <td><?= h($medicamento->principioAtivo) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">Você não tem acesso de administrador!!!</div>
<?php } ?>
