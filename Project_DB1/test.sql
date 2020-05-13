drop database if exists test ;
create database if not exists Ayoub ;
	Create table if not exists Table1(
		name varchar(20),
		adresse varchar(20) Default 'LOLO',
		phone integer ,
		Constraint Pmk primary key(phone)
		-- Constraint nl unique (adresse,name)
	);
	Create table if not exists Table2(
		phone_io integer ,
		Constraint Pmk foreign key (phone) references table1(phone)
		-- Constraint nl unique (adresse,name)
	);
	-- Alter table Table1 RENAME TO Table2;
	-- Alter table Table1 Drop column adresse ; 
	-- Alter table Table1 ADD fullname varchar(50);
	-- Alter table table1 MODIFY COLUMN adresse date ;
	-- Alter table table1 CHANGE COLUMN adresse newadresse date ;
	-- Alter table table1 drop primary key ;
	-- Alter table table1 ADD PRIMARY KEY (adresse);
	-- Alter table table1 ADD Constraint NameCos typeCon();
insert into table2 (phone_io) values (2) 












