DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	email VARCHAR(128),
	password VARCHAR(128),
	user_type ENUM('main_manager', 'auxiliary_manager')
);

-- DROP TABLE IF EXISTS `permissions`;

-- CREATE TABLE `permissions` (
-- 	id SERIAL PRIMARY KEY,
-- 	privileged_user BIGINT UNSIGNED NOT NULL FOREIGN KEY,
-- 	start_time DATETIME,
-- 	end_time DATETIME
-- );

-- DROP TABLE IF EXISTS `candidates`;

-- CREATE TABLE `candidates` (
-- 	id SERIAL PRIMARY KEY,
-- 	first_name VARCHAR(32),
-- 	middle_names VARCHAR(128),
-- 	last_name VARCHAR(128),
-- 	gender ENUM('male', 'female'),
-- 	civil_state ENUM('single', 'married', 'divorced', 'widower'),
-- 	place_birth VARCHAR(64),
-- 	dependents VARCHAR(128),
-- 	date_birth DATETIME,
-- 	address VARCHAR(128),
-- 	neighborhood VARCHAR(64),
-- 	zip_code VARCHAR(16),
-- 	city BIGINT UNSIGNED NOT NULL FOREIGN KEY,
-- 	home_phone VARCHAR(32),
-- 	comercial_phone VARCHAR(32),
-- 	mobile_phone VARCHAR(32),
-- 	personal_email VARCHAR(64),
-- 	comercial_email VARCHAR(64)
-- );


