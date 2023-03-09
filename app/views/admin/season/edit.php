<?php
    echo flash('erro');
?>
<div style="padding: 0 1em;">
    <form method="POST" action="/admin/season/update">
        <input type="hidden" name="id" id="id" value="<?php echo $season->id; ?>">
        <div class="row mb-2">
            <input type="text" name="descricao" placeholder="Digite a descrição" class="form-control" value="<?php echo $season->descricao; ?>">
            <?php echo flash('descricao');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="categoria" placeholder="Digite a categoria" class="form-control" value="<?php echo $season->categoria; ?>">
            <?php echo flash('categoria');?>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>