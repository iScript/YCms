<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);

        $this->command->info('table seeded!');
    }
}

class UserTableSeeder extends Seeder {

    public function run(){

        $sql = "INSERT INTO `iz_user` (`id`,  `nickname`, `mobile`, `email`, `password`, `register_time`, `last_login_time`, `avatar`, `sex`, `status`, `remember_token`,`register_type` ,`created_at`, `updated_at`, `deleted_at`)
VALUES (1,'admin',NULL,'admin@admin.com','".password_crypt("admin123456")."','2016-06-13 16:20:01','2016-07-22 15:36:00',NULL,0,0,'M2x3skdCW6CCDOMEEv2xrM5Az52qgSZkC1hTiHSNJ7tYKuAI93N3i0OumXqw',1,'2016-06-13 16:20:01','2016-07-22 15:36:00',NULL)";

        DB::insert($sql);

    }
}


class PermissionTableSeeder extends Seeder {

    public function run(){

        DB::insert("INSERT INTO `iz_permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(2,'admin.home.index','后台首页','','2016-07-21 14:34:14','2016-07-21 14:34:14'),
	(3,'admin.user.index','用户管理首页','','2016-07-22 10:37:09','2016-07-22 10:37:09'),
	(4,'admin.user.create','用户添加界面','','2016-07-22 10:50:51','2016-07-22 10:50:51'),
	(5,'admin.user.store','用户添加操作','','2016-07-22 11:19:17','2016-07-22 11:19:17'),
	(6,'admin.user.edit','用户编辑界面','','2016-07-22 11:19:46','2016-07-22 11:19:46'),
	(7,'admin.user.update','用户编辑操作','','2016-07-22 11:20:17','2016-07-22 11:20:17'),
	(8,'admin.user.destroy','用户删除操作','','2016-07-22 11:20:48','2016-07-22 11:20:48'),
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
	(23,'admin.article.index','文章列表页面','','2016-07-22 14:51:19','2016-07-22 14:51:19'),
	(24,'admin.article.create','文章添加页面','','2016-07-22 14:51:38','2016-07-22 14:51:38'),
	(25,'admin.article.store','文章添加操作','','2016-07-22 14:52:01','2016-07-22 14:52:01'),
	(26,'admin.article.edit','文章修改页面','','2016-07-22 14:52:27','2016-07-22 14:52:27'),
	(27,'admin.article.update','文章修改操作','','2016-07-22 14:52:47','2016-07-22 14:52:47'),
	(28,'admin.article.destroy','文章删除操作','','2016-07-22 14:53:11','2016-07-22 14:53:11'),
	(29,'admin.article_category.index','节点列表界面','','2016-07-22 15:01:00','2016-07-22 15:01:00'),
	(30,'admin.article_category.create','节点添加界面','','2016-07-22 15:01:22','2016-07-22 15:01:22'),
	(31,'admin.article_category.store','节点添加操作','','2016-07-22 15:01:35','2016-07-22 15:01:35'),
	(32,'admin.article_category.edit','节点修改界面','','2016-07-22 15:01:49','2016-07-22 15:01:49'),
	(33,'admin.article_category.update','节点修改操作','','2016-07-22 15:02:02','2016-07-22 15:02:02'),
	(34,'admin.article_category.desstroy','节点删除操作','','2016-07-22 15:02:20','2016-07-22 15:02:20'),
	(35,'admin.product.index','产品列表界面','','2016-07-22 15:03:17','2016-07-22 15:03:17'),
	(36,'admin.product.create','产品添加界面','','2016-07-22 15:03:31','2016-07-22 15:03:31'),
	(37,'admin.product.store','产品添加操作','','2016-07-22 15:03:51','2016-07-22 15:03:51'),
	(38,'admin.product.edit','产品修改界面','','2016-07-22 15:04:02','2016-07-22 15:04:02'),
	(39,'admin.product.update','产品修改操作','','2016-07-22 15:04:17','2016-07-22 15:04:17'),
	(40,'admin.product.destroy','产品删除操作','','2016-07-22 15:04:31','2016-07-22 15:04:31'),
	(41,'admin.product_category.index','产品分类首页','','2016-07-22 15:05:14','2016-07-22 15:05:14'),
	(42,'admin.product_category.create','产品分类添加界面','','2016-07-22 15:05:41','2016-07-22 15:05:41'),
	(43,'admin.product_category.store','产品分类添加操作','','2016-07-22 15:06:03','2016-07-22 15:06:03'),
	(44,'admin.product_category.edit','产品分类修改界面','','2016-07-22 15:06:19','2016-07-22 15:07:27'),
	(45,'admin.product_category.update','产品分类修改操作','','2016-07-22 15:07:44','2016-07-22 15:07:44'),
	(46,'admin.product_category.destroy','产品分类删除','','2016-07-22 15:08:04','2016-07-22 15:08:04')");

    }
}
