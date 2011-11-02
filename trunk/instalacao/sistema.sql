drop table if exists acos;

drop table if exists aros;

drop table if exists aros_acos;

drop table if exists campos;

drop table if exists cartoes;

drop table if exists cidades;

drop table if exists classes;

drop table if exists congregacoes;

drop table if exists contatos;

drop table if exists estadocivis;

drop table if exists filhos;

drop table if exists folhataloes;

drop table if exists grauinstrucoes;

drop table if exists lancamentos;

drop table if exists matriculados;

drop table if exists menus;

drop table if exists modelocartoes;

drop table if exists motivos;

drop table if exists ocorrencias;

drop table if exists pessoas;

drop table if exists pessoas_tipopessoas;

drop table if exists planocontas;

drop table if exists profissoes;

drop table if exists status;

drop table if exists taloes;

drop table if exists tipocontatos;

drop table if exists tipopessoas;

drop table if exists turmas;

drop table if exists usuarios;

/*==============================================================*/
/* Table: acos                                                  */
/*==============================================================*/
create table acos
(
   id                   int not null auto_increment,
   parent_id            int,
   model                varchar(255),
   foreign_key          int,
   alias                varchar(255),
   lft                  int,
   rght                 int,
   primary key (id)
);

/*==============================================================*/
/* Table: aros                                                  */
/*==============================================================*/
create table aros
(
   id                   int not null auto_increment,
   parent_id            int,
   model                varchar(255),
   foreign_key          int,
   alias                varchar(255),
   lft                  int,
   rght                 int,
   primary key (id)
)
auto_increment = 5;

insert into aros values (1, null, null, null, 'administrador', 1, 2);
insert into aros values (2, null, null, null, 'secretario', 3, 4);
insert into aros values (3, null, null, null, 'tesoureiro', 5, 6);
insert into aros values (4, null, null, null, 'escoladominical', 7, 8);

/*==============================================================*/
/* Table: aros_acos                                             */
/*==============================================================*/
create table aros_acos
(
   id                   int not null auto_increment,
   aro_id               int,
   aco_id               int,
   _create              varchar(2) default '0',
   _read                varchar(2) default '0',
   _update              varchar(2) default '0',
   _delete              varchar(2) default '0',
   primary key (id)
);

/*==============================================================*/
/* Table: campos                                                */
/*==============================================================*/
create table campos
(
   id                   int not null,
   modelocartao_id      int,
   nome                 varchar(30) not null,
   x_um                 int not null,
   y_um                 int not null,
   x_dois               int,
   y_dois               int,
   imagem               varchar(30),
   valor                varchar(150),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: cartoes                                               */
/*==============================================================*/
create table cartoes
(
   id                   int not null,
   sequencial           int not null,
   pessoa_id            int not null,
   modelocartao_id      int not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: cidades                                               */
/*==============================================================*/
create table cidades
(
   id                   int not null auto_increment,
   nome                 varchar(250) not null,
   uf                   char(2) not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: classes                                               */
/*==============================================================*/
create table classes
(
   id                   int not null auto_increment,
   nome                 varchar(30) not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: congregacoes                                          */
/*==============================================================*/
create table congregacoes
(
   id                   int not null auto_increment,
   sede_id              int,
   codigo               varchar(40) not null,
   nome                 varchar(80) not null,
   endereco             varchar(200),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: contatos                                              */
/*==============================================================*/
create table contatos
(
   id                   int not null auto_increment,
   contato              varchar(80) not null,
   tipocontato_id       int not null,
   created              datetime,
   updated              datetime,
   pessoa_id            int,
   primary key (id)
);

/*==============================================================*/
/* Table: estadocivis                                           */
/*==============================================================*/
create table estadocivis
(
   id                   int not null auto_increment,
   nome                 varchar(150) not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: filhos                                                */
/*==============================================================*/
create table filhos
(
   id                   int not null auto_increment,
   pessoa_id            int,
   nome                 varchar(80) not null,
   sexo                 char(1) not null,
   data_nascimento      date,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: folhataloes                                           */
/*==============================================================*/
create table folhataloes
(
   id                   int not null auto_increment,
   talao_id             int,
   data                 datetime not null,
   numero               bigint not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: grauinstrucoes                                        */
/*==============================================================*/
create table grauinstrucoes
(
   id                   int not null auto_increment,
   nome                 varchar(50),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: lancamentos                                           */
/*==============================================================*/
create table lancamentos
(
   id                   int not null auto_increment,
   planoconta_id        int,
   folhatalao_id        int,
   dizimista_id         int,
   valor                float(8,2) not null,
   operacao             char(1) not null,
   data                 date not null,
   anonimo              bool,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: matriculados                                          */
/*==============================================================*/
create table matriculados
(
   id                   int not null auto_increment,
   turma_id             int not null,
   pessoa_id            int not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: menus                                                 */
/*==============================================================*/
create table menus
(
   id                   int not null auto_increment,
   parent_id            int,
   lft                  int,
   rght                 int,
   nome                 varchar(100) not null,
   class_css            varchar(100),
   style_css            varchar(255),
   controller           varchar(30),
   action               varchar(30),
   url                  varchar(100),
   created              datetime,
   updated              datetime,
   primary key (id)
);

insert into menus values (1, null, 1, 2, 'HOME', 'home', '', 'principal', 'index', '', '2011-10-28 23:32:54', '2011-10-29 00:16:52');
insert into menus values (2, null, 3, 8, 'SECRETARIA', 'articles', '', '', '', '', '2011-10-28 23:57:54', '2011-10-29 00:16:52');
insert into menus values (3, 2, 4, 7, 'Cadastros', 'show subsubl', '', '', '', '', '2011-10-28 23:58:16', '2011-10-31 22:02:40');
insert into menus values (4, 3, 5, 6, 'Pessoas', 'user', '', 'pessoas', 'index', '', '2011-10-28 23:58:30', '2011-10-31 22:03:02');
insert into menus values (11, 10, 11, 12, 'Talões', 'articles', '', 'taloes', 'index', '', '2011-10-29 00:06:59', '2011-10-31 22:18:47');
insert into menus values (10, 9, 10, 13, 'Cadastros', 'show subsubl', '', '', '', '', '2011-10-29 00:06:45', '2011-10-31 22:06:46');
insert into menus values (9, null, 9, 14, 'TESOURARIA', 'tesouraria', '', '', '', '', '2011-10-29 00:05:51', '2011-10-29 00:16:52');
insert into menus values (12, null, 15, 20, 'ESCOLA BÍBLICA', 'escolabiblica', '', '', '', '', '2011-10-31 22:00:54', '2011-10-31 22:00:54');
insert into menus values (13, null, 21, 46, 'CONFIGURAÇÕES', 'settings', '', '', '', '', '2011-10-31 22:01:21', '2011-10-31 22:01:21');
insert into menus values (14, null, 47, 48, 'SAIR', 'logout', '', 'usuarios', 'logout', '', '2011-10-31 22:02:05', '2011-10-31 22:02:05');
insert into menus values (15, 12, 16, 17, 'Classes', 'articles', '', 'classes', 'index', '', '2011-10-31 22:08:46', '2011-10-31 22:08:46');
insert into menus values (16, 12, 18, 19, 'Turmas', 'articles', '', 'turmas', 'index', '', '2011-10-31 22:09:07', '2011-10-31 22:09:07');
insert into menus values (17, 13, 22, 23, 'Cidades', 'articles', '', 'cidades', 'index', '', '2011-10-31 22:11:34', '2011-10-31 22:11:34');
insert into menus values (18, 13, 24, 25, 'Profissões', 'articles', '', 'profissoes', 'index', '', '2011-10-31 22:11:56', '2011-10-31 22:11:56');
insert into menus values (19, 13, 26, 27, 'Congregações', 'articles', '', 'congregacoes', 'index', '', '2011-10-31 22:12:42', '2011-10-31 22:12:42');
insert into menus values (20, 13, 28, 29, 'Usuarios', 'articles', '', 'usuarios', 'index', '', '2011-10-31 22:13:44', '2011-10-31 22:13:58');
insert into menus values (21, 13, 30, 31, 'Tipo Pessoas', 'articles', '', 'tipopessoas', 'index', '', '2011-10-31 22:14:22', '2011-10-31 22:14:22');
insert into menus values (22, 13, 32, 33, 'Status', 'articles', '', 'status', 'index', '', '2011-10-31 22:15:03', '2011-10-31 22:15:03');
insert into menus values (23, 13, 34, 35, 'Grau de Instrução', 'articles', '', 'grauinstrucoes', 'index', '', '2011-10-31 22:15:40', '2011-10-31 22:15:40');
insert into menus values (24, 13, 36, 37, 'Plano de Contas', 'articles', '', 'planocontas', 'index', '', '2011-10-31 22:16:11', '2011-10-31 22:16:11');
insert into menus values (25, 13, 38, 39, 'Motivos', 'articles', '', 'motivos', 'index', '', '2011-10-31 22:16:29', '2011-10-31 22:16:29');
insert into menus values (26, 13, 40, 41, 'Estados Civis', 'articles', '', 'estadocivis', 'index', '', '2011-10-31 22:16:52', '2011-10-31 22:16:52');
insert into menus values (27, 13, 42, 43, 'Tipo Contatos', 'articles', '', 'tipocontatos', 'index', '', '2011-10-31 22:17:20', '2011-10-31 22:17:20');
insert into menus values (28, 13, 44, 45, 'Menus', 'articles', '', 'menus', 'index', '', '2011-10-31 22:17:42', '2011-10-31 22:17:42');

/*==============================================================*/
/* Table: modelocartoes                                         */
/*==============================================================*/
create table modelocartoes
(
   id                   int not null,
   tipopessoa_id        int,
   planofundo           varchar(50),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: motivos                                               */
/*==============================================================*/
create table motivos
(
   id                   int not null auto_increment,
   nome                 varchar(30) not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: ocorrencias                                           */
/*==============================================================*/
create table ocorrencias
(
   id                   int not null auto_increment,
   pessoa_id            int,
   data                 date not null,
   ocorrencia           text not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: pessoas                                               */
/*==============================================================*/
create table pessoas
(
   id                   int not null auto_increment,
   congregacao_id       int,
   status_id            int not null,
   estadocivil_id       int,
   profissao_id         int,
   foto                 varchar(30),
   nome                 varchar(200) not null,
   apelido              varchar(50),
   nome_pai             varchar(200),
   nome_mae             varchar(200),
   nome_conjuge         varchar(200),
   endereco             varchar(200),
   complemento          varchar(250),
   bairro               varchar(80),
   cidadeendereco_id    int,
   cep                  varchar(9),
   sexo                 char(1),
   data_nascimento      date,
   rg_numero            varchar(15),
   rg_emissao           date,
   rg_expedidor         varchar(15),
   cpf                  varchar(11),
   grauinstrucao_id     int,
   cidadenaturalidade_id int,
   data_entrada         varchar(10),
   motivoentrada_id     int,
   data_saida           varchar(10),
   motivosaida_id       int,
   data_batismo_agua    varchar(10),
   data_batismo_espirito varchar(10),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: pessoas_tipopessoas                                   */
/*==============================================================*/
create table pessoas_tipopessoas
(
   pessoa_id            int not null,
   tipopessoa_id        int not null,
   primary key (pessoa_id, tipopessoa_id)
);

/*==============================================================*/
/* Table: planocontas                                           */
/*==============================================================*/
create table planocontas
(
   id                   int not null auto_increment,
   pai_id               int,
   codigo               varchar(40) not null,
   nome                 varchar(80),
   created              datetime,
   updted               datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: profissoes                                            */
/*==============================================================*/
create table profissoes
(
   id                   int not null auto_increment,
   nome                 varchar(50),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: status                                                */
/*==============================================================*/
create table status
(
   id                   int not null auto_increment,
   nome                 varchar(15) not null,
   ativo                bool,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: taloes                                                */
/*==============================================================*/
create table taloes
(
   id                   int not null auto_increment,
   congregacao_id       int,
   inicial              int not null,
   final                int,
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: tipocontatos                                          */
/*==============================================================*/
create table tipocontatos
(
   id                   int not null auto_increment,
   nome                 varchar(20),
   created              datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: tipopessoas                                           */
/*==============================================================*/
create table tipopessoas
(
   id                   int not null auto_increment,
   ordem                int not null,
   nome                 varchar(25) not null,
   created              datetime,
   updated              datetime,
   primary key (id)
);

alter table tipopessoas comment '- Congregado
- Membro
- Cooperador
- Diaco';

/*==============================================================*/
/* Table: turmas                                                */
/*==============================================================*/
create table turmas
(
   id                   int not null auto_increment,
   nome                 varchar(50) not null,
   classe_id            int not null,
   congregacao_id       int not null,
   cretated             datetime,
   updated              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: usuarios                                              */
/*==============================================================*/
create table usuarios
(
   id                   int not null auto_increment,
   pessoa_id            int,
   congregacao_id       int,
   login                varchar(30) not null,
   senha                varchar(40) not null,
   ultimo_login         datetime,
   created              datetime,
   updated              datetime,
   primary key (id)
);

insert into usuarios values 
(1, null, null, 'admin', '7564aae0b81651570afc61212464310aa82ed0ef', null, now(), now());
