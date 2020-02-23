CREATE DATABASE Libreria_BIT;
USE Libreria_BIT;

CREATE TABLE tb_autores(
	id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nom_autor VARCHAR(50),
    apell_autor VARCHAR(50),
    fec_cre DATETIME DEFAULT NOW()
);

CREATE TABLE tb_img_autor(
	id_img_autor INT AUTO_INCREMENT PRIMARY KEY,
    nom_archivo_subido TEXT,
    nom_archivo_servidor TEXT,
    ruta TEXT,
    id_autor INT,
    fec_cre DATETIME DEFAULT NOW()
);


CREATE TABLE tb_categorias(
	id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nom_categoria VARCHAR(50),
    fec_cre DATETIME DEFAULT NOW()
);

CREATE TABLE tb_libros(
	id_libro INT AUTO_INCREMENT PRIMARY KEY,
    id_autor INT,
    nom_libro TEXT,
    descripcion TEXT,
    valor FLOAT,
    fec_publicacion DATE,
    id_categoria INT,
    fec_cre DATETIME DEFAULT NOW(),
    id_usuario_cre INT
);

CREATE TABLE tb_img_libro(
	id_img_libro INT AUTO_INCREMENT PRIMARY KEY,
    id_libro INT,
    nom_archivo_subido TEXT,
    nom_archivo_servidor TEXT,
    ruta TEXT,
    principal BOOLEAN,
    fec_cre DATETIME DEFAULT NOW()
);

CREATE TABLE tb_calificacion_libro(
	id_calificacion_libro INT AUTO_INCREMENT PRIMARY KEY,
    id_libro INT,
    calificacion FLOAT
);

CREATE TABLE tb_comentarios(
	id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    id_libro INT,
    comentario TEXT,
    fec_cre DATETIME DEFAULT NOW()
);

CREATE TABLE tb_perfil(
	id_perfil INT AUTO_INCREMENT PRIMARY KEY,
    nom_perfil VARCHAR(50)
);

CREATE TABLE tb_usuario(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nom_usuario VARCHAR(50),
    apell_usuario VARCHAR(50),
    correo TEXT,
    pass LONGTEXT,
    id_perfil INT
);






ALTER TABLE tb_libros ADD FOREIGN KEY (id_usuario_cre) REFERENCES tb_usuario(id_usuario);
ALTER TABLE tb_img_autor ADD FOREIGN KEY (id_autor) REFERENCES tb_autores(id_autor);
ALTER TABLE tb_libros ADD FOREIGN KEY (id_autor) REFERENCES tb_autores(id_autor);
ALTER TABLE tb_libros ADD FOREIGN KEY (id_categoria) REFERENCES tb_categorias(id_categoria);
ALTER TABLE tb_img_libro ADD FOREIGN KEY (id_libro) REFERENCES tb_libros(id_libro);
ALTER TABLE tb_calificacion_libro ADD FOREIGN KEY (id_libro) REFERENCES tb_libros(id_libro);
ALTER TABLE tb_comentarios ADD FOREIGN KEY (id_libro) REFERENCES tb_libros(id_libro);
ALTER TABLE tb_usuario ADD FOREIGN KEY (id_perfil) REFERENCES tb_perfil(id_perfil);



INSERT INTO tb_autores (nom_autor, apell_autor) VALUES ('García Martín', 'José Luis');
INSERT INTO tb_autores (nom_autor, apell_autor) VALUES ('Guía', 'Campsa');
INSERT INTO tb_autores (nom_autor, apell_autor) VALUES ('GGutiérrez Solana','Jose');
INSERT INTO tb_autores (nom_autor, apell_autor) VALUES ('Guy Verhofstadt','Daniel Cohn-Bendit Y');

INSERT INTO tb_img_autor (nom_archivo_subido, nom_archivo_servidor, ruta, id_autor) VALUES ('Captura.jpg', '8596532025263.jpg', 'img_libros/id_libro1/8596532025263.jpg', 1);
INSERT INTO tb_img_autor (nom_archivo_subido, nom_archivo_servidor, ruta, id_autor) VALUES ('asdadsa.jpg', '9874582365963.jpg', 'img_libros/id_libro1/9874582365963.jpg', 2);
INSERT INTO tb_img_autor (nom_archivo_subido, nom_archivo_servidor, ruta, id_autor) VALUES ('algo.jpg', '564523434245.jpg', 'img_libros/id_libro1/525115151551.jpg', 1);
INSERT INTO tb_img_autor (nom_archivo_subido, nom_archivo_servidor, ruta, id_autor) VALUES ('algoMas.jpg', '525115151345345345551.jpg', 'img_libros/id_libro1/525115151345345345551.jpg', 4);

INSERT INTO tb_categorias(nom_categoria) VALUES('Infantil');
INSERT INTO tb_categorias(nom_categoria) VALUES('Comedia');
INSERT INTO tb_categorias(nom_categoria) VALUES('Drama');
INSERT INTO tb_categorias(nom_categoria) VALUES('Romantica');
INSERT INTO tb_categorias(nom_categoria) VALUES('Terror');
INSERT INTO tb_categorias(nom_categoria) VALUES('Cronica');

INSERT INTO tb_perfil (nom_perfil) VALUES ('Administrador');
INSERT INTO tb_perfil (nom_perfil) VALUES ('Usuario');

INSERT INTO tb_usuario (nom_usuario,apell_usuario,correo,pass,id_perfil) VALUES('Camilo','Davila', 'camilo7davila@gmail.com', 'rossesal', 1);
INSERT INTO tb_usuario (nom_usuario,apell_usuario,correo,pass,id_perfil) VALUES('Nicolas','Martin', 'nicolas@gmail.com', 'contrasena', 1);
INSERT INTO tb_usuario (nom_usuario,apell_usuario,correo,pass,id_perfil) VALUES('Miguel', 'Nieto', 'migustanieto.2@gmail.com', '4186', 1);
INSERT INTO tb_usuario (nom_usuario,apell_usuario,correo,pass,id_perfil) VALUES('Christian', 'Bravo', 'christianm.bravop@gmail.com', '12345',1);
INSERT INTO tb_usuario (nom_usuario,apell_usuario,correo,pass,id_perfil) VALUES('David', 'Martinez', 'ddmamapi@gmail.com','1234', 1);

INSERT INTO tb_libros (id_autor, nom_libro, valor, fec_publicacion, id_categoria, id_usuario_cre, descripcion) VALUES(1, 'Mi lucha', 35000, '1998-12-20', 1, 3,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');
INSERT INTO tb_libros (id_autor, nom_libro, valor, fec_publicacion, id_categoria, id_usuario_cre, descripcion) VALUES(2, 'Jaimito el cartero', 20000, '2015-05-20', 4, 2,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');
INSERT INTO tb_libros (id_autor, nom_libro, valor, fec_publicacion, id_categoria, id_usuario_cre, descripcion) VALUES(3, 'wigetta', 60000, '2013-01-12', 1, 5,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');

INSERT INTO tb_img_libro (id_libro, nom_archivo_subido, nom_archivo_servidor, ruta) VALUES (1,'asdadsa.jpg','989656323.jpg','img_libros/id_libro1/989656323.jpg');
INSERT INTO tb_img_libro (id_libro, nom_archivo_subido, nom_archivo_servidor, ruta) VALUES (2,'captura.png','963547412358.png','img_libros/id_libro1/963547412358.png');
INSERT INTO tb_img_libro (id_libro, nom_archivo_subido, nom_archivo_servidor, ruta) VALUES (1,'libro.JPG','988563258562.JPG','img_libros/id_libro1/988563258562.JPG');

INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 5);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 4);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 3);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 4);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 5);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 2);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 4);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 4);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (1, 5);

INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (2, 5);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (2, 4);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (2, 3);
INSERT INTO tb_calificacion_libro (id_libro, calificacion) VALUES (2, 5);

INSERT INTO tb_comentarios (id_libro, comentario) VALUES (1,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');
INSERT INTO tb_comentarios (id_libro, comentario) VALUES (1,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');
INSERT INTO tb_comentarios (id_libro, comentario) VALUES (2,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');
INSERT INTO tb_comentarios (id_libro, comentario) VALUES (3,'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur');





