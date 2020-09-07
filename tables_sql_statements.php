<?php
// Server Name
defined('DB_HOST') || define('DB_HOST','localhost');
// Database Username
defined('DB_USERNAME') || define('DB_USERNAME','root');
// Database Password
defined('DB_PASSWORD') || define('DB_PASSWORD','');
// Database Name
defined('DB_NAME') || define('DB_NAME','medical');

// Connect to Database Server 
$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

// Statement Create Admins Table 
$state_admins_sql = "create table if not exists `admins` (
							`admin_id` integer unsigned not null primary key auto_increment,
							`admin_name` varchar(255) not null,
							`admin_email` varchar(100) not null unique,
							`admin_password` varchar(255) not null,
							`admin_type` enum('super_admin','admin')  default 'admin' not null,
							`admin_is_active` enum('1','0') not null default 0
						)";

$admin_excute_sql = mysqli_query($connection,$state_admins_sql);

// Statement Create Services Table 
$state_services_sql = "create table if not exists `services` (
							`service_id` integer unsigned not null primary key auto_increment,
							`service_name` varchar(100) not null unique,
							`service_is_active` boolean not null default 1
						)";

$services_excute_sql = mysqli_query($connection,$state_services_sql);

// Statement Create Cities Table 
$state_cities_sql = "create table if not exists `cities` (
							`city_id` integer unsigned not null primary key auto_increment,
							`city_name` varchar(100) not null,
							`city_is_active` bool not null default 1
						)";								

$cities_excute_sql = mysqli_query($connection,$state_cities_sql);

// Statement Create Orders Table 
$state_orders_sql = "create table if not exists `orders` (
							`order_id` integer unsigned not null primary key auto_increment,
							`order_name` varchar(255) not null,
							`order_email` varchar(100) not null,
							`order_phone` varchar(20) not null,
							`order_city_id` integer unsigned not null,
							`order_service_id` integer unsigned not null,
							`order_created_at` timestamp default current_timestamp,
							constraint fk_services_service_id foreign key(order_service_id) references services(service_id),
							constraint fk_cities_city_id foreign key(order_city_id) references cities(city_id)
						)";		

$orders_excute_sql = mysqli_query($connection,$state_orders_sql);

?>