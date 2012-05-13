-- user(uid,user_id,first_name,middle_name,last_name,dob,email,phone1,phone2,active,deleted,datetime_created,last_action,last_modified,image_url)
-- enrollment(uid,enroll_startdatetime,enroll_enddatetime)
-- user_course_enrollment(course_code,user_id_enrollment_id)
-- course_instructor(course_code,user_id)
-- role(uid,name,description)
-- user_role(user_id,role_id)
-- privilege(uid,name,description)
-- role_privilege(priviledge_id,role_id,assigned_datetime)
-- role_privilege_action(priviledge_id,role_id,action)
-- activity(uid,overview,date_created,last_modified)
-- message(uid,sender_id,receiver_id,subject,body,sent_datetime)
-- group(uid,name,description,users)
-- user_group(user_id,group_id,date_joined)
-- comment(uid,text,replied_to)
-- user_comment(comment_id,user_id,datetime_created)
-- activity_comment(activity_id,comment_id,posted_datetime)
-- graded_work(uid,title,type,description,maximum_grade,minimum_grade,percent_grade,datetime_created,created_by)
-- graded_work_grade_letter(letter_grade_id,graded_work_id)
-- course_graded_work(course_code,graded_work_id)
-- graded_work_comment(graded_work_id,comment_id,posted_datetime)

-- quiz(uid,course_code,open_datetime,close_datetime,passkey,grade,overview,duration)
-- quiz_attempt(uid,quiz_id,user_id,attempt,attempt_datetime,grade,start_time,end_time)
-- question(uid,number,type,question_text)
-- quiz_question(quiz_id,question_id)
-- choice(uid,choice_text)
-- choice_question(question_id,choice_answer_id)
-- short_question(question_id,response_answer)
-- question_choice(question_id,choice_id)
-- grade_letter(uid,letter,upper_grade,lower_grade,description)

-- assignment(uid,type,name,overview,due_datetime,grade,grade_letter,posted_date,last_modified,submission_type,submissions_allow,allow_late)
-- assigment_submission(uid,assignment_id,user_id,datetime_submitted,submission,overview)
-- submission_resource(submission_id,resource_id)
-- course(course_code,name,category_id,description,datetime_created,last_modified,key_required,enrollment_key)
-- category(uid,name,description)
-- resource(uid,name,type,date_uploaded,url,description)
-- resource_type(uid,name,description)



delimiter $$
create database if not exists `kcconline` $$
delimiter ;

--user(`uid`,user_id,first_name,middle_name,last_name,dob,email,phone1,phone2,active,deleted,datetime_created,last_action,last_modified,image_url)
create table if not exists `user`
(
`uid` bigint not null AUTO_INCREMENT,
`user_id` varchar(32) not null,
`first_name` varchar(75) not null,
`middle_name` varchar(75) default null,
`last_name` varchar(75) not null,
`dob` date,
`email_address` varchar(252) not null,
`password` varchar(32) not null,
`phone1` varchar(20),
`phone2` varchar(20),
`active` tinyint(1) default 0,
`deleted` tinyint(1) default 0,
`datetime_created` datetime not null,
`last_action` datetime,
`last_modified` datetime,
`image_url` varchar(255),
constraint pk_user primary key(uid),
constraint unq_user_id unique(user_id),
constraint unq_user_email unique(email_address)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- role(id,name,description)
create table if not exists `role`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100) not null,
`description` varchar(255),
constraint pk_role primary key(uid),
constraint unq_role unique(name)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- user_role(user_id,role_id)
create table if not exists `user_role`
(
`role_id` bigint not null,
`user_id` bigint not null,
constraint pk_user_role primary key(`role_id`,`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- privilege(id,name,description)
create table if not exists `privilege`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100) not null,
`description` varchar(255),
constraint pk_privilege primary key(uid),
constraint unq_privilege unique(name)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- role_privilege(privilege_id,role_id,assigned_datetime)
create table if not exists `role_privelge`
(
`privilege_id` bigint not null,
`role_id` bigint not null,
`assigned_datetime` datetime not null,
constraint pk_role_privilege primary key(`privilege_id`,`role_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- role_privilege_action(priviledge_id,role_id,action)
create table if not exists `role_privelge_action`
(
`privilege_id` bigint not null,
`role_id` bigint not null,
`action` tinyint(1) default 0,
constraint pk_role_privelge_action primary key(`privilege_id`,`role_id`,`action`),
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- enrollment(uid,enroll_startdatetime,enroll_enddatetime)
create table if not exists `enrollment`
(
`uid` bigint not null AUTO_INCREMENT,
`enroll_startdatetime` datetime,
`enroll_enddatetime` datetime,
constraint pk_enrollment primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- user_course_enrollment(course_code,user_id_enrollment_id)
create table if not exists `user_course_enrollment`
(
`enrollment_id` bigint not null,
`user_id` bigint not null,
`course_code` varchar(16) not null,
constraint pk_user_course_en primary key(`user_id`,`course_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- course(course_code,name,category_id,description,datetime_created,last_modified,key_required,enrollment_key)
create table if not exists `course`
(
`course_code` varchar(16) not null,
`name` varchar(100) not null,
`category_id` bigint not null,
`description` varchar(255),
`datetime_created` datetime not null,
`last_modified` datetime,
`key_required` tinyint(1) default 0,
`enrollment_key` varchar(128),
constraint pk_course primary key(course_code)	
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- course_instructor(course_code,user_id)
create table if not exists `course_instructor`
(
`course_code` bigint not null,
`user_id` bigint not null,
constraint pk_course_instructor primary key(`user_id`,`course_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- category(uid,name,description)
create table if not exists `categeory`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100) not null,
`description` varchar(255),
constraint pk_category primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- activity(uid,overview,date_created,last_modified)
create table if not exists `activity`
(
`uid` bigint not null AUTO_INCREMENT,
`overview` varchar(100),
`date_created` datetime not null,
`last_modified` datetime not null,
constraint pk_activity primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- message(uid,sender_id,receiver_id,subject,body,sent_datetime)
create table if not exists `message`
(
`uid` bigint not null AUTO_INCREMENT,
`sender_id` bigint not null,
`receiver_id` bigint not null,
`subject` varchar(255),
`body` TEXT,
`sent_datetime` datetime not null,
constraint pk_message primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- group(uid,name,description,users)
create table if not exists `group`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100),
`description` varchar(255),
constraint pk_group primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- user_group(user_id,group_id,datetime_joined)
create table if not exists `user_group`
(
`user_id` bigint not null,
`group_id` bigint not null,
`datetime_joined` datetime not null,
constraint pk_user_group primary key(`user_id`,`group_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- comment(uid,user_id,text,replied_to)
create table if not exists `comment`
(
`uid` bigint not null AUTO_INCREMENT,
`comment_text` TEXT not null,
`replied_to` bigint,
constraint pk_comment primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- user_comment(comment_id,user_id,datetime_created)
create table if not exists `user_comment`
(
`comment_id bigint not null,
`user_id` bigint not null,
`datetime_created` datetime not null,
constraint pk_user_comment primary key(`comment_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- activity_comment(activity_id,comment_id,posted_datetime)
create table if not exists `activity_comment`
(
`activity_id` bigint not null,
`comment_id` bigint not null,
`posted_datetime` datetime not null,
constraint pk_activity_comment primary key(`comment_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- graded_work(uid,title,type,description,maximum_grade,minimum_grade,percent_grade,datetime_created,created_by)
create table if not exists `graded_work`
(
`uid` bigint not null AUTO_INCREMENT,
`title` varchar(100) not null,
`type` tinyint not null,
`type_name` varchar(75) not null,
`datetime_created` datetime not null,
`created_by bigint not null,
`description` varchar(255),
`maximum_grade` decimal(10,5),
`minimum_grade` decimal(10,5),
`percent_grade` decimal(10,5),
constraint pk_graded_work primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- graded_work_grade_letter(letter_grade_id,graded_work_id)
create table if not exists `graded_work_grade_letter`
(
`letter_grade_id` int not null,
`graded_work_id` bigint not null,
constraint pk_category primary key(`graded_work_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- course_graded_work(course_id,graded_work_id)
create table `course_graded_work`
(
`course_code` varchar(16) not null,
`graded_work_id` bigint not null,
constraint pk_course_graded_work primary key(`graded_work_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- graded_work_comment(graded_work_id,comment_id,posted_datetime)
create table if not exists `graded_work_comment`
(
`graded_work_id` bigint not null,
`comment_id` bigint not null,
`posted_datetime` datetime,
constraint pk_graded_work_comment primary key(`comment_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- quiz(uid,course_code,open_datetime,close_datetime,passkey,grade,overview,duration)
create table if not exists `quiz`
(
`uid` bigint not null,
`course_code` varchar(16) not null,
`open_datetime` datetime not null,
`close_datetime` datetime not null,
`passkey` varchar(128) not null,
`overview` TEXT,
`duration` int,
constraint pk_quiz primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- quiz_attempt(uid,user_id,attempt,attempt_datetime,grade,start_time,end_time)
create table if not exists `quiz_attempt`
(
`uid` bigint not null,
`quiz_id` bigint not null,
`user_id` bigint not null,
`attempt` int default 1,
`attempt_datetime` datetime not null,
`grade` decimal(10,5),
`start_time` datetime not null,
`end_time` datetime,
constraint pk_quiz_attempt primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- question(uid,number,type,question_text)
create table if not exists `question`
(
`uid` bigint not null,
`number` int,
`type` tinyint not null,
`type_name` varchar(75) not null,
`question_text` TEXT not null,
constraint pk_question primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- quiz_question(quiz_id,question_id)
create table if not exists `quiz_question`
(
`quiz_id` bigint not null,
`question_id` bigint not null,
constraint pk_quiz_question primary key(`question_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- choice_question(question_id,choice_answer_id)
create table if not exists `choice_question`
(
`question_id` bigint not null,
`choice_answer_id` bigint not null,
constraint pk_choice_question primary key(`question_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- short_question(question_id,response_answer)
create table if not exists `short_question`
(
`question_id` bigint not null,
`response_answer` TEXT,
constraint pk_short_question primary key(`question_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- choice(uid,choice_text)
create table if not exists `choice`
(
`uid` bigint not null,
`choice_text` TEXT,
constraint pk_choice primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- question_choice(question_id,choice_id)
create table if not exists `question_choice`
(
`question_id` bigint not null,
`choice_id` bigint not null,
constraint pk_question_choice primary key(`question_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- grade_letter(uid,letter,upper_grade,lower_grade,description)
create table if not exists `letter_grade`
(
`uid` bigint not null,
`letter` varchar(2),
`upper_grade` decimal(10,5),
`lower_grade` decimal(10,5),
`description` varchar(255),
constraint pk_letter_grade primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--assignment(uid,type,name,overview,due_datetime,grade,grade_letter,posted_date,last_modified,submission_type,submissions_allow,allow_late)
create table if not exists `assigmnet`
(
`uid` bigint not null,
`type` tinyint not null,
`overview` TEXT,
`due_datetime` datetime,
`grade` decimal(10,5),
`posted_date` datetime not null,
`last_modified` datetime,
`submission_type` tinyint,
`submissions_allow` int,
`allow_late` tinyint(1),
constraint pk_assignment primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table if not exists `assignment_type`
(
`uid` tiny int not null,
`type_name` varchar(100),
`description` varchar(255),
constraint pk_assignment_type primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- assigment_submission(uid,assignment_id,user_id,datetime_submitted,submission,overview)
create table if not exists `assignment_submission`
(
`uid` bigint not null,
`assignment_id` bigint not null,
`user_id` bigint not null,
`datetime_submitted` datetime not null,
`submission` int default 1,
`overview` TEXT,
constraint pk_assignment_submission primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- submission_resource(submission_id,resource_id)
create table if not exists `submission_resource`
(
`submission_id` bigint not null,
`resource_id` bigint not null,
constraint pk_choice_question primary key(`resource_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- resource(uid,name,type,date_uploaded,url,description)
create table if not exists `resource`
(
`uid` bigint not null,
`name` varchar(100) not null,
`type` int not null,
`date_uploaded` datetime not null,
`url` varchar(255),
`description` varchar(255),
constraint pk_resource primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- resource_type(uid,name,description)
create table if not exists `resource_type`
(
`uid` bigint not null,
`name` varchar(100) not null,
`description` varchar(255),
constraint pk_resource_type primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

ALTER TABLE `user_role`
	ADD CONSTRAINT `fk_user_role_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_user_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`uid`) ON UPDATE CASCADE  ON DELETE ACTION;

ALTER TABLE `role_privilege`
	ADD CONSTRAINT `fk_role_privilege_privilege` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_role_privilege_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `role_privilege_action`
	ADD CONSTRAINT `fk_role_privilege_action` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_role_privilege_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;

ALTER TABLE `user_course_enrollment`
	ADD CONSTRAINT `fk_user_course_en_user` FOREIGN KEY (`privilege_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_user_course_en_en` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment` (`uid`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `fk_user_course_en_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON UPDATE CASCADE ON DELETE CASCADE;
	
ALTER TABLE `course_instructor`
	ADD CONSTRAINT `fk_course_instructor_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`couse_code`) ON UPDATE CASCADE  ON DELETE CASCADE,
	ADD CONSTRAINT `fk_course_instructor_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `message`
	ADD CONSTRAINT `fk_message_sender` FOREIGN KEY (`sender_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_message_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `user_group`
	ADD CONSTRAINT `fk_user_group_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_user_group_group` FOREIGN KEY (`group_id`) REFERENCES `group` (`uid`) ON UPDATE CASCADE  ON DELETE CASCADE;
	
ALTER TABLE `user_comment`
	ADD CONSTRAINT `fk_user_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_user_comment_comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`uid`) ON UPDATE CASCADE  ON DELETE CASCADE;

ALTER TABLE `activity_comment`
	ADD CONSTRAINT `fk_activity_comment_comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_activity_comment_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `grade_work_letter_grade`
	ADD CONSTRAINT `fk_grade_work_letter_grade_grade` FOREIGN KEY (`letter_grade_id`) REFERENCES `grade_letter` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_grade_work_letter_grade_work` FOREIGN KEY (`graded_work_id`) REFERENCES `graded_work` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `course_graded_work`
	ADD CONSTRAINT `fk_course_graded_work_work` FOREIGN KEY (`graded_work_id`) REFERENCES `comment` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_course_graded_work_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `grade_work_comment`
	ADD CONSTRAINT `fk_grade_work_comment_comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_grade_work_comment_work` FOREIGN KEY (`graded_work_id`) REFERENCES `graded_work` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `quiz`
	ADD CONSTRAINT `fk_quiz_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `quiz_attempt`
	ADD CONSTRAINT `fk_quiz_attempt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_quiz_attempt_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `quiz_question`
	ADD CONSTRAINT `fk_quiz_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_quiz_question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `choice_question`
	ADD CONSTRAINT `fk_choice_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_choice_question_answer` FOREIGN KEY (`choice_answer_id`) REFERENCES `choice` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `short_question`
	ADD CONSTRAINT `fk_short_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `question_choice`
	ADD CONSTRAINT `fk_question_choice_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_question_choice_choice` FOREIGN KEY (`choice_id`) REFERENCES `choice` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `assignment_submission`
	ADD CONSTRAINT `fk_assignment_submission_ass` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_assignment_submission_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `submission_resource`
	ADD CONSTRAINT `fk_submission_resource_res` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_submission_resourse_sub` FOREIGN KEY (`submission_id`) REFERENCES `assignment_submission` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;