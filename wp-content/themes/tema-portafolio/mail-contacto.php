<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />
    <style>
        html,
        body {
            margin: 0;
            background-color: #f2f2f2;
        }

        p {
            margin: 0;
        }

        .main-table {
            width: 600px;
            margin: 0 auto;
            padding-top: 32px;
            padding-bottom: 64px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .head-table {
            margin: 0 auto;
        }

        .head-body {
            margin: 32px auto;
            background-color: #fff;
            padding: 50px;
            width: 70%;
        }

        .head-body tr p {
            margin-bottom: 16px;
        }

        .footer-table {
            margin: 0 auto;
        }

        h1 {
            font-family: Arial;
            font-size: 18px;
            font-weight: bold;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.17;
            letter-spacing: normal;
            text-align: center;
            color: #000;
            margin: 0;
        }

        p {
            font-family: Arial;
            font-size: 14px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.14;
            letter-spacing: normal;
            text-align: center;
            color: #000;
            margin: 0;
        }
    </style>
</head>

<body>
    <table border="0" cellspacing="0" cellpadding="0" styles="width: 100%" class="full-table border=" 0" cellspacing="0" cellpadding="0"">
                <tr>
                    <td align=" center">
        <table cellpadding="0" cellspacing="0" class="main-table">
            <tr>
                <td>
                    <h3>Contact information</h3>
                </td>
            </tr>
            <tr>
                <td style="padding: 0px 0 30px 0;">
                    <b>Nombre: </b><?php echo $_POST['nombre']; ?><br>
                    <b>Correo: </b><?php echo $_POST['correo']; ?><br>
                    <b>Teléfono: </b><?php echo $_POST['telefono']; ?><br>
                    <b>Mensaje: </b><?php echo $_POST['mensaje']; ?><br>
                </td>
            </tr>
        </table>
        </td>
        <tr>
    </table>
</body>

</html>