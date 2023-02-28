<div style="padding: 0 1em;">
    <form method="POST" action="/admin/product/update">
        <input type="hidden" name="id" id="id" value="<?php echo $product->id; ?>">
        <div class="row mb-2">
            <input type="text" name="descricao" placeholder="Digite a descrição" class="form-control" value="<?php echo $product->descricao; ?>">
            <?php echo flash('descricao');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="categoria" placeholder="Digite a categoria" class="form-control" value="<?php echo $product->categoria; ?>">
            <?php echo flash('categoria');?>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>