<h2 class="mb-3">
    <?php echo $title; ?>
</h2>
<div style="padding: 0 1em;">
    <form method="POST" action="/admin/user/update">
        <input type="hidden" name="id" id="id" value="<?php echo $user->id; ?>">
        <div class="row mb-2">
            <input type="text" name="firstName" placeholder="Seu nome" class="form-control" value="<?php echo $user->firstName; ?>">
            <?php echo flash('firstName');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="lastName" placeholder="Seu sobrenome" class="form-control" value="<?php echo $user->lastName; ?>">
            <?php echo flash('lastName');?>
        </div>
        
        <div class="row mb-2">
            <input type="text" name="email" placeholder="Seu e-mail" class="form-control" value="<?php echo $user->email; ?>">
            <?php echo flash('email');?>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>