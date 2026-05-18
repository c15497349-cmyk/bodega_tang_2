<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/login.css">
</head>

<body>

    <?php if (isset($error) && $error): ?>
        <p style="color: red; text-align:center;">
            <?php echo htmlspecialchars($error); ?>
        </p>
    <?php endif; ?>

    <div class="container">

        <!-- IZQUIERDA -->
        <div class="left">
            <img src="<?php echo BASE_URL; ?>/public/img/bodega.png.jpg" alt="Bodega">
        </div>

        <!-- DERECHA -->
        <div class="right">
            <h2>Iniciar Sesión</h2>

            <form action="" method="POST">
                <label for="user">Usuario:</label>
                <input id="user" type="text" name="user" required>

                <label for="pass">Contraseña:</label>
                <input id="pass" type="password" name="pass" required>

                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>

</body>

</html>