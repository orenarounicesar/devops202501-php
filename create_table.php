<?php
$host = 'postgres-db';
$dbname = 'devdb';
$user = 'postgres';
$pass = '1993';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS datos_personales (
        codigo SERIAL PRIMARY KEY,
        tipo_id CHAR(2) NOT NULL,
        id VARCHAR(16) NOT NULL,
        apellido1 VARCHAR(20) NOT NULL,
        apellido2 VARCHAR(30),
        nombre1 VARCHAR(20) NOT NULL,
        nombre2 VARCHAR(30),
        sexo CHAR(1) NOT NULL,
        fecha_nacimiento DATE NOT NULL
    )";

    $pdo->exec($sql);
    echo "Tabla creada correctamente\n";
} catch (PDOException $e) {
    echo "Error al crear la tabla: " . $e->getMessage();
}
?>
