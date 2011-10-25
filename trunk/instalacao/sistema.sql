DROP TABLE IF EXISTS classes;
CREATE TABLE IF NOT EXISTS classes (
  id int(11) NOT NULL auto_increment,
  nome varchar(30) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS turmas;
CREATE TABLE IF NOT EXISTS turmas (
  id int(11) NOT NULL auto_increment,
  nome varchar(50) NOT NULL,
  classe_id int(11) NOT NULL,
  congregacao_id int(11) NOT NULL,
  cretated datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS matriculados;
CREATE TABLE IF NOT EXISTS matriculados (
  id int(11) NOT NULL auto_increment,
  turma_id int(11) NOT NULL,
  pessoa_id int(11) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS cidades;
CREATE TABLE cidades (
  id int(11) NOT NULL auto_increment,
  nome varchar(250) NOT NULL,
  uf char(2) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO cidades (id, nome, uf, created, updated) VALUES 
(1, 'RIO BRANCO', 'AC', '2011-10-07 10:19:58', '2011-10-07 10:19:58'),
(2, 'ANAPOLIS', 'GO', '2011-10-14 13:53:03', '2011-10-14 13:53:03');

DROP TABLE IF EXISTS congregacoes;
CREATE TABLE congregacoes (
  id int(11) NOT NULL auto_increment,
  sede_id int(11) default NULL,
  codigo varchar(40) NOT NULL,
  nome varchar(80) NOT NULL,
  endereco varchar(200) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY fk_reference_13 (sede_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO congregacoes (id, sede_id, codigo, nome, endereco, created, updated) VALUES 
(1, NULL, '1', 'SEDE', '', '2011-10-05 13:54:22', '2011-10-05 13:54:22'),
(2, NULL, '2', 'CAMPO LIMPO', '', '2011-10-05 14:05:44', '2011-10-05 14:05:44'),
(3, 1, '1.1', 'RECANTO DO SOL', '', '2011-10-05 14:06:37', '2011-10-05 14:06:37'),
(4, 1, '1.2', 'BAIRRO DE LOURDES', '', '2011-10-05 14:17:31', '2011-10-05 14:17:31'),
(5, 1, '1.3', 'POLOCENTRO', '', '2011-10-05 14:22:41', '2011-10-05 14:22:52');

DROP TABLE IF EXISTS contatos;
CREATE TABLE contatos (
  id int(11) NOT NULL auto_increment,
  contato varchar(80) NOT NULL,
  tipocontato_id int(11) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  pessoa_id int(11) default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id),
  KEY fk_reference_11 (pessoa_id),
  KEY fk_reference_12 (tipocontato_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS estadocivis;
CREATE TABLE estadocivis (
  id int(11) NOT NULL auto_increment,
  nome varchar(150) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO estadocivis (id, nome, created, updated) VALUES 
(1, 'SOLTERIO(A)', '2011-10-17 12:51:20', '2011-10-17 12:51:20'),
(2, 'CASADO(A)', '2011-10-17 12:51:34', '2011-10-17 12:51:34');

DROP TABLE IF EXISTS filhos;
CREATE TABLE filhos (
  id int(11) NOT NULL auto_increment,
  pessoa_id int(11) default NULL,
  nome varchar(80) NOT NULL,
  sexo char(1) NOT NULL,
  data_nascimento date default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY fk_reference_24 (pessoa_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS folhataloes;
CREATE TABLE folhataloes (
  id int(11) NOT NULL auto_increment,
  talao_id int(11) default NULL,
  data datetime NOT NULL,
  numero bigint(20) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY ak_key_2 (talao_id,numero),
  KEY idx_id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS grauinstrucoes;
CREATE TABLE grauinstrucoes (
  id int(11) NOT NULL auto_increment,
  nome varchar(50) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO grauinstrucoes (id, nome, created, updated) VALUES 
(1, 'FUNDAMENTAL', '2011-10-19 16:47:23', '2011-10-19 16:47:23'),
(2, 'FUNDAMENTAL INCOMPLETO', '2011-10-19 16:47:23', '2011-10-19 16:47:23'),
(3, 'SUPERIOR', '2011-10-19 16:50:29', '2011-10-19 16:50:29'),
(4, 'SUPERIOR INCOMPLETO', '2011-10-19 16:50:29', '2011-10-19 16:50:29');

DROP TABLE IF EXISTS lancamentos;
CREATE TABLE lancamentos (
  id int(11) NOT NULL auto_increment,
  planoconta_id int(11) default NULL,
  folhatalao_id int(11) default NULL,
  dizimista_id int(11) default NULL,
  valor float(8,2) NOT NULL,
  operacao char(1) NOT NULL,
  data date NOT NULL,
  anonimo tinyint(1) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id),
  KEY fk_reference_25 (planoconta_id),
  KEY fk_reference_3 (folhatalao_id),
  KEY fk_reference_4 (dizimista_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS motivos;
CREATE TABLE motivos (
  id int(11) NOT NULL auto_increment,
  nome varchar(30) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS ocorrencias;
CREATE TABLE ocorrencias (
  id int(11) NOT NULL auto_increment,
  pessoa_id int(11) default NULL,
  data date NOT NULL,
  ocorrencia text NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id),
  KEY fk_reference_22 (pessoa_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO ocorrencias (id, pessoa_id, data, ocorrencia, created, updated) VALUES 
(1, 1, '2011-10-17', 'so um teste de ocorrencia', '2011-10-17 08:35:57', '2011-10-17 08:35:57'),
(2, 1, '2011-10-19', 'outro teste', '2011-10-19 17:35:31', '2011-10-19 17:35:31');

DROP TABLE IF EXISTS pessoas;
CREATE TABLE pessoas (
  id int(11) NOT NULL auto_increment,
  congregacao_id int(11) default NULL,
  status_id int(11) NOT NULL,
  estadocivil_id int(11) default NULL,
  profissao_id int(11) default NULL,
  foto varchar(30) default NULL,
  nome varchar(200) NOT NULL,
  apelido varchar(50) default NULL,
  nome_pai varchar(200) default NULL,
  nome_mae varchar(200) default NULL,
  nome_conjuge varchar(200) default NULL,
  endereco varchar(200) default NULL,
  complemento varchar(250) default NULL,
  bairro varchar(80) default NULL,
  cidadeendereco_id int(11) default NULL,
  cep varchar(9) default NULL,
  sexo char(1) default NULL,
  data_nascimento date default NULL,
  rg_numero varchar(15) default NULL,
  rg_emissao date default NULL,
  rg_expedidor varchar(15) default NULL,
  cpf varchar(11) default NULL,
  grauinstrucao_id int(11) default NULL,
  cidadenaturalidade_id int(11) default NULL,
  data_entrada varchar(10) default NULL,
  motivoentrada_id int(11) default NULL,
  data_saida varchar(10) default NULL,
  motivosaida_id int(11) default NULL,
  data_batismo_agua varchar(10) default NULL,
  data_batismo_espirito varchar(10) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id),
  KEY fk_reference_10 (cidadeendereco_id),
  KEY fk_reference_16 (profissao_id),
  KEY fk_reference_17 (grauinstrucao_id),
  KEY fk_reference_18 (cidadenaturalidade_id),
  KEY fk_reference_19 (congregacao_id),
  KEY fk_reference_20 (motivoentrada_id),
  KEY fk_reference_21 (motivosaida_id),
  KEY fk_reference_7 (status_id),
  KEY fk_reference_9 (estadocivil_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO pessoas (id, congregacao_id, status_id, estadocivil_id, profissao_id, foto, nome, apelido, nome_pai, nome_mae, nome_conjuge, endereco, complemento, bairro, cidadeendereco_id, cep, sexo, data_nascimento, rg_numero, rg_emissao, rg_expedidor, cpf, grauinstrucao_id, cidadenaturalidade_id, data_entrada, motivoentrada_id, data_saida, motivosaida_id, data_batismo_agua, data_batismo_espirito, created, updated) VALUES 
(1, 1, 1, 2, NULL, NULL, 'AUGUSTO CLAUDIO SARAIVA TRINDADE', 'AUGUSTO', 'RODOLFO CLAUDIO SILVA TRINDADE', 'ANA ROSA SARAIVA TRINDADE', 'CAMILLE SUELLEN FARIAS TRINDADE', 'rua 13', 'qd 48 lt 07', 'pq residencial das flores', 2, '75085-440', 'M', '1984-04-13', '4220108', '1998-03-08', 'SSP-PA', '77707486234', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2011-10-15 08:50:01', '2011-10-19 17:07:09');

DROP TABLE IF EXISTS pessoas_tipopessoas;
CREATE TABLE pessoas_tipopessoas (
  pessoa_id int(11) NOT NULL,
  tipopessoa_id int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO pessoas_tipopessoas (pessoa_id, tipopessoa_id) VALUES 
(1, 5),
(1, 1);

DROP TABLE IF EXISTS planocontas;
CREATE TABLE planocontas (
  id int(11) NOT NULL auto_increment,
  pai_id int(11) default NULL,
  codigo varchar(40) NOT NULL,
  nome varchar(80) default NULL,
  created datetime default NULL,
  updted datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS profissoes;
CREATE TABLE profissoes (
  id int(11) NOT NULL auto_increment,
  nome varchar(50) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO profissoes (id, nome, created, updated) VALUES 
(1, 'ESTUDANTE', '2011-10-14 15:17:10', '2011-10-14 15:17:23');

DROP TABLE IF EXISTS status;
CREATE TABLE status (
  id int(11) NOT NULL auto_increment,
  nome varchar(15) NOT NULL,
  ativo tinyint(1) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO status (id, nome, ativo, created, updated) VALUES 
(1, 'Ativo', 1, '2011-10-19 10:22:21', '2011-10-19 10:22:21'),
(2, 'Inativo', 0, '2011-10-19 10:23:56', '2011-10-19 10:24:30'),
(3, 'Disciplina', 1, '2011-10-19 10:32:58', '2011-10-19 10:32:58');

DROP TABLE IF EXISTS taloes;
create table taloes(
   id int(11) NOT NULL auto_increment,
   congregacao_id int(11),
   inicial int(11) not null,
   final int(11) not null,
   created datetime default NULL,
   updated datetime default NULL,
   PRIMARY KEY  (id),
   KEY idx_id (id),
   KEY fk_reference_6 (congregacao_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS tipocontatos;
CREATE TABLE tipocontatos (
  id int(11) NOT NULL auto_increment,
  nome varchar(20) default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO tipocontatos (id, nome, created, updated) VALUES 
(1, 'TELEFONE', '2011-10-19 15:27:16', '2011-10-19 15:27:16'),
(2, 'CELULAR', '2011-10-19 15:27:16', '2011-10-19 15:27:16'),
(3, 'E-MAIL', '2011-10-19 15:27:27', '2011-10-19 15:27:27');

DROP TABLE IF EXISTS tipopessoas;
CREATE TABLE tipopessoas (
  id int(11) NOT NULL auto_increment,
  ordem int(11) NOT NULL,
  nome varchar(25) NOT NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  KEY idx_id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='- Congregado\r\n- Membro\r\n- Cooperador\r\n- Diaco' AUTO_INCREMENT=6 ;

INSERT INTO tipopessoas (id, ordem, nome, created, updated) VALUES 
(1, 1, 'PASTOR', '2011-10-18 10:27:26', '2011-10-18 10:28:15'),
(2, 2, 'EVANGELISTA', '2011-10-18 10:37:20', '2011-10-18 10:50:31'),
(3, 3, 'DIACONO', '2011-10-18 15:47:56', '2011-10-18 15:47:56'),
(4, 4, 'COOPERADOR', '2011-10-18 15:48:06', '2011-10-18 15:48:06'),
(5, 5, 'MEMBRO', '2011-10-18 15:48:14', '2011-10-18 15:48:14');

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
  id int(11) NOT NULL auto_increment,
  pessoa_id int(11) default NULL,
  congregacao_id int(11) default NULL,
  login varchar(30) NOT NULL,
  senha varchar(40) NOT NULL,
  ultimo_login datetime default NULL,
  created datetime default NULL,
  updated datetime default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY ak_key_2 (login),
  KEY idx_id (id),
  KEY fk_reference_23 (pessoa_id),
  KEY fk_reference_26 (congregacao_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO usuarios (id, pessoa_id, congregacao_id, login, senha, ultimo_login, created, updated) VALUES 
(1, NULL, NULL, 'admin', '7564aae0b81651570afc61212464310aa82ed0ef', NULL, '2011-10-04 10:34:45', '2011-10-15 08:49:16');
