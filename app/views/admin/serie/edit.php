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

        <div class="row">
            <a href="/admin/season/add/<?php echo $serie->id;?>" class="btn btn-primary btn-sm p-2">
                Adicionar temporada
            </a>
            <button type="submit" class="btn btn-primary btn-sm ml-2">Salvar</button>
        </div>
    </form>

    <div class="border border-secondary rounded mt-2">
        <div class="bg-secondary">
            <div class="d-flex bg-secondary text-white font-weight-bold">
                <div class="col-1 py-2 ">Número</div>
                <div class="col-11 py-2 border-left text-center">Título</div>
            </div>
        </div>
        <?php foreach($serie->getSeasons() as $season){?>
            <div class="d-flex border-bottom">
                <div class="col-1 py-2 text-center">
                    <?php echo $season->number;?>
                </div>
                <div class="col-11 py-2">
                    <?php echo $season->title;?>
                </div>
                
            </div>
        <?php }?>
    </div>
</div>