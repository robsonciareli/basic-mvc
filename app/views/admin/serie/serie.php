<div class="row">
    <label class="col-2 form-label font-weight-bold">Nome: </label>
    <?php echo $serie->name; ?>
</div>
<div class="row">
    <label class="col-2 form-label font-weight-bold">Resumo: </label>
    <?php echo $serie->resume; ?>
</div>

<div class="border border-secondary rounded mt-2">
<?php 
    foreach($serie->getSeasons() as $season){?>
        <div class="d-flex border-bottom bg-secondary p-2 text-white">
            <?php echo "Temporada {$season->number} - $season->title";?>
        </div>
    <?php }?>
</div>