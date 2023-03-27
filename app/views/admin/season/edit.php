<?php
    echo flash('erro');
?>
<div style="padding: 0 1em;">
    <form method="POST" action="/admin/season/update">
        <input type="hidden" name="id" id="id" value="<?php echo $season->id; ?>">
        <input type="hidden" name="serie_id" id="serie_id" value="<?php echo $season->serie_id; ?>">
        <div class="row mb-2">
            <input type="text" name="number" placeholder="Número" class="form-control" value="<?php echo $season->number; ?>">
            <?php echo flash('number');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="title" placeholder="Título da temporada" class="form-control" value="<?php echo $season->title; ?>">
            <?php echo flash('title');?>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>