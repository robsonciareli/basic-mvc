<h2>Login</h2>
<form action="/login/store" method="post">
    <input type="text" name="email" placeholder="Seu E-mail" value="rciareli@gmail.com">
    <input type="password" name="password" placeholder="Sua Senha" value="123">
    <button type="submit" >Logar</button>
</form>

<br>
<?php 
echo flash('login');
 ?>

