## TRELLO
mi tablero de trello
![TRELLO](https://github.com/c15497349-cmyk/bodega_tang_2/blob/main/public/image/image.png)

---

# Sistema de Gestión - Bodega Tang
Sistema web para la gestión de una bodega, permitiendo administrar productos, proveedores, clientes y ventas de manera eficiente. Desarrollado como proyecto final del curso de Java Web en SENATI.

---

## Descripción del negocio
Nombre: Bodega Tang  
Giro: Comercio de productos  
Tamaño: Pequeña empresa  
Contexto: Negocio donde se venden distintos productos y se requiere llevar un control de inventario, ventas y proveedores.  
Justificación: Digitalizar el control manual para mejorar la organización, reducir errores y tener un control en tiempo real.

---

## Identificación del problema y solución

Problema:  
El negocio lleva el control de productos, ventas y clientes de forma manual, lo que genera errores, pérdida de información y descontrol del inventario.

Solución tecnológica:  
Desarrollar un sistema web usando Java Spring Boot y MySQL que permita registrar, consultar y controlar todas las operaciones de la tienda.

---

## Requerimientos Funcionales

| Código | Descripción |
|---|---|
| RF01 | Registrar proveedores |
| RF02 | Registrar productos con stock y precio |
| RF03 | Registrar clientes |
| RF04 | Registrar ventas |
| RF05 | Mostrar listado de productos |
| RF06 | Mostrar historial de ventas |

---

## Requerimientos No Funcionales

| Código | Tipo | Descripción |
|---|---|---|
| RNF01 | Rendimiento | Respuesta menor a 3 segundos |
| RNF02 | Usabilidad | Interfaz intuitiva |
| RNF03 | Seguridad | Acceso con autenticación |

---

## Stack completo
1. Trello             → Gestión del proyecto  
2. Draw.io            → Diagramas  
3. Figma              → Diseño UI/UX  
4. MySQL Workbench    → Base de datos  
5. IntelliJ IDEA      → Backend + Frontend  
6. XAMPP              → Servidor  

---

## Tecnologías utilizadas
- Java 17
- Spring Boot 3
- MySQL 8
- HTML5, CSS3, JavaScript
- IntelliJ IDEA
- XAMPP
- MySQL Workbench
- Draw.io
- Figma

---

## Estructura del proyecto

```
JavaWeb-GotaGota/
├── backend/          → Spring Boot (Java)
│   ├── src/
│   ├── pom.xml
│   └── ...
├── frontend/         → HTML, CSS, JS
│   ├── css/
│   ├── js/
│   └── index.html
```
 
---
 
## Base de datos

El sistema cuenta con 4 tablas principales:

| Tabla | Descripción |
|---|---|
| PROVEEDOR | Empresas que suministran productos |
| PRODUCTO | Productos disponibles en la tienda |
| CLIENTE | Personas que compran |
| VENTA | Registro de ventas |

### Diagrama Entidad-Relacion (DER)
![Diagrama Entidad Relacion](https://github.com/emiaj0978/Bodega-Tang/blob/main/frontend/imagen/image3.png)
 
### Modelo Relacional (MR)
![Modelo Relacional](https://github.com/emiaj0978/Bodega-Tang/blob/main/frontend/imagen/image2.png)

---

## Cardinalidades

| Entidad A | Relación | Entidad B | Cardinalidad |
|---|---|---|---|
| PROVEEDOR | suministra | PRODUCTO | 1:N |
| CLIENTE | realiza | VENTA | 1:N |

PROVEEDOR — PRODUCTO (1:N)  
Un proveedor puede tener muchos productos, pero un producto pertenece a un solo proveedor.

CLIENTE — VENTA (1:N)  
Un cliente puede realizar muchas compras, pero cada venta pertenece a un solo cliente.

---

## Modelo SQL

```sql

CREATE DATABASE bodega_tang;
USE bodega_tang;

-- =========================
-- TABLA CARGO
-- =========================
CREATE TABLE cargo (
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cargo VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- TABLA EMPLEADO
-- =========================
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- TABLA USUARIO (COMO EL PROFE)
-- =========================
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    roles ENUM('admin', 'superadmin') DEFAULT 'admin',
    nombre_usuario VARCHAR(150) NOT NULL,
    clave VARCHAR(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- TABLA ASISTENCIA
-- =========================
CREATE TABLE asistencia (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora_entrada TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    hora_salida TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado ENUM('asistio', 'tardanza', 'falto') DEFAULT 'falto',
    id_empleado INT NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- DATOS DE PRUEBA
-- =========================

INSERT INTO cargo (nombre_cargo) VALUES
('Administrador'),
('Vendedor'),
('Cajero');

INSERT INTO empleado (nombre, apellido, dni, celular, correo, id_cargo) VALUES
('Juan', 'Perez', '12345678', '987654321', 'juan@gmail.com', 1),
('Maria', 'Lopez', '87654321', '912345678', 'maria@gmail.com', 2);

INSERT INTO usuario (roles, nombre_usuario, clave) VALUES
('admin', 'admin', '1234'),
('superadmin', 'superadmin', '1234');

INSERT INTO asistencia (fecha, estado, id_empleado) VALUES
('2026-05-01', 'asistio', 1),
('2026-05-01', 'tardanza', 2);
```

---

## Como correr el proyecto
 
### Requisitos previos
- Tener instalado IntelliJ IDEA
- Tener instalado XAMPP (para MySQL)
- Tener instalado MySQL Workbench
- Tener instalado JDK 21 o superior
 
### Backend
1. Abrir la carpeta `backend/` en IntelliJ IDEA
2. Configurar `application.properties` con los datos de MySQL
3. Iniciar XAMPP y activar MySQL
4. Ejecutar `GotagotaApplication.java`
5. El backend corre en: `http://localhost:8080`
 
### Frontend
1. Abrir la carpeta `frontend/` en VsCode
2. Abrir `index.html` con Live Server
3. El frontend se comunica con el backend via fetch()
 
> El frontend y el backend corren por separado.
> El backend debe estar iniciado antes de abrir el frontend.
 
### Configuracion de base de datos
```
spring.application.name=gotagota
# CONEXION A MYSQL
spring.datasource.url=jdbc:mysql://localhost:3306/bodega_tang
spring.datasource.username=root
spring.datasource.password=
spring.datasource.driver-class-name=com.mysql.cj.jdbc.Driver

#JPA / HIBERNATE
spring.jpa.hibernate.ddl-auto=update
spring.jpa.show-sql=true
spring.jpa.properties.hibernate.dialect=org.hibernate.dialect.MySQLDialect

# Puerto del servidor
server.port=8080

```
 
