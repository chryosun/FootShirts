<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{BASE_DIR}}/public/css/stylesLog.css">
</head> -->

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;

        }

        .container,
        .registro-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;

        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .contenedorBoton {
            text-align: center;
        }

        button {
            width: 50%;
            max-width: 200px;
            margin: 0 auto;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        button:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }



        .login-container {
            max-width: 400px;
            margin: 100px auto;
        }

        .recuperar-password {
            margin-top: 20px;
            font-size: 14px;
            color: blue;
        }

        .recuperar-password a {
            text-decoration: underline;
        }



        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            input[type="number"],
            input[type="tel"] {
                padding: 8px;
            }

            button {
                padding: 8px;
            }
        }
    </style>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="index.php?sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
            <div class="input-group">
                <label for="txtEmail">Correo Electrónico</label>
                <input type="email" id="txtEmail" name="txtEmail" value="{{txtEmail}}" required>
            </div>
            {{if errorEmail}}
            <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>
            {{endif errorEmail}}
            <div class="input-group">
                <label for="txtPswd">Contraseña</label>
                <input type="password" id="txtPswd" name="txtPswd" value="{{txtPswd}}" required>
            </div>
            {{if errorPswd}}
            <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
            {{endif errorPswd}}
            {{if generalError}}
            <div class="row">
                {{generalError}}
            </div>
            {{endif generalError}}
            <div class="contenedorBoton">
                <button class="button" id="btnLogin" type="submit">Iniciar Sesión</button>
            </div>
        </form>
        <p class="recover-password"><a href="index.php?page=sec_register">Recuperar contraseña</a></p>
        <p class="recover-password"><a href="index.php?page=sec_register">Registrate</a></p>
    </div>
</body>

</html>