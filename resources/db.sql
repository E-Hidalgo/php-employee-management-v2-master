-- CREATE DATABASE
-- CREATE TABLE USERS
CREATE TABLE IF NOT EXISTS users (
  id BIGINT NOT NULL AUTO_INCREMENT,
  user_id BIGINT NOT NULL,
  email CHAR(255) NOT NULL,
  username VARCHAR(64) NOT NULL,
  encrypted_password CHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
-- CREATE TABLE EMPLOYEES
CREATE TABLE IF NOT EXISTS employees (
  id BIGINT NOT NULL AUTO_INCREMENT,
  emp_id BIGINT NOT NULL,
  firstName CHAR(36) NOT NULL,
  email CHAR(255) NOT NULL,
  gender ENUM('Male','Female'),
  city CHAR(40) NOT NULL,
  streetAdress CHAR(40) NOT NULL,
  stateName CHAR(40) NOT NULL,
  age CHAR(40) NOT NULL,
  postalCode CHAR(40) NOT NULL,
  phoneNumber CHAR(40) NOT NULL,
  PRIMARY KEY (id)
);
-- INSERT USERS
INSERT INTO users VALUES (1, 1, "admin@assemblerschool.com", "admin", "$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC");
-- WRONG ORDER OF DATA = SOLVED
UPDATE users SET email =  "admin@assemblerschool.com", username = "admin", encrypted_password = "$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC" WHERE id = 1;
-- INSERT EMPLOYEES
INSERT INTO employees VALUES 
(1,1, "Rack", "jackon@network.com", "Male", "San Jone", "126", "CA", "23", "394221", "7383627627", "Lei");
INSERT INTO employees VALUES 
(2,2, "John", "jhondoe@foo.com", "Male", "New York", "89", "WA", "34", "09889", "1283645645", "Doe"),
(3,3, "Leila", "mills@leila.com", "Female", "San Diego", "55", "CA", "29", "098765", "9983632461","Arboleda"),
(4,4, "Richard", "dismond@foo.com", "Male", "Salt lake city", "90", "CA", "30", "457320", "90876987654", "Desmond"),
(5,5, "Susan", "susanmith@baz.com", "Female", "Louisville", "43", "UT", "28", "445321", "224355488976", "Smith"),
(6,6, "Brad", "brad@foo.com", "Male", "Atlanta", "128", "KNT", "40", "394221", "6854634522", "Brad"),
(7,7, "Neil", "walkerneil@baz.com", "Male", "Nashville", "1", "GEO", "42", "90143", "45372788192", "Walker");
(8,8, "Robert", "robert@network.com", "Male", "New Orleans", "126", "TN", "24", "63281", "91232876454", "Thomson");
-- FORGOT ONE COLUMN?
ALTER TABLE employees ADD lastName Char(36) NOT NULL;