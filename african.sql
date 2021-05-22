create database africantalks;
use africantalks;

create table users(
registeredId int(255) auto_increment,
Datedded timestamp not null,
firstname varchar(25) not null,
lastname varchar(25) not null,
username varchar(25),
livingplace varchar(25),
position varchar(100),
emailaddress varchar(25) not null,
phonenumber varchar(13) not null,
birthdate date,
gender enum('Male','Female','Others') not null,
password varchar(8) not null,
iname varchar(255),
image  varchar(255) not null,
coverpicture varchar(255) not null,
primary key(registeredId,phonenumber)
)engine=innoDB;

create table logs(
logid int(255) auto_increment,
logdate timestamp not null,
phonenumber varchar(13) not null,
primary key(logid)
)engine=innoDB;

create table changedpassword(
changesid int(255) auto_increment,
changeddate timestamp not null,
phonenumber varchar(13) not null,
oldpassword varchar(8) not null,
newpassword varchar(8) not null,
primary key(changesid)
)engine=innoDB;

create table posts(
postid int auto_increment,
user varchar(13) not null,
post longtext,
photo varchar(100),
filetype varchar(10) not null,
posttime timestamp not null,
primary key(postid)
)engine=innoDB;

create table mylikes(
likeid int auto_increment,
liker varchar(13) not null,
liked varchar(13) not null,
postcode int not null,
likestatus varchar(5) not null,
likedtime timestamp not null,
primary key(likeid)
)engine=innoDB;

create table mycomments(
commentid int auto_increment,
comments longtext,
photo varchar(100),
postid varchar(13) not null, 
commenter varchar(13) not null,
commentedtime timestamp not null,
primary key(commentid)
)engine=innoDB;

create table friendrequest(
requestid int auto_increment,
requester varchar(13) not null,
requested varchar(13) not null,
status varchar(20) not null,
requestedtime timestamp not null,
primary key(requestid)
)engine=innoDB;

create table friends(
friendid int auto_increment,
me varchar(13) not null,
myfriend varchar(13) not null,
addedtime timestamp not null,
primary key(friendid)
)engine=innoDB;