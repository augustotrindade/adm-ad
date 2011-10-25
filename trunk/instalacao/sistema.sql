drop table if exists campos;

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
