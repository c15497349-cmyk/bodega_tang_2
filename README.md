# Sistema de Gestión - Bodega Tang

Sistema web desarrollado para la administración y control de una bodega, permitiendo gestionar empleados, cargos, usuarios y asistencias de manera eficiente.

---

# Descripción del Negocio

**Nombre:** Bodega Tang

**Giro:** Comercio de productos

**Tamaño:** Pequeña empresa

**Contexto:** Negocio dedicado a la venta de diversos productos que requiere un sistema para optimizar el control de personal y la gestión administrativa.

**Justificación:** La digitalización de los procesos permite reducir errores, mejorar la organización de la información y agilizar la toma de decisiones.

---

# Objetivo del Proyecto

Desarrollar una aplicación web que facilite la gestión administrativa de la empresa mediante el registro y control de empleados, usuarios, cargos y asistencias.

---

# Gestión del Proyecto

Para la planificación, organización y seguimiento de actividades se utilizó Trello.

## Tablero de Trello

🔗 https://trello.com/b/HVVHokjz/bodega-tang

### Evidencia

![TRELLO](https://github.com/c15497349-cmyk/bodega_tang_2/blob/main/public/image/image.png)

---

# Diseño UI/UX

El diseño de las interfaces y prototipos fue elaborado utilizando Figma.

## Prototipo en Figma

🔗 https://www.figma.com/design/4tWhFUBvSqcAOeLStn3s8W/Sin-t%C3%ADtulo?node-id=0-1&p=f&t=ta0XpSNOGbSI7No5-0

---

# Tecnologías Utilizadas

* PHP 8
* MySQL
* HTML5
* CSS3
* JavaScript
* Bootstrap
* Apache
* XAMPP
* GitHub

---

# Herramientas de Desarrollo

| Herramienta        | Uso                             |
| ------------------ | ------------------------------- |
| Trello             | Gestión del proyecto            |
| Figma              | Diseño UI/UX                    |
| Draw.io            | Diagramas y modelado            |
| MySQL Workbench    | Administración de base de datos |
| Visual Studio Code | Desarrollo del sistema          |
| XAMPP              | Servidor local                  |
| GitHub             | Control de versiones            |

---

# Requerimientos Funcionales

| Código | Descripción                      |
| ------ | -------------------------------- |
| RF01   | Registrar empleados              |
| RF02   | Registrar cargos                 |
| RF03   | Gestionar usuarios               |
| RF04   | Registrar asistencias            |
| RF05   | Consultar información registrada |
| RF06   | Administrar personal             |

---

# Requerimientos No Funcionales

| Código | Tipo        | Descripción                        |
| ------ | ----------- | ---------------------------------- |
| RNF01  | Rendimiento | Respuesta rápida del sistema       |
| RNF02  | Usabilidad  | Interfaz intuitiva y fácil de usar |
| RNF03  | Seguridad   | Acceso mediante autenticación      |

---

# Base de Datos

## Creación de Base de Datos

```sql
CREATE DATABASE bodega_tang;
USE bodega_tang;
```

## Tablas Principales

### Cargo

```sql
CREATE TABLE cargo (
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cargo VARCHAR(50) NOT NULL
);
```

### Empleado

```sql
CREATE TABLE empleado (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dni VARCHAR(8) UNIQUE NOT NULL,
    celular VARCHAR(20),
    correo VARCHAR(100) UNIQUE NOT NULL,
    id_cargo INT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cargo) REFERENCES cargo(id_cargo)
);
```

### Usuario

```sql
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    roles ENUM('admin','superadmin') DEFAULT 'admin',
    nombre_usuario VARCHAR(150) NOT NULL,
    clave VARCHAR(250) NOT NULL
);
```

### Asistencia

```sql
CREATE TABLE asistencia (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora_entrada TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    hora_salida TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado ENUM('asistio','tardanza','falto') DEFAULT 'falto',
    id_empleado INT NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);
```

---

# Modelo de Datos

## Entidades Principales

| Tabla      | Descripción                     |
| ---------- | ------------------------------- |
| cargo      | Almacena los cargos disponibles |
| empleado   | Información de los empleados    |
| usuario    | Usuarios del sistema            |
| asistencia | Registro de asistencias         |

## Relaciones

* Un cargo puede pertenecer a varios empleados (1:N).
* Un empleado puede registrar múltiples asistencias (1:N).

---

# Estructura del Proyecto

```text
bodega_tang_2/
│
├── app/
├── config/
├── controllers/
├── models/
├── views/
├── public/
│   ├── css/
│   ├── js/
│   ├── image/
│   └── index.php
│
├── database/
└── README.md
```

---

# Instalación

## 1. Clonar el repositorio

```bash
git clone https://github.com/c15497349-cmyk/bodega_tang_2.git
```

## 2. Mover el proyecto

Copiar la carpeta dentro de:

```text
xampp/htdocs/
```

## 3. Crear la Base de Datos

Importar el script SQL en phpMyAdmin.

## 4. Configurar la conexión

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "bodega_tang";
```

## 5. Ejecutar el proyecto

Iniciar:

* Apache
* MySQL

Abrir en el navegador:

```text
http://localhost/bodega_tang_2
```

---

# Credenciales de Prueba

## Administrador

Usuario:

```text
admin
```

Contraseña:

```text
1234
```

## Super Administrador

Usuario:

```text
superadmin
```

Contraseña:

```text
1234
```

---

# Capturas del Sistema

## Dueña utilizando el sistema

![Sistema](https://github.com/c15497349-cmyk/bodega_tang_2/blob/main/public/image/due%C3%B1o.jpeg)

---

# Beneficios del Sistema

* Mejor control de empleados.
* Registro ordenado de asistencias.
* Administración centralizada.
* Reducción de errores manuales.
* Mayor rapidez en consultas y registros.
* Mejor organización de la información.

---

# Requisitos del Sistema

* PHP 8 o superior
* MySQL 8 o superior
* Apache
* XAMPP
* Navegador web actualizado

---

# Autor

Proyecto desarrollado con fines académicos para SENATI.

**Autor:** Carlos Reategui

---

# Repositorio

GitHub:

https://github.com/c15497349-cmyk/bodega_tang_2
