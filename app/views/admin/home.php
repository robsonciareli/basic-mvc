<h2 class="mb-3">User's list (Admin)</h2>
<ul class="list-group">
    <?php foreach ($users as $user): ?>
        <li class="list-group-item d-flex justify-content-between">
            <div class="col-9 ml-0">
                <?php echo $user->firstName . ' ' . $user->lastName; ?>
            </div>    
            <div class="d-flex justify-content-between col-3">
                <a class="btn btn-primary btn-sm" href="/user/show/<?php echo $user->id; ?>">Show</a>
                <form method="POST" action="/user/delete/<?php echo $user->id;?>">
                    <input type="hidden" id="id" name="id" value="<?php echo $user->id;?>">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<div class="blockquote text-right font-weight-bold blockquote-footer">
    <label class="form-label">
    <?php
        $qtd = count($users);
        echo $qtd > 1 ? "{$qtd} cadastrados" : "{$qtd} cadastrado";
    ?>
    </label>
</div>