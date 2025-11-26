CREATE DATABASE BD_CONTACTOS;

USE BD_CONTACTOS;

CREATE TABLE USUARIO
(
    USU_CVE 				INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ROL_CVE 				INT NOT NULL,
    USU_NOMBRE 				NVARCHAR(50) NOT NULL,
    USU_APEP	 			NVARCHAR(50) NOT NULL,
    USU_APEM		 		NVARCHAR(50) DEFAULT NULL,
    USU_USUARIO 			NVARCHAR(50) NOT NULL,
    USU_TELEFONO			NVARCHAR(50) NOT NULL,
	USU_FOTO				NVARCHAR(250) DEFAULT NULL,
    USU_ESTATUS				INT,
    USU_FECHA_REG 			TIMESTAMP
);

CREATE TABLE ROL (
    ROL_CVE			 	INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ROL_DESCRIPCION 	NVARCHAR(100),
    ROL_PERMISOS 		NVARCHAR(250),
    ROL_FECHA_REGI 		TIMESTAMP
);

CREATE TABLE PRODUCTO (
  PRO_ID			INT(11) 	NOT NULL PRIMARY KEY AUTO_INCREMENT,
  USU_CVE	  		INT(11) 	NOT NULL,
  PRO_NOMBRE 		VARCHAR(45) NOT NULL,
  PRO_DESCRIPCION 	VARCHAR(255) DEFAULT NULL,
  PRO_PRECIO 		INT(11) 	NOT NULL,
  PRO_CANTIDAD 		INT(11) 	NOT NULL,
  PRO_ACTIVO 		INT(4) 		NOT NULL,
  PRO_FOTO 			VARCHAR(255) DEFAULT NULL,
  PRO_FECHA_REG		TIMESTAMP NOT NULL
);

INSERT INTO ROL values(null,'Administrador','Todos',now());
INSERT INTO ROL values(null,'Supervisor','Algunos',now());
INSERT INTO ROL values(null,'Operativo','Algunos',now());

INSERT INTO USUARIO values(null,1,'Mario','Batali','Ferrusco','mbatali','7710000000','imagenes/usuarios/1.jpg',1,now());
INSERT INTO USUARIO values(null,2,'Cat','Cora','James','ccora','7710000000','imagenes/usuarios/2.jpg',1,now());

INSERT INTO PRODUCTO VALUES
(NULL,1, 'Burrito', 'Rellenos de queso cheddar y chorizo', 25, 15, 1, 'imagenes/productos/burrito.jpg',NOW()),
(NULL,2, 'Tacos', 'Pastor y Bistec', 12, 25, 1, 'imagenes/productos/taco.jpg',NOW()),
(NULL,1, 'papas', 'de chipotle y con sal', 10, 6, 1, 'imagenes/productos/papas.jpg',NOW()),
(NULL,2, 'Burriti', 'Campechano ', 18, 7, 0, 'imagenes/productos/La.png',NOW()),
(NULL,1, 'Chilaquiles', 'Muy sabrosos, ', 15, 9, 1, 'imagenes/productos/chilaquiles.jpg',NOW()),
(NULL,2, 'Refrescos', 'sabrosos', 11, 9, 1, 'imagenes/productos/refresco.jpg',NOW()),
(NULL,1, 'Chips mini', 'Frituras con chile y limon', 5, 7, 1, 'imagenes/productos/chip.jpg',NOW());

USE BD_CONTACTOS;

-- --------------------------------------------------------
-- 25 INSERTS NUEVOS PARA LA TABLA PRODUCTO
-- --------------------------------------------------------
INSERT INTO PRODUCTO (USU_CVE, PRO_NOMBRE, PRO_DESCRIPCION, PRO_PRECIO, PRO_CANTIDAD, PRO_ACTIVO, PRO_FOTO, PRO_FECHA_REG) VALUES
(1, 'Gordita de Chicharrón', 'Chicharrón prensado en salsa roja', 25, 30, 1, 'imagenes/productos/gordita.jpg', NOW()),
(2, 'Pozole Blanco', 'Medio litro de pozole con carne de cerdo', 55, 15, 1, 'imagenes/productos/pozole.jpg', NOW()),
(1, 'Tlacoyo de Haba', 'Masa azul rellena de haba', 20, 40, 1, 'imagenes/productos/tlacoyo.jpg', NOW()),
(2, 'Ensalada César', 'Lechuga, crutones, queso parmesano y pollo', 45, 12, 1, 'imagenes/productos/ensalada.jpg', NOW()),
(1, 'Mole Poblano', 'Platillo con pollo bañado en mole', 60, 10, 1, 'imagenes/productos/mole.jpg', NOW()),
(2, 'Agua de Horchata', 'Bebida fresca de arroz y canela', 18, 50, 1, 'imagenes/productos/horchata.jpg', NOW()),
(1, 'Sopes de Pastor', 'Base de maíz con frijoles, queso y pastor', 30, 25, 1, 'imagenes/productos/sopes.jpg', NOW()),
(2, 'Guacamole', 'Aguacate machacado con tomate y cebolla', 35, 20, 1, 'imagenes/productos/guacamole.jpg', NOW()),
(1, 'Churros Rellenos', 'Rellenos de cajeta o chocolate', 15, 35, 1, 'imagenes/productos/churros_rellenos.jpg', NOW()),
(2, 'Té Helado', 'Té negro con limón', 20, 30, 1, 'imagenes/productos/te_helado.jpg', NOW()),
(1, 'Milanesa de Res', 'Servida con arroz y papas fritas', 70, 8, 1, 'imagenes/productos/milanesa.jpg', NOW()),
(2, 'Huevos al Gusto', 'Revueltos, fritos o a la mexicana', 35, 18, 1, 'imagenes/productos/huevos.jpg', NOW()),
(1, 'Pescado Empanizado', 'Filete de pescado empanizado', 65, 9, 1, 'imagenes/productos/pescado.jpg', NOW()),
(2, 'Pan Dulce', 'Concha de chocolate o vainilla', 10, 40, 1, 'imagenes/productos/pan_dulce.jpg', NOW()),
(1, 'Salsa Picante', 'Adicional de salsa de habanero', 5, 100, 1, 'imagenes/productos/salsa.jpg', NOW()),
(2, 'Frijoles Refritos', 'Porción individual', 12, 30, 1, 'imagenes/productos/frijoles.jpg', NOW()),
(1, 'Arroz Rojo', 'Guarnición de arroz a la mexicana', 15, 25, 1, 'imagenes/productos/arroz.jpg', NOW()),
(2, 'Jericalla', 'Postre tradicional tipo flan', 28, 15, 1, 'imagenes/productos/jericalla.jpg', NOW()),
(1, 'Costillas BBQ', 'Costillas de cerdo en salsa BBQ', 85, 6, 1, 'imagenes/productos/costillas.jpg', NOW()),
(2, 'Caldo de Pollo', 'Caldo con verduras y pollo deshebrado', 40, 14, 1, 'imagenes/productos/caldo.jpg', NOW()),
(1, 'Elote Entero', 'Con mayonesa, queso y chile', 25, 20, 1, 'imagenes/productos/elote.jpg', NOW()),
(2, 'Tostada de Pata', 'Pata de res en vinagre sobre tostada', 30, 17, 1, 'imagenes/productos/tostada_pata.jpg', NOW()),
(1, 'Queso Fundido', 'Con chorizo o champiñones', 50, 11, 1, 'imagenes/productos/queso_fundido.jpg', NOW()),
(2, 'Buñuelo con Miel', 'Frito y bañado en miel de piloncillo', 22, 13, 1, 'imagenes/productos/buñuelo.jpg', NOW()),
(1, 'Taco de Sal', 'Sólo tortilla y sal', 5, 50, 1, 'imagenes/productos/tacosal.jpg', NOW()); 
-- -----------------------------------------------------------------------
-- -----------------------------------------------------------------------
-- CONSULTAS SQL

-- Menu
CREATE ALGORITHM = UNDEFINED
SQL SECURITY DEFINER
VIEW `vwCartaPedidos` AS
SELECT
    A.PRO_ID AS clave,
    A.PRO_NOMBRE AS nombre,
    A.PRO_DESCRIPCION AS descripcion,
    A.PRO_CANTIDAD AS existencias,
    A.PRO_PRECIO AS precio,
    A.PRO_FOTO AS foto,
    CONCAT(
        B.USU_NOMBRE,
        ' ',
        B.USU_APEP
    ) AS usuario_creador,
    B.USU_USUARIO AS alias_usuario
FROM
    PRODUCTO A
JOIN
    USUARIO B ON A.USU_CVE = B.USU_CVE;

-- productos destacados

CREATE ALGORITHM = UNDEFINED
SQL SECURITY DEFINER
VIEW `destacado` AS
SELECT
    PRO_ID AS clave,
    PRO_NOMBRE AS nombre,
    PRO_DESCRIPCION AS descripcion,
    PRO_PRECIO AS precio,
    PRO_FOTO AS foto
FROM
    PRODUCTO
WHERE
    PRO_NOMBRE = 'Taco de Sal';
    
-- mostrar producto
Delimiter //
CREATE PROCEDURE `spMostrarProductos`(IN cveProducto INT)
BEGIN
    SELECT
        A.PRO_ID AS CLAVE,
        A.USU_CVE AS CVE_USU,
        A.PRO_NOMBRE AS PRODUCTO,
        A.PRO_PRECIO AS COSTO,
        A.PRO_FOTO AS FOTO_PRO,
        A.PRO_DESCRIPCION AS DESCRIPCION,
        CONCAT(B.USU_NOMBRE, ' ', B.USU_APEP, IFNULL(CONCAT(' ', B.USU_APEM), '')) AS USUARIO,
        B.USU_USUARIO AS ALIAS,
        B.USU_TELEFONO AS TELEFONO,
        B.USU_FOTO AS FOTO
    FROM PRODUCTO A
    INNER JOIN USUARIO B ON A.USU_CVE = B.USU_CVE
    WHERE A.PRO_ID = cveProducto;
END//
Delimiter ;

