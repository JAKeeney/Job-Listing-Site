Job-Listing-Site

Please note that the information in db.php should be edited to work for your database.
Two tables should be used: users and jobs.

"users" requires an "id", "username", and "password" column, and the password should be stored as an md5 hash.
"jobs" requires an "id", "title", "start", "end", and "description" column.

Examples:

users:

CREATE TABLE users
(
  id int NOT NULL AUTO_INCREMENT,
  username varchar(30),
  `password` varchar(30),
  PRIMARY KEY (id)
);

https://i.gyazo.com/d31534f573747235f11b97f7869ae82c.png

jobs: 

CREATE TABLE jobs
(
  id int NOT NULL AUTO_INCREMENT,
  title varchar(255),
  `start` varchar(255),
  `end` varchar(255),
  `description` varchar(1000),
  PRIMARY KEY (id)
);

https://i.gyazo.com/6a0fe73b6655de6e2df5c12c364e8f99.png
