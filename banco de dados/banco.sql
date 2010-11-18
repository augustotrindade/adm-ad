drop database if exists secretaria;

create database secretaria;

use secretaria;

create table cidades
(
   id                   int(11) not null auto_increment,
   nome                 varchar(255) not null default '',
   uf                   char(2) not null default '',
   created              datetime default null,
   updated              datetime default null,
   primary key (id)
);

create index idx_cidade on cidades
(
   id
);

create table congregacoes
(
   id                   int(11) not null auto_increment,
   nome                 varchar(255) not null default '',
   endereco             text not null,
   created              datetime default null,
   updated              datetime default null,
   primary key (id)
);

create index idx_congregacao on congregacoes
(
   id
);

create table funcoes
(
   id                   int(11) not null auto_increment,
   nome                 varchar(255) not null default '',
   abreviacao           varchar(10) not null default '',
   obreiro              tinyint(1) default null,
   created              datetime default null,
   updated              datetime default null,
   primary key (id)
);

create table membros
(
   id                   int(11) not null,
   congregacao_id       int(11) not null,
   funcao_id            int(11) not null,
   nome                 varchar(255) not null,
   sexo                 char(1) not null,
   data_nascimento      date not null,
   uf_nascimento        char(2) not null,
   cidadenascimento_id  int(11) not null,
   estado_civil         char(1) not null,
   nome_conjuge         varchar(255) default null,
   data_batismo_aguas   varchar(10) not null,
   data_batismo_espirito varchar(10) default null,
   nome_pai             varchar(255) default null,
   nome_mae             varchar(255) default null,
   num_filhos           int(11) default null,
   nome_filhos          text,
   cep                  varchar(9) default null,
   endereco             varchar(255) default null,
   quadra               varchar(50) default null,
   lote                 varchar(50) default null,
   uf_endereco          char(2) default null,
   cidadeendereco_id    int(11) default null,
   bairro               varchar(100) default null,
   telefone             varchar(13) default null,
   celular              varchar(13) default null,
   numero_rg            varchar(50) default null,
   org_exp_rg           varchar(50) default null,
   data_exp_rg          varchar(10) default null,
   cpf                  varchar(14) default null,
   foto                 varchar(50) default null,
   situacao             tinyint(1) default null,
   created              datetime default null,
   updated              datetime default null,
   primary key (id),
   constraint fk_membro_cidadeendereco foreign key (cidadeendereco_id)
      references cidades (id) on delete restrict on update restrict,
   constraint fk_membro_cidadenascimento foreign key (cidadenascimento_id)
      references cidades (id) on delete restrict on update restrict,
   constraint fk_membro_congregacao foreign key (congregacao_id)
      references congregacoes (id) on delete restrict on update restrict,
   constraint fk_membro_funcao foreign key (funcao_id)
      references funcoes (id) on delete restrict on update restrict
);

create table consagracoes
(
   id                   int(11) not null,
   membro_id            int(11) not null,
   funcao_id            int(11) not null,
   data_consagracao     date not null,
   uf                   char(2) not null,
   cidade_id            int(11) not null,
   nome_igreja          varchar(255) not null,
   nome_pastor          varchar(255) not null,
   created              datetime default null,
   updated              datetime default null,
   primary key (id),
   constraint fk_consagrecao_membro foreign key (membro_id)
      references membros (id) on delete restrict on update restrict,
   constraint fk_consagracao_funcao foreign key (funcao_id)
      references funcoes (id) on delete restrict on update restrict
);

create index idx_consagracao on consagracoes
(
   id
);

create index idx_funcao on funcoes
(
   id
);

create table log
(
   id                   int(4) not null default 0,
   mensagem             varchar(50) not null default '',
   query                text not null
);

alter table log
   add unique ak_key_1 (id);

create index idx_log on log
(
   id
);

create index idx_membro on membros
(
   id
);

create table ocorrencias
(
   id                   int(11) not null,
   membro_id            int(11) not null,
   data_ocorrencia      date not null,
   pequena_descricao    varchar(255) not null,
   descricao            text not null,
   created              datetime default null,
   updated              datetime default null,
   primary key (id),
   constraint fk_ocorrencia_membro foreign key (membro_id)
      references membros (id) on delete restrict on update restrict
);

create index idx_ocorrencia on ocorrencias
(
   id
);

create table situacoes
(
   id                   int(11) not null auto_increment,
   nome                 varchar(255) not null,
   ativo                tinyint(1) not null,
   created              datetime default null,
   updated              datetime default null,
   primary key (id)
);

create index idx_situacao on situacoes
(
   id
);

create table usuarios
(
   id                   int(11) not null auto_increment,
   nome                 varchar(50) not null default '',
   login                varchar(20) not null default '',
   senha                varchar(32) not null default '',
   admin                tinyint(1) not null default 0,
   data_log             int(11) not null default 0,
   created              datetime not null,
   updated              datetime not null,
   primary key (id)
);

create index idx_usuario on usuarios
(
   id
);
