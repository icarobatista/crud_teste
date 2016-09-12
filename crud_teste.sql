-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela crud_teste.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) DEFAULT NULL,
  `dt_nasc_cliente` date DEFAULT NULL,
  `rg_cliente` int(11) DEFAULT NULL,
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `telefone_cliente` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crud_teste.clientes: ~1 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `dt_nasc_cliente`, `rg_cliente`, `cpf_cliente`, `telefone_cliente`) VALUES
	(21, 'teste validacao', '1986-08-22', 4825732, '021.259.251-33', '(62)8111-9025'),
	(22, 'teste limpar form', '1994-07-25', 2147483647, '656.565.656-56', '(25)15151-5151'),
	(23, 'teste limpar 2', '1970-01-01', 2147483647, '561.561.561-56', '(25)15151-5151'),
	(24, 'limpar 3', '1987-06-30', 2147483647, '465.464.564-56', '(25)43453-4534'),
	(25, 'limpar 4', '1970-01-01', 156156156, '231.231.231-23', '(00)00000-0000'),
	(26, 'renomear', '1989-08-23', 123123123, '4.564.564-46', '(88)88888-8888');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
