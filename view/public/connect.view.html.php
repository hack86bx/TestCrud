<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
    <!--Lien CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="?homepage">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="?json">API fomat JSON</a></li>
                        <li class="nav-item"><a class="nav-link" href="?connect">Connexion</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="container text-center">
    <div class="row justify-content-center align-items-center">
        <form method="POST" name="connexion" action="" class="d-flex flex-column align-items-center">
            <div class="col-6"></div>
            <div class="mb-3">
                <label for="username" class="form-label">Login</label>
                <input type="text" name="username" placeholder="Votre login" class="form-control text-center" id="username" required>
            </div>
            <div class="mb-3">
                <label for="userpwd" class="form-label">Mot de passe</label>
                <input type="password" placeholder="Votre mot de passe" name="userpwd" class="form-control text-center" id="userpwd" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="connexion" class="btn btn-outline-dark">
            </div>
        </form>
    </div>
</div>

        <?php //var_dump($_POST)
        ?>
    </div>
    <!--Lien JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>