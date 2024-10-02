create table if not exists `user` (
	user_id int not null primary key auto_increment,
    username nvarchar(100) not null,
    email nvarchar(100) not null unique,
    `password` nvarchar(60) not null,
    access_token text
);

create table if not exists lesson (
	lesson_id int not null primary key auto_increment,
    lesson_name varchar(50) not null,
    lesson_content text
);

create table if not exists test (
	test_id int not null primary key auto_increment,
    test_results int
);

create table if not exists notification (
	notification_id int not null primary key auto_increment,
    user_id int not null,
    message text not null,
    `type` nvarchar(32),
    `status` nvarchar(32),
    sent_at date,
    foreign key (user_id) references `user` (user_id) on delete cascade
);

create table if not exists listen_speak_practice (
	practice_id int not null primary key auto_increment,
    user_id int not null,
    lesson_id int not null,
    audio_url text,
    practice_date date,
    foreign key (user_id) references `user` (user_id),
    foreign key (lesson_id) references lesson (lesson_id)
);

create table if not exists vocab (
	vocab_id int not null primary key auto_increment,
    lesson_id int not null,
    word nvarchar(32) not null,
    pronunciation nvarchar(50),
    meaning nvarchar(50),
    example_sentence text,
    created_at date,
    updated_at date,
    foreign key (lesson_id) references lesson (lesson_id)
);

create table if not exists learning_path (
	path_id int not null primary key auto_increment,
    user_id int null null,
    default_path bool,
    progress int,
    `status` nvarchar(50),
    created_at date,
    updated_at date,
    foreign key (user_id) references `user` (user_id)
);

create table if not exists quick_learn_topic (
	topic_id int not null primary key auto_increment,
    topic_name nvarchar(50) not null,
    `description` text,
    created_at date,
    updated_at date
);

create table if not exists quick_learn_content (
	ql_content_id int not null primary key auto_increment,
    topic_id int not null,
    japanese_sentence text not null,
    vietnamese_sentence text not null,
    vietnamese_katakana text not null,
    audio text not null,
    created_at date,
    updated_at date,
    foreign key (topic_id) references quick_learn_topic (topic_id)
);

delimiter $$
create procedure reset_quick_learn_topic_id ()
begin
  select coalesce(max(topic_id), -1) from quick_learn_topic into @next_id;
  
  if @next_id <= 0 then
    set @next_id = 0;
  end if;
  
  set @alter_statement = concat('alter table quick_learn_topic auto_increment = ', @next_id);
  PREPARE stmt FROM @alter_statement;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
end $$
delimiter ;

delimiter $$
create procedure reset_quick_learn_content_id ()
begin
  select coalesce(max(ql_content_id), -1) from quick_learn_content into @next_id;
  
  if @next_id <= 0 then
    set @next_id = 0;
  end if;
  
  set @alter_statement = concat('alter table quick_learn_content auto_increment = ', @next_id);
  PREPARE stmt FROM @alter_statement;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
end $$
delimiter ;

delimiter $$
create procedure reset_user_id ()
begin
  select coalesce(max(user_id), -1) from `user` into @next_id;
  
  if @next_id <= 0 then
    set @next_id = 0;
  end if;
  
  set @alter_statement = concat('alter table `user` auto_increment = ', @next_id);
  PREPARE stmt FROM @alter_statement;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
end $$
delimiter ;