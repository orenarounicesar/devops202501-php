

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

    <nav class="nav">
        <ul class="ul">
            <li>
                <a href="#uso">Uso</a>
            </li>
            <li>
                <a href="#ejemplo">Ejemplo de Respuesta</a>
            </li>
        </ul>
    </nav>

    <main class="main">
        <section class="section" id="uso">
            <p>
                Para el verbo HTTP PUT el codigo correspondiente al registro 
                a actualizar o eliminar debe enviarse en el cuerpo de la solicitud HTTP.
            </p>
            <table>
                <tr>
                    <th>Verbos HTTP</th>
                    <th>Endpoints</th>
                    <th>Acción</th>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/routes/datoRoute.php </td>
                    <td>Obtiene la lista de todos los registros</td>
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
        <section class="section" id="ejemplo">
            <h3>Ejemplo de Respuesta</h3>
            <ul class="ul">
                <li>Content type: "application/json".  Las respuestas son objetos JSON.</li>
                <li>
                    Ejemplo:
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
                </li>
            </ul>
        </section>
    </main>
    
</body>
</html>