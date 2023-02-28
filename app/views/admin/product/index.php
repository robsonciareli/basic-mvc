<?php echo flash('excluido');?>

<div class="border border-secondary rounded">
    <div class="bg-secondary">
        <div class="d-flex bg-secondary text-white font-weight-bold">
            <div class="col-5 py-2 ">Descrição</div>
            <div class="col-5 py-2 border-left">Categoria</div>
            <div class="col-2 py-2 border-left text-center">Ação</div>
        </div>
    </div>
    <?php foreach($products as $product): ?>
            <div class="d-flex border-bottom">
                
                    <div class="col-5 py-2">
                        <?php echo $product->descricao; ?>
                    </div>
                    <div class="col-5 border-left py-2">
                        <?php echo $product->categoria; ?>
                    </div>
                    <div class="d-flex col-2 border-left py-2 justify-content-center">
                        <a class="btn btn-sm btn-primary" href="/admin/product/show/<?php echo $product->id;?>" title="Visualizar"> V </a>
                        <form method="GET" action="/admin/product/edit/<?php echo $product->id;?>">
                            <button type="submit" class="btn btn-primary btn-sm ml-2" title="Editar"> E </button>
                        </form>
                        <form method="GET" action="/admin/product/delete/<?php echo $product->id;?>">
                            <button type="submit" class="btn btn-danger btn-sm ml-2" title="Excluir"> X </button>
                        </form>

                    </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="blockquote text-right font-weight-bold blockquote-footer">
    <label class="form-label">
    <?php
        $qtd = count($products);
        echo $qtd > 1 ? "{$qtd} cadastrados" : "{$qtd} cadastrado";
    ?>
    </label>
</div>