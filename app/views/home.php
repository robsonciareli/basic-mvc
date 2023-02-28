<ul class="list-group">
    <?php foreach ($users as $user): ?>
        <li class="list-group-item d-flex justify-content-between">
            <div class="col-12 ml-0">
                <?php echo $user->firstName . ' ' . $user->lastName; ?>
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