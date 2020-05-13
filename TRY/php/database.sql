 Drop Database if exists base_project;
 Create Database if not exists base_project;
 	Create table if not exists user(
 		id_user integer primary key,
 		first_name varchar(50),
 		last_name varchar(50),
 		phone integer,
 		email varchar(100),
 		password varchar(100),
 		country varchar(100),
 		adresse varchar(100)
 	);
 	Create table if not exists course(
 		id_course integer primary key ,
 		id_user integer,
 		title varchar(200),
 		description text,
 		date date ,
 		level integer,
 		FOREIGN key (id_user) references user(id_user)
 	);
 	Create table if not exists category(
 		id_category integer primary key,
 		name varchar(50),
 		id_category_sup integer
 	);
 	Create table if not exists course_category(
 		id_category integer,
 		id_course integer,
 		FOREIGN key (id_category) references category(id_category),
 		FOREIGN key (id_course) references course(id_course)
 	);
 	Create table if not exists registred(
 		id_course integer,
 		id_user integer,
 		FOREIGN KEY (id_course) references course(id_course),
 		FOREIGN KEY (id_user) references user(id_user)
 	);
 	Create table if not exists chapter(
 		id_chapter integer primary key,
 		id_course integer ,
 		name varchar(50),
 		id_chaptre_sup integer,
 		FOREIGN key (id_course) references course(id_course)
 	);
 	Create table if not exists video(
 		id_video integer primary key,
 		id_chapter integer,
 		name varchar(50),
 		time time,
 		-- video ,
        FOREIGN key (id_chapter) references chapter(id_chapter)
 	);
 	Create table if not exists ressources(
 		id_chapter integer ,
 		content text,
 		FOREIGN key (id_chapter) references chapter(id_chapter)	
 	);
 	Create table comment(
 		id_comment integer primary key,
 		id_user integer,
 		id_course integer,
 		id_note integer ,
 		comment text ,
 		date date,
 		time time,
 		FOREIGN key (id_course) references course(id_course),
 		FOREIGN key (id_user) references user(id_user)
 	);
 	Create table if not exists note(
 		id_note integer primary key,
 		id_user integer,
 		id_course integer,
 		id_comment integer ,
 		note float,
 		FOREIGN key (id_course) references course(id_course),
 		FOREIGN key (id_user) references user(id_user)
 	);
 	ALTER TABLE note ADD CONSTRAINT fmk1 FOREIGN KEY (id_comment) REFERENCES comment(id_comment);
    ALTER TABLE comment ADD CONSTRAINT fmk2 FOREIGN KEY (id_note) REFERENCES note(id_note);