-- create the tables
CREATE TABLE sk_courses (
  courseID       VARCHAR (12)   NOT NULL,
  courseName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (courseID)
);

CREATE TABLE sk_students (
  studentID        INT(11)        NOT NULL   AUTO_INCREMENT,
  courseID      VARCHAR (12)      NOT NULL,
  firstName     VARCHAR(255)      NOT NULL,
  lastName      VARCHAR(255)      NOT NULL,
  email         VARCHAR(255)      NOT NULL,
  PRIMARY KEY (studentID)
);

-- insert data into the database
INSERT INTO sk_courses VALUES
('cs601', 'Web Application Development'),
('cs602', 'Server-Side Web Development'),
('cs701', 'Rich Internet Application Development');

INSERT INTO sk_students VALUES
(1, 'cs601', 'John', 'Doe', 'john@doe.com'),
(2, 'cs601', 'Jane', 'Doe', 'jane@doe.com'),
(3, 'cs602', 'John', 'Smith', 'john@smith.com'),
(4, 'cs602', 'Jane', 'Smith', 'jane@smith.com'),
(5, 'cs701', 'John', 'Doe', 'john@doe.com'),
(6, 'cs701', 'Jane', 'Smith', 'jane@smith.com');

