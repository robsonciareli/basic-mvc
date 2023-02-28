<div class="border border-secondary rounded">
    <div class="bg-secondary">
        <div class="d-flex bg-secondary text-white font-weight-bold">
            <div class="col-6 py-2 ">Descrição</div>
            <div class="col-5 py-2 border-left">Categoria</div>
            <div class="col-1 py-2 border-left text-center">Ação</div>
        </div>
    </div>
    <?php foreach($products as $product): ?>
            <div class="d-flex border-bottom">
                
                    <div class="col-6 py-2">
                        <?php echo $product->descricao; ?>
                    </div>
                    <div class="col-5 border-left py-2">
                        <?php echo $product->categoria; ?>
                    </div>
                    <div class="col-1 border-left py-2 align-items-center">
                        <a class="btn btn-sm btn-primary" href="/admin/product/show/<?php echo $product->id;?>">Show</a>
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