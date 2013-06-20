DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	email VARCHAR(128),
	password VARCHAR(128),
	type INT UNSIGNED,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidates`;

CREATE TABLE `candidates` (
	id SERIAL PRIMARY KEY,
	first_name VARCHAR(32),
	middle_names VARCHAR(128),
	last_name VARCHAR(128),
	gender TINYINT UNSIGNED,
	civil_state TINYINT UNSIGNED,
	place_birth VARCHAR(64),
	birthdate DATE,
	address VARCHAR(128),
	neighborhood VARCHAR(64),
	zip_code VARCHAR(16),
	city_id BIGINT UNSIGNED,
	home_phone VARCHAR(32),
	work_phone VARCHAR(32),
	mobile_phone VARCHAR(32),
	personal_email VARCHAR(64),
	work_email VARCHAR(64),
	skype_name VARCHAR(64),
	international_experience TEXT,
	income_type TINYINT UNSIGNED,
	income_clt DECIMAL(13, 2) NOT NULL,
	income_pj DECIMAL(13, 2) NOT NULL,
	income_bonus VARCHAR(128),
	health_insurance_name VARCHAR(128),
	health_insurance_type TINYINT UNSIGNED,
	life_insurance_name VARCHAR(128),
	life_insurance_type TINYINT UNSIGNED,
	life_insurance_coverage VARCHAR(32),
	dental_insurance VARCHAR(128),
	private_pension VARCHAR(128),
	meal_ticket_type TINYINT UNSIGNED,
	meal_ticket_value DECIMAL(4, 2),
	vehicle_type TINYINT UNSIGNED,
	vehicle_description VARCHAR(128),
	fuel_voucher VARCHAR(64),
	market_basket VARCHAR(64),
	training_courses VARCHAR(256),
	profit_sharing VARCHAR(128),
	comments TEXT,
	additional_info VARCHAR(256),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `dependents`;

CREATE TABLE `dependents` (
	id SERIAL PRIMARY KEY,
	gender TINYINT UNSIGNED,
	birthdate DATE,
	candidate_id BIGINT UNSIGNED NULL,
	created DATETIME NULL 
);

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	country_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	state_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `formations`;

CREATE TABLE `formations` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_formations`;

CREATE TABLE `candidate_formations` (
	id SERIAL PRIMARY KEY,
	institution VARCHAR(128),
	conclusion_year VARCHAR(4),
	candidate_id BIGINT UNSIGNED NULL,
	formation_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(32),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_languages`;

CREATE TABLE `candidate_languages` (
	id SERIAL PRIMARY KEY,
	level TINYINT UNSIGNED,
	candidate_id BIGINT UNSIGNED NULL,
	language_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_courses`;

CREATE TABLE `candidate_courses` (
	id SERIAL PRIMARY KEY,
	institution VARCHAR(128),
	conclusion_year VARCHAR(4),
	candidate_id BIGINT UNSIGNED NULL,
	course_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `market_sectors`;

CREATE TABLE `market_sectors` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `workplaces`;

CREATE TABLE `workplaces` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	nationality VARCHAR(32),
	market_sector_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `experiences`;

CREATE TABLE `experiences` (
	id SERIAL PRIMARY KEY,
	start_date DATE,
	final_date DATE,
	report VARCHAR(32),
	team VARCHAR(32),
	candidate_id BIGINT UNSIGNED NULL,
	workplace_id BIGINT UNSIGNED NULL,
	job_id BIGINT UNSIGNED NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	contact_name VARCHAR(128),
	contact_email VARCHAR(64),
	contact_telephone VARCHAR(32),
	address VARCHAR(256),
	cnpj VARCHAR(32),
	state_inscription VARCHAR(32),
	city_inscription VARCHAR(32),
	created DATETIME NULL
);

DROP TABLE IF EXISTS `curriculums`;

CREATE TABLE `curriculums` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128) NOT NULL,
	type VARCHAR(128) NOT NULL,
	size INT NOT NULL,
	content MEDIUMBLOB NOT NULL,
	candidate_id BIGINT UNSIGNED,
	created DATETIME NULL 
);





 

-- DROP TABLE IF EXISTS `permissions`;

-- CREATE TABLE `permissions` (
-- 	id SERIAL PRIMARY KEY,
-- 	privileged_user BIGINT UNSIGNED NULL,
-- 	start_time DATETIME,
-- 	end_time DATETIME
-- );




