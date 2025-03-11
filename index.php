

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevApi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header class="header">
        <h1 class="h1">Dev Api</h1>
    </header>

    <main class="main">
        <section class="section" id="uso">
            <div class="get-data">
                <h1>GET</h1>
                <a href="http://localhost:80/routes/datoRoute.php">http://localhost:80/routes/datoRoute.php</a>
            </div>
            <p>
                Para actualizar registros el codigo correspondiente 
                debe enviarse en el cuerpo de la solicitud.
            </p>
            <table>
                <tr>
                    <th>Verbos HTTP</th>
                    <th>Endpoints</th>
                    <th>Acción</th>
                    <th>Respuesta (objetos JSON)</th>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/routes/datoRoute.php</td>
                    <td>Obtiene la lista de todos los registros</td>
                    <td rowspan=5>
                        <pre>
                    {
                        "codigo":"1",
                        "tipo_id":"CC",
                        "id":"108799955",
                        "apellido1":"Suarez",
                        "apellido2":"Suarez",
                        "nombre1":"Milton",
                        "nombre2":"Daniel",
                        "sexo":"M",
                        "fecha_nacimiento":"1889-01-02"
                    }
                        </pre>
                    </td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/routes/datoRoute.php </td>
                    <td>Permite registrar datos</td>
                </tr>
                <tr>
                    <td>PUT</td>
                    <td>/routes/datoRoute.php </td>
                    <td>Permite actualizar un registro</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/routes/datoRoute.php?codigo=1</td>
                    <td>Permite eliminar un registro</td>
                </tr>
            </table>
        </section>
    </main>
    
</body>
</html>