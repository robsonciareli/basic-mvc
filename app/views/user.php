<h2>Dados do user</h2>

<div class="row">
    <label class="col-2 form-label font-weight-bold">Nome: </label>
    <?php echo $user->firstName . ' ' . $user->lastName; ?>
</div>
<div class="row">
    <label class="col-2 form-label font-weight-bold">E-mail: </label>
    <?php echo $user->email; ?>
</div>
