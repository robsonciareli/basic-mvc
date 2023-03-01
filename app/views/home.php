<div class="border border-secondary rounded">
    <div class="bg-secondary">
        <div class="d-flex bg-secondary text-white font-weight-bold">
            <div class="col-6 py-2 ">Nome</div>
        </div>
    </div>
    <?php foreach($users as $user ){?>
        <div class="d-flex border-bottom">
            <div class="col-12 py-2">
                <?php echo $user->firstName . ' ' . $user->lastName; ?>
            </div>
        </div>
    <?php }?>
</div>

<div class="blockquote text-right font-weight-bold blockquote-footer">
    <label class="form-label">
    <?php
        $qtd = count($users);
        echo $qtd > 1 ? "{$qtd} cadastrados" : "{$qtd} cadastrado";
    ?>
    </label>
</div>