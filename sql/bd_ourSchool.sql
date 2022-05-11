USE bd_ourschool;

CREATE TABLE tbl_usuario(
    id_usuario int(11) NOT NULL PRIMARY KEY auto_increment,
    nombre_usuario varchar(15) NOT NULL,
    correo_usuario varchar(30) NOT NULL,
    contra_usuario char(8) NULL

);

CREATE TABLE tbl_actividad(
    id_actividad int(4) NOT NULL PRIMARY KEY auto_increment,
    nombre_actividad varchar(30) NULL,
    desc_actividad varchar(120) NULL,
    foto_actividad varchar (50) NULL,
    opcion_actividad varchar (50) NULL,
    topic varchar (50) NULL,
    usuario_fk int(11) NOT NUll

);

CREATE TABLE tbl_actividad_like(
    id_act_like int(4) NOT NULL PRIMARY KEY auto_increment,
    usuario_fk2 int(11) NOT NULL,
    actividad_fk int(4) NOT NULL
);


ALTER TABLE tbl_actividad
ADD CONSTRAINT nombre_usuario_fk FOREIGN KEY (usuario_fk)
REFERENCES tbl_usuario (id_usuario);

ALTER TABLE tbl_actividad_like
ADD CONSTRAINT nombre_usuario_fk2 FOREIGN KEY (usuario_fk2)
REFERENCES tbl_usuario (id_usuario);

ALTER TABLE tbl_actividad_like
ADD CONSTRAINT id_actividad_fk FOREIGN KEY (actividad_fk)
REFERENCES tbl_actividad (id_actividad);