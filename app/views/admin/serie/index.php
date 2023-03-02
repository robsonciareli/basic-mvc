<?php
    echo flash('created');
?>

<div class="border border-secondary rounded">
    <div class="bg-secondary">
        <div class="d-flex bg-secondary text-white font-weight-bold">
            <div class="col-10 py-2 ">Nome</div>
            <div class="col-2 py-2 border-left text-center">Ação</div>
        </div>
    </div>

<?php foreach($series as $serie){?>
    <div class="d-flex border-bottom">
        <div class="col-10 py-2">
            <?php echo $serie->name; ?>
        </div>
        <div class="d-flex col-2 border-left py-2 justify-content-center">
            <a class="btn btn-sm btn-primary" href="/admin/serie/show/<?php echo $serie->id;?>" title="Visualizar" alt="Visualizar">
                <i class="bi bi-eye"></i>
            </a>
            <form method="GET" action="/admin/serie/edit/<?php echo $serie->id;?>">
                <button type="submit" class="btn btn-primary btn-sm ml-2" title="Editar" alt="Editar">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </form>
            <form method="GET" action="/admin/serie/destroy/<?php echo $serie->id;?>">
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
        $qtd = count($series);
        echo $qtd > 1 ? "{$qtd} cadastrados" : "{$qtd} cadastrado";
    ?>
    </label>
</div>