<?php
    echo flash('erro');
?>
<div style="padding: 0 1em;">
    <form method="POST" action="/admin/serie/update">
        <input type="hidden" name="id" id="id" value="<?php echo $serie->id; ?>">
        <div class="row mb-2">
            <input type="text" name="name" placeholder="Digite nome" class="form-control" value="<?php echo $serie->name; ?>">
            <?php echo flash('name');?>
        </div>

        <div class="row mb-2">
            <textarea type="text" name="resume" placeholder="Digite o resumo" class="form-control"><?php echo $serie->resume; ?></textarea>
            <?php echo flash('resume');?>
        </div>

        <div class="row mb-2 justify-content-end">
            <a href="/admin/season/add/<?php echo $serie->id;?>" class="btn btn-primary btn-sm">
                Adicionar temporada
            </a>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>