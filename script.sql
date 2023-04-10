Create SCHEMA php_project;-- AUTHORIZATION;

set search_path="php_project";


CREATE TABLE student
(
	student_num varchar(10) primary key,
	last_name varchar(15),
	first_name varchar(15),
	student_pass varchar(15),
	street varchar(30),
	city varchar(15),
	gender varchar(6),
	email varchar(20)
	);

	CREATE TABLE Courses
	(
		Course_num varchar(7) primary key,
		course varchar(30)
	);

	create table grades
	(
		student_num varchar(10),
		course_num varchar(7),
		year integer,
		sec varchar(15),
		grade char(2),
		Primary key(student_num,course_num)
	);

	INSERT INTO Student values ('1056430','Antwi','Daniel','dd','104 Carling Ave','Ottawa','Male','dd@localhost.com');

	INSERT INTO courses values('CSI1034','Intro to Programming');
	INSERT INTO courses values('CSI1035','Software Usability');
	INSERT INTO courses values('CSI2034','Database I');
	INSERT INTO courses values('CSI2134','Data Structures');
	INSERT INTO courses values('CSI3056','Formal Languages');
	INSERT INTO courses values('CSI3040','Intro to Computers');

	Insert into Grades values ('1056430','CSI1034',1,'Fall','A');
	Insert into Grades values ('1056430','CSI1035',1,'Fall','B+');
	Insert into Grades values ('1056430','CSI2034',1,'Fall','A+');
	Insert into Grades values ('1056430','CSI2134',1,'Winter','A');
