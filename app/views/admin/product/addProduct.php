<?php
    echo flash('created');
?>

<div style="padding: 0 1em;">
    <form method="post" action="/admin/product/store">
        <div class="row mb-2">
            <input type="text" name="descricao" placeholder="Descrição do produto" class="form-control" value="<?php echo old('descricao'); ?>">
            <?php echo flash('descricao');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="categoria" placeholder="Categoria do produto" class="form-control" value="<?php echo old('categoria'); ?>">
            <?php echo flash('categoria');?>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary">Signup</button>
        </div>
    </form> 
</div>