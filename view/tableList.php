<?php if(isset($listaContatos)): ?>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Telefone</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($listaContatos as $key => $contato):?>
    <tr>
        <td><?=$key+1;?></td>
        <td><?=$contato->getNome();?></td>
        <td><?=$contato->getTelefone();?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>