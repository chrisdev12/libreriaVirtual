CREATE DATABASE Libreria_BIT;
USE Libreria_BIT;
use test;

CREATE TABLE tb_autores(
	id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nom_autor VARCHAR(50),
    apell_autor VARCHAR(50),
    fec_cre DATETIME DEFAULT NOW(),
    id_usuario_cre INTEGER
);

CREATE TABLE tb_img_autor(
	id_img_autor INT AUTO_INCREMENT PRIMARY KEY,
    nom_archivo_subido TEXT,
    nom_archivo_servidor TEXT,
    ruta TEXT,
    id_autor INT,
    fec_cre DATETIME DEFAULT NOW(),
    id_usuario_cre INTEGER
);

CREATE TABLE tb_categorias(
	id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nom_categoria VARCHAR(50),
    fec_cre DATETIME DEFAULT NOW(),
    id_usuario_cre INTEGER
);

CREATE TABLE tb_libros(
	id_libro INT AUTO_INCREMENT PRIMARY KEY,
    id_autor INT,
    nom_libro TEXT,
    descripcion TEXT,
    valor FLOAT,
    fec_publicacion DATE,
    id_categoria INT /*TABLA APARTE?*/,
    fec_cre DATETIME DEFAULT NOW(),
    id_usuario_cre INTEGER
);

CREATE TABLE tb_img_libro(
	id_img_libro INT AUTO_INCREMENT PRIMARY KEY,
    id_libro INT,
    nom_archivo_subido TEXT,
    nom_archivo_servidor TEXT UNIQUE,
    ruta TEXT,
    fec_cre DATETIME DEFAULT NOW(),
    id_usuario_cre INTEGER
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
    pass LONGTEXT
);

CREATE TABLE tb_usuario_perfil(
	id_usuario_perfil INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_perfil INT
);


/*llaves foraneas de usuarios creadores*/
ALTER TABLE tb_autores ADD FOREIGN KEY (id_usuario_cre) REFERENCES tb_usuario(id_usuario);
ALTER TABLE tb_img_autor ADD FOREIGN KEY (id_usuario_cre) REFERENCES tb_usuario(id_usuario);
ALTER TABLE tb_categorias ADD FOREIGN KEY (id_usuario_cre) REFERENCES tb_usuario(id_usuario);
ALTER TABLE tb_libros ADD FOREIGN KEY (id_usuario_cre) REFERENCES tb_usuario(id_usuario);
ALTER TABLE tb_img_libro ADD FOREIGN KEY (id_usuario_cre) REFERENCES tb_usuario(id_usuario);


ALTER TABLE tb_img_autor ADD FOREIGN KEY (id_autor) REFERENCES tb_autores(id_autor);
ALTER TABLE tb_libros ADD FOREIGN KEY (id_autor) REFERENCES tb_autores(id_autor);
ALTER TABLE tb_libros ADD FOREIGN KEY (id_categoria) REFERENCES tb_categorias(id_categoria);
ALTER TABLE tb_img_libro ADD FOREIGN KEY (id_libro) REFERENCES tb_libros(id_libro);
ALTER TABLE tb_calificacion_libro ADD FOREIGN KEY (id_libro) REFERENCES tb_libros(id_libro);
ALTER TABLE tb_comentarios ADD FOREIGN KEY (id_libro) REFERENCES tb_libros(id_libro);
ALTER TABLE tb_usuario_perfil ADD FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario);
ALTER TABLE tb_usuario_perfil ADD FOREIGN KEY (id_perfil) REFERENCES tb_perfil(id_perfil);




















