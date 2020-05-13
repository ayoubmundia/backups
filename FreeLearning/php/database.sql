 Drop Database if exists base_project;
 Drop Database if exists focus;
 Create Database if not exists focus;
 	Create table if not exists user(
 		id_user integer primary key AUTO_INCREMENT ,
 		fullname varchar(250),
 		phone integer,
 		email varchar(100),
 		password varchar(100)
 	);
 	Create table if not exists course(
 		id_course integer primary key ,
 		id_user integer,
 		title varchar(200),
 		description varchar(600),
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
 		state boolean ,
 		description text,
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
 		comment text ,
 		FOREIGN key (id_course) references course(id_course),
 		FOREIGN key (id_user) references user(id_user)
 	);
 	Create table if not exists note(
 		id_note integer primary key,
 		id_user integer,
 		id_course integer,
 		note int,
 		FOREIGN key (id_course) references course(id_course),
 		FOREIGN key (id_user) references user(id_user)
 	);
 	