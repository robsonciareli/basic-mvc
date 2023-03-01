<?php
    echo flash('created');
?>

<div class="border border-secondary rounded">
    <div class="bg-secondary">
        <div class="d-flex bg-secondary text-white font-weight-bold">
            <div class="col-10 py-2 ">Descrição</div>
            <div class="col-2 py-2 border-left text-center">Ação</div>
        </div>
    </div>

<?php foreach($users as $user){?>
    <div class="d-flex border-bottom">
        <div class="col-10 py-2">
            <?php echo $user->firstName . ' ' . $user->lastName; ?>
        </div>
        <div class="d-flex col-2 border-left py-2 justify-content-center">
            <a class="btn btn-sm btn-primary" href="/admin/user/show/<?php echo $user->id;?>" title="Visualizar" alt="Visualizar">
                <i class="bi bi-eye"></i>
            </a>
            <form method="GET" action="/admin/user/edit/<?php echo $user->id;?>">
                <button type="submit" class="btn btn-primary btn-sm ml-2" title="Editar" alt="Editar">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </form>
            <form method="GET" action="/admin/user/delete/<?php echo $user->id;?>">
                <button type="submit" class="btn btn-danger btn-sm ml-2" title="Excluir" alt="Excluir"> 
                    <i class="bi bi-trash"></i>    
                </button>
            </form>
        </div>
    </div>
<?php }?>
</div>

<div class="blockquote text-right font-weight-bold blockquote-footer">
    <label class="form-label">
    <?php
        $qtd = count($users);
        echo $qtd > 1 ? "{$qtd} cadastrados" : "{$qtd} cadastrado";
    ?>
    </label>
</div>