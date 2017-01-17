<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(){

        $sql = "INSERT INTO `iz_admin_user` (`id`, `username`, `nickname`,`password`,`register_time`,`last_login_time`,`created_at`, `updated_at`)
VALUES (1,'admin','admin@admin.com','".bcrypt("admin123456")."','2016-06-13 16:20:01','2016-06-13 16:20:01','2016-06-13 16:20:01','2016-07-22 15:36:00')";

        DB::insert($sql);


        DB::insert("INSERT INTO `iz_permission` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(2,'admin.home.index','后台首页','','2016-07-21 14:34:14','2016-07-21 14:34:14'),
	(3,'admin.admin_user.index','管理员管理首页','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
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
	(22,'admin.permission.destroy','权限删除操作','','2016-07-22 14:50:07','2016-07-22 14:50:07')
    (23,'admin.user.index','用户管理首页','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
    (24,'admin.user.edit','用户修改界面','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
    (25,'admin.user.update','用户修改操作','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
    (26,'admin.user.destroy','用户删除操作','','2016-07-22 10:37:09','2016-07-22 10:37:09'),

	");



    }
}


class PermissionTableSeeder extends Seeder {

    public function run(){

    }
}
