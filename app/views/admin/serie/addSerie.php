<?php
    echo flash('created');
?>

<div style="padding: 0 1em;">
    <form method="post" action="/admin/serie/store">
        <div class="row mb-2">
            <input type="text" name="name" placeholder="Nome da série" class="form-control">
            <?php echo flash('name');?>
        </div>

        <div class="row mb-2">
            <textarea type="text" name="resume" placeholder="Resumo da série" class="form-control" ></textarea>
            <?php echo flash('resume');?>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary">Signup</button>
        </div>
    </form> 
</div>