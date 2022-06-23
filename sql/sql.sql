CREATE DATABASE IF NOT EXISTS projects;
use projects;
CREATE TABLE IF NOT EXISTS tb_user_data(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(255),
email VARCHAR(255),
nickname VARCHAR(255),
password VARCHAR(255),
account_type VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS tb_roles(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
name varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_firms(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
firm_name varchar(255) NOT NULL,
IDN varchar(255) NOT NULL,
type_job varchar(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS tb_jobs(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
job_name varchar(255) NOT NULL,
information varchar(255) NOT NULL,
requirements varchar(255) NOT NULL,
sallary varchar(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS firm_jobs(
    job_id INT,
    firm_id INT,
    CONSTRAINT fk_job_id FOREIGN KEY(job_id) REFERENCES `tb_jobs`(id),
    CONSTRAINT fk__firm_id FOREIGN KEY(firm_id) REFERENCES tb_firms(id)
);

CREATE TABLE user_firm(
    user_id INT,
    firm_id INT,
    CONSTRAINT fk_user_id FOREIGN KEY(user_id) REFERENCES `tb_user_data`(id),
    CONSTRAINT fk_firm_id FOREIGN KEY(firm_id) REFERENCES tb_firms(id)
);
CREATE TABLE user_role(
    user_id INT,
    role_id INT,
    CONSTRAINT fk_u_rid FOREIGN KEY(user_id) REFERENCES `tb_user_data`(id),
    CONSTRAINT fk_u_uid FOREIGN KEY(role_id) REFERENCES tb_roles(id)
);

INSERT INTO tb_roles(name) VALUES 
("employ"),
("employer");




