-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_pet
CREATE DATABASE IF NOT EXISTS `db_pet` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_pet`;

-- Copiando estrutura para tabela db_pet.tb_cadastro
CREATE TABLE IF NOT EXISTS `tb_cadastro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `porte` char(1) NOT NULL,
  `idade` char(50) NOT NULL,
  `obs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_pet.tb_cadastro: ~4 rows (aproximadamente)
INSERT INTO `tb_cadastro` (`id`, `nome`, `especie`, `raca`, `porte`, `idade`, `obs`) VALUES
	(1, 'Gokudog', 'outros', 'Husky Siberiano', 'P', '33', 'Ele é o goku'),
	(2, 'Picolo', 'outros', 'Basse', 'M', '57', 'De namekusei'),
	(3, 'Brooly', 'outros', 'Pinscher', 'G', '33', 'Lendário Super Sayajin'),
	(4, 'Vegeta', 'outros', 'Persa', 'P', '33', 'Príncipe dos Sayajins');

-- Copiando estrutura para tabela db_pet.tb_especie
CREATE TABLE IF NOT EXISTS `tb_especie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `especie` varchar(25) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_pet.tb_especie: ~2 rows (aproximadamente)
INSERT INTO `tb_especie` (`ID`, `especie`, `data_cadastro`, `ativo`) VALUES
	(1, 'Golden', '2026-01-22 21:41:10', 1),
	(2, 'Caramelo', '2026-01-22 21:43:35', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
