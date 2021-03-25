use projects;
CREATE TABLE IF NOT EXISTS tb_user_data(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(255),
email VARCHAR(255),
nickname VARCHAR(255),
password VARCHAR(255),
account_type VARCHAR(255)
);
select * from tb_user_data;
select * from user_role;
select * from tb_roles;

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

INSERT INTO tb_firms(firm_name,IDN,type_job) VALUES ("NAI DOBRITE BANICHKI","2036250","Prigotvqne na banichki");


CREATE TABLE user_firm(
    user_id INT,
    firm_id INT,
    CONSTRAINT fk_user_id FOREIGN KEY(user_id) REFERENCES `tb_user_data`(id),
    CONSTRAINT fk_firm_id FOREIGN KEY(firm_id) REFERENCES tb_firms(id)
);

INSERT INTO user_firm() VALUES (5,1);

SELECT * FROM tb_firms;

SELECT tb_user_data.id,tb_user_data.nickname, tb_firms.id as firm_id, tb_firms.firm_name as firm_name
FROM tb_user_data
JOIN user_firm on (tb_user_data.id = user_firm.user_id)
JOIN tb_firms on(tb_firms.id = user_firm.firm_id);

CREATE TABLE user_role(
    user_id INT,
    role_id INT,
    CONSTRAINT fk_u_rid FOREIGN KEY(user_id) REFERENCES `tb_user_data`(id),
    CONSTRAINT fk_u_uid FOREIGN KEY(role_id) REFERENCES tb_roles(id)
);




INSERT INTO tb_roles(name) VALUES ("employer") ;

INSERT INTO user_role() VALUES ("13","1") ;

SELECT tb_user_data.id,tb_user_data.nickname,account_type, tb_roles.id as role_id, tb_roles.name as role_name
FROM tb_user_data
JOIN user_role on (tb_user_data.id = user_role.user_id)
JOIN tb_roles on(tb_roles.id = user_role.role_id);

SELECT tb_user_data.id, tb_roles.id as role_id, tb_roles.name as role_name
FROM tb_user_data
JOIN user_role on (tb_user_data.id='13' = user_role.user_id)
JOIN tb_roles on(tb_roles.id = user_role.role_id);



INSERT INTO tb_user_data(fullname,email,nickname,password,account_type) VALUES ("test","test","test","test","test");

drop table user_role;
DROP TABLE tb_user_data;
drop table tb_roles;


