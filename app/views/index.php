<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title><?php echo $title; ?></title>
</head>
<body>

    <div class="container">
        <section id="header">
            <ul id="nav">
                <li><a href="/">Início</a></li>
                <li><a href="/signup">Signup</a></li>
                <li><a href="/login">Login</a></li>
            </ul>

            <div>
                 <?php echo welcome('user'); ?>
            </div>
        </section>
        
        <?php require VIEW_PATH . $this->controller->view; ?>
    </div>
</body>
</html>