<?php
include_once('../m/model.php');
$sex='create table sex(
	id int not null auto_increment primary key,
	type varchar(8)
	)default charset=utf8';
$users='create table users(
	id int not null auto_increment primary key,
	name varchar(32) not null,
	subname varchar(32) not null,
	email varchar(64) not null unique,
	dbirth int,
	pass varchar(128) not null,
	sexid int,
	foreign key (sexid) references sex(id)
	on update cascade
	)default charset=utf8';
$feeds='create table feeds(
	id int not null auto_increment primary key,
	feed varchar(1024) not null,
	ftime int,
	userid int,
	foreign key (userid) references users(id)
	on update cascade
	)default charset=utf8';
$sex_types='insert into sex(type) values ("male"),("female"),("unknow")';
$pdo->query($sex);
$pdo->query($users);
$pdo->query($feeds);
$pdo->query($sex_types);