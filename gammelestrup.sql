########################################
# Gammel Estrup initial SQL request
########################################


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
  lan  int           NOT NULL ,
  lon  int           NOT NULL ,
  title     char(250)  NULL ,
  description_short     char(250)  NULL ,
  description     char(250)  NULL ,
  keywords char(250)  NULL ,
  opening_hours_start time NULL ,
  opening_hours_end time NULL ,
  entry_fee char(50)  NULL ,
  address char(50)  NULL ,
  phone char(50)  NULL ,
  user_email   char(255)  NULL ,
  function char(250)  NULL ,
  thumbnail char(250)  NULL ,
  user_id    int      NOT NULL ,
  PRIMARY KEY (manor_id)
) ENGINE=InnoDB;

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
ALTER TABLE events ADD CONSTRAINT fk_manor_events FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE exibitions ADD CONSTRAINT fk_manor_exibitions FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE photos ADD CONSTRAINT fk_manor_photos FOREIGN KEY (manor_id) REFERENCES manors (manor_id);
ALTER TABLE event_photos ADD CONSTRAINT fk_event_photos FOREIGN KEY (event_id) REFERENCES events (event_id);
ALTER TABLE manors ADD CONSTRAINT fk_user_manors FOREIGN KEY (user_id) REFERENCES users (user_id);