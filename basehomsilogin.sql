
create database proyectohomsi;

use proyectohomsi;

create table usuarios(

id_user integer primary key not null,

email_user varchar(120),

rol varchar(40),

pasword varchar(120),

pasword_temp varchar(120),

estado integer);

CREATE TABLE TB_accidente (
  ID_Acci INTEGER  NOT NULL AUTO_INCREMENT,
  Acc_Fecha DATE NULL,
  Acc_Desc VARCHAR(100) NULL,
  PRIMARY KEY(ID_Acci)
);

INSERT INTO TB_accidente VALUES (745,"2018/02/22","caida en las escaleras"),
                                (324,"2017/10/10","fractura de brazo izquierdo"),
                                (785,"2019/01/22","atropellamiento por traspaleta"),
                                (963,"2019/05/05","caida por estibas"),
                                (1478,"2019/06/10","cortada por bisturi");

CREATE TABLE TB_Area (
  ID_Area INTEGER NOT NULL AUTO_INCREMENT,
  TB_Empleados_ID_Empleado INTEGER NOT NULL,
  Are_Nom VARCHAR(20) NULL,
  PRIMARY KEY(ID_Area),
  INDEX TB_Area_FKIndex1(TB_Empleados_ID_Empleado)
);

INSERT INTO TB_Area VALUES (09,107564113,"PICKING"),
					       (70,107315487,"CROSS DOCKING");



CREATE TABLE TB_Area_tiene_Tb_Con_Ins (
  TB_Area_ID_Area VARCHAR(100) NOT NULL,
  Tb_Con_Ins_ID_Con_ins VARCHAR(100) NOT NULL,
  PRIMARY KEY(TB_Area_ID_Area, Tb_Con_Ins_ID_Con_ins),
  INDEX TB_Area_has_Tb_Con_Ins_FKIndex1(TB_Area_ID_Area),
  INDEX TB_Area_has_Tb_Con_Ins_FKIndex2(Tb_Con_Ins_ID_Con_ins)
);

INSERT INTO TB_Area_tiene_Tb_Con_Ins  VALUES ("PICKING","EN EL AREA DE PICKING"),
                                             ("CROSS DOCKING","EN LOS BAÑOS PISO MOJADO");


CREATE TABLE Tb_Con_Ins (
  ID_Con_ins INTEGER NOT NULL AUTO_INCREMENT,
  Con_Nombre VARCHAR(20) NULL,
  Con_Desc VARCHAR(100) NULL,
  Con_img VARCHAR(50) NULL,
  Con_Fecha DATE NULL,
  Con_estado VARCHAR (50),
  PRIMARY KEY(ID_Con_ins)
);


INSERT INTO Tb_Con_Ins VALUES (54,"PICKING","EN EL AREA DE PICKING","JPG","2016/06/22","EN PROCESO"),
                                (78,"BAÑOS","EN LOS BAÑOS PISO MOJADO","JPG","2015/05/06","EN PROCESO"),
                                (12,"DESPACHOS","EN EL AREA DE DESPACHOS","JPG","2016/07/21","SOLUCIONADO"),
                                (79,"CAFETERIA","EN LA CAFETERIA HAY UN CABLE PELADO","GIF","2010/11/06","EN PROCESO"),
                                (15,"zona B","EN EL PASILLO 34 DE LA ZONA B","JPG","2010/12/07","SOLUCIONADO");


CREATE TABLE TB_Empleados (
  ID_Empleado INTEGER NOT NULL AUTO_INCREMENT,
  Emp_Nombre VARCHAR(20) NOT NULL,
  Emp_Apellido VARCHAR(20) NOT NULL,
  Emp_Correo VARCHAR(50) NOT NULL,
  Emp_telefono long NOT NULL,
  PRIMARY KEY(ID_Empleado)
);

describe TB_Empleados;
select *from TB_Empleados;
INSERT INTO TB_Empleados VALUES (107564113,"Camilo","Varela","camilitoteamo@hotmail.com",3125293588),
                                (107315487,"El brayan","Cardenas","brayannell@gmail.com",3123457896),
                                (104578965,"Jose","Manuel","josemanuel@gmail.com",3187416975),
                                (103045789,"Diana","Cuellar","dianacuellar1985@outlook.com",3226854123),
                                (103045790,"Carlos","Rodriguez","carlosrodriguez64@hotmail.com",3135698574);

CREATE TABLE TB_Empleados_Supervisa_TB_Area (
  TB_Empleados_ID_Empleado INTEGER NOT NULL,
  TB_Area_ID_Area VARCHAR(12) NOT NULL,
  PRIMARY KEY(TB_Empleados_ID_Empleado, TB_Area_ID_Area),
  INDEX TB_Empleados_has_TB_Area_FKIndex1(TB_Empleados_ID_Empleado),
  INDEX TB_Empleados_has_TB_Area_FKIndex2(TB_Area_ID_Area)
);



INSERT INTO TB_Empleados_Supervisa_TB_Area VALUES ("107564113",09),
                                                  ("107315487",09);



CREATE TABLE TB_Empleados_tiene_TB_accidente (
  TB_Empleados_ID_Empleado VARCHAR(12) NOT NULL,
  TB_accidente_ID_Acci VARCHAR(12) NOT NULL,
  PRIMARY KEY(TB_Empleados_ID_Empleado, TB_accidente_ID_Acci),
  INDEX TB_Empleados_has_TB_accidente_FKIndex1(TB_Empleados_ID_Empleado),
  INDEX TB_Empleados_has_TB_accidente_FKIndex2(TB_accidente_ID_Acci)
);



INSERT INTO TB_Empleados_tiene_TB_accidente VALUES ("107564113",795),
                                                      ("107315487",324);





CREATE TABLE TB_Empleados_tiene_TB_Incapacidad (
  TB_Empleados_ID_Empleado VARCHAR(12) NOT NULL,
  TB_Incapacidad_ID_inca VARCHAR(12) NOT NULL,
  PRIMARY KEY(TB_Empleados_ID_Empleado, TB_Incapacidad_ID_inca),
  INDEX TB_Empleados_has_TB_Incapacidad_FKIndex1(TB_Empleados_ID_Empleado),
  INDEX TB_Empleados_has_TB_Incapacidad_FKIndex2(TB_Incapacidad_ID_inca)
);



INSERT INTO TB_Empleados_tiene_TB_Incapacidad    VALUES ("107564113",95874),
                                                        ("107315487",97474);


CREATE TABLE TB_Incapacidad (
  ID_inca VARCHAR(12) NOT NULL,
  TB_accidente_ID_Acci VARCHAR(12) NOT NULL,
  Inc_fecha DATE NULL,
  Inc_Dias INTEGER UNSIGNED NULL,
  Inc_Tipo VARCHAR(20) NULL,
  PRIMARY KEY(ID_inca),
  INDEX TB_Incapacidad_FKIndex1(TB_accidente_ID_Acci)
);



INSERT INTO TB_Incapacidad VALUES ("95874","745821","2012/10/05",12,"ARL"),
                                  ("97474","745821","2014/10/05",10,"ARL"),
                                  ("98574","745821","2015/04/17",23,"EPS"),
                                  ("95964","745821","2009/02/05",20,"ARL"),
                                  ("84124","745821","2017/11/24",17,"EPS");


CREATE TABLE TB_Incidente (
  ID_Inc VARCHAR(12) NOT NULL,
  TB_Empleados_ID_Empleado VARCHAR(12) NOT NULL,
  Inc_Fecha DATE NULL,
  Inc_Descr VARCHAR(100) NULL, 
  PRIMARY KEY(ID_Inc),
  INDEX TB_Incidente_FKIndex1(TB_Empleados_ID_Empleado)
);

INSERT INTO TB_Incidente VALUES ("78451","745821","2016/06/06","escaleras"),
                                ("94197","745821","2012/04/06","ascensor"),
                                ("74125","745821","2011/12/14","patio"),
                                ("96521","745821","2014/11/22","piso"),
                                ("74126","745821","2011/11/05","oficina");




CREATE TABLE TB_Incidente_tiene_TB_Area (
  TB_Incidente_ID_Inc VARCHAR(12) NOT NULL,
  TB_Area_ID_Area VARCHAR(12) NOT NULL,
  PRIMARY KEY(TB_Incidente_ID_Inc, TB_Area_ID_Area),
  INDEX TB_Incidente_has_TB_Area_FKIndex1(TB_Incidente_ID_Inc),
  INDEX TB_Incidente_has_TB_Area_FKIndex2(TB_Area_ID_Area)
);



CREATE TABLE TB_Tipo_de_Incapacidad (
  Tipo_Id INTEGER PRIMARY KEY NOT NULL,
  Tipo_Nombre VARCHAR (10)
);




INSERT INTO TB_Tipo_de_Incapacidad VALUES (12121,"EPS"),
                                          (56565,"ARL"),
                                          (42858,"ARL"),
                                          (12728,"ARL"),
                                          (12757,"EPS");


CREATE TABLE Tb_Historico (
  ID_Con_ins VARCHAR(12) NOT NULL,
  Con_Nombre VARCHAR(20) NULL,
  Con_Desc VARCHAR(100) NULL,
  Con_img VARCHAR(50) NULL,
  Con_Fecha DATE NULL
);


INSERT INTO Tb_Historico VALUES ("5458714","CABLE SUELTO","EN EL AREA DE PICKING","JPG","2016/06/22"),
                                          ("4278831","PISO MOJADO","EN LOS BAÑOS PISO MOJADO","GIF","2015/05/06"),
                                          ("4786412","VALDOZA SUELTA","EN EL AREA DE DESPACHOS","GIF","2016/07/21"),
                                          ("4551236","CORTO ELECTRICO","EN LA CAFETERIA HAY UN CABLE PELADO","GIF","2010/11/06"),
                                          ("7896541","MONTACARGA ATRAVE","EN EL PASILLO 34 DE LA ZONA B","JPG","2016/12/07");


CREATE TABLE Tb_Soluciones (
  ID_Con_ins INTEGER NOT NULL,
  Solu_Nombre VARCHAR(20) NULL,
  Solu_Fecha DATE NULL  
);




INSERT INTO Tb_Soluciones VALUES (54,"ORDEN Y ASEO","2016/06/06"),
                                (45,"AVISO EMERGENTE","2012/04/06"),
                                (12,"USO DE CARGAS","2011/12/14"),
                                (79,"SISTEMAS ELECTRICO","2014/11/22"),
                                (15,"RETIRO ZONA B","2011/11/05");

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL,
  `fecha_de_ingreso` date
);


CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
);


ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

select * from tipo_usuario;

show tables;

