########################################
# Initial SQL request
########################################

########################
# Create database
########################

CREATE DATABASE tidsrejser; 

########################
# Select database
########################

USE tidsrejser;

########################
# Create events table
########################
CREATE TABLE events
(
  event_id      int      NOT NULL AUTO_INCREMENT,
  manor_id      int      NOT NULL ,
  start    datetime  NOT NULL ,
  end      datetime  NOT NULL ,
  schedule   char(5)   NULL ,
  title     char(250)  NULL ,
  tagline     char(250)  NULL ,
  description     char(255)  NULL ,
  thumbnail char(250)  NULL ,
  PRIMARY KEY (event_id)
) ENGINE=InnoDB;

#########################
# Create exibitions table
#########################
CREATE TABLE exibitions
(
  exibition_id  int          NOT NULL AUTO_INCREMENT,
  manor_id      int      NOT NULL ,
  start    char(50)  NULL ,
  end    char(50)  NULL ,
  description     char(250)  NULL ,
  thumbnail char(250)  NULL ,
  entry_fee decimal(8,2) NOT NULL ,
  PRIMARY KEY (exibition_id)
) ENGINE=InnoDB;

#####################
# Create manors table
#####################
CREATE TABLE manors
(
  manor_id  int      NOT NULL AUTO_INCREMENT,
  latitude  decimal           NOT NULL ,
  longitude  decimal           NOT NULL ,
  title     char(250)  NULL ,
  description_short     text  NOT NULL ,
  description     text  NOT NULL ,
  keywords text NOT NULL ,
  admission text  NULL ,
  parking text NULL ,
  address char(50)  NULL ,
  phone char(50)  NULL ,
  user_email   char(255)  NULL ,
  function char(250)  NULL ,
  thumbnail char(250)  NULL ,
  user_id    int      NOT NULL ,
  PRIMARY KEY (manor_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#####################
# Create opening_period table
#####################

CREATE TABLE opening_period
(
  opening_period_id  int      NOT NULL AUTO_INCREMENT,
  manor_id    int           NOT NULL ,
  opening_date date NULL ,
  closing_date date NULL ,
  opening_day int(2) NULL ,
  closing_day  int(2) NULL,
  opening_hours time NULL ,
  closing_hours time NULL ,
  PRIMARY KEY(opening_period_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#######################
# Create photos table
#######################
CREATE TABLE photos
(
  photo_id   int            NOT NULL AUTO_INCREMENT,
  manor_id    int           NOT NULL ,
  source  char(255)     NOT NULL ,
  alt char(255)    NULL ,
  PRIMARY KEY(photo_id)
) ENGINE=InnoDB;

#######################
# Create event photos table
#######################
CREATE TABLE event_photos
(
  event_photo_id   int            NOT NULL AUTO_INCREMENT,
  event_id    int           NOT NULL ,
  source  char(255)     NOT NULL ,
  alt char(255)    NULL ,
  PRIMARY KEY(event_photo_id)
) ENGINE=InnoDB;

########################
# Create users table
########################
CREATE TABLE users
(
  user_id      int       NOT NULL AUTO_INCREMENT,
  user_name    char(50)  NOT NULL ,
  user_email   char(255)  NULL ,
  password varchar(32)   NULL ,
  thumbnail char(250)  NULL ,
  PRIMARY KEY (user_id)
) ENGINE=InnoDB;


#####################
# Define foreign keys
#####################

ALTER TABLE opening_period ADD CONSTRAINT fk_manor_opening FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE events ADD CONSTRAINT fk_manor_events FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE exibitions ADD CONSTRAINT fk_manor_exibitions FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE photos ADD CONSTRAINT fk_manor_photos FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE event_photos ADD CONSTRAINT fk_event_photos FOREIGN KEY (event_id) REFERENCES events (event_id);
ALTER TABLE manors ADD CONSTRAINT fk_user_manors FOREIGN KEY (user_id) REFERENCES users (user_id);


#####################
# Dumping data for table `manors`
#####################

INSERT INTO users (user_id, user_name, user_email)
VALUES (1,'manager','info@gammelestrup.dk');

INSERT INTO users (user_id, user_name, user_email)
VALUES (2,'hr','hr@gammelestrup.dk');

INSERT INTO manors (manor_id, user_id, latitude, longitude)
VALUES (1, 1, '56.437949', '10.344315000000051');

INSERT INTO manors (manor_id, user_id, latitude, longitude, title, description_short, description, keywords)
VALUES (2, 1, '56.437949', '10.344315000000051', 'Gammel Estrup', 'The Manor Museum is a private foundation', 'The museum is an interior museum.','interior, museum, manor, culture');

INSERT INTO manors (manor_id, latitude, longitude, title, description_short, description, keywords, user_id)
VALUES (3, 56.437949, 10.344315000000051,'Gammel Estrup','The Manor Museum is a private foundation and Danish Agricultural Museum','The museum is an interior museum, which means that the collection is set up in a way that illustrates how a manor house could have been arranged at different times.','interior, museum, manor, culture',1);