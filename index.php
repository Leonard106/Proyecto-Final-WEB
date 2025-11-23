<?php include('./head.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>

<body class="grey lighten-4">

    <div class="valign-wrapper row" style="width: 100%; height: 60vh; margin: 0;">
         
        <div class="col s12 m8 l6 offset-m2 offset-l3">
            
            <div class="card z-depth-2">
                
                <div class="card-content" style="padding: 40px;">
                    <h4 class="center-align blue-text text-darken-2">Iniciar Sesión</h4>
                    <br> <form action="./Logica/validarlogin.php" method="POST">
                        
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nombre_usuario" type="text" name="nombre_usuario" required>
                            <label for="nombre_usuario">Usuario</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Contraseña</label>
                        </div>

                        <br><br> <button class="btn-large waves-effect waves-light blue darken-2" type="submit" style="width: 100%;">
                            Entrar
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
<?php include('./footer.php'); ?>
</html>