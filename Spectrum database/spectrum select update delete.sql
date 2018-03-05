

-- select examples
select *
from spectrum_case
join (select distinct caseID from spectrum_case_user_relationship join spectrum_users using(userID) where userID = '1') as T1 using(caseID);



select * from spectrum_question where caseID = '1';



select * from spectrum_option where questionID = '1';



select * from spectrum_teachersNote where caseID = '1';



select * from spectrum_users where userAccount = 'boningliang';



-- update examples

update spectrum_users set userPassword = 'boning' where userAccount = 'bzl0048';


-- update (reset) password examples

update spectrum_users set userPassword = 'boning' where userEmail = 'bzl0048@auburn.edu';























