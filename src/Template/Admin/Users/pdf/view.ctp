<div class="users view col-lg-12 col-md-12">
    <h3><?= h($user->username) ?></h3>
    <table border="1" style="width:100%; padding: 5px">
        <tr>
            <th><b>Nome:</b></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><b>E-Mail:</b></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><b>Perfil:</b></th>
            <td><?= h($user->role) ?></td>
        </tr>
    </table>
</div>
