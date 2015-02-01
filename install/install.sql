CREATE DATABASE `ops` DEFAULT CHARACTER SET utf8;

use ops;

create table db_changelog(
    id int(11) not null auto_increment,
    auth_name varchar(60) not null default '' comment '作者姓名',
    db_name varchar(64) not null default '' comment '数据库名',
    table_name varchar(64) not null default '' comment '表名',
    sqls text comment '需要执行的sql语句',
    create_time int(11) not null default 0 comment '创建时间',
    update_time int(11) not null default 0 comment '更新时间',
    status int(11) not null default 0 comment '100 - 新增 200 - 审核中 201 - 审核不通过需要修改 300 - 审核通过 400 - 已执行',
    operator_name varchar(60) not null default '' comment '',
    operator_time int(11) not null default 0 comment '',
    primary key(id)
);

create table db_changelog_auditlog(
    id int(11) not null auto_increment,
    db_changelog_id varchar(60) not null default '' comment '作者姓名',
    operator_name varchar(64) not null default '' comment '数据库名',
    `comment` varchar(256) not null default '' comment '评论内容',
    create_time int(11) not null default 0 comment '创建时间',
    update_time int(11) not null default 0 comment '更新时间',
    primary key(id)
);