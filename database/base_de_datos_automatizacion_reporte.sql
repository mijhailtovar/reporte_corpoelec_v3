/*
27/5/2025   MIJHAIL TOVAR
DISEÑO DE LA BASE DE DATOS PARA UN SISTEMA AUTOMATIZADOR PARA
LOS REPORTES DEL PLAN ESPECIAL DE PROTECCION DE CORPOELEC
DEL ESTADO ARAGUA
*/

CREATE DATABASE IF NOT EXISTS reporte_corpoelec;
USE reporte_corpoelec;

CREATE TABLE subestacion(
id              int(255) auto_increment not null,
nombre          varchar(255) not null,
CONSTRAINT pk_subestacion PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO subestacion VALUES(NULL, 'SE La Horqueta');
INSERT INTO subestacion VALUES(NULL, 'SE Aragua');
INSERT INTO subestacion VALUES(NULL, 'SE Mácaro');
INSERT INTO subestacion VALUES(NULL, 'SE Tiara');
INSERT INTO subestacion VALUES(NULL, 'SE Soco');
INSERT INTO subestacion VALUES(NULL, 'SE Corinsa');
INSERT INTO subestacion VALUES(NULL, 'SE Villa de Cura II');
INSERT INTO subestacion VALUES(NULL, 'SE San Ignacio');
INSERT INTO subestacion VALUES(NULL, 'SE Morita');
INSERT INTO subestacion VALUES(NULL, 'SE San Jacinto');


CREATE TABLE linea_de_transmision(
id                  int(255) auto_increment not null,
id_subestacion      int(255) not null,
nombre              varchar(255) not null,
anillo              int(225) not null, /*CAMBIO*/
CONSTRAINT pk_linea_de_transmision PRIMARY KEY(id),
CONSTRAINT fk_linea_de_transmision_subestacion FOREIGN KEY(id_subestacion) REFERENCES subestacion(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE reporte(
id                  int(255) auto_increment not null,
id_linea_de_transmision      int(255) not null,
fecha               date not null,
numero_de_permiso   varchar(255) not null,
observaciones       varchar(255), /*cambio en la version 2*/
hora_creacion       TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_reporte PRIMARY KEY(id),
CONSTRAINT fk_reporte_linea_de_transmision FOREIGN KEY(id_linea_de_transmision) REFERENCES linea_de_transmision(id) ON DELETE CASCADE
)ENGINE=InnoDb;


/*Horqueta*/
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Arenosa I 400 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Arenosa II 400 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Aragua I 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Aragua II 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Macaro I 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Macaro II 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Tiara 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Diego de Lozada 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Calabozo I 230 kV', 1);
INSERT INTO linea_de_transmision VALUES(NULL, 1, 'Calabozo II 230 kV', 1);
/*Aragua*/
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Santa Teresa 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Horqueta I 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Horqueta II 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Arenosa I 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Arenosa II 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Palo Negro 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Cagua 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Soco I 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Soco II 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Corinsa 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'Villa de Cura II 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'San Ignacio I 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 2, 'San Ignacio II 115 kV', 2);
/*Macaro*/
INSERT INTO linea_de_transmision VALUES(NULL, 3, 'San Diego 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 3, 'Caña de Azúcar 230 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 3, 'Morita I 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 3, 'Morita II 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 3, 'San Ignacio I 115 kV', 2);
INSERT INTO linea_de_transmision VALUES(NULL, 3, 'San Ignacio II 115 kV', 2);
/*Tiara*/
INSERT INTO linea_de_transmision VALUES(NULL, 4, 'Diego de Lozada 230 kV', 2);
/*Soco*/
INSERT INTO linea_de_transmision VALUES(NULL, 5, 'Victoria 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 5, 'Tejerías 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 5, 'Conduven 115 kV', 3);
/*Corinsa*/
INSERT INTO linea_de_transmision VALUES(NULL, 6, 'Villa de Cura II 115 kV', 3);
/*Villa de cura II*/
INSERT INTO linea_de_transmision VALUES(NULL, 7, 'San Juan I 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 7, 'San Juan II 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 7, 'Villa de Cura I-1 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 7, 'Villa de Cura I-2 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 7, 'Corinsa 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 7, 'Aragua II 115 kV', 3);
/*San ignacio*/
INSERT INTO linea_de_transmision VALUES(NULL, 8, 'José Félix Ribas I 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 8, 'José Félix Ribas II 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 8, 'Aragua I 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 8, 'Aragua II 115 kV', 3);
/*Morita*/
INSERT INTO linea_de_transmision VALUES(NULL, 9, 'San Jacinto 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 9, 'San Vicente 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 9, 'Mácaro I 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 9, 'Mácaro II 115 kV', 3);
/*San Jacinto*/
INSERT INTO linea_de_transmision VALUES(NULL, 10, 'Delicias 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 10, 'Morita 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 10, 'Mácaro I 115 kV', 3);
INSERT INTO linea_de_transmision VALUES(NULL, 10, 'Mácaro II 115 kV', 3);



CREATE TABLE proteccion(
id                           int(255) auto_increment not null,
id_linea_de_transmision      int(255) not null,
nombre                       varchar(255) not null,
marca                        varchar(255) not null,
modelo                       varchar(255) not null, /*cambio en la version 2 se elimininan las observaciones*/
CONSTRAINT pk_proteccion PRIMARY KEY(id),
CONSTRAINT fk_proteccion_linea_de_transmision FOREIGN KEY(id_linea_de_transmision) REFERENCES linea_de_transmision(id) ON DELETE CASCADE
)ENGINE=InnoDb;

/*INSERT INTO proteccion VALUES(NULL, 2, )*/

CREATE TABLE interruptor(
id                  int(255) auto_increment not null,
id_proteccion       int(255) not null,
nombre              varchar(255) not null,
fecha               date not null, /*CAMBIO V2*/
hora_creacion       TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_interruptor PRIMARY KEY(id),
CONSTRAINT fk_interruptor_proteccion FOREIGN KEY(id_proteccion) REFERENCES proteccion(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE bobina(
id                  int(255) auto_increment not null,
id_proteccion       int(255) not null,
disparo             boolean, /*sinonimo de tiny int 0 es falso cualquier valor distinto de 0 es true*/
fecha               date not null, /*CAMBIO V2*/
hora_creacion       TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_bobina PRIMARY KEY(id),
CONSTRAINT fk_bobina_proteccion FOREIGN KEY(id_proteccion) REFERENCES proteccion(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE funcion_recepcion(
id                  int(255) auto_increment not null,
id_proteccion       int(255) not null,
nombre              varchar(255) not null,
recepcion           boolean,
fecha               date not null, /*CAMBIO V2*/
hora_creacion       TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_funcion_recepcion PRIMARY KEY(id),
CONSTRAINT fk_funcion_recepcion_proteccion FOREIGN KEY(id_proteccion) REFERENCES proteccion(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE DDT_recepcion(
id                       int(255) auto_increment not null,
id_proteccion            int(255) not null,
recepcion                boolean, /*sinonimo de tiny int 0 es falso cualquier valor distinto de 0 es true*/
fecha                    date not null, /*CAMBIO V2*/
hora_creacion       TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_DDT_recepcion PRIMARY KEY(id),
CONSTRAINT fk_DDT_recepcion_proteccion FOREIGN KEY(id_proteccion) REFERENCES proteccion(id) ON DELETE CASCADE
)ENGINE=InnoDb;


CREATE TABLE funcion_envio(
id                  int(255) auto_increment not null,
id_proteccion       int(255) not null,
nombre              varchar(255) not null,
envio               boolean,
fecha               date not null, /*CAMBIO V2*/
hora_creacion       TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_funcion_envio PRIMARY KEY(id),
CONSTRAINT fk_funcion_envio_proteccion FOREIGN KEY(id_proteccion) REFERENCES proteccion(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE DDT_envio(
id                       int(255) auto_increment not null,
id_proteccion           int(255) not null,
envio                    boolean, /*sinonimo de tiny int 0 es falso cualquier valor distinto de 0 es true*/
fecha                    date not null, /*CAMBIO V2*/
hora_creacion           TIMESTAMP DEFAULT CURRENT_TIMESTAMP(), /*cambio en la version 3*/
CONSTRAINT pk_DDT_envio PRIMARY KEY(id),
CONSTRAINT fk_DDT_envio_proteccion FOREIGN KEY(id_proteccion) REFERENCES proteccion(id) ON DELETE CASCADE
)ENGINE=InnoDb;


