drop table if exists spectrum_option_records;
drop table if exists spectrum_case_user_relationship;
drop table if exists spectrum_users;
drop table if exists spectrum_option;
drop table if exists spectrum_question;
drop table if exists spectrum_teachersNote;
drop table if exists spectrum_case;


create table spectrum_case (
 caseID varchar(30),
 caseName varchar(30),
 caseDescription text,
 caseVideoName varchar(30),
 caseType varchar(30),
 caseCoverPic varchar(30),
 caseVideoScreenshot varchar(30),
 primary key (caseID)
);

create table spectrum_question (
 questionID varchar(30),
 questionContent text,
 explanation text,
 caseID varchar(30),
 primary key (questionID),
 foreign key (caseID) references spectrum_case (caseID)
);

create table spectrum_option (
 optionID varchar(30),
 optionContent text,
 isSelect boolean not null,
 isCorrect boolean not null,
 questionID varchar(30),
 primary key (optionID),
 foreign key (questionID) references spectrum_question (questionID)
);

create table spectrum_teachersNote (
 noteID varchar(30),
 noteVideo varchar(30),
 noteCover varchar(30),
 caseID varchar(30),
 primary key (noteID),
 foreign key (caseID) references spectrum_case (caseID)
);


create table spectrum_users (
 userID varchar(30),
 userAccount varchar(30) unique,
 userPassword varchar(30),
 userEmail varchar(30),
 userDisplayName varchar(30),
 userAvatar varchar(30),
 primary key (userID)
);

create table spectrum_option_records (
 recordID varchar(30),
 optionID varchar(30),
 isSelect varchar(30),
 primary key (recordID),
 foreign key (optionID) references spectrum_option (optionID)
);


create table spectrum_case_user_relationship (
 caseUserID varchar(30),
 caseID varchar(30),
 userID varchar(30),
 primary key (caseUserID),
 foreign key (caseID) references spectrum_case (caseID),
 foreign key (userID) references spectrum_users (userID)
);

create table spectrum_user_friends (
 userFriendsID varchar(30),
 myUserID varchar(30),
 friendUserID varchar(30),
 primary key (userFriendsID),
 foreign key (myUserID) references spectrum_users (userID),
 foreign key (friendUserID) references spectrum_users (userID)
);

create table spectrum_user_messages (
 userMessageID varchar(30),
 myUserID varchar(30),
 friendUserID varchar(30),
 messageTime datetime,
 messageContent text,
 messageTitle text,
 primary key (userMessageID),
 foreign key (myUserID) references spectrum_users (userID),
 foreign key (friendUserID) references spectrum_users (userID)
);


insert into spectrum_case values
('1', 'Case study 10: Oppositional Defiant Disorder', 'The teacher does not know how to handle the student who has oppositional defiant disorder. In this case, the teacher does not pay much attention to Willy. When Willy\'s behavior problems appear, the teacher doesn\'t know how to help Willy and solve the problem by herself. She instead sends him to the positive behavior teacher to correct his behavior. For this scenario, I would like for teachers to be aware of this kind of situation and be encouraged to learn this disorder.', 'case_MZL_10', '1', 'case_video_cover_10', 'case_video_screenshot_10'),
('2', 'Case study 11: Extroverted Student', 'Jaden is an eight year old in the second grade classroom. His misbehaviors are mostly because of speaking out of turn. The teacher does not know how to properly deal with this situation that Jaden talks out of turn when she is not asking for responses. In this case, when Jaden suddenly stands up and gives his answer in class, the teacher makes him move his clip down after class to punish him. However, it leads to a negetive result that Jaden becomes a lot quieter and lacks motivation to do his work.', 'case_CR_11', '1', 'case_video_cover_11', 'case_video_screenshot_11');

insert into spectrum_question values
('1', 'Considering Willy\'s behavioral problems, should he be immediately sent to the Positive Behavior teacher?', 'One successful example shows that teachers should pay attention and show respect to students who have oppositional defiant disorder. Because most of time students seek attention from teachers. Sending them to the positive behavior teachers will hurt their confidence and self-esteem. In this case, teachers shouldn\'t send them immediately to special department when they have behavior problems. And teachers also should know when to show much attention and less attention. For example, show less attention when they don\'t improve their behavior.', '1'),
('2', 'Considering Jaden\'s behavioral problems, is there any better way for the teacher to handle this? ', 'It seems that Jaden never has enough opportunity to verbalize what he wants to say and this is why he talks out of turn. Teachers could implement more mixed responses style questions in the class which will lead to fewer disruptions made by students like Jaden. If the teacher uses this approach, Jaden will have more opportunities to voice his opinions and ideas in class.', '2');

insert into spectrum_option values
('1', 'Yes, Willy should be sent to the Positive Behavior teacher.', FALSE, false, '1'),
('2', 'No, Willy shouldn\'t be sent to the Positive Behavior teacher.', false, true, '1'),
('3', 'Yes, the teacher should give more mixed responses style questions to allow Jaden to voice his ideas without distracting others.', false, true, '2'),
('4', 'No. Jaden should take his punishment to move his clip down.', false, false, '2');

insert into spectrum_teachersNote values
('1', 'case_MZL_10_TN', 'teachers_note_cover_10', '1'),
('2', 'case_CR_11_TN', 'teachers_note_cover_11', '2');

insert into spectrum_users values
('1', 'bzl0048', 'bzl0048', 'Boning Liang');

-- insert into spectrum_option_records ();

insert into spectrum_case_user_relationship values
('1', '1', '1'),
('2', '2', '1');
