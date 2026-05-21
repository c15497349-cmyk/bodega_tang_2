## TRELLO
mi tablero de trello
![TRELLO](https://github.com/emiaj0978/Bodega-Tang/blob/main/frontend/imagen/image.png)

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

create database bodega_tang
USE bodega_tang;

-- TABLA EMPLEADOS
CREATE TABLE empleados (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    cargo VARCHAR(100)
);

-- TABLA ASISTENCIAS
CREATE TABLE asistencias (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    estado VARCHAR(50),
    id_empleado INT,
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado)
);

INSERT INTO empleados (nombre, cargo) VALUES
('Juan Perez', 'Cajero'),
('Maria Lopez', 'Vendedora'),
('Carlos Reategui', 'Administrador');

INSERT INTO asistencias (fecha, estado, id_empleado) VALUES
('2026-05-01', 'Presente', 1),
('2026-05-01', 'Tarde', 2),
('2026-05-01', 'Falta', 3);



CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(50) DEFAULT 'usuario',
    estado TINYINT(1) DEFAULT 1
);

INSERT INTO usuarios (nombre, usuario, password, rol)
VALUES 
('Carlos Reategui', 'admin', '1234', 'Administrador');
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
 
