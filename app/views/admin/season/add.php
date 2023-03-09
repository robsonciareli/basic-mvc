<?php
    echo flash('erro');
?>
<div style="padding: 0 1em;">
    <form method="POST" action="/admin/season/store">
        <input type="hidden" name="serie_id" value="<?php echo $serie_id; ?>">
        <div class="row mb-2">
            <input type="text" name="number" placeholder="Número" class="form-control col-1" value="<?php echo old('number'); ?>">
            <?php echo flash('number');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="title" placeholder="Digite a title" class="form-control" value="<?php echo old('title'); ?>">
            <?php echo flash('title');?>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>