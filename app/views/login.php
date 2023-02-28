<?php 
    echo flash('login');
?>

<div style="padding: 0em 1em;">
    <form action="/login/store" method="post">
        <div class="row mb-2">
            <label class="form-label font-weight-bold">E-mail:</label>
            <input class="form-control" type="text" name="email" placeholder="Seu E-mail" value="rciareli@gmail.com">
        </div>
        <div class="row mb-2">
            <label class="form-label font-weight-bold">Password:</label>
            <input class="form-control" type="password" name="password" placeholder="Sua Senha" value="123">
        </div>

        <div class="row d-flex align-self-baseline">
            <button class="btn btn-primary" type="submit" >Logar</button>
            <a class="align-self-end ml-2" href="/signup">Não tenho registro</a>
        </div>
        
    </form>

</div>