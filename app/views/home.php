<h2 class="mb-3">User's list</h2>
<ul class="list-group">
    <?php foreach ($users as $user): ?>
        <li class="list-group-item d-flex justify-content-between"><?php echo $user->firstName . ' ' . $user->lastName; ?>
        <a href="/user/show/<?php echo $user->id; ?>"> Show user </a> </li>
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