CREATE DATABASE  IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `biblioteca`;

DROP TABLE IF EXISTS acervo;
CREATE TABLE acervo (
  id int(11) NOT NULL,
  qtd int(11) DEFAULT NULL,
  exemplar_id int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY fk_table1_1_idx (exemplar_id),
  CONSTRAINT fk_table1_1 FOREIGN KEY (exemplar_id) REFERENCES exemplar (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

DROP TABLE IF EXISTS devolucao;
CREATE TABLE devolucao (
  id int(11) NOT NULL,
  dt_devolucao date DEFAULT NULL,
  emprestimo_id int(11) NOT NULL,
  usuario_id int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_devolucao_emprestimo1_idx (emprestimo_id),
  KEY fk_devolucao_usuario1_idx (usuario_id),
  CONSTRAINT fk_devolucao_emprestimo1 FOREIGN KEY (emprestimo_id) REFERENCES emprestimo (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT fk_devolucao_usuario1 FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

DROP TABLE IF EXISTS emprestimo;
CREATE TABLE emprestimo (
  id int(11) NOT NULL,
  usuario_id int(11) DEFAULT NULL,
  func_id int(11) DEFAULT NULL,
  dt_emprestimo date DEFAULT NULL,
  dt_devolucao date DEFAULT NULL,
  acervo_id int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_emprestimo_acervo1_idx (acervo_id),
  KEY fk_emprestimo_usuario_idx (usuario_id),
  KEY fk_emprestimo_func_idx (func_id),
  CONSTRAINT fk_emprestimo_acervo1 FOREIGN KEY (acervo_id) REFERENCES acervo (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT fk_emprestimo_func FOREIGN KEY (func_id) REFERENCES usuario (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT fk_emprestimo_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

DROP TABLE IF EXISTS exemplar;
CREATE TABLE exemplar (
  id int(11) NOT NULL,
  titulo mediumtext,
  subtitulo mediumtext,
  autor varchar(500) DEFAULT NULL,
  editora varchar(500) DEFAULT NULL,
  genero varchar(500) DEFAULT NULL,
  edicao varchar(45) DEFAULT NULL,
  ISBN varchar(45) DEFAULT NULL,
  ISSN varchar(45) DEFAULT NULL,
  ano varchar(45) DEFAULT NULL,
  numero varchar(45) DEFAULT NULL,
  tipo varchar(45) DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
  id int(11) NOT NULL,
  username varchar(45) NOT NULL,
  email varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  cpf varchar(50) DEFAULT NULL,
  nome text,
  tipo varchar(45) DEFAULT NULL,
  PRIMARY KEY (id)
);