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
        <nav class="navbar mb-3 navbar-light bg-light">
            <div class="d-flex justify-content-between col-5">
                    <a  class="text-decoration-none text-dark" href="/admin/home">Início</a>
                    <a  class="text-decoration-none text-dark" href="/admin/user">Usuário</a>
                </ul>
            </div>
            <div class="d-flex justify-content-end col-7">
                 <?php echo welcome('user'); ?>
            </div>
        </nav>
        
        <?php require VIEW_PATH . $this->controller->view; ?>
    </div>
</body>
</html>