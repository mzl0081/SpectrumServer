drop trigger if exists spectrum_trigger_insert_case;
drop trigger if exists spectrum_trigger_insert_reply;
drop trigger if exists spectrum_trigger_delete_reply;
drop trigger if exists spectrum_trigger_before_insert_register_account;
drop trigger if exists spectrum_trigger_insert_like;
drop trigger if exists spectrum_trigger_insert_dislike;
drop trigger if exists spectrum_trigger_delete_like;
drop trigger if exists spectrum_trigger_delete_dislike;

drop table if exists spectrum_like;
drop table if exists spectrum_dislike;
drop table if exists spectrum_progress;
drop table if exists spectrum_register_account;
drop table if exists spectrum_topic_reply;
drop table if exists spectrum_topics;
drop table if exists spectrum_user_messages;
drop table if exists spectrum_user_friends;

drop table if exists spectrum_quiz_user_relationship;
drop table if exists spectrum_option_quiz_records;
drop table if exists spectrum_quiz_records;

drop table if exists spectrum_option_records;

drop table if exists spectrum_case_user_relationship;
drop table if exists spectrum_users;
drop table if exists spectrum_option;
drop table if exists spectrum_question;
drop table if exists spectrum_teachersNote;
drop table if exists spectrum_case;
drop table if exists spectrum_test;




create table spectrum_test (
 ID int auto_increment,
 primary key (ID)
);

insert into spectrum_test values
(null),
(null);


create table spectrum_register_account (
registerID int auto_increment,
registerEmail varchar(30),
registerTime timestamp default current_timestamp,
registerVerficationCode varchar(30),
primary key (registerID)
);


create table spectrum_case (
 caseID int auto_increment,
 caseName text,
 caseDescription text,
 caseVideoName varchar(30),
 caseType varchar(30),
 caseCoverPic varchar(30),
 caseVideoScreenshot varchar(30),
 primary key (caseID)
);

create table spectrum_question (
 questionID int auto_increment,
 questionContent text,
 explanation text,
 caseID int,
 primary key (questionID),
 foreign key (caseID) references spectrum_case (caseID)
);

create table spectrum_option (
 optionID int auto_increment,
 optionContent text,
 isSelect boolean not null,
 isCorrect boolean not null,
 questionID int,
 primary key (optionID),
 foreign key (questionID) references spectrum_question (questionID)
);

create table spectrum_teachersNote (
 noteID int auto_increment,
 noteVideo varchar(30),
 noteCover varchar(30),
 caseID int,
 primary key (noteID),
 foreign key (caseID) references spectrum_case (caseID)
);


create table spectrum_users (
 userID int auto_increment,
 userAccount varchar(30) unique,
 userPassword varchar(100),
 userEmail varchar(30) unique,
 userDisplayName varchar(30),
 userAvatar varchar(30),
 primary key (userID)
);

create table spectrum_topics (
topicID int auto_increment,
topicTitle text,
topicContent text,
userID int,
topicTime timestamp default current_timestamp,
topicNumberOfReplies int default 0,
numberOfLikes int default 0,
numberOfDislikes int default 0,
primary key (topicID),
foreign key (userID) references spectrum_users (userID)
);



create table spectrum_topic_reply (
topicReplyID int auto_increment,
topicID int,
userID int,
replyContent text,
replyTime timestamp default current_timestamp,
primary key (topicReplyID),
foreign key (userID) references spectrum_users (userID),
foreign key (topicID) references spectrum_topics (topicID)
);

create table spectrum_like (
likeID int auto_increment,
topicID int,
userID int,
likeTime timestamp default current_timestamp,
primary key (likeID),
foreign key (topicID) references spectrum_topics (topicID),
foreign key (userID) references spectrum_users (userID)
);

create table spectrum_dislike (
dislikeID int auto_increment,
topicID int,
userID int,
dislikeTime timestamp default current_timestamp,
primary key (dislikeID),
foreign key (topicID) references spectrum_topics (topicID),
foreign key (userID) references spectrum_users (userID)
);

create table spectrum_quiz_records (
quizID int auto_increment,
userID int not null,
caseID int not null,
attemptTime timestamp default current_timestamp,
primary key (quizID),
foreign key (userID) references spectrum_users (userID),
foreign key (caseID) references spectrum_case (caseID)
);

create table spectrum_option_quiz_records (
 recordID int auto_increment,
 quizID int not null,
 optionID int not null,
 isSelect boolean not null,
 primary key (recordID),
 foreign key (optionID) references spectrum_option (optionID),
 foreign key (quizID) references spectrum_quiz_records (quizID)
);



-- create table spectrum_option_records (
--  recordID int auto_increment,
--  optionID int,
--  isSelect varchar(30),
--  primary key (recordID),
--  foreign key (optionID) references spectrum_option (optionID)
-- );


create table spectrum_case_user_relationship (
 caseUserID int auto_increment,
 caseID int,
 userID int,
 primary key (caseUserID),
 foreign key (caseID) references spectrum_case (caseID),
 foreign key (userID) references spectrum_users (userID)
);

create table spectrum_user_friends (
 userFriendsID int auto_increment,
 myUserID int,
 friendUserID int,
 primary key (userFriendsID),
 foreign key (myUserID) references spectrum_users (userID),
 foreign key (friendUserID) references spectrum_users (userID)
);

create table spectrum_user_messages (
 userMessageID int auto_increment,
 myUserID int,
 friendUserID int,
 messageTime timestamp default current_timestamp,
 messageContent text,
 messageTitle text,
 primary key (userMessageID),
 foreign key (myUserID) references spectrum_users (userID),
 foreign key (friendUserID) references spectrum_users (userID)
);

create table spectrum_progress (
progressID int auto_increment,
userID int unique,
totalNumberOfCases int,
finishedNumberOfCase int default 0,
percentage float default 0,
primary key (progressID),
foreign key (userID) references spectrum_users (userID)
);

create trigger spectrum_trigger_insert_reply 
after insert on spectrum_topic_reply
for each row
update spectrum_topics
set topicNumberOfReplies = topicNumberOfReplies + 1
where topicID = new.topicID;

create trigger spectrum_trigger_delete_reply 
after delete on spectrum_topic_reply
for each row
update spectrum_topics
set topicNumberOfReplies = topicNumberOfReplies - 1
where topicID = old.topicID;


create trigger spectrum_trigger_insert_like
after insert on spectrum_like
for each row
update spectrum_topics
set numberOfLikes = numberOfLikes + 1
where topicID = new.topicID;

create trigger spectrum_trigger_insert_dislike
after insert on spectrum_dislike
for each row
update spectrum_topics
set numberOfDislikes = numberOfDislikes + 1
where topicID = new.topicID;




create trigger spectrum_trigger_delete_like
after delete on spectrum_like
for each row
update spectrum_topics
set numberOfLikes = numberOfLikes - 1
where topicID = old.topicID;

create trigger spectrum_trigger_delete_dislike
after delete on spectrum_dislike
for each row
update spectrum_topics
set numberOfDislikes = numberOfDislikes - 1
where topicID = old.topicID;




DELIMITER |
create trigger spectrum_trigger_insert_user
after insert on spectrum_users
 for each row
 begin
  insert into spectrum_case_user_relationship (caseID, userID)
  	select caseID, new.userID from spectrum_case;
  insert into spectrum_progress (userID, totalNumberOfCases)
  	select new.userID, count(*) from spectrum_case;
 end; |
DELIMITER ;

DELIMITER |
create trigger spectrum_trigger_insert_quiz_records
 after insert on spectrum_quiz_records
  for each row 
   begin
    declare countRecords int;
    set countRecords = (select count(*) from spectrum_quiz_records where caseID = new.caseID and userID = new.userID);
    if countRecords = 1
     then
      update spectrum_progress 
      	set finishedNumberOfCase = finishedNumberOfCase + 1, percentage = finishedNumberOfCase / totalNumberOfCases 
      	where userID = new.userID;
    end if;

   end; |
DELIMITER ;



create trigger spectrum_trigger_insert_case
after insert on spectrum_case
for each row
insert into spectrum_case_user_relationship (caseID, userID)
select new.caseID, userID from spectrum_users;



-- create trigger spectrum_trigger_before_insert_register_account
-- before insert on spectrum_register_account
-- for each row
-- delete from spectrum_register_account where registerEmail = new.registerEmail;


-- create table spectrum_register_account (
-- registerID int auto_increment,
-- registerEmail varchar(30),
-- registerTime timestamp default current_timestamp,
-- registerVerficationCode varchar(30),
-- primary key (registerID)
-- );

-- insert into spectrum_register_account values
-- (null, '952735135@qq.com', null, '123456');



-- create table spectrum_case (
--  caseID int auto_increment,
--  caseName text,
--  caseDescription text,
--  caseVideoName varchar(30),
--  caseType varchar(30),
--  caseCoverPic varchar(30),
--  caseVideoScreenshot varchar(30),
--  primary key (caseID)
-- );


-- insert into spectrum_case values
-- (null, 'Case study 10: Oppositional Defiant Disorder', 'The teacher does not know how to handle the student who has oppositional defiant disorder. In this case, the teacher does not pay much attention to Willy. When Willy\'s behavior problems appear, the teacher doesn\'t know how to help Willy and solve the problem by herself. She instead sends him to the positive behavior teacher to correct his behavior. For this scenario, I would like for teachers to be aware of this kind of situation and be encouraged to learn this disorder.', 'case_MZL_10', 1, 'case_video_cover_10', 'case_video_screenshot_10'),
-- (null, 'Case study 11: Extroverted Student', 'Jaden is an eight year old in the second grade classroom. His misbehaviors are mostly because of speaking out of turn. The teacher does not know how to properly deal with this situation that Jaden talks out of turn when she is not asking for responses. In this case, when Jaden suddenly stands up and gives his answer in class, the teacher makes him move his clip down after class to punish him. However, it leads to a negetive result that Jaden becomes a lot quieter and lacks motivation to do his work.', 'case_CR_11', 1, 'case_video_cover_11', 'case_video_screenshot_11');


lock tables spectrum_case write;
insert into spectrum_case values
(null, 'Case study 10: Oppositional Defiant Disorder', 'Disorder.', 'case_MZL_10', 1, 'case_video_cover_10', 'case_video_screenshot_10'),
(null, 'Case study 11: Extroverted Student', 'Student.', 'case_CR_11', 1, 'case_video_cover_11', 'case_video_screenshot_11'),
(null, 'Case study 12: Extroverted Student', 'Student.', 'case_CR_11', 1, 'case_video_cover_11', 'case_video_screenshot_11'),
(null, 'Case study 13: Extroverted Student', 'Student.', 'case_CR_11', 1, 'case_video_cover_11', 'case_video_screenshot_11'),
(null, 'Case study 14: Extroverted Student', 'Student.', 'case_CR_11', 1, 'case_video_cover_11', 'case_video_screenshot_11');
unlock tables;


lock tables spectrum_question write;
insert into spectrum_question values
(null, 'Considering Willy\'s behavioral problems, should he be immediately sent to the Positive Behavior teacher?', 'One successful example shows that teachers should pay attention and show respect to students who have oppositional defiant disorder. Because most of time students seek attention from teachers. Sending them to the positive behavior teachers will hurt their confidence and self-esteem. In this case, teachers shouldn\'t send them immediately to special department when they have behavior problems. And teachers also should know when to show much attention and less attention. For example, show less attention when they don\'t improve their behavior.', 1),
(null, 'Considering Jaden\'s behavioral problems, is there any better way for the teacher to handle this? ', 'It seems that Jaden never has enough opportunity to verbalize what he wants to say and this is why he talks out of turn. Teachers could implement more mixed responses style questions in the class which will lead to fewer disruptions made by students like Jaden. If the teacher uses this approach, Jaden will have more opportunities to voice his opinions and ideas in class.', 2);
unlock tables;


lock tables spectrum_option write;
insert into spectrum_option values
(null, 'Yes, Willy should be sent to the Positive Behavior teacher.', false, false, 1),
(null, 'No, Willy shouldn\'t be sent to the Positive Behavior teacher.', false, true, 1),
(null, 'Yes, the teacher should give more mixed responses style questions to allow Jaden to voice his ideas without distracting others.', false, true, 2),
(null, 'No. Jaden should take his punishment to move his clip down.', false, false, 2);
unlock tables;


lock tables spectrum_teachersNote write;
insert into spectrum_teachersNote values
(null, 'case_MZL_10_TN', 'teachers_note_cover_10', 1),
(null, 'case_CR_11_TN', 'teachers_note_cover_11', 2);
unlock tables;



-- create table spectrum_users (
--  userID int auto_increment,
--  userAccount varchar(30) unique,
--  userPassword varchar(30),
--  userEmail varchar(30) unique,
--  userDisplayName varchar(30),
--  userAvatar varchar(30),
--  primary key (userID)
-- );

lock tables spectrum_users write;
insert into spectrum_users values
(null, 'bzl0048', 'bzl0048','bzl0048@auburn.edu', 'Boning Liang', "default_avatar"),
(null, 'czr0049', 'czr0049','czr0049@auburn.edu', 'Chang Ren', "default_avatar"),
(null, 'mzl0081', 'mzl0081','mzl0081@auburn.edu', 'Muzi Li', "default_avatar"),
(null, 'dzf0023', 'dzf0023','dzf0023@auburn.edu', 'Dongji Feng', "default_avatar"),
(null, 'jzl0166', 'jzl0166','jzl0166@auburn.edu', 'Jingjing Li', "default_avatar");
unlock tables;

-- insert into spectrum_option_records ();

-- insert into spectrum_case_user_relationship values
-- (null, 1, 1),
-- (null, 2, 1);


-- create table spectrum_topics (
-- topicID int auto_increment,
-- topicTitle text,
-- topicContent text,
-- userID int,
-- topicTime timestamp default current_timestamp,
-- topicNumberOfReplies int default 0,
-- numberOfLikes int default 0,
-- numberOfDislikes int default 0,
-- primary key (topicID),
-- foreign key (userID) references spectrum_users (userID)
-- );

lock tables spectrum_topics write;
insert into spectrum_topics values
(null, 'What are your results?', 'eeecidentally.', 1, null, 0, 0, 0),
(null, 'test discussion 2', 'test discussion content2', 2, null, 0, 0, 0),
(null, 'test discussion 3', 'test discussion content3', 3, null, 0, 0, 0),
(null, 'test discussion 4', 'test discussion content4', 4, null, 0, 0, 0),
(null, 'test discussion 5', 'test discussion content5', 5, null, 0, 0, 0),
(null, 'test discussion 6', 'test discussion content6', 1, null, 0, 0, 0);
unlock tables;

-- create table spectrum_topic_reply (
-- topicUserID int auto_increment,
-- topicID int,
-- userID int,
-- replyContent text,
-- replyTime timestamp default current_timestamp,
-- primary key (topicUserID),
-- foreign key (userID) references spectrum_users (userID),
-- foreign key (topicID) references spectrum_topics (topicID)
-- );

lock tables spectrum_topic_reply write;
insert into spectrum_topic_reply values
(null, 1, 2, 'test reply test reply test reply test replytest replytest reply test replyest reply test reply test reply test replytest replytest reply tesest reply test reply test reply test replytest replytest reply tes', null),
(null, 2, 2, 'test reply', null),
(null, 3, 2, 'test reply', null),
(null, 4, 2, 'test reply', null),
(null, 5, 2, 'test reply', null),
(null, 6, 2, 'test reply', null),
(null, 1, 1, 'test reply', null),
(null, 1, 2, 'test reply', null),
(null, 1, 3, 'test reply', null);
unlock tables;



-- create table spectrum_like (
-- likeID int auto_increment,
-- topicID int,
-- userID int,
-- likeTime timestamp default current_timestamp,
-- primary key (likeID),
-- foreign key (topicID) references spectrum_topics (topicID),
-- foreign key (userID) references spectrum_users (userID)
-- );


lock tables spectrum_like write;
insert into spectrum_like values
(null, 2, 1, null),
(null, 2, 2, null),
(null, 2, 3, null);
unlock tables;


lock tables spectrum_dislike write;
insert into spectrum_dislike values
(null, 1, 4, null),
(null, 2, 4, null),
(null, 3, 4, null);
unlock tables;



-- select * from spectrum_register_account where registerEmail='952735135@qq.com' and registerVerficationCode='123456' and now()-registerTime < 600;

-- after checked an option

-- create table spectrum_quiz_records (
-- quizID int auto_increment,
-- userID int not null,
-- primary key (quizID)
-- );

-- create table spectrum_option_quiz_records (
--  recordID int auto_increment,
--  quizID int not null,
--  optionID int not null,
--  isSelect varchar(30),
--  primary key (recordID),
--  foreign key (optionID) references spectrum_option (optionID),
--  foreign key (quizID) references spectrum_quiz_records (quizID)
-- );

-- insert into spectrum_quiz_records values 
-- (null, 1);

-- insert into spectrum_option_quiz_records values
-- (null, 1, 1, true);


-- select * from spectrum_topics where topicID=2;


-- select * from spectrum_quiz_records;
-- select * from spectrum_option_quiz_records;

-- select * from spectrum_case_user_relationship;
delete from spectrum_case_user_relationship where caseID=2 and userID=1;

-- delete from spectrum_like where likeID = 1;


-- select * from spectrum_topics where topicID=2;


-- select topicID, topicTitle, topicContent, userID, userDisplayName, topicTime, topicNumberOfReplies, numberOfLikes, numberOfDislikes 
-- from spectrum_topics 
-- join spectrum_users using(userID) 
-- order by(topicTime) desc;


-- select topicID, topicTitle, topicContent, spectrum_users.userID, 
-- userDisplayName, topicTime, topicNumberOfReplies, numberOfLikes, numberOfDislikes
-- from spectrum_topics 
-- join spectrum_users using(userID)
-- left join spectrum_like using(topicID)
-- left join spectrum_dislike using(topicID)
-- order by(topicTime) desc;


-- select *
-- from spectrum_topics 
-- join spectrum_users using(userID)
-- left join spectrum_like using(topicID)
-- left join spectrum_dislike using(topicID)
-- order by(topicTime) desc;


select * from spectrum_like
where userID=1 and topicID=2;

select * from spectrum_dislike
where userID=4 and topicID=2;

delete from spectrum_like where likeID = 1;

delete from spectrum_dislike where dislikeID = 1;




-- select topicID, likeID, spectrum_like.userID, likeTime
-- from spectrum_topics 
-- join spectrum_users using(userID)
-- left join spectrum_like using(topicID)
-- -- where spectrum_like.userID=4 or spectrum_like.userID is null
-- order by(topicTime) desc;

-- select topicID, dislikeID, spectrum_dislike.userID, dislikeTime
-- from spectrum_topics 
-- join spectrum_users using(userID)
-- left join spectrum_dislike using(topicID)
-- -- where spectrum_dislike.userID=1 or spectrum_dislike.userID is null
-- order by(topicTime) desc;



-- select * from spectrum_case;
-- select * from spectrum_case_user_relationship where userID=1;

-- select * from spectrum_case as t1
-- join
-- (select * from spectrum_case_user_relationship where userID=1) as t2
-- having ();


-- select * from (select t1.caseID, t1.caseName, t2.userID 
-- from spectrum_case as t1 
-- join spectrum_case_user_relationship as t2
-- on t1.caseID = t2.caseID
-- where userID = 1) as t3
-- not in
-- (select caseID, caseName
-- from spectrum_case) as t4;

-- select t1.caseID, t1.caseName, t2.userID 
-- from spectrum_case as t1 
-- join spectrum_case_user_relationship as t2
-- on t1.caseID = t2.caseID
-- where userID = 1;

-- select caseID, caseName
-- from spectrum_case;


-- select t1.caseID, t2.caseID, t1.caseName, t2.userID 
-- from spectrum_case as t1 
-- join spectrum_case_user_relationship as t2
-- where userID = 1;


-- select caseID, caseName from spectrum_case join;

-- (select distinct userID, caseID, caseName
-- from spectrum_case
-- join spectrum_case_user_relationship using(caseID)
-- where userID = 1)
-- union
-- (select distinct userID, t1.caseID, caseName
-- from spectrum_case as t1
-- join spectrum_case_user_relationship as t2 on t1.caseID<>t2.caseID
-- where userID = 1);

-- (select distinct caseID, userID
-- from spectrum_case_user_relationship where userID=1)
-- union 
-- (select distinct caseID, caseName
-- from spectrum_case);


-- select * from spectrum_quiz_user_relationship where userID = 1


-- select topicReplyID, userID, userDisplayName, userAvatar, replyContent, replyTime from spectrum_topic_reply join spectrum_users using(userID) where topicID = 1;

-- select topicReplyID, userID, userDisplayName, replyContent, replyTime from spectrum_topic_reply join spectrum_users using(userID) where topicID = 1;

-- select userAccount, userEmail, userDisplayName, userAvatar from spectrum_users where (userAccount='bzl0048') and (userPassword='bzl0048');
-- select userAccount, userEmail, userDisplayName, userAvatar from spectrum_users where (userAccount='bzl0048') and (userPassword=Password('bzl0048'));


-- select * from spectrum_users;

-- select * from spectrum_topics;

-- select * from spectrum_topics where topicID = 1;

-- select * from spectrum_topic_reply where topicID = 1;



-- select topicID, topicTitle, topicContent, userID, userDisplayName, topicTime, topicNumberOfReplies from spectrum_topics join spectrum_users using(userID);

-- select topicID, topicTitle, topicContent, userID, userDisplayName, topicTime, topicNumberOfReplies from spectrum_topics join spectrum_users using(userID) where topicID = 1;

-- select topicID, topicTitle, topicContent, userID, topicTime from spectrum_topics where topicID = 1;

-- select topicReplyID, userID, userDisplayName, replyContent, replyTime from spectrum_topic_reply join spectrum_users using(userID) where topicID = 1;


