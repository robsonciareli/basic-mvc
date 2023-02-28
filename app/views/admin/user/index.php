<h2 class="mb-3">
    <?php echo $title; ?>
</h2>

<?php
    echo flash('created');
?>

<div class="mt-3">
<ul class="list-group">
    <?php foreach ($users as $user): ?>
        <li class="list-group-item d-flex justify-content-between">
            <div class="col-9 ml-0">
                <?php echo $user->firstName . ' ' . $user->lastName; ?>
            </div>    
            <div class="d-flex justify-content-between col-3">
                <a class="btn btn-primary btn-sm" href="/admin/user/show/<?php echo $user->id; ?>">Show</a>

                <?php if (idLoggedUser() === $user->id) { ?>
                    <form method="GET" action="/admin/user/edit/<?php echo $user->id;?>">
                        <input type="hidden" id="id" name="id" value="<?php echo $user->id;?>">
                        <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                    </form>
                <?php } ?>

                <form method="POST" action="/admin/user/delete/<?php echo $user->id;?>">
                    <input type="hidden" id="id" name="id" value="<?php echo $user->id;?>">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                
            </div>
        </li>
    <?php endforeach; ?>
</ul>
</div>
<div class="blockquote text-right font-weight-bold blockquote-footer">
    <label class="form-label">
    <?php
        $qtd = count($users);
        echo $qtd > 1 ? "{$qtd} cadastrados" : "{$qtd} cadastrado";
    ?>
    </label>
</div>