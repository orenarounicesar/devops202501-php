# devops202501-php

# 📌 Configuración del Proyecto con PostgreSQL y Docker

Este documento proporciona las instrucciones detalladas para:
- Instalar PostgreSQL
- Crear la base de datos
- Descargar la API desde Git
- Construir la imagen de Docker
- Ejecutar el contenedor

---

## 📥 1. Instalación de PostgreSQL y Creación de la Base de Datos en PostgreSQL

### 🔹 Creamos una red
```sh
docker network create dev-red

```

### 🔹 Docker
```sh
docker run -d \
  --name postgres-db \
  --network dev-red \
  -e POSTGRES_USER=postgres \
  -e POSTGRES_PASSWORD=1993 \
  -e POSTGRES_DB=devdb \
  -v postgres-data:/var/lib/postgresql/data \
  postgres:latest
```

---

## 🔄 2. Descargar la API desde GitHub

Clona el repositorio:
```sh
git clone https://github.com/ajmaestre/devapi.git
cd devapi
```

---

## 🐳 3. Construcción de la Imagen Docker

2️⃣ Construye la imagen:
```sh
docker build . -t devapi
```

---

## 🚀 4. Ejecutar los Contenedores con Docker

### 🔹 Ejecución:
```sh
docker run -d --name dev-api --network=dev-red -p 80:80 devapi

```

---

## 📝 5. Verificación de Contenedores en Ejecución

```sh
docker ps
```

Si todo está bien, verás los contenedores `postgres-db` y `dev-api` en ejecución.

Para acceder a PostgreSQL dentro del contenedor:
```sh
docker exec -it postgres-db psql -U postgres -d devdb
```

---
