<?php if ($user_auth['role'] == 'Farmacêutico(a)') { ?>
        <div class="users index col-md-12 columns content table-responsive">
            <h3>Lista de Lotes Medicamentos</h3>
            <table border="1" style="width:100%; padding: 5px">
                <thead>
                    <tr style="background-color: #3A87AD">
                        <th><b>Lote</b></th>
                        <th><b>Medicamento</b></th>
                        <th><b>Tipo</b></th>
                        <th><b>Forma</b></th>
                        <th><b>Vencimento</b></th>
                        <th><b>Fabricação</b></th>
                        <th><b>Dias p/ vencimento</b></th>
                        <th><b>QTDE</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lotes as $lote): ?>
                        <tr>
                        <td><?= h($lote->numero) ?></td>
                        <td><?= h($lote->medicamento->descricao) ?></td>
                        <td><?= h($lote->tipomedicamento->descricao) ?></td>
                        <td><?= h($lote->formafarmaceutica->descricao) ?></td>
                        <td><?= $lote->dataVencimento->format('d/m/Y') ?></td>
                        <td><?= $lote->dataFabricacao->format('d/m/Y') ?></td>
                        <td>
                            <?php
                                echo $dias = $this->Lotes->calcularDiferencaVencimento($lote->dataVencimento);
                            ?>
                        </td>
                        <td><?= $this->Number->format($lote->qdte) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">Você não tem acesso de administrador!!!</div>
<?php } ?>
