DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	email VARCHAR(128),
	password VARCHAR(128),
	type INT UNSIGNED
);

DROP TABLE IF EXISTS `candidates`;

CREATE TABLE `candidates` (
	id SERIAL PRIMARY KEY,
	first_name VARCHAR(32),
	middle_names VARCHAR(128),
	last_name VARCHAR(128),
	gender INT UNSIGNED,
	civil_state INT UNSIGNED,
	place_birth VARCHAR(64),
	date_birth DATETIME,
	address VARCHAR(128),
	neighborhood VARCHAR(64),
	zip_code VARCHAR(16),
	city_id BIGINT UNSIGNED,
	home_phone VARCHAR(32),
	comercial_phone VARCHAR(32),
	mobile_phone VARCHAR(32),
	personal_email VARCHAR(64),
	comercial_email VARCHAR(64),
	skype_name VARCHAR(64),
	international_experience TEXT,
	income_clt DECIMAL(13, 2),
	income_pj DECIMAL(13, 2),
	income_bonus VARCHAR(128),
	health_insurance_name VARCHAR(128),
	health_insurance_type INT UNSIGNED,
	life_insurance_name VARCHAR(128),
	life_insurance_type INT UNSIGNED,
	life_insurance_coverage VARCHAR(32),
	meal_ticket_type INT UNSIGNED,
	meal_ticket_value DECIMAL(4, 2),
	vehicle_type INT UNSIGNED,
	vehicle_description VARCHAR(128),
	fuel_voucher VARCHAR(64),
	market_basket VARCHAR(64),
	training_courses VARCHAR(256),
	profit_sharing VARCHAR(128),
	comments TEXT
);

DROP TABLE IF EXISTS `dependents`;

CREATE TABLE `dependents` (
	id SERIAL PRIMARY KEY,
	gender INT UNSIGNED,
	date_birth DATETIME,
	candidate_id BIGINT UNSIGNED NULL 
);

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64)
);

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	country_id BIGINT UNSIGNED NULL
);

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64),
	state_id BIGINT UNSIGNED NULL
);

DROP TABLE IF EXISTS `formations`;

CREATE TABLE `formations` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128)
);

DROP TABLE IF EXISTS `candidate_formations`;

CREATE TABLE `candidate_formations` (
	id SERIAL PRIMARY KEY,
	institution VARCHAR(128),
	conclusion_year VARCHAR(4),
	candidate_id BIGINT UNSIGNED NULL,
	formation_id BIGINT UNSIGNED NULL
);

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(32)
);

DROP TABLE IF EXISTS `candidate_languages`;

CREATE TABLE `candidate_languages` (
	id SERIAL PRIMARY KEY,
	level INT UNSIGNED,
	candidate_id BIGINT UNSIGNED NULL,
	language_id BIGINT UNSIGNED NULL
);

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128)
);

DROP TABLE IF EXISTS `candidate_courses`;

CREATE TABLE `candidate_courses` (
	id SERIAL PRIMARY KEY,
	institution VARCHAR(128),
	conclusion_year VARCHAR(4),
	candidate_id BIGINT UNSIGNED NULL,
	formation_id BIGINT UNSIGNED NULL
);

DROP TABLE IF EXISTS `market_sectors`;

CREATE TABLE `market_sectors` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64)
);

DROP TABLE IF EXISTS `workplaces`;

CREATE TABLE `workplaces` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128),
	nationality VARCHAR(32),
	market_sector_id BIGINT UNSIGNED NULL
);

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64)
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
	job_id BIGINT UNSIGNED NULL
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
	city_inscription VARCHAR(32)
);

INSERT INTO `companies` (name)
VALUES ("A");

INSERT INTO `companies` (name)
VALUES ("B");

INSERT INTO `companies` (name)
VALUES ("C");

INSERT INTO `companies` (name)
VALUES ("D");

INSERT INTO `companies` (name)
VALUES ("E");

INSERT INTO `companies` (name)
VALUES ("F");

INSERT INTO `companies` (name)
VALUES ("G");

INSERT INTO `companies` (name)
VALUES ("H");

INSERT INTO `companies` (name)
VALUES ("I");

INSERT INTO `companies` (name)
VALUES ("J");

INSERT INTO `companies` (name)
VALUES ("K");

INSERT INTO `companies` (name)
VALUES ("L");

INSERT INTO `companies` (name)
VALUES ("M");

INSERT INTO `companies` (name)
VALUES ("N");

INSERT INTO `companies` (name)
VALUES ("O");

INSERT INTO `companies` (name)
VALUES ("P");

INSERT INTO `companies` (name)
VALUES ("Q");

INSERT INTO `companies` (name)
VALUES ("R");

INSERT INTO `companies` (name)
VALUES ("AA");

INSERT INTO `companies` (name)
VALUES ("BB");

INSERT INTO `companies` (name)
VALUES ("CC");

INSERT INTO `companies` (name)
VALUES ("DD");

INSERT INTO `companies` (name)
VALUES ("EE");

INSERT INTO `companies` (name)
VALUES ("FF");

INSERT INTO `companies` (name)
VALUES ("GG");

INSERT INTO `companies` (name)
VALUES ("HH");

INSERT INTO `companies` (name)
VALUES ("II");

INSERT INTO `companies` (name)
VALUES ("JJ");

INSERT INTO `companies` (name)
VALUES ("KK");

INSERT INTO `companies` (name)
VALUES ("LL");

INSERT INTO `companies` (name)
VALUES ("MM");

INSERT INTO `companies` (name)
VALUES ("NN");

INSERT INTO `companies` (name)
VALUES ("OO");

INSERT INTO `companies` (name)
VALUES ("PP");

INSERT INTO `companies` (name)
VALUES ("QQ");

INSERT INTO `companies` (name)
VALUES ("RR");

INSERT INTO `companies` (name)
VALUES ("AAA");

INSERT INTO `companies` (name)
VALUES ("BBB");

INSERT INTO `companies` (name)
VALUES ("CCC");

INSERT INTO `companies` (name)
VALUES ("DDD");

INSERT INTO `companies` (name)
VALUES ("EEE");

INSERT INTO `companies` (name)
VALUES ("FFF");

INSERT INTO `companies` (name)
VALUES ("GGG");

INSERT INTO `companies` (name)
VALUES ("HHH");

INSERT INTO `companies` (name)
VALUES ("III");

INSERT INTO `companies` (name)
VALUES ("JJJ");

INSERT INTO `companies` (name)
VALUES ("KKK");

INSERT INTO `companies` (name)
VALUES ("LLL");

INSERT INTO `companies` (name)
VALUES ("MMM");

INSERT INTO `companies` (name)
VALUES ("NNN");

INSERT INTO `companies` (name)
VALUES ("OOO");

INSERT INTO `companies` (name)
VALUES ("PPP");

INSERT INTO `companies` (name)
VALUES ("QQQ");

INSERT INTO `companies` (name)
VALUES ("RRR");



 

-- DROP TABLE IF EXISTS `permissions`;

-- CREATE TABLE `permissions` (
-- 	id SERIAL PRIMARY KEY,
-- 	privileged_user BIGINT UNSIGNED NULL,
-- 	start_time DATETIME,
-- 	end_time DATETIME
-- );




