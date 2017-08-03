-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2017 a las 16:48:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `ID` int(11) NOT NULL,
  `Ip` text COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Correo` text COLLATE utf8_spanish_ci NOT NULL,
  `FechayHora` text COLLATE utf8_spanish_ci NOT NULL,
  `Texto` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`ID`, `Ip`, `Nombre`, `Correo`, `FechayHora`, `Texto`) VALUES
(1, '192.168.1.110', 'Alex', 'Alex@gmail.com', '7/3/2017 - 12:45', 'WTF?? Ahora además de comprar la Switch y el juego de Zelda vamos a tener que pagar por el contenido adicional?'),
(2, '192.168.1.111', 'Guille', 'Guille@gmail.com', '10/3/2017 - 18:12', 'Como no, vaya novedad! Con el éxito que se esperaba del nuevo Zelda, van a aprovechar para sacarnos el dinero a los fans.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `ID` int(11) NOT NULL,
  `Nombre` text CHARACTER SET latin1 NOT NULL,
  `Alt` text COLLATE latin1_spanish_ci NOT NULL,
  `Categoria` text CHARACTER SET latin1 NOT NULL,
  `Pie` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`ID`, `Nombre`, `Alt`, `Categoria`, `Pie`) VALUES
(1, 'imagenes/ZeldaDLC.jpg', 'ZeldaDLC', 'Nintendo', 'Javier Monfort - https://hipertextual.com/2017/02/the-legend-of-zelda-breath-of-the-wild-pase-expansion-dlc'),
(2, 'imagenes/Nintendo-Zelda.jpg', 'ZeldaDLC', 'Nintendo', 'Javier Monfort - https://hipertextual.com/2017/02/the-legend-of-zelda-breath-of-the-wild-pase-expansion-dlc'),
(3, 'imagenes/mintiendo.jpg', 'Mintiendo', 'Nintendo', ''),
(4, 'imagenes/borderlands3.jpg', 'Borderland3', 'Borderland', ''),
(5, 'imagenes/gtaV.jpg', '', 'GTA', ''),
(6, 'imagenes/lego-city-undercover-game.jpg', '', 'LEGO', ''),
(7, 'imagenes/horizon2.jpg', '', 'PS4', ''),
(8, 'imagenes/marzo2017.jpg', '', 'Lanzamientos', ''),
(9, 'imagenes/psPlus.jpg', '', 'PSPlus', ''),
(10, 'imagenes/nier.jpg', '', 'Japón', ''),
(11, 'imagenes/zeldaFin.jpg', 'ZeldaBreathOfTheWild', 'Nintendo', ''),
(12, 'imagenes/borderlands32.jpg', 'Borderlands3', 'Borderlands', ' '),
(13, 'imagenes/memoriaswitch.jpg', 'MemoriaSwitch', 'Nintendo', ' '),
(14, 'imagenes/andromeda.jpg', 'Andromeda', 'PC', ''),
(15, 'imagenes/andromeda2.png', 'Andromeda', 'PC', ' '),
(16, 'imagenes/legoundercover.jpg', 'LegoUndercover', 'Lego', ''),
(17, 'imagenes/horizon.jpg', 'Horizon', 'PS4', ''),
(18, 'imagenes/lanzamientos.jpg', 'Lanzamientos', 'PC', ''),
(19, 'imagenes/lanzamientos2.png', 'Lanzamientos', 'PC', ''),
(20, 'imagenes/nier2.jpg', 'Nier', 'PC', 'Nier Automata'),
(21, 'imagenes/zelda2.png', 'Zelda2', 'Nintendo', ''),
(49, 'imagenes/maxresdefault.jpg', 'pie nueva', 'PC', 'pie nueva'),
(58, 'imagenes/imagen-cachorro-comprimir.jpg', 'a', 'Nintendo', 'a'),
(61, 'imagenes/5825c4f7c4618823438b4593.jpg', 'b', 'PC', 'b'),
(62, 'imagenes/c271b121aea4520d4c08037df68c4de0.jpg', 'b', 'PC', 'b'),
(63, 'imagenes/IMG-20170530-WA0014.jpg', 'A', 'PC', 'A'),
(64, 'imagenes/IMG-20170530-WA0015.jpeg', 'A', 'PC', 'A'),
(65, 'imagenes/Screenshot_20170530-195848.png', 'Puta', 'PC', 'Puta'),
(66, 'imagenes/IMG_20170524_183340_927.jpg', 'S', 'PC', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lanzamiento`
--

CREATE TABLE `lanzamiento` (
  `ID` int(11) NOT NULL,
  `Fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Plataforma` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lanzamiento`
--

INSERT INTO `lanzamiento` (`ID`, `Fecha`, `Nombre`, `Plataforma`) VALUES
(0, '05/05/17', 'Prey', 'PC'),
(1, '19/05/17', 'Injustice 2', 'Xbox One'),
(2, '19/05/17', 'Shadow Warrior 2', 'PS4'),
(3, '25/05/17', 'Vanquish', 'PC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `ID` int(11) NOT NULL,
  `TituloP` text COLLATE utf8_spanish_ci NOT NULL,
  `Titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `Subtitulo` text COLLATE utf8_spanish_ci NOT NULL,
  `Entradilla` text COLLATE utf8_spanish_ci NOT NULL,
  `Cuerpo` text COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` int(11) NOT NULL,
  `ImagenCuerpo` int(11) NOT NULL,
  `Video` text COLLATE utf8_spanish_ci NOT NULL,
  `Autor` int(11) NOT NULL,
  `FechaPubli` text COLLATE utf8_spanish_ci NOT NULL,
  `FechaEdi` text COLLATE utf8_spanish_ci NOT NULL,
  `Etiquetas` text COLLATE utf8_spanish_ci NOT NULL,
  `Seccion` int(11) NOT NULL,
  `Estado` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`ID`, `TituloP`, `Titulo`, `Subtitulo`, `Entradilla`, `Cuerpo`, `Imagen`, `ImagenCuerpo`, `Video`, `Autor`, `FechaPubli`, `FechaEdi`, `Etiquetas`, `Seccion`, `Estado`) VALUES
(1, 'Nintendo pone DLCs y pasa esto...', 'El nuevo The Legend of Zelda llega con sorpresa (de pago)', 'Nintendo confirma un pase de expansión de pago que dará acceso a dos nuevos DLC.', 'De forma inesperada para todos los fans de Zelda, Nintendo incluirá un pase de expansión, siendo así el segundo juego de Nintendo que lo incluya en toda su historia. Este incluirá dos DLC, uno en verano y otro en navidad.', 'Tras cinco años de desarrollo, The Legend of Zelda: Breath of the Wild está ya a la vuelta de la esquina. Hace solo unos días se confirmaba la finalización del desarrollo de la última aventura de Link y todo parece estar preparado para su llegada a Wii U y Nintendo Switch el próximo 3 de marzo. Pero, pese a ello, aún queda mucho por saber y hay hueco para las sorpresas.</br></br>\r\n\r\nUna de ellas, quizá del todo inesperada, es que Nintendo ha confirmado la existencia de un pase de expansión para el título, siendo el primer The Legend of Zelda de la historia en recibir contenido adicional de pago y, dejando a un lado los dos paquetes de DLC de Mario Kart 8, uno de los primeros juegos de Nintendo en introducir este tipo de contenido. En el texto publicado en la web oficial de Nintendo se confirma que, en verano y navidad, recibiremos dos contenidos adicionales que deberán ser adquiridos de forma conjunta por un precio de 19,99€.</br></br>\r\nAsimismo, todo aquel usuario que adquiera desde ya ese pase de expansión encontrará tres cofres adicionales en la zona inicial del título, teniendo acceso a \'distintos objetos útiles\' y una exclusiva camiseta con el logo de Nintendo Switch para Link. En cuanto a los DLC, el primero incluirá una nueva característica para el mapa de Link, un modo difícil y un reto en la Cueva de las Pruebas (Cave of Trials). El segundo, por su parte, incluirá una nueva mazmorra y una nueva historia que jugar.', 1, 2, 'https://www.youtube.com/embed/ckkmGjAShoY', 1, '31/5/2017', '02/03/2017', 'Nintendo', 3, 'Publicado'),
(2, 'Anunciado el primer juego que no cabe en la memoria de Nintendo switch', 'Anunciado el primer juego que no cabe en la memoria de Nintendo switch', ' La memoria interna de Nintendo Switch resulta insuficiente para almacenar algunos juegos', 'El juego Dragon Quest Heroes ocupa 32Gb, un tamaño mayor que el espacio de la memoria de la consola vacía, para poder comprar la versión digital sería necesario comprar una tarjeta SD adicional.', 'La memoria interna de Nintendo Switch resulta insuficiente para almacenar algunos juegos</br></br>\r\n\r\nEstamos a una semana del lanzamiento, y la Nintendo Switch sigue soltando sorpresas que muchos tal vez no esperábamos. Hace unos días hacíamos un repaso de lo que nos faltaba por conocer acerca de la nueva consola de Nintendo, pero hoy ha saltado la información de algo que muchos temíamos: ha aparecido el primer juego con mayor tamaño que la memoria interna de la consola.</br></br>\r\n\r\nHoy Nintendo ha publicado una lista de los juegos que estarán disponibles desde el día cero, en los detalles de los juegos podemos ver información diversa como su tamaño. Aquí se destaca el nombre de \'Dragon Quest Heroes I y II\', el cual se está posicionado como el primer juego para Switch de 32GB, lo que significa que será más grande que el almacenamiento disponible de la consola.\r\nHay juegos que no será muy viable tenerlos en digital.\r\n\r\nDesde que Nintendo anunció que la Switch sólo tendría 32GB de almacenamiento interno, muchos fueron los que saltaron para reclamar que no sería suficiente para almacenar juegos y DLC. Sin embargo, Nintendo decidió dar soporte a tarjetas microSD de hasta 2TB con el objetivo de solucionar esta falta de memoria interna.\r\n\r\nNintendo también aclaró que la mayoría de los juegos tendrían un peso de entre 1 y 5 GB, y serían pocos los que superarían este tamaño, como el caso de Zelda que pesará 13,4GB. La ventaja de la Switch es que, a diferencia de la Xbox o Playstation, no necesita que los juegos físicos se instalen en el disco duro, por lo que el tener una copia física podría ser más que suficiente, claro, si no contemplamos los DLC.', 3, 13, '', 2, '02/04/17', '02/04/17', 'Nintendo', 3, 'Publicado'),
(3, 'Borderlands 3, primeras imágenes de una demo técnica del juego', 'Borderlands 3, primeras imágenes de una demo técnica del juego', 'Borderlands 3 ha sido confirmado para PC y consolas', '¡Ya tenemos las primeras imágenes de Borderlands 3! Se trata de capturas sacadas de una demostración técnicas del juego presentada recientemente por Gearbox.', 'Si hace unas semanas os contamos que Borderlands 3 había sido confirmado para PC y consolas, pero no para Nintendo Switch, ahora os queremos presentar las primeras imágenes del juego de Gearbox. La compañía ha aprovechado la Game Developers Conference para mostrar una demo técnica de Borderlands 3, y podéis ver varias capturas sacadas durante la presentación en la galería que tenéis en el encabezado de esta noticia.</br></br>\r\n\r\n\r\nEvidentemente, y al tratarse de una demo técnica, las imágenes de Borderlands 3 que podéis ver en este contenido no son más que un pequeño adelanto que lo que podremos ver en el juego de PC y consolas, aunque sí que nos permiten hacernos una idea de aspectos como la iluminación. De hecho, Gearbox seguirá introduciendo cambios y mejoras y experimentando con las bondades del motor Unreal Engine 4 en los próximos meses, por lo que lo mostrado en la demo técnica de Borderlands 3 esta misma tarde podría tener un aspecto muy diferente en cuestión de meses.</br></br>\r\n\r\nEn cualquier caso, Borderlands 3 es un juego muy esperado por los fans de la franquicia, por lo que estas primeras imágenes, aunque pertenezcan a su demo técnica, son una gran noticia. Esperemos que Gearbox aproveche alguno de los próximos eventos como el E3 2017 para ofrecer los primeros detalles oficiales sobre Borderlands 3, nueva entrega de la saga que, por ahora, ha confirmado su lanzamiento en PS4, PC y Xbox One. Mientras tanto, aquí os dejamos con nuestro análisis de Borderlands Una Colección Muy Guapa.', 4, 12, '', 2, '02/03/17', '02/03/17', 'PC', 2, 'Publicado'),
(4, 'BioWare cancela la beta multijugador de Mass Effect Andromeda', 'BioWare cancela la beta multijugador de Mass Effect Andromeda', 'Al contrario que gran parte del catálogo de EA, sería injusto decir que el punto fuerte de la saga \'Mass Effect\' reside en su apartado multijugador.', 'De hecho, el anuncio de la beta para poner a prueba el multijugador que ofrecería \'Mass Effect Andromeda\' pasó casi desapercibido frente al aluvión de novedades que BioWare preparó con motivo del día de \'Mass Effect\'.', 'Sin embargo, ya estamos en la cuenta atrás de cara a la salida del juego, el cual está oficialmente terminado desde la semana pasada. Entonces, ¿cuál es el estado actual de la beta? Según el blog oficial del estudio canadiense, finalmente no habrá testeo del multijugador, o por lo menos no desde sistemas domésticos.</br></br>\r\nEste anuncio coincide con los planes de BioWare de cara al PAX East que se celebrará el próximo fin de semana en Boston, entre los que se indica que habrá sesiones de multijugador de \'Mass Effect Andromeda\' a disposición de los asistentes al tiempo que se hace oficial que no habrá una prueba técnica del multijugador para usuarios más allá de los eventos oficiales.\r\nUna sorpresa a medias, si tenemos en cuenta que el juego está en fase Gold desde el 24 de febrero y que llegará en poco más de 20 días. Eso sí, como curiosidad en el blog se aprovecha para agradecer el interés de todos aquellos que se alistaron en la iniciativa Andromeda para poder participar en la beta en consolas.', 14, 15, '', 1, '31/5/2017', '04/05/17', 'PC', 2, 'Pendiente'),
(5, 'Los videojuegos más vendidos en España en febrero de 2017', 'Los videojuegos más vendidos en España en febrero de 2017', ' En el segundo mes del presente año, GTA V para PS4 lidera en las ventas españolas.', 'AEVI, Asociación Española de Videojuegos, ha publicado la lista con los diez videojuegos más vendidos en nuestro país durante el mes de febrero de 2017.', 'Fuera del podio, For Honor Gold Edition para PS4 debuta en el #4, mientras que Nioh para PlayStation 4 se estrena en el #5. En el puesto #6 se encuentra Super Mario Maker para Nintendo 3DS y en el #7 está Rocket League Collector\'s Edition para PS4. En el #8 reaparece Tom Clancy\'s The Division para PlayStation 4. For Honor hace doblete ocupando también la novena posición con su edición estándar para la consola de sobremesa de Sony. Por último, Pokémon Sol regresa al Top Ten en el puesto #10.\r\nEn cuanto a plataformas, Sony mantiene la hegemonía del Top 10 con ocho posiciones de videojuegos para PS4 (siete multiplataforma y un exclusivo), mientras que Nintendo ocupa dos posiciones con dos videojuegos de Nintendo 3DS. Microsoft no tiene presencia entre los más vendidos de febrero 2017 en nuestro país. Aquí tenéis la lista de AEVI de febrero de 2017 a nivel general y por plataformas', 5, 15, '', 2, '17/02/17', '17/02/17', 'PC', 2, 'Publicado'),
(6, 'LEGO City Undercover - Regalo con la reserva en GAME', 'LEGO City Undercover - Regalo con la reserva en GAME', 'Tras su paso por Wii U, LEGO City Undercover llegará muy pronto a PS4, Nintendo Switch y Xbox One.', 'GAME calienta motores para la llegada de LEGO City Undercover a PS4, Nintendo Switch y Xbox One y presenta una interesante campaña de reserva con regalo exclusivo.', '<p class=\"cuerpo\">Para ir calentando motores, GAME ha anunciado una promoción de reserva con regalos exclusivos en sus tiendas. Así, todos aquellos que reserven LEGO City Undercover en la conocida cadena de tiendas se llevarán de regalo una exclusiva figura de LEGO del valiente policía Chase McCain en su vehículo. Podéis ver cómo luce el regalo de reserva del juego en la siguiente imagen:</br></br>\r\nLEGO City Undercover se pondrá a la venta en PS4, Nintendo Switch y Xbox One el próximo 7 de abril como una nueva versión del juego original de Wii U. LEGO City Undercover incluye más de 20 distritos diferentes en un mundo abierto, numerosos vehículos que conducir, los habituales coleccionables de las aventuras de LEGO y la ya característica combinación de acción y humor de los juegos de TT Games. Aquí tenéis nuestro completo análisis de LEGO City Undercover para Wii U.</br></br>\r\n', 6, 16, '', 2, '10/01/17', '10/01/17', 'PS4', 4, 'Publicado'),
(7, 'Horizon: Zero Dawn Diferencias en PS4 y PS4 Pro', 'Horizon: Zero Dawn Diferencias en PS4 y PS4 Pro', 'Recomiendan 4K para apreciar bien las diferencias', 'Arekk Gaming, un canal de YouTube especializado en videojuegos, ha publicado una comparativa gráfica entre las versiones de Horizon: Zero Dawn de PlayStation 4 y PlayStation 4 Pro, con la que podremos identificar las diferencias de calidad y rendimiento entre ambas versiones.', '<p class=\"cuerpo\">Eso sí, sus autores recomiendan usar un monitor o televisor con resolución 4K para apreciar bien el salto gráfico entre ambas versiones. Con todo, las diferencias entre PS4 y PS4 Pro no son tan acusadas como muchos esperaban, aunque sí presenta ciertas mejoras en la versión para la consola vitaminada de Sony.</br></br>\r\n\r\nDiferencias como una mayor definición y una mayor distancia de dibujado con menos niebla para PlayStation 4 Pro; según cuentan los autores de la comparativa, si disponemos de un panel 4K con HDR, evidentemente, disfrutaremos de la mejor versión de Horizon: Zero Dawn, aunque si recurrimos a un televisor Full HD con PS4 Pro también apreciaremos ciertas mejoras, como un mayor antialising y más detalles en texturas. Por otro lado, los efectos de partículas y de iluminación también muestran su mejor cara en PS4 Pro. Aun así, admiten que la versión estándar de PS4 ya muestra un apartado gráfico imponente. No dudéis en consultar nuestro análisis para conocer todos los detalles de Horizon: Zero Dawn.', 17, 7, '', 1, '01/03/17', '01/03/17', 'PS4', 4, 'Publicado'),
(8, '¡Lanzamientos Marzo de 2017!', '¡Lanzamientos Marzo de 2017!', 'Consulta en esta lista todos los lanzamientos que llegarán a las diferentes plataformas del mercado, así como las fechas exactas o su periodo de estreno', ' Todas las fechas de lanzamiento de videojuegos de 2017', '<p class=\"cuerpo\">2017 ya ha dado comienzo y se presenta como un año bastante completo en lo que a lanzamientos de videojuegos se refiere dentro del mundo del software. Los usuarios de PC, PlayStation 4, Xbox One, Nintendo 3DS o la futura Nintendo Switch van a estar muy ocupados haciendo acopio de tiempo, dinero y espacio para todos los juegos que están previstos durante los próximos meses. Ahora bien, ¿qué juegos van a llegar a los diferentes sistemas y cuándo lo harán? Pues eso es algo que podréis comprobar en la extensa lista que os dejamos a continuación y la cual está formada por los proyectos que llegarán este año y las fechas de su lanzamiento. De forma adicional, también hemos incluido los juegos que están confirmados para este año, pero que todavía no cuentan con día y mes concreto. Por supuesto, una vez que sepamos con exactitud el momento del estreno, la lista será editada. Si veis que falta alguno, no dudéis en señalarlo para poder incluirlo. </p>', 8, 18, '', 1, '05/02/17', ' 05/02/17', 'Nintendo', 3, 'Publicado'),
(9, 'PSPlus - Marzo', 'PSPlus - Marzo', 'SONY ANUNCIA LOS JUEGOS GRATIS DE PS PLUS PARA MARZO', 'Si ayer os contábamos que se habían filtrado los juegos de PS4 dentro del programa PlayStation Plus del mes de marzo gracias a una tienda francesa, hoy ya sabemos cuales serán los demás que están integrados en el programa para las otras dos plataformas (PS3 y Vita).', 'Efectivamente, se mantienen los dos nombrados para PS4:</br></br>\r\n\r\nTearaway Unfolded: Un juego de plataformas aparecido originalmente en PS Vita, pero que después llegó a PS4. En nuestro análisis recibió un 8.3 y la siguiente valoración:</br></br>\r\n\r\nNo solamente un buen port, sino un genial juego exclusivo que destaca por su puesta en escena y su apartado visual tan colorido y original.</br></br>\r\nDisc Jam: Una apuesta por un estilo de juego más arcade. Disc Jam es un juego para cuatro usuarios simultáneos en el que hay que lanzar un disco que provocará fuertes impactos, de los creadores de Call of Duty, Guitar Hero y Tony Hawk. Lo definen como una mezcla de hockey y tenis, en la que cada personaje tiene su propio estilo de juego.', 9, 19, '', 2, '21/02/17', '21/02/17', 'PS4', 4, 'Publicado'),
(10, 'NieR:Automata triunfa en Japón', 'NieR:Automata triunfa en Japón', 'Platinum Games lidera las ventas niponas', 'Platinum Games había estado esperando este momento desde hacía meses, y es que tras varios tropiezos en los últimos meses, la compañía nipona ha logrado remontar la situación con el lanzamiento de NieR: Automata, que ha debutado en Japón por todo lo alto con unas ventas realmente positivas teniendo en cuenta el tipo de juego que se trata y la consola en la que se lanza, ahora mismo la más potente en lo estrictamente comercial del mercado: PS4.', ' <p class=\"cuerpo\">NieR: Automata ha iniciado su andadura en el país del Sol Naciente con 198.542 copias, unos números que se antojan muy positivos y con la esperanza de mantenerse con un buen rendimiento esta primavera. En segundo lugar tenemos al también debutando Super Robot Wars V, que ha sumado más de 100.000 copias.</p>', 20, 10, '', 1, '18/5/2017', '11/02/17', 'PC', 2, 'Pendiente'),
(11, 'Terminan Zelda: Breath of the Wild en hora y media', 'Terminan Zelda: Breath of the Wild en hora y media', '¡Alerta de spoilers! Así es el speedrun de Breath of the Wild', 'En apenas unas horas ya tendremos en las tiendas The Legend of Zelda: Breath of the Wild, la nueva obra maestra de Nintendo según nuestro reciente análisis. Y tal y como explicamos en el texto, la nueva aventura de Link ofrece total libertad al jugador para afrontar su desarrollo de la manera que queramos, incluso abordando la batalla final directamente desde un principio.', '<p class=\"cuerpo\">Así lo ha comprobado el usuario SethBling, quien se puso en contacto con Nintendo para demostrar si dicha afirmación era cierta; Nintendo aceptó el reto y prestó una consola y una copia del juego para que el youtuber lograra la gesta. Dicho y hecho, SethBling ha logrado completar Breath of the Wild en apenas una hora y media.</br></br>\r\n\r\nAsí pues, es posible ir a por el jefe final sin tener que pasar primero por los numerosos desafíos, misiones secundarias y mejoras de Link. Sobra decir que el vídeo de SethBling está lleno de spoilers, con lo que no recomendamos su visionado si queréis descubrir por vosotros mismos las innumerables sorpresas de Breath of the Wild.</p>', 11, 21, '', 1, '17/5/2017', '10/03/17', 'Nintendo', 3, 'Publicado'),
(14, 'Vaya, un negrito!', 'Vaya, un negro!', 'a', 'a', 'asssss', 58, 49, '', 2, '31/5/2017', '18/5/2017 - 12:53', 'Nintendo', 3, 'Publicado'),
(17, 'Caca', 'Caca', 'Caca', 'Caca', 'Caca de la vaca', 63, 64, '', 10, '31/5/2017', '31/5/2017', 'PC', 2, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `ID` int(11) NOT NULL,
  `Descripcion` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`ID`, `Descripcion`) VALUES
(0, 'Normal'),
(1, 'Editor Jefe'),
(2, 'Redactor'),
(3, 'Colaborador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prohibidas`
--

CREATE TABLE `prohibidas` (
  `ID` int(11) NOT NULL,
  `Palabra` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prohibidas`
--

INSERT INTO `prohibidas` (`ID`, `Palabra`) VALUES
(1, 'puta'),
(2, 'puto'),
(3, 'mierda'),
(4, 'cabron'),
(5, 'joder'),
(6, 'polla'),
(7, 'capullo'),
(8, 'coño'),
(9, 'maricon'),
(10, 'maricón'),
(11, 'culo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `ID` int(11) NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `Pulsaciones` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`ID`, `imagen`, `url`, `Pulsaciones`) VALUES
(1, 'imagenes/akracing.jpg', 'http://akracingeurope.eu/', 0),
(2, 'imagenes/AMD.png', 'http://www.amd.com/es', 0),
(3, 'imagenes/game.jpg', 'https://www.game.es/', 0),
(4, 'imagenes/GameStop.jpg', 'http://www.gamestop.com/', 0),
(5, 'imagenes/instantgaming.jpg', 'https://www.instant-gaming.com/es/', 0),
(6, 'imagenes/Logitech.png', 'https://www.logitech.com/en-nz', 0),
(7, 'imagenes/MSI.png', 'https://es.msi.com/', 0),
(8, 'imagenes/pccomponentes.jpg', 'https://www.pccomponentes.com/', 0),
(9, 'imagenes/Razer.jpg', 'https://www.razerzone.com/es-es', 0),
(10, 'imagenes/steelseries.png', 'https://steelseries.com/', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `ID` int(11) NOT NULL,
  `Nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE latin1_spanish_ci NOT NULL,
  `Padre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`ID`, `Nombre`, `url`, `Padre`) VALUES
(1, 'Noticias', 'index.php', 0),
(2, 'PC', '', 1),
(3, 'Nintendo', '', 1),
(4, 'PS4', '', 1),
(5, 'Lanzamientos', 'contentLanzamientos.php', 0),
(6, 'Galeria', 'contentGaleria.php', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NombreUsuario` text CHARACTER SET latin1 NOT NULL,
  `Contraseña` text COLLATE latin1_spanish_ci NOT NULL,
  `Privilegios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `NombreUsuario`, `Contraseña`, `Privilegios`) VALUES
(1, 'Javier Monfort', '', 2),
(2, 'Periquito Palote', '', 2),
(9, 'Alex', '1234', 0),
(10, 'guille', '1234', 0),
(11, 'Manolo', '1234', 1),
(12, 'Antonio', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `lanzamiento`
--
ALTER TABLE `lanzamiento`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
