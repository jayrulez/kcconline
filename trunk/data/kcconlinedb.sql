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
-- course_activity(course_code,activity_id,date_assigned)
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
-- question(uid,number,type,question_text,score)
-- quiz_question(quiz_id,question_id)
-- attempt_choice_answer(attempt_id,question_id,choice_answer_id,awarded_score)
-- choice(uid,choice_text)
-- choice_question(question_id,choice_answer_id)
-- short_question_response(question_id,response_answer,awarded_score)
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

delimiter $$
use `kcconline` $$
delimiter ;

--user(`uid`,user_id,first_name,middle_name,last_name,dob,email,phone1,phone2,active,deleted,datetime_created,last_action,last_modified,image_url)
create table if not exists `user`
(
`uid` bigint not null AUTO_INCREMENT,
`user_id` varchar(32) not null,
`first_name` varchar(75) not null,
`middle_name` varchar(75) default null,
`last_name` varchar(75) not null,
`dob` date default null,
`email_address` varchar(252) not null,
`password` varchar(32) not null,
`phone1` varchar(20) default null,
`phone2` varchar(20) default null,
`street` varchar(100) default null,
`parish` varchar(48) default null,
`gender` varchar(2) default null,
`country_code` varchar(2) default null,
`active` tinyint(1) default 0,
`deleted` tinyint(1) default 0,
`datetime_created` datetime not null,
`last_action` datetime default null,
`last_modified` datetime default null,
`image_url` varchar(255) default null,
constraint pk_user primary key(uid),
constraint unq_user_id unique(user_id),
constraint unq_user_username unique(username),
constraint unq_user_email unique(email_address)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE `country` (
  `code` varchar(2) NOT NULL default '',
  `country` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- role(id,name,description)
create table if not exists `role`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100) not null,
`description` varchar(255) default null,
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
`description` varchar(255) default null,
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
constraint pk_role_privilege_action primary key(`privilege_id`,`role_id`,`action`),
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- enrollment(uid,enroll_startdatetime,enroll_enddatetime)
create table if not exists `enrollment`
(
`uid` bigint not null AUTO_INCREMENT,
`enroll_startdatetime` datetime default now(),
`enroll_enddatetime` datetime default now(),
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
`category_id` bigint default null,
`description` varchar(255) default null,
`datetime_created` datetime not null,
`last_modified` datetime default null,
`key_required` tinyint(1) default 0,
`enrollment_key` varchar(128) default null,
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
create table if not exists `category`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100) not null,
`description` varchar(255) default null, 
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
`subject` varchar(255) default null,
`body` TEXT default null,
`sent_datetime` datetime not null,
constraint pk_message primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- group(uid,name,description,users)
create table if not exists `group`
(
`uid` bigint not null AUTO_INCREMENT,
`name` varchar(100) default null,
`description` varchar(255) default null,
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
`replied_to` bigint default null,
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

-- course_activity(course_code,activity_id,date_assigned)
create table if not exists `course_activity`
(
`activity_id` bigint not null,
`course_code` varchar(16) not null,
`date_assigned` datetime not null,
constraint pk_course_activity primary key(`activity`)
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
`posted_datetime` datetime default now(),
constraint pk_graded_work_comment primary key(`comment_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- quiz(uid,course_code,open_datetime,close_datetime,passkey,grade,overview,duration)
create table if not exists `quiz`
(
`graded_work_id` bigint not null
`open_datetime` datetime not null,
`close_datetime` datetime not null,
`passkey` varchar(128) not null,
`overview` TEXT default null,
`duration` int default null,
constraint pk_quiz primary key(`graded_work_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- quiz_attempt(uid,user_id,attempt,attempt_datetime,grade,start_time,end_time)
create table if not exists `quiz_attempt`
(
`uid` bigint not null,
`quiz_id` bigint not null,
`user_id` bigint not null,
`attempt` int default 1,
`attempt_datetime` datetime not null,
`grade` decimal(10,5) default null,
`start_time` datetime not null,
`end_time` datetime default null,
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

-- attempt_choice_answer(attempt_id,question_id,choice_answer_id,awarded_score)
create table if not exists `attempt_choice_answer`
(
`attempt_id` bigint not null,
`question_id` bigint not null,
`choice_answer_id` bigint not null,
`awarded_score` decimal(10,5) default 0,
constraint pk_choice_answer primary key(`question_id`,`attempt_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


-- short_question_response(question_id,response_answer,awarded_score)
create table if not exists `short_question_response`
(
`question_id` bigint not null,
`response_answer` TEXT  default null,
`awarded_score` decimal(10,5) default 0,
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
`letter` varchar(2) not null,
`upper_grade` decimal(10,5),
`lower_grade` decimal(10,5),
`description` varchar(255) default null,
constraint pk_letter_grade primary key(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--assignment(uid,type,name,overview,due_datetime,grade,grade_letter,posted_date,last_modified,submission_type,submissions_allow,allow_late)
create table if not exists `assignment`
(
`graded_work_id` bigint not null,
`type` tinyint not null,
`overview` TEXT,
`due_datetime` datetime,
`grade` decimal(10,5),
`posted_date` datetime not null,
`last_modified` datetime,
`submission_type` tinyint,
`submissions_allow` int,
`allow_late` tinyint(1),
constraint pk_assignment primary key(`graded_work_id`)
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

ALTER TABLE `user`
	ADD CONSTRAINT `fk_user_country` FOREIGN KEY (`country_code`) REFERENCES `country` (`code`) ON UPDATE CASCADE  ON DELETE NO ACTION;

ALTER TABLE `user_role`
	ADD CONSTRAINT `fk_user_role_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_user_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`uid`) ON UPDATE CASCADE  ON DELETE ACTION;
	
ALTER TABLE `course`
	ADD CONSTRAINT `fk_course_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`uid`) ON UPDATE CASCADE  ON DELETE SET NULL;

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

-- course_activity(course_code,activity_id,date_assigned)	
ALTER TABLE `course_activity`
	ADD CONSTRAINT `fk_course_act_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_course_act_act` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
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
	ADD CONSTRAINT `fk_quiz_id` FOREIGN KEY (`graded_work_id`) REFERENCES `graded_work` (`uid`) ON UPDATE CASCADE 
	ON DELETE CASCADE
	
ALTER TABLE `quiz_attempt`
	ADD CONSTRAINT `fk_quiz_attempt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_quiz_attempt_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`graded_work_id`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `quiz_question`
	ADD CONSTRAINT `fk_quiz_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_quiz_question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`graded_work_id`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `choice_question`
	ADD CONSTRAINT `fk_choice_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_choice_question_answer` FOREIGN KEY (`choice_answer_id`) REFERENCES `choice` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;

-- attempt_choice_answer(attempt_id,question_id,choice_answer_id)
ALTER TABLE `attempt_choice_answer`
	ADD CONSTRAINT `fk_choice_answer_attempt` FOREIGN KEY (`attempt_id`) REFERENCES `quiz_attempt` (`uid`) ON UPDATE CASCADE  ON DELETE CASCADE,
	ADD CONSTRAINT `fk_choice_answer_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE CASCADE,
	ADD CONSTRAINT `fk_choice_answer_answer` FOREIGN KEY (`choice_answer_id`) REFERENCES `choice` (`uid`) ON UPDATE CASCADE  ON DELETE CASCADE;

ALTER TABLE `short_question_response`
	ADD CONSTRAINT `fk_short_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `question_choice`
	ADD CONSTRAINT `fk_question_choice_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_question_choice_choice` FOREIGN KEY (`choice_id`) REFERENCES `choice` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `assignment`
	ADD CONSTRAINT `fk_assignment_id` FOREIGN KEY (`graded_work_id`) REFERENCES `graded_work` (`uid`) ON UPDATE CASCADE 
	ON DELETE CASCADE;
	
ALTER TABLE `assignment_submission`
	ADD CONSTRAINT `fk_assignment_submission_ass` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`graded_work_id`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_assignment_submission_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
ALTER TABLE `submission_resource`
	ADD CONSTRAINT `fk_submission_resource_res` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION,
	ADD CONSTRAINT `fk_submission_resourse_sub` FOREIGN KEY (`submission_id`) REFERENCES `assignment_submission` (`uid`) ON UPDATE CASCADE  ON DELETE NO ACTION;
	
	
insert into `role`(`name`,`description`) values('Student','A student that is able to enroll in courses and participate in graded work and assignment.');
insert into `role`(`name`,`description`) values('Administrator','A User who has Administrator Role is able to manage Courses, Roles, and Users.');
insert into `role`(`name`,`description`) values('Teacher','A User who has Teacher Role that is able to enroll Students in their instructed Courses.');
insert into `role`(`name`,`description`) values('Authenticated User','An Authenticated User has the least privileges.');

	
	
INSERT INTO `country` VALUES ('AF', 'Afghanistan');
INSERT INTO `country` VALUES ('AX', 'Åland Islands');
INSERT INTO `country` VALUES ('AL', 'Albania');
INSERT INTO `country` VALUES ('DZ', 'Algeria');
INSERT INTO `country` VALUES ('AS', 'American Samoa');
INSERT INTO `country` VALUES ('AD', 'Andorra');
INSERT INTO `country` VALUES ('AO', 'Angola');
INSERT INTO `country` VALUES ('AI', 'Anguilla');
INSERT INTO `country` VALUES ('AQ', 'Antarctica');
INSERT INTO `country` VALUES ('AG', 'Antigua and Barbuda');
INSERT INTO `country` VALUES ('AR', 'Argentina');
INSERT INTO `country` VALUES ('AM', 'Armenia');
INSERT INTO `country` VALUES ('AW', 'Aruba');
INSERT INTO `country` VALUES ('AU', 'Australia');
INSERT INTO `country` VALUES ('AT', 'Austria');
INSERT INTO `country` VALUES ('AZ', 'Azerbaijan');
INSERT INTO `country` VALUES ('BS', 'Bahamas');
INSERT INTO `country` VALUES ('BH', 'Bahrain');
INSERT INTO `country` VALUES ('BD', 'Bangladesh');
INSERT INTO `country` VALUES ('BB', 'Barbados');
INSERT INTO `country` VALUES ('BY', 'Belarus');
INSERT INTO `country` VALUES ('BE', 'Belgium');
INSERT INTO `country` VALUES ('BZ', 'Belize');
INSERT INTO `country` VALUES ('BJ', 'Benin');
INSERT INTO `country` VALUES ('BM', 'Bermuda');
INSERT INTO `country` VALUES ('BT', 'Bhutan');
INSERT INTO `country` VALUES ('BO', 'Bolivia');
INSERT INTO `country` VALUES ('BA', 'Bosnia and Herzegovina');
INSERT INTO `country` VALUES ('BW', 'Botswana');
INSERT INTO `country` VALUES ('BV', 'Bouvet Island');
INSERT INTO `country` VALUES ('BR', 'Brazil');
INSERT INTO `country` VALUES ('IO', 'British Indian Ocean Territory');
INSERT INTO `country` VALUES ('BN', 'Brunei Darussalam');
INSERT INTO `country` VALUES ('BG', 'Bulgaria');
INSERT INTO `country` VALUES ('BF', 'Burkina Faso');
INSERT INTO `country` VALUES ('BI', 'Burundi');
INSERT INTO `country` VALUES ('KH', 'Cambodia');
INSERT INTO `country` VALUES ('CM', 'Cameroon');
INSERT INTO `country` VALUES ('CA', 'Canada');
INSERT INTO `country` VALUES ('CV', 'Cape Verde');
INSERT INTO `country` VALUES ('KY', 'Cayman Islands');
INSERT INTO `country` VALUES ('CF', 'Central African Republic');
INSERT INTO `country` VALUES ('TD', 'Chad');
INSERT INTO `country` VALUES ('CL', 'Chile');
INSERT INTO `country` VALUES ('CN', 'China');
INSERT INTO `country` VALUES ('CX', 'Christmas Island');
INSERT INTO `country` VALUES ('CC', 'Cocos (Keeling) Islands');
INSERT INTO `country` VALUES ('CO', 'Colombia');
INSERT INTO `country` VALUES ('KM', 'Comoros');
INSERT INTO `country` VALUES ('CG', 'Congo');
INSERT INTO `country` VALUES ('CD', 'Congo, The Democratic Republic of the');
INSERT INTO `country` VALUES ('CK', 'Cook Islands');
INSERT INTO `country` VALUES ('CR', 'Costa Rica');
INSERT INTO `country` VALUES ('CI', 'Côte D\'Ivoire');
INSERT INTO `country` VALUES ('HR', 'Croatia');
INSERT INTO `country` VALUES ('CU', 'Cuba');
INSERT INTO `country` VALUES ('CY', 'Cyprus');
INSERT INTO `country` VALUES ('CZ', 'Czech Republic');
INSERT INTO `country` VALUES ('DK', 'Denmark');
INSERT INTO `country` VALUES ('DJ', 'Djibouti');
INSERT INTO `country` VALUES ('DM', 'Dominica');
INSERT INTO `country` VALUES ('DO', 'Dominican Republic');
INSERT INTO `country` VALUES ('EC', 'Ecuador');
INSERT INTO `country` VALUES ('EG', 'Egypt');
INSERT INTO `country` VALUES ('SV', 'El Salvador');
INSERT INTO `country` VALUES ('GQ', 'Equatorial Guinea');
INSERT INTO `country` VALUES ('ER', 'Eritrea');
INSERT INTO `country` VALUES ('EE', 'Estonia');
INSERT INTO `country` VALUES ('ET', 'Ethiopia');
INSERT INTO `country` VALUES ('FK', 'Falkland Islands (Malvinas)');
INSERT INTO `country` VALUES ('FO', 'Faroe Islands');
INSERT INTO `country` VALUES ('FJ', 'Fiji');
INSERT INTO `country` VALUES ('FI', 'Finland');
INSERT INTO `country` VALUES ('FR', 'France');
INSERT INTO `country` VALUES ('GF', 'French Guiana');
INSERT INTO `country` VALUES ('PF', 'French Polynesia');
INSERT INTO `country` VALUES ('TF', 'French Southern Territories');
INSERT INTO `country` VALUES ('GA', 'Gabon');
INSERT INTO `country` VALUES ('GM', 'Gambia');
INSERT INTO `country` VALUES ('GE', 'Georgia');
INSERT INTO `country` VALUES ('DE', 'Germany');
INSERT INTO `country` VALUES ('GH', 'Ghana');
INSERT INTO `country` VALUES ('GI', 'Gibraltar');
INSERT INTO `country` VALUES ('GR', 'Greece');
INSERT INTO `country` VALUES ('GL', 'Greenland');
INSERT INTO `country` VALUES ('GD', 'Grenada');
INSERT INTO `country` VALUES ('GP', 'Guadeloupe');
INSERT INTO `country` VALUES ('GU', 'Guam');
INSERT INTO `country` VALUES ('GT', 'Guatemala');
INSERT INTO `country` VALUES ('GG', 'Guernsey');
INSERT INTO `country` VALUES ('GN', 'Guinea');
INSERT INTO `country` VALUES ('GW', 'Guinea-Bissau');
INSERT INTO `country` VALUES ('GY', 'Guyana');
INSERT INTO `country` VALUES ('HT', 'Haiti');
INSERT INTO `country` VALUES ('HM', 'Heard Island and McDonald Islands');
INSERT INTO `country` VALUES ('VA', 'Holy See (Vatican City State)');
INSERT INTO `country` VALUES ('HN', 'Honduras');
INSERT INTO `country` VALUES ('HK', 'Hong Kong');
INSERT INTO `country` VALUES ('HU', 'Hungary');
INSERT INTO `country` VALUES ('IS', 'Iceland');
INSERT INTO `country` VALUES ('IN', 'India');
INSERT INTO `country` VALUES ('ID', 'Indonesia');
INSERT INTO `country` VALUES ('IR', 'Iran, Islamic Republic of');
INSERT INTO `country` VALUES ('IQ', 'Iraq');
INSERT INTO `country` VALUES ('IE', 'Ireland');
INSERT INTO `country` VALUES ('IM', 'Isle of Man');
INSERT INTO `country` VALUES ('IL', 'Israel');
INSERT INTO `country` VALUES ('IT', 'Italy');
INSERT INTO `country` VALUES ('JM', 'Jamaica');
INSERT INTO `country` VALUES ('JP', 'Japan');
INSERT INTO `country` VALUES ('JE', 'Jersey');
INSERT INTO `country` VALUES ('JO', 'Jordan');
INSERT INTO `country` VALUES ('KZ', 'Kazakhstan');
INSERT INTO `country` VALUES ('KE', 'Kenya');
INSERT INTO `country` VALUES ('KI', 'Kiribati');
INSERT INTO `country` VALUES ('KP', 'Korea, Democratic People\'s Republic of');
INSERT INTO `country` VALUES ('KR', 'Korea, Republic of');
INSERT INTO `country` VALUES ('KW', 'Kuwait');
INSERT INTO `country` VALUES ('KG', 'Kyrgyzstan');
INSERT INTO `country` VALUES ('LA', 'Lao People\'s Democratic Republic');
INSERT INTO `country` VALUES ('LV', 'Latvia');
INSERT INTO `country` VALUES ('LB', 'Lebanon');
INSERT INTO `country` VALUES ('LS', 'Lesotho');
INSERT INTO `country` VALUES ('LR', 'Liberia');
INSERT INTO `country` VALUES ('LY', 'Libyan Arab Jamahiriya');
INSERT INTO `country` VALUES ('LI', 'Liechtenstein');
INSERT INTO `country` VALUES ('LT', 'Lithuania');
INSERT INTO `country` VALUES ('LU', 'Luxembourg');
INSERT INTO `country` VALUES ('MO', 'Macao');
INSERT INTO `country` VALUES ('MK', 'Macedonia, The Former Yugoslav Republic of');
INSERT INTO `country` VALUES ('MG', 'Madagascar');
INSERT INTO `country` VALUES ('MW', 'Malawi');
INSERT INTO `country` VALUES ('MY', 'Malaysia');
INSERT INTO `country` VALUES ('MV', 'Maldives');
INSERT INTO `country` VALUES ('ML', 'Mali');
INSERT INTO `country` VALUES ('MT', 'Malta');
INSERT INTO `country` VALUES ('MH', 'Marshall Islands');
INSERT INTO `country` VALUES ('MQ', 'Martinique');
INSERT INTO `country` VALUES ('MR', 'Mauritania');
INSERT INTO `country` VALUES ('MU', 'Mauritius');
INSERT INTO `country` VALUES ('YT', 'Mayotte');
INSERT INTO `country` VALUES ('MX', 'Mexico');
INSERT INTO `country` VALUES ('FM', 'Micronesia, Federated States of');
INSERT INTO `country` VALUES ('MD', 'Moldova, Republic of');
INSERT INTO `country` VALUES ('MC', 'Monaco');
INSERT INTO `country` VALUES ('MN', 'Mongolia');
INSERT INTO `country` VALUES ('ME', 'Montenegro');
INSERT INTO `country` VALUES ('MS', 'Montserrat');
INSERT INTO `country` VALUES ('MA', 'Morocco');
INSERT INTO `country` VALUES ('MZ', 'Mozambique');
INSERT INTO `country` VALUES ('MM', 'Myanmar');
INSERT INTO `country` VALUES ('NA', 'Namibia');
INSERT INTO `country` VALUES ('NR', 'Nauru');
INSERT INTO `country` VALUES ('NP', 'Nepal');
INSERT INTO `country` VALUES ('NL', 'Netherlands');
INSERT INTO `country` VALUES ('AN', 'Netherlands Antilles');
INSERT INTO `country` VALUES ('NC', 'New Caledonia');
INSERT INTO `country` VALUES ('NZ', 'New Zealand');
INSERT INTO `country` VALUES ('NI', 'Nicaragua');
INSERT INTO `country` VALUES ('NE', 'Niger');
INSERT INTO `country` VALUES ('NG', 'Nigeria');
INSERT INTO `country` VALUES ('NU', 'Niue');
INSERT INTO `country` VALUES ('NF', 'Norfolk Island');
INSERT INTO `country` VALUES ('MP', 'Northern Mariana Islands');
INSERT INTO `country` VALUES ('NO', 'Norway');
INSERT INTO `country` VALUES ('OM', 'Oman');
INSERT INTO `country` VALUES ('PK', 'Pakistan');
INSERT INTO `country` VALUES ('PW', 'Palau');
INSERT INTO `country` VALUES ('PS', 'Palestinian Territory, Occupied');
INSERT INTO `country` VALUES ('PA', 'Panama');
INSERT INTO `country` VALUES ('PG', 'Papua New Guinea');
INSERT INTO `country` VALUES ('PY', 'Paraguay');
INSERT INTO `country` VALUES ('PE', 'Peru');
INSERT INTO `country` VALUES ('PH', 'Philippines');
INSERT INTO `country` VALUES ('PN', 'Pitcairn');
INSERT INTO `country` VALUES ('PL', 'Poland');
INSERT INTO `country` VALUES ('PT', 'Portugal');
INSERT INTO `country` VALUES ('PR', 'Puerto Rico');
INSERT INTO `country` VALUES ('QA', 'Qatar');
INSERT INTO `country` VALUES ('RE', 'Reunion');
INSERT INTO `country` VALUES ('RO', 'Romania');
INSERT INTO `country` VALUES ('RU', 'Russian Federation');
INSERT INTO `country` VALUES ('RW', 'Rwanda');
INSERT INTO `country` VALUES ('BL', 'Saint Barthélemy');
INSERT INTO `country` VALUES ('SH', 'Saint Helena');
INSERT INTO `country` VALUES ('KN', 'Saint Kitts and Nevis');
INSERT INTO `country` VALUES ('LC', 'Saint Lucia');
INSERT INTO `country` VALUES ('MF', 'Saint Martin');
INSERT INTO `country` VALUES ('PM', 'Saint Pierre and Miquelon');
INSERT INTO `country` VALUES ('VC', 'Saint Vincent and the Grenadines');
INSERT INTO `country` VALUES ('WS', 'Samoa');
INSERT INTO `country` VALUES ('SM', 'San Marino');
INSERT INTO `country` VALUES ('ST', 'Sao Tome and Principe');
INSERT INTO `country` VALUES ('SA', 'Saudi Arabia');
INSERT INTO `country` VALUES ('SN', 'Senegal');
INSERT INTO `country` VALUES ('RS', 'Serbia');
INSERT INTO `country` VALUES ('SC', 'Seychelles');
INSERT INTO `country` VALUES ('SL', 'Sierra Leone');
INSERT INTO `country` VALUES ('SG', 'Singapore');
INSERT INTO `country` VALUES ('SK', 'Slovakia');
INSERT INTO `country` VALUES ('SI', 'Slovenia');
INSERT INTO `country` VALUES ('SB', 'Solomon Islands');
INSERT INTO `country` VALUES ('SO', 'Somalia');
INSERT INTO `country` VALUES ('ZA', 'South Africa');
INSERT INTO `country` VALUES ('GS', 'South Georgia and the South Sandwich Islands');
INSERT INTO `country` VALUES ('ES', 'Spain');
INSERT INTO `country` VALUES ('LK', 'Sri Lanka');
INSERT INTO `country` VALUES ('SD', 'Sudan');
INSERT INTO `country` VALUES ('SR', 'Suriname');
INSERT INTO `country` VALUES ('SJ', 'Svalbard and Jan Mayen');
INSERT INTO `country` VALUES ('SZ', 'Swaziland');
INSERT INTO `country` VALUES ('SE', 'Sweden');
INSERT INTO `country` VALUES ('CH', 'Switzerland');
INSERT INTO `country` VALUES ('SY', 'Syrian Arab Republic');
INSERT INTO `country` VALUES ('TW', 'Taiwan, Province Of China');
INSERT INTO `country` VALUES ('TJ', 'Tajikistan');
INSERT INTO `country` VALUES ('TZ', 'Tanzania, United Republic of');
INSERT INTO `country` VALUES ('TH', 'Thailand');
INSERT INTO `country` VALUES ('TL', 'Timor-Leste');
INSERT INTO `country` VALUES ('TG', 'Togo');
INSERT INTO `country` VALUES ('TK', 'Tokelau');
INSERT INTO `country` VALUES ('TO', 'Tonga');
INSERT INTO `country` VALUES ('TT', 'Trinidad and Tobago');
INSERT INTO `country` VALUES ('TN', 'Tunisia');
INSERT INTO `country` VALUES ('TR', 'Turkey');
INSERT INTO `country` VALUES ('TM', 'Turkmenistan');
INSERT INTO `country` VALUES ('TC', 'Turks and Caicos Islands');
INSERT INTO `country` VALUES ('TV', 'Tuvalu');
INSERT INTO `country` VALUES ('UG', 'Uganda');
INSERT INTO `country` VALUES ('UA', 'Ukraine');
INSERT INTO `country` VALUES ('AE', 'United Arab Emirates');
INSERT INTO `country` VALUES ('GB', 'United Kingdom');
INSERT INTO `country` VALUES ('US', 'United States');
INSERT INTO `country` VALUES ('UM', 'United States Minor Outlying Islands');
INSERT INTO `country` VALUES ('UY', 'Uruguay');
INSERT INTO `country` VALUES ('UZ', 'Uzbekistan');
INSERT INTO `country` VALUES ('VU', 'Vanuatu');
INSERT INTO `country` VALUES ('VE', 'Venezuela');
INSERT INTO `country` VALUES ('VN', 'Viet Nam');
INSERT INTO `country` VALUES ('VG', 'Virgin Islands, British');
INSERT INTO `country` VALUES ('VI', 'Virgin Islands, U.S.');
INSERT INTO `country` VALUES ('WF', 'Wallis And Futuna');
INSERT INTO `country` VALUES ('EH', 'Western Sahara');
INSERT INTO `country` VALUES ('YE', 'Yemen');
INSERT INTO `country` VALUES ('ZM', 'Zambia');
INSERT INTO `country` VALUES ('ZW', 'Zimbabwe');