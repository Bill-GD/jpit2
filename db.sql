create table if not exists `user` (
  user_id int not null primary key auto_increment,
  username nvarchar (100) not null,
  email nvarchar (100) not null unique,
  `password` nvarchar (60) not null,
  access_token text
);

create table if not exists lesson (
  lesson_id int not null primary key auto_increment,
  lesson_name varchar(50) not null,
  thumbnail text not null
);

create table if not exists mock_test_question (
  question_id int auto_increment primary key,
  `level` int not null,
  content text not null
);

create table if not exists mock_test_choice (
  choice_id int auto_increment primary key,
  question_id int not null,
  content text not null,
  is_correct boolean default false,
  foreign key (question_id) references mock_test_question (question_id) on delete cascade
);

create table if not exists test_question (
  question_id int auto_increment primary key,
  lesson_id int not null,
  content text not null,
  foreign key (lesson_id) references lesson (lesson_id)
);

create table if not exists test_question_choice (
  choice_id int auto_increment primary key,
  question_id int not null,
  content text not null,
  is_correct boolean default false,
  foreign key (question_id) references test_question (question_id) on delete cascade
);

create table if not exists test_result (
  test_result_id int not null primary key auto_increment,
  user_id int not null,
  lesson_id int not null,
  test_result int not null
);

create table if not exists notification (
  notification_id int not null primary key auto_increment,
  user_id int not null,
  message text not null,
  `type` nvarchar (32),
  `status` nvarchar (32),
  sent_at datetime,
  foreign key (user_id) references `user` (user_id) on delete cascade
);

create table if not exists lesson_convo (
  convo_id int not null primary key auto_increment,
  lesson_id int not null,
  japanese_sentence text not null,
  vietnamese_sentence text not null,
  vietnamese_katakana text not null,
  audio text,
  foreign key (lesson_id) references lesson (lesson_id)
);

create table if not exists vocab (
  vocab_id int not null primary key auto_increment,
  lesson_id int not null,
  word nvarchar (32) not null,
  meaning nvarchar (50),
  foreign key (lesson_id) references lesson (lesson_id)
);

create table if not exists learning_path (
  path_id int not null primary key auto_increment,
  user_id int null null,
  default_path bool,
  progress int,
  `status` nvarchar (50),
  foreign key (user_id) references `user` (user_id)
);

create table if not exists quick_learn_topic (
  topic_id int not null primary key auto_increment,
  topic_name nvarchar (50) not null,
  `description` text,
);

create table if not exists quick_learn_content (
  ql_content_id int not null primary key auto_increment,
  topic_id int not null,
  japanese_sentence text not null,
  vietnamese_sentence text not null,
  vietnamese_katakana text not null,
  audio text not null,
  foreign key (topic_id) references quick_learn_topic (topic_id)
);

delimiter $$
create procedure reset_quick_learn_topic_id () begin
select
  coalesce(max(topic_id), -1)
from
  quick_learn_topic into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table quick_learn_topic auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_quick_learn_content_id () begin
select
  coalesce(max(ql_content_id), -1)
from
  quick_learn_content into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table quick_learn_content auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_user_id () begin
select
  coalesce(max(user_id), -1)
from
  `user` into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table `user` auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_lesson_id () begin
select
  coalesce(max(lesson_id), -1)
from
  lesson into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table lesson auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_mock_test_question_id () begin
select
  coalesce(max(question_id), -1)
from
  mock_test_question into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table mock_test_question auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_mock_test_choice_id () begin
select
  coalesce(max(choice_id), -1)
from
  mock_test_choice into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table mock_test_choice auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_test_question_id () begin
select
  coalesce(max(question_id), -1)
from
  test_question into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table test_question auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_test_question_choice_id () begin
select
  coalesce(max(choice_id), -1)
from
  test_question_choice into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table test_question_choice auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_test_result_id () begin
select
  coalesce(max(test_result_id), -1)
from
  test_result into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table test_result auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_notification_id () begin
select
  coalesce(max(notification_id), -1)
from
  notification into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table notification auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_listen_speak_practice_id () begin
select
  coalesce(max(practice_id), -1)
from
  listen_speak_practice into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table listen_speak_practice auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_vocab_id () begin
select
  coalesce(max(vocab_id), -1)
from
  vocab into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table vocab auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;

delimiter $$
create procedure reset_learning_path_id () begin
select
  coalesce(max(path_id), -1)
from
  learning_path into @next_id;

if @next_id <= 0 then
set
  @next_id = 0;

end if;

set
  @alter_statement = concat('alter table learning_path auto_increment = ', @next_id);

prepare stmt
from
  @alter_statement;

execute stmt;

deallocate prepare stmt;

end $$ delimiter;