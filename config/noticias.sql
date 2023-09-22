-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 16:07:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `subtitulo` varchar(250) NOT NULL,
  `descripcion` varchar(4250) NOT NULL,
  `id_seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `descripcion`, `id_seccion`) VALUES
(1, 'Las criptomonedas, caen abruptamente', 'El mercado se revoluciona en las ultimas horas', 'El Bitcoin no encontraría cambios en un mes históricamente bajista para esa cripto, pero el mercado es amplio.\r\n            Agosto se caracterizó por un mercado cripto en descenso, un escenario que dejó su huella tanto en Bitcoin (BTC) como en numerosas altcoins, las cuales registraron marcadas caídas desde sus niveles máximos alcanzados en julio pasado. Este lunes 4 de septiembre, el BTC sigue corriendo detrás de los u$s26.000, al caer 1% en las últimas 24 horas y operar en u$s$25,800.\r\n            A pesar de la tendencia bajista que prevalece en el mercado cripto, se observan indicios de formaciones prometedoras en algunas altcoins que sugieren un potencial alcista. En este contexto, BeInCrypto realizó un estudio de las principales criptomonedas para septiembre, identificando aquellas que podrían alcanzar nuevos máximos históricos.\r\n    ', 0),
(2, 'Criptos: el bitcoin dejó de ser el preferido de los ciberdelincuentes', 'Bajo la tasa de interes, por los delinquidores acerca del bitcoin', 'Según un estudio de Chainalysis el uso ilícito de criptomonedas alcanzó la cifra récord de 20.100 millones de dólares en 2022. Ahora TRM Labs estableció cuáles son las cripto más elegidas para eso.\r\n              El año pasado el valor global de las criptomonedas cayó más de 1,6 billones de dólares y más de 2,2 billones desde los máximos del 2021 (algo así como entre 3 y más de 4 veces el PBI argentino).\r\n              Sin embargo, ello no detuvo ni mucho menos disuadió el accionar de delincuentes y criminales en el uso y explotación de las criptomonedas.\r\n              Según un estudio de TRM Labs, el famoso bitcoin dejó de ser el predilecto de los ciberdelincuentes quienes ahora prefieren usar tether (USDT), que es la tercer cripto en capitalización de mercado detrás de bitcoin y ethereum.\r\n              El informe señala que más de 7.800 millones de dólares fueron robados en esquemas (piramidales) Ponzi, unos 1.500 millones de dólares gastados en mercados “darknet” especializados en drogas ilegales y otros 3.700 millones de dólares robados a través de hacks y exploits.\r\n              “Por ejemplo, en 2022, se robaron aproximadamente 2.000 millones de dólares a través de ataques a puentes entre cadenas, que permiten que las criptomonedas pasen de una cadena de bloques a otra”, estima el estudio.\r\n', 0),
(3, '¿Es Binance la plataforma más segura para invertir en criptomonedas?', 'Es en 2023, binance una plataforma confiable y maxima seguridad para nuestros ahorros?', 'Según un estudio de Chainalysis el uso ilícito de criptomonedas alcanzó la cifra récord de 20.100 millones de dólares en 2022. Ahora TRM Labs estableció cuáles son las cripto más elegidas para eso.\r\n              El año pasado el valor global de las criptomonedas cayó más de 1,6 billones de dólares y más de 2,2 billones desde los máximos del 2021 (algo así como entre 3 y más de 4 veces el PBI argentino).\r\n              Sin embargo, ello no detuvo ni mucho menos disuadió el accionar de delincuentes y criminales en el uso y explotación de las criptomonedas.\r\n              Según un estudio de TRM Labs, el famoso bitcoin dejó de ser el predilecto de los ciberdelincuentes quienes ahora prefieren usar tether (USDT), que es la tercer cripto en capitalización de mercado detrás de bitcoin y ethereum.\r\n              El informe señala que más de 7.800 millones de dólares fueron robados en esquemas (piramidales) Ponzi, unos 1.500 millones de dólares gastados en mercados “darknet” especializados en drogas ilegales y otros 3.700 millones de dólares robados a través de hacks y exploits.\r\n              “Por ejemplo, en 2022, se robaron aproximadamente 2.000 millones de dólares a través de ataques a puentes entre cadenas, que permiten que las criptomonedas pasen de una cadena de bloques a otra”, estima el estudio.\r\n', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `tipo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
