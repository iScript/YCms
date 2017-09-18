

create database `xcx-platform` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `xcx-platform`;
set names utf8;


# 管理员表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_admin_user`;
CREATE TABLE `iz_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30)  NOT NULL comment '用户名',
  `nickname` varchar(30)  NOT NULL comment '昵称',
  `password` varchar(100)  NOT NULL comment '密码',
  `register_time` datetime NOT NULL comment '注册时间',
  `last_login_time` datetime NOT NULL comment '最后登录时间',
  `last_login_ip` varchar(100)  DEFAULT NULL comment '最后登录ip',
  `remember_token` varchar(100)  DEFAULT NULL comment 'token',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iz_admin_user_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


# 权限表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_permission`;
CREATE TABLE `iz_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL comment '权限标示',
  `display_name` varchar(255)  NOT NULL comment '权限名称',
  `description` varchar(255) DEFAULT NULL comment '权限描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


# 角色表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_role`;
CREATE TABLE `iz_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)   NOT NULL comment '角色标示',
  `display_name` varchar(255)  NOT NULL comment '角色名称',
  `description` varchar(255) DEFAULT NULL comment '描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# 角色用户对应表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_role_user`;
CREATE TABLE `iz_role_user` (
  `user_id` int(10) unsigned NOT NULL comment '用户id',
  `role_id` int(10) unsigned NOT NULL comment '角色id',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `iz_role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `iz_role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `iz_role` (`id`) ON DELETE CASCADE,
  CONSTRAINT `iz_role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `iz_admin_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


# 权限角色对应表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_permission_role`;
CREATE TABLE `iz_permission_role` (
  `permission_id` int(10) unsigned NOT NULL comment '权限id',
  `role_id` int(10) unsigned NOT NULL comment '角色id',
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `iz_permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `iz_permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `iz_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `iz_permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `iz_role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# 用户表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_user`;
CREATE TABLE `iz_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100)  DEFAULT NULL comment '用户名',
  `nickname` varchar(100)   DEFAULT NULL comment '昵称',
  `mobile` char(15)   DEFAULT NULL comment '手机',
  `email` varchar(100)   DEFAULT NULL comment '邮箱',
  `password` char(60)   NOT NULL comment '密码',
  `register_time` datetime NOT NULL comment '注册时间',
  `last_login_time` datetime NOT NULL comment '最近登录时间',
  `last_login_ip` varchar(255)   DEFAULT NULL comment '最近登录ip',
  `avatar` varchar(255)   DEFAULT NULL comment '头像',
  `sex` tinyint(4) NOT NULL DEFAULT '0' comment '性别 1男2女0未知',
  `real_name` varchar(10)   DEFAULT NULL comment '真实姓名',
  `status` tinyint(4) NOT NULL DEFAULT '0' comment '状态',
  `register_type` tinyint(4) NOT NULL comment '注册类型',
  `openid` varchar(255)   DEFAULT NULL comment '微信openid',
  `unionid` varchar(255)   DEFAULT NULL comment '微信unionid',
  `qq_id` varchar(255)   DEFAULT NULL comment 'qq唯一id',
  `weibo_id` varchar(255)   DEFAULT NULL comment '微博id',
  `remember_token` varchar(100)   DEFAULT NULL comment 'token',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iz_user_mobile_unique` (`mobile`),
  UNIQUE KEY `iz_user_email_unique` (`email`),
  UNIQUE KEY `iz_user_username_unique` (`username`),
  UNIQUE KEY `iz_user_openid_unique` (`openid`),
  UNIQUE KEY `iz_user_unionid_unique` (`unionid`),
  UNIQUE KEY `iz_user_qqid_unique` (`qq_id`),
  UNIQUE KEY `iz_user_weiboid_unique` (`weibo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


# 文章表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_article`;
CREATE TABLE `iz_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL comment '文章标题',
  `content` text NOT NULL comment '文章内容',
  `image` varchar(100)  NULL comment '文章封面',
  `status` tinyint(1) NOT NULL DEFAULT '0' comment '文章状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# 广告表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_ad`;
CREATE TABLE `iz_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL comment '广告标示',
  `description` varchar(100) NOT NULL comment '广告描述',
  `status` tinyint(1) NOT NULL DEFAULT '0' comment '广告状态 0上架1下架',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# 广告详情表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_ad_item`;
CREATE TABLE `iz_ad_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL comment '广告图名称',
  `image` varchar(100) NOT NULL comment '广告图片',
  `status` tinyint(1) NOT NULL DEFAULT '0' comment '0不显示1显示',
  `sort` int(10) NOT NULL DEFAULT '10' comment '排序',
  `pid` int(10) NOT NULL  comment '从属那个广告位',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# 小程序配置表
# ------------------------------------------------------------
DROP TABLE IF EXISTS `iz_minapp_config`;
CREATE TABLE `iz_minapp_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL comment '小程序名称',
  `image` varchar(100) NOT NULL comment '小程序logo',
  `description` varchar(200) NOT NULL comment '小程序简介',
  `app_id` char(30) NOT NULL comment '小程序appid',
  `app_secret` varchar(200)  NULL comment '小程序secret',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `iz_admin_user` (`id`, `username`, `nickname`, `password`, `register_time`, `last_login_time`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`)
VALUES
  (1,'admin','昵称','$2y$10$Q4Tf6UIx7fmVXK4N8xjSq.ryq0y74j1tj4z2.90w9r5WrO.V8CltW','2016-06-13 16:20:01','2017-09-18 06:56:06',NULL,'EbIsaV3FFpmlHyJdXoZgljLaQT2NfDOkLJrvFrZyQcGMYEi1aOoK75jMI5rb','2016-06-13 16:20:01','2017-09-18 06:56:06'),
  (2,'test','','$2y$10$iMZ57W6EueuQJ1cfcfG0oOGseoNw4qHvz0hTzXDCRaHfr1ZvqQiHO','2017-01-17 14:11:27','2017-01-17 14:11:31',NULL,'u3i3SwnhEwdOfegXsfeaAq4Gv0rkw4NLRIy1uq1cBO76pwLZoCeSb4bPuyVk','2017-01-17 14:11:27','2017-01-17 14:11:53');

INSERT INTO `iz_permission` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
  (2,'admin.home.index','后台首页','','2016-07-21 14:34:14','2016-07-21 14:34:14'),
  (3,'admin.admin_user.index','管理员管理首页2','11','2016-07-22 10:37:09','2017-09-18 06:56:59'),
  (4,'admin.admin_user.create','管理员添加界面','','2016-07-22 10:50:51','2016-07-22 10:50:51'),
  (5,'admin.admin_user.store','管理员添加操作','','2016-07-22 11:19:17','2016-07-22 11:19:17'),
  (6,'admin.admin_user.edit','管理员编辑界面','','2016-07-22 11:19:46','2016-07-22 11:19:46'),
  (7,'admin.admin_user.update','管理员编辑操作','','2016-07-22 11:20:17','2016-07-22 11:20:17'),
  (8,'admin.admin_user.destroy','管理员删除操作','','2016-07-22 11:20:48','2016-07-22 11:20:48'),
  (9,'admin.role.index','角色管理首页','','2016-07-22 11:22:26','2016-07-22 11:22:26'),
  (10,'admin.role.create','角色添加界面','','2016-07-22 14:43:40','2016-07-22 14:43:40'),
  (11,'admin.role.store','角色添加操作','','2016-07-22 14:44:00','2016-07-22 14:44:00'),
  (12,'admin.role.edit','角色修改界面','','2016-07-22 14:44:31','2016-07-22 14:44:31'),
  (13,'admin.role.update','角色修改操作','','2016-07-22 14:45:12','2016-07-22 14:45:12'),
  (14,'admin.role.destroy','角色删除操作','','2016-07-22 14:45:33','2016-07-22 14:45:33'),
  (15,'admin.role.permissions','角色权限设置','','2016-07-22 14:46:04','2016-07-22 14:46:04'),
  (16,'admin.permission.index','权限管理首页','','2016-07-22 14:46:39','2016-07-22 14:46:39'),
  (17,'admin.permission.create','权限添加界面','','2016-07-22 14:47:04','2016-07-22 14:47:04'),
  (18,'admin.permission.store','权限添加操作','','2016-07-22 14:47:26','2016-07-22 14:47:26'),
  (19,'admin.permission.edit','权限修改界面','','2016-07-22 14:47:57','2016-07-22 14:47:57'),
  (20,'admin.permission.update','权限修改操作','','2016-07-22 14:48:16','2016-07-22 14:48:16'),
  (22,'admin.permission.destroy','权限删除操作','','2016-07-22 14:50:07','2016-07-22 14:50:07'),
  (23,'admin.user.index','用户管理首页','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
  (24,'admin.user.edit','用户修改界面','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
  (25,'admin.user.update','用户修改操作','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
  (26,'admin.user.destroy','用户删除操作','','2016-07-22 10:37:09','2016-07-22 10:37:09');