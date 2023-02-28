<?php
    echo flash('created');
?>

<div style="padding: 0 1em;">
    <form method="post" action="/signup/store">
        <div class="row mb-2">
            <input type="text" name="firstName" placeholder="Seu nome" class="form-control" value="<?php echo old('firstName'); ?>">
            <?php echo flash('firstName');?>
        </div>

        <div class="row mb-2">
            <input type="text" name="lastName" placeholder="Seu sobrenome" class="form-control" value="<?php echo old('lastName'); ?>">
            <?php echo flash('lastName');?>
        </div>
        
        <div class="row mb-2">
            <input type="text" name="email" placeholder="Seu e-mail" class="form-control" value="<?php echo old('email'); ?>">
            <?php echo flash('email');?>
        </div>
        
        <div class="row mb-2">
            <input type="password" name="password" placeholder="Digite uma senha" class="form-control" value="<?php echo old('password'); ?>">
            <?php echo flash('password');?>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary">Signup</button>
        </div>
    </form> 
</div>