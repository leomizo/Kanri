DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	type INT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidates`;

CREATE TABLE `candidates` (
	id SERIAL PRIMARY KEY,
	first_name VARCHAR(32) NOT NULL,
	middle_names VARCHAR(128),
	last_name VARCHAR(128) NOT NULL,
	gender TINYINT UNSIGNED NOT NULL,
	civil_state TINYINT UNSIGNED NOT NULL,
	place_birth VARCHAR(64),
	birthdate DATE NOT NULL,
	address VARCHAR(128),
	neighborhood VARCHAR(64),
	zip_code VARCHAR(16),
	city_id BIGINT UNSIGNED NOT NULL,
	home_phone VARCHAR(32),
	work_phone VARCHAR(32),
	mobile_phone VARCHAR(32),
	personal_email VARCHAR(64) NOT NULL,
	work_email VARCHAR(64),
	skype_name VARCHAR(64),
	international_experience TEXT,
	income_type TINYINT UNSIGNED,
	income_clt DECIMAL(13, 2) DEFAULT 0.00,
	income_pj DECIMAL(13, 2) DEFAULT 0.00,
	income_bonus VARCHAR(128),
	health_insurance_name VARCHAR(128),
	health_insurance_type TINYINT UNSIGNED,
	life_insurance_name VARCHAR(128),
	life_insurance_type TINYINT UNSIGNED,
	life_insurance_coverage VARCHAR(32),
	dental_insurance VARCHAR(128),
	private_pension VARCHAR(128),
	meal_ticket_type TINYINT UNSIGNED,
	meal_ticket_value VARCHAR(64),
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
	gender TINYINT UNSIGNED NOT NULL,
	birthdate DATE NOT NULL,
	candidate_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL 
);

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	country_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	state_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `formations`;

CREATE TABLE `formations` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128) NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_formations`;

CREATE TABLE `candidate_formations` (
	id SERIAL PRIMARY KEY,
	institution VARCHAR(128) NOT NULL,
	conclusion_year VARCHAR(4) NOT NULL,
	candidate_id BIGINT UNSIGNED NOT NULL,
	formation_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(32) NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_languages`;

CREATE TABLE `candidate_languages` (
	id SERIAL PRIMARY KEY,
	level TINYINT UNSIGNED NOT NULL,
	candidate_id BIGINT UNSIGNED NOT NULL,
	language_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128) NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_courses`;

CREATE TABLE `candidate_courses` (
	id SERIAL PRIMARY KEY,
	institution VARCHAR(128) NOT NULL,
	conclusion_year VARCHAR(4) NOT NULL,
	candidate_id BIGINT UNSIGNED NOT NULL,
	course_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `market_sectors`;

CREATE TABLE `market_sectors` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `workplaces`;

CREATE TABLE `workplaces` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128) NOT NULL,
	nationality VARCHAR(32) NOT NULL,
	market_sector_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `experiences`;

CREATE TABLE `experiences` (
	id SERIAL PRIMARY KEY,
	start_date DATE NOT NULL,
	final_date DATE,
	report VARCHAR(64),
	team VARCHAR(64),
	candidate_id BIGINT UNSIGNED NOT NULL,
	workplace_id BIGINT UNSIGNED NOT NULL,
	job_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `experience_descriptions`;

CREATE TABLE `experience_descriptions` (
	id SERIAL PRIMARY KEY,
	experience_id BIGINT UNSIGNED NOT NULL,
	type TINYINT NOT NULL,
	description TEXT
);

DROP TABLE IF EXISTS `remunerations`;

CREATE TABLE `remunerations` (
	id SERIAL PRIMARY KEY,
	candidate_id BIGINT UNSIGNED NOT NULL,
	type VARCHAR(32),
	value VARCHAR(64)
);

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
	id SERIAL PRIMARY KEY,
	name VARCHAR(128) NOT NULL,
	contact_name VARCHAR(128) NOT NULL,
	contact_email VARCHAR(64) NOT NULL,
	contact_telephone VARCHAR(32) NOT NULL,
	address VARCHAR(256) NOT NULL,
	cnpj VARCHAR(32) NOT NULL,
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

DROP TABLE IF EXISTS `processes`;

CREATE TABLE `processes` (
	id SERIAL PRIMARY KEY,
	candidate_id BIGINT UNSIGNED NOT NULL,
	company_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
	id SERIAL PRIMARY KEY,
	event_type TINYINT NOT NULL,
	occurrence DATETIME NOT NULL,
	process_id BIGINT UNSIGNED NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `event_contacts`;

CREATE TABLE `event_contacts` (
	id SERIAL PRIMARY KEY,
	event_id BIGINT UNSIGNED NOT NULL,
	contact_reason VARCHAR(256) NOT NULL,
	contact_sender VARCHAR(128) NOT NULL,
	contact_receiver VARCHAR(128) NOT NULL,
	contact_type TINYINT NOT NULL,
	contact_type_description VARCHAR(32),
	description TEXT,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `event_interviews`;

CREATE TABLE `event_interviews` (
	id SERIAL PRIMARY KEY,
	event_id BIGINT UNSIGNED NOT NULL,
	attendance BOOLEAN NOT NULL,
	contact_type TINYINT NOT NULL,
	contact_type_description VARCHAR(32),
	attendance_justification VARCHAR(256),
	description TEXT,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `event_feedbacks`;

CREATE TABLE `event_feedbacks` (
	id SERIAL PRIMARY KEY,
	event_id BIGINT UNSIGNED NOT NULL,
	feedback TINYINT NOT NULL,
	comments TEXT,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `event_conclusions`;

CREATE TABLE `event_conclusions`(
	id SERIAL PRIMARY KEY,
	event_id BIGINT UNSIGNED NOT NULL,
	result BOOLEAN NOT NULL,
	comments TEXT,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
	id SERIAL PRIMARY KEY,
	user_id BIGINT UNSIGNED NOT NULL,
	start DATETIME NOT NULL,
	end DATETIME NOT NULL,
	created DATETIME NULL
);

DROP TABLE IF EXISTS `candidate_birthdays`;

CREATE TABLE `candidate_birthdays` (
	id SERIAL PRIMARY KEY,
	candidate_id BIGINT UNSIGNED NOT NULL,
	status TINYINT DEFAULT 0 NOT NULL
);

INSERT INTO `users` (`name`, `email`, `password`, `type`)
VALUES ("Edson Tamamaro", "edson@kanri.com", "64bbf816abf3fd1f415b1826b78f5b3a8d22ac84", "0");
