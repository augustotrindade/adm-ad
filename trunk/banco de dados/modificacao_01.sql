 
CREATE TABLE `acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`));

 
CREATE TABLE `aros` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`));

 
CREATE TABLE `aros_acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`aro_id` int(10) NOT NULL,
	`aco_id` int(10) NOT NULL,
	`_create` varchar(2) DEFAULT '0' NOT NULL,
	`_read` varchar(2) DEFAULT '0' NOT NULL,
	`_update` varchar(2) DEFAULT '0' NOT NULL,
	`_delete` varchar(2) DEFAULT '0' NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `ARO_ACO_KEY` (`aro_id`, `aco_id`));
