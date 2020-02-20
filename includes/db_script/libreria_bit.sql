-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 05:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria_bit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_autores`
--

CREATE TABLE `tb_autores` (
  `id_autor` int(11) NOT NULL,
  `nom_autor` varchar(50) DEFAULT NULL,
  `apell_autor` varchar(50) DEFAULT NULL,
  `fec_cre` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_autores`
--

INSERT INTO `tb_autores` (`id_autor`, `nom_autor`, `apell_autor`, `fec_cre`) VALUES
(1, 'Noah', 'Evans', '2020-02-20 08:45:12'),
(2, 'Brandon', 'Sanderson', '2020-02-20 08:45:12'),
(3, 'Jane', 'Austen', '2020-02-20 08:45:12'),
(4, 'Megan', 'Maxwell', '2020-02-20 08:45:12'),
(5, 'Nathalia', 'Tórtora', '2020-02-20 11:34:19'),
(6, 'García', 'Márquez', '2020-02-20 11:37:03'),
(7, 'George', 'R. R. Martin', '2020-02-20 11:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_calificacion_libro`
--

CREATE TABLE `tb_calificacion_libro` (
  `id_calificacion_libro` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `calificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_calificacion_libro`
--

INSERT INTO `tb_calificacion_libro` (`id_calificacion_libro`, `id_libro`, `calificacion`) VALUES
(1, 1, 5),
(2, 1, 4),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 2),
(7, 1, 4),
(8, 1, 4),
(9, 1, 5),
(10, 2, 5),
(11, 2, 4),
(12, 2, 3),
(13, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(50) DEFAULT NULL,
  `fec_cre` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nom_categoria`, `fec_cre`) VALUES
(1, 'Romance', '2020-02-20 08:45:12'),
(2, 'Ciencia Ficción', '2020-02-20 08:45:12'),
(3, 'Fantástico', '2020-02-20 08:45:12'),
(4, 'Infantil', '2020-02-20 08:45:12'),
(5, 'Drama', '2020-02-20 08:45:12'),
(6, 'Cronica', '2020-02-20 08:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fec_cre` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id_comentario`, `id_libro`, `comentario`, `fec_cre`) VALUES
(1, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '2020-02-20 08:45:12'),
(2, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '2020-02-20 08:45:12'),
(3, 2, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '2020-02-20 08:45:12'),
(4, 3, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '2020-02-20 08:45:12'),
(5, 1, 'Hello there', '2020-02-20 10:11:58'),
(6, 2, 'kqdjfdf', '2020-02-20 10:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_img_autor`
--

CREATE TABLE `tb_img_autor` (
  `id_img_autor` int(11) NOT NULL,
  `nom_archivo_subido` text DEFAULT NULL,
  `nom_archivo_servidor` text DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `fec_cre` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_img_autor`
--

INSERT INTO `tb_img_autor` (`id_img_autor`, `nom_archivo_subido`, `nom_archivo_servidor`, `ruta`, `id_autor`, `fec_cre`) VALUES
(1, 'Captura.jpg', '8596532025263.jpg', 'img_libros/id_libro1/8596532025263.jpg', 1, '2020-02-20 08:45:12'),
(2, 'asdadsa.jpg', '9874582365963.jpg', 'img_libros/id_libro1/9874582365963.jpg', 2, '2020-02-20 08:45:12'),
(3, 'algo.jpg', '564523434245.jpg', 'img_libros/id_libro1/525115151551.jpg', 1, '2020-02-20 08:45:12'),
(4, 'algoMas.jpg', '525115151345345345551.jpg', 'img_libros/id_libro1/525115151345345345551.jpg', 4, '2020-02-20 08:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_img_libro`
--

CREATE TABLE `tb_img_libro` (
  `id_img_libro` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `nom_archivo_subido` text DEFAULT NULL,
  `nom_archivo_servidor` text DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fec_cre` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_img_libro`
--

INSERT INTO `tb_img_libro` (`id_img_libro`, `id_libro`, `nom_archivo_subido`, `nom_archivo_servidor`, `ruta`, `fec_cre`) VALUES
(1, 1, 'asdadsa.jpg', '989656323.jpg', 'http://3.bp.blogspot.com/_NNDRGQHjT0M/SsPRhcPAIHI/AAAAAAAAJOA/F6UP2r2D3vs/s1600/111.jpg', '2020-02-20 08:45:12'),
(2, 2, 'captura.png', '963547412358.png', 'https://vignette.wikia.nocookie.net/teniaqueserlawikidelchavo/images/9/94/Jaimito.jpg/revision/latest?cb=20190816215309&path-prefix=es', '2020-02-20 08:45:12'),
(3, 3, 'libro.JPG', '988563258562.JPG', 'https://www.planetadelibros.com/usuaris/libros/fotos/175/m_libros/portada_wigetta_vegetta777_201604290747.jpg', '2020-02-20 08:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_libros`
--

CREATE TABLE `tb_libros` (
  `id_libro` int(11) NOT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `nom_libro` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `fec_publicacion` date DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fec_cre` datetime DEFAULT current_timestamp(),
  `id_usuario_cre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_libros`
--

INSERT INTO `tb_libros` (`id_libro`, `id_autor`, `nom_libro`, `descripcion`, `valor`, `fec_publicacion`, `id_categoria`, `fec_cre`, `id_usuario_cre`) VALUES
(1, 1, 'Invítame a soñar', 'Martina acaba de conseguir su primer trabajo en una gran empresa. Educada en una familia exigente, y con una formación brillante, deseaba poder demostrar que era capaz de ser independiente y conseguir sus logros por méritos propios. Sin embargo, el primer día de trabajo conoce a Héctor, director y dueño de la empresa, a pesar de ser tan solo unos años mayor que ella.\r\n\r\nEntonces Martina comprende que ninguno de sus estudios le servirán para el nuevo reto al que tiene que enfrentarse. Héctor ha conseguido el éxito en los negocios con tan solo veintinueve años. Tiene poder, dinero, y sus empleados y amigos lo veneran como a un dios. Piensa que puede conseguirlo todo en la vida, aunque a veces la responsabilidad le puede.\r\n\r\nPero en un aumento de su numerosa plantilla llega Martina, una joven brillante con un currículum prometedor que no tiene problemas en oponerse a sus superiores si lo cree oportuno. Una joven con una seguridad capaz de arrollar al propio Héctor y que se atreve a cuestionarlo como jefe si es necesario. Una mujer que no lo venera ni se deja impresionar por sus encantos. Invítame a soñar.', 35000, '2020-01-01', 1, '2020-02-20 08:45:12', 1),
(2, 2, 'Estelar', 'La continuación de Escuadrón, la nueva saga épica de Brandon Sanderson. Este es el segundo libro de una serie épica sobre una chica que guarda un secreto en un peligroso mundo en guerra por el futuro de la humanidad. En él continúan las aventuras de Spensa Nightshade, la joven piloto que ha conseguido un puesto en el escuadrón de defensa de la humanidad contra los ataques alienígenas.\r\n\r\nEn realidad, ella siempre quiso ser piloto: poder probar que es una heroína, como su padre. Y aunque llegó a lo más alto, los secretos que desenmascaró sobre su padre fueron aplastantes.\r\n\r\nLos rumores sobre su cobardía resultaron ciertos. Abandonó su vuelo durante la batalla contra los Krell. Peor aún# se volvió contra su equipo y los atacó. Sin embargo, Spensa está segura de que hay aún más por descubrir en esa historia. Y, si es necesario, viajará hasta el fin de la galaxia para salvar a la humanidad.', 20000, '2020-01-01', 2, '2020-02-20 08:45:12', 1),
(3, 3, 'Orgullo y prejuicio', 'Orgullo y prejuicio, es la obra que consagró a Jane Austen como la novelista del prerromanticismo inglés. Charles Bingley, joven soltero y rico, despierta las ambiciones de las familias del vecindario, que ven en él a un buen partido para sus hijas. Tras muchas peripecias, Bingley se casa con la mayor de las hermanas Bennet , familia de posición más bien modesta, y lo mismo hacen dos de sus mejores amigos, igualmente ricos, que contraen matrimonio con otras dos hermanas más jóvenes. Jane Austen retrata, con una ironía muy matizada, la psicología de la burguesía inglesa que se mueve entre hipócritas orgullos de clase y prejuicios sociales.', 60000, '1813-06-23', 1, '2020-02-20 08:45:12', 1),
(4, 4, 'Oye, morena, ¿tú que miras?', 'Una divertidísima comedia romántica que nos recuerda que, aunque el amor tiene fecha de caducidad, a veces puedes conservarlo para toda la vida.Hola, soy Coral. Siempre fui una romántica empedernida, hasta que el género masculino me rompió el corazón. Después de varios desengaños, os juro que me dije a mí misma que no iba a permitir que nadie más me hiciera daño. ¡Qué bonito es el amor, pero menuda mierdecita es sufrir por él! Hoy por hoy me considero una mujer relativamente feliz. Trabajo como repostera, tengo unas amigas increíbles y una preciosa hija a la que adoro. En cuanto al temita hombres, lo único que pretendo es disfrutar de un sexo divertido con ellos y poco más. Sin embargo, debo confesar que hay uno que hace que se acelere mi atontado corazón cada vez que lo veo. Se llama Andrew y es el jefe de seguridad de las giras musicales de mi amiga Yanira. Andrew es un bomboncito alto, de ojos oscuros, moreno y terriblemente atractivo.', 40000, '2016-02-15', 1, '2020-02-20 11:23:05', 1),
(5, 5, 'Purgatorio. La decadencia de un sueño', 'Las reglas del purgatorio son sencillas:\r\n•Tendrás una semana para aceptar tu muerte.\r\n•Se te otorgarán tres días para visitar a los vivos.\r\n•Vivirás un mes en el purgatorio y aprenderás sus reglas.\r\n•Y cuando estas instancias hayan finalizado,\r\npodrás escoger entre renacer, acechar o permanecer.\r\n\r\n[∽Anahí tenía dos enemigos: la muerte y el maquillaje corrido; y esta historia comienza la mañana en la que debió enfrentarse a ambos.∽]\r\nLuego de perder la vida en un robo a mano armada, Anahí despertó en una ciudad que imitaba a Buenos Aires, pero que parecía haberse quedado estancada en el tiempo.\r\n\r\nConfundida, recorrió las calles grises en busca de ayuda. Se aferró a la idea de que su familia la estaría buscando y que pronto la hallarían, pero todas sus esperanzas se desvanecieron cuando descubrió la verdad: estaba muerta y se encontraba en el Purgatorio.\r\n\r\nDurante treinta días, Anahí se vio obligada a formar parte de una civilización atravesada por personajes de épocas pasadas, en un abanico cultural que la sumergió en viejas modas, tangos, traiciones y romances que chocaron con su percepción contemporánea del mundo.', 45000, '2017-06-21', 3, '2020-02-20 11:34:19', NULL),
(6, 6, 'Cien años de soledad', 'Gabriel Garcia Marquez es autor de una de las Novelas más importantes de la literatura latinoamericana. Cuenta la historia de la familia Buendía y su vida en el remoto pueblo de Macondo. En esta increíble obra se tratan de manera magistral diversos temas como la soledad, la unión de lo real y lo imaginario, la religión, así como temas delicados como el incesto.\r\n\r\nGanador de múltiples premios y reconocimientos a a nivel mundial, Cien Años de Soledad es un libro que nadie debe dejar de leer en algún momento de su vida.', 70000, '1967-02-20', 5, '2020-02-20 11:37:03', NULL),
(7, 7, 'Juego de tronos', 'Tras el largo verano, el invierno se acerca a los Siete Reinos. Lord Eddard Stark, señor de Invernalia, deja sus dominios para unirse a la cNorte del rey Robert Baratheon el Usurpador, hombre díscolo y otrora guerrero audaz cuyas mayores aficiones son comer, beber y engendrar bastardos.\r\n\r\nEddard Stark desempeñará el cargo de Mano del Rey e intentará desentrañar una maraña de intrigas que pondrá en peligro su vida… y la de los suyos.\r\n\r\nEn un mundo cuyas estaciones duran décadas y en el que retazos de una magia inmemorial y olvidada surgen en los rincones más sombrios y maravillosos, la traición y la lealtad, la compasión y la sed de venganza, el amor y el poder hacen del juego de tronos una poderosa trampa que atrapa en sus fauces a los personajes… y al lector.', 65000, '1996-04-07', 3, '2020-02-20 11:39:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `id_perfil` int(11) NOT NULL,
  `nom_perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perfil`
--

INSERT INTO `tb_perfil` (`id_perfil`, `nom_perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(50) DEFAULT NULL,
  `apell_usuario` varchar(50) DEFAULT NULL,
  `correo` text DEFAULT NULL,
  `pass` longtext DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nom_usuario`, `apell_usuario`, `correo`, `pass`, `id_perfil`) VALUES
(1, 'Camilo', 'Davila', 'camilo7davila@gmail.com', 'rossesal', 1),
(2, 'Nicolas', 'Martin', 'nicolas@gmail.com', 'contrasena', 1),
(3, 'Miguel', 'Nieto', 'migustanieto.2@gmail.com', '4186', 1),
(4, 'Christian', 'Bravo', 'christianm.bravop@gmail.com', '12345', 1),
(6, 'David', 'Mauricio', 'ddamamapi@gmail.com', '$2y$10$drsvUcfNe0e9FUvxzWtNbOFNGj7mOzqjQwYMslc.KAzibSypHArGu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_autores`
--
ALTER TABLE `tb_autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `tb_calificacion_libro`
--
ALTER TABLE `tb_calificacion_libro`
  ADD PRIMARY KEY (`id_calificacion_libro`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `tb_img_autor`
--
ALTER TABLE `tb_img_autor`
  ADD PRIMARY KEY (`id_img_autor`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indexes for table `tb_img_libro`
--
ALTER TABLE `tb_img_libro`
  ADD PRIMARY KEY (`id_img_libro`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `tb_libros`
--
ALTER TABLE `tb_libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_usuario_cre` (`id_usuario_cre`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_autores`
--
ALTER TABLE `tb_autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_calificacion_libro`
--
ALTER TABLE `tb_calificacion_libro`
  MODIFY `id_calificacion_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_img_autor`
--
ALTER TABLE `tb_img_autor`
  MODIFY `id_img_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_img_libro`
--
ALTER TABLE `tb_img_libro`
  MODIFY `id_img_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_libros`
--
ALTER TABLE `tb_libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_calificacion_libro`
--
ALTER TABLE `tb_calificacion_libro`
  ADD CONSTRAINT `tb_calificacion_libro_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `tb_libros` (`id_libro`);

--
-- Constraints for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `tb_libros` (`id_libro`);

--
-- Constraints for table `tb_img_autor`
--
ALTER TABLE `tb_img_autor`
  ADD CONSTRAINT `tb_img_autor_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `tb_autores` (`id_autor`);

--
-- Constraints for table `tb_img_libro`
--
ALTER TABLE `tb_img_libro`
  ADD CONSTRAINT `tb_img_libro_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `tb_libros` (`id_libro`);

--
-- Constraints for table `tb_libros`
--
ALTER TABLE `tb_libros`
  ADD CONSTRAINT `tb_libros_ibfk_1` FOREIGN KEY (`id_usuario_cre`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_libros_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `tb_autores` (`id_autor`),
  ADD CONSTRAINT `tb_libros_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`);

--
-- Constraints for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `tb_perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
