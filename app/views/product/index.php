<h1>
    <?php echo $title ;?>
</h1>
<div class="border border-secondary rounded">
    <div class="bg-secondary">
        <div class="d-flex bg-secondary text-white font-weight-bold">
            <div class="col-6 py-2 border-right">Descrição</div>
            <div class="col-6 py-2">Categoria</div>
        </div>
    </div>
    <?php foreach($products as $product): ?>
            <div class="d-flex border-bottom">
                
                    <div class="col-6 border-right py-2">
                        <?php echo $product->descricao; ?>
                    </div>
                    <div class="col-6 py-2">
                        <?php echo $product->categoria; ?>
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