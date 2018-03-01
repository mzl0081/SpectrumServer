select *
from spectrum_case
join (select distinct caseID from spectrum_case_user_relationship join sepctrum_users using(userID) where userID = '1') as T1 using(caseID);

