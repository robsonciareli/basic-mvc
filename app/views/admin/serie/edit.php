<?php
    echo flash('erro');
    echo flash('created');
?>
<div style="padding: 0 1em;">
    <form method="POST" action="/admin/serie/update" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $serie->id; ?>">
        <div class="row mb-2">
            <input type="file" name="cover_image" title="Capa da série" class="form-control" value="<?php echo $serie->cover_image; ?>">
            <?php echo flash('cover_image');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="name" placeholder="Digite nome" class="form-control" value="<?php echo $serie->name; ?>">
            <?php echo flash('name');?>
        </div>

        <div class="row mb-2">
            <textarea type="text" name="resume" placeholder="Digite o resumo" class="form-control"><?php echo $serie->resume; ?></textarea>
            <?php echo flash('resume');?>
        </div>

        <div class="row justify-content-end">
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
                <div class="col-9 py-2 border-left text-center">Título</div>
                <div class="col-2 py-2 border-left text-center">Título</div>
            </div>
        </div>
        <?php foreach($serie->getSeasons() as $season){?>
            <div class="d-flex border-bottom">
                <div class="col-1 py-2 text-center">
                    <?php echo $season->number;?>
                </div>
                <div class="col-9 py-2">
                    <?php echo $season->title;?>
                </div>
                <div class="d-flex col-2 border-left py-2 justify-content-center">
                    <a class="btn btn-sm btn-primary" href="/admin/season/show/<?php echo $season->id; ?>" title="Visualizar" alt="Visualizar">
                        <i class="bi bi-eye"></i>
                    </a>
                    <form method="GET" action="/admin/season/edit/<?php echo $season->id; ?>">
                        <button type="submit" class="btn btn-primary btn-sm ml-2" title="Editar" alt="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </form>
                    <form method="GET" action="/admin/season/destroy/<?php echo $season->id; ?>">
                        <button type="submit" class="btn btn-danger btn-sm ml-2" title="Excluir" alt="Excluir"> 
                            <i class="bi bi-trash"></i>    
                        </button>
                    </form>
                </div>
            </div>
        <?php }?>
    </div>
</div>