use sitter;

DROP TABLE IF EXISTS user;
CREATE TABLE user
(
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username                VARCHAR(128) NOT NULL UNIQUE,
    password                VARCHAR(128) NOT NULL,
    email                   VARCHAR(128) NOT NULL UNIQUE,
    firstname               VARCHAR(128) NOT NULL,
    lastname                VARCHAR(128) NOT NULL,
    dob                     DATE NOT NULL,
    usertypeid              TINYINT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (usertypeid) REFERENCES usertype(id) COMMENT 0=System Admin, 1=Community Admin, 2=Babysitter, 3=Parent',
    gender                  CHAR(1) NOT NULL COMMENT'M=MALE, F=FEMALE',
    useraddress             VARCHAR(128) NULL,
    userunit                VARCHAR(128) NULL,
    usercity                VARCHAR(128) NULL,
    userstate               VARCHAR(2) NULL,
    userzip                 VARCHAR(5) NULL,
    cellphone               VARCHAR(10) NULL,
    homephone               VARCHAR(10) NULL,
    babysittingsince        SMALLINT NULL,
    profilephotopath        VARCHAR(128) NULL,
    registrationdate        DATETIME NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS job;
CREATE TABLE job (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    scheduledstarttime      DATETIME NOT NULL ,
    scheduledendtime        DATETIME NOT NULL,
    actualstarttime         DATETIME  NULL,
    actualendtime           DATETIME NULL,
    parentuserid            INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (parentuserid) REFERENCES user(id)',
    babysitteruserid        INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (babysitteruserid) REFERENCES user(id)',
    childcount              TINYINT NULL,
    maxchildage             TINYINT NULL,
    minchildage             TINYINT NULL,
    hourlyrate              DECIMAL(5,2) NULL,
    amount                  DECIMAL(7,2) NULL,
    tip                     DECIMAL(7,2) NULL,
    creditcardfee           DECIMAL(5,2) NULL,
    createdate              TIMESTAMP NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

-- INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');

DROP TABLE IF EXISTS recurringjobscheduler;
CREATE TABLE recurringjobscheduler (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    startdate               DATETIME NOT NULL ,
    enddate                 DATETIME NOT NULL,
    intervalday             TINYINT  NOT NULL,
    intervalamt             FLOAT  NOT NULL,
    intervalunit            CHAR(1) NOT NULL,
    starttime               TIMESTAMP NOT NULL,
    endtime                 TIMESTAMP NOT NULL,
    babysitteruserid        INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (babysitteruserid) REFERENCES user(id)',
    parentuserid            INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (parentuserid) REFERENCES user(id)',
    approvedparent          TINYINT NOT NULL,
    approvedbabysitter      TINYINT NOT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

-- INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');
-- INSERT INTO tbl_user (username, password, email) VALUES ('test2', 'pass2', 'test2@example.com');

DROP TABLE IF EXISTS recurringjobexception;
CREATE TABLE recurringjobexception (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    reccuringjobid          INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (reccuringjobid) REFERENCES recurringjobscheduler(id)',
    startdate               DATETIME NOT NULL ,
    enddate                 DATETIME NULL,
    newstarttime            INT NULL,
    newendtime              INT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

-- INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');
-- INSERT INTO tbl_user (username, password, email) VALUES ('test2', 'pass2', 'test2@example.com');

DROP TABLE IF EXISTS payment;
CREATE TABLE payment(
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    paymenttypeid           TINYINT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (paymenttypeid) REFERENCES paymenttype(id)',
    amount                  DECIMAL(7,2) NOT NULL,
    jobid                   INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (jobid) REFERENCES job(id)',
    paymentdate             DATETIME NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS rating;
CREATE TABLE rating(
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    jobid                   INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (jobid) REFERENCES job(id)',
    rateruserid             INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (rateruserid) REFERENCES user(id)',
    rateeuserid             INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (rateeuserid) REFERENCES user(id)',
    rateeusertype           TINYINT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (rateeusertype) REFERENCES usertype(id)',
    generalrating           TINYINT NOT NULL,
    reliablerating          TINYINT NOT NULL,
    punctualrating          TINYINT NOT NULL,
    workagainrating         TINYINT NOT NULL,
    transportrating         TINYINT NOT NULL,
    keepanonymous           TINYINT NOT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS skill;
CREATE TABLE skill (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    skillname               VARCHAR(255) NOT NULL,
    skillpriority           INT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS userskill;
CREATE TABLE userskill (
    userid                  INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userid) REFERENCES user(id)',
    skillid                 INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (skillid) REFERENCES skill(id)',
    verifiedbyuserid        INT NOT NULL,
    expires                 TINYINT NOT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS documenttype;
CREATE TABLE documenttype (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    documentname            VARCHAR(255),
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS userdocument;
CREATE TABLE userdocument (
    userid                  INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userid) REFERENCES user(id)',
    documenttypeid          INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (documenttypeid) REFERENCES documenttype(id)',
    expires                 DATETIME NULL,
    documentpath            VARCHAR(128) NOT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS usertype;
CREATE TABLE usertype (
    id                      INT NOT NULL PRIMARY KEY,
    usertype                VARCHAR(255),
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS paymenttype;
CREATE TABLE paymenttype (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    paymenttype             VARCHAR(255) NOT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS availabilityschedule;
CREATE TABLE availabilityschedule (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid                  INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userid) REFERENCES user(id)',
    startdate               DATETIME NOT NULL,
    enddate                 DATETIME NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS availabilitydetailinterval;
CREATE TABLE availabilitydetailinterval (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    availabilityid          INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (availabilityid) REFERENCES availabilityschedule(id)',
    intervalday             TINYINT NOT NULL,
    intervalamt             FLOAT NOT NULL,
    intervalunit            char(1) NOT NULL,
    starttime               TIMESTAMP NOT NULL,
    endtime                 TIMESTAMP NOT NULL,
    hourlyrate              DECIMAL(5,2) NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

DROP TABLE IF EXISTS availabilitydetaildate;
CREATE TABLE availabilitydetaildate (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    availabilityid          INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (availabilityid) availabilityschedule Department(id)',
    workdate                DATETIME NOT NULL,
    starttime               TIMESTAMP NULL,
    endtime                 TIMESTAMP NULL,
    hourlyrate              DECIMAL(5,2) NULL,
    isexception             TINYINT NULL,
    createdate              DATETIME NOT NULL,
    createbyuserid          INT NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

INSERT INTO user ( username, password, email, firstname, lastname, dob, gender, 
                    usertypeid, useraddress, userunit, usercity, userstate, userzip,
                    cellphone, homephone, registrationdate, profilephotopath) 
    VALUES ('admin', 'admin99', 'admin@mailnator.com', 'Shavy','Yarmush','1988-08-02','M',
            0, '840 Montgomery St', '1A', 'Brooklyn', 'NY', '11213',
            '3472280777', '7187745616', '2015-08-25', 'defaults/default_male_babysitter.jpeg');

INSERT INTO user ( username, password, email, firstname, lastname, dob, gender, 
                    usertypeid, useraddress, userunit, usercity, userstate, userzip,
                    cellphone, registrationdate, profilephotopath) 
    VALUES ('mushky', 'Mushk12', 'mushky@mailnator.com', 'Mushky','Niasoff','1992-08-02','F',
            1, '840 Montgomery St', '1A', 'Brooklyn', 'NY', '11213',
            '3472769282', '2015-08-25', 'defaults/default_female_parent.jpeg');

INSERT INTO user ( username, password, email, firstname, lastname, dob, gender, 
                    usertypeid, useraddress, userunit, usercity, userstate, userzip,
                    cellphone, registrationdate, profilephotopath) 
    VALUES ('berele', 'Berel12', 'berele@mailnator.com', 'Berel','Yarmush','1981-08-02', 'F',
            3, '675 Empire BLVD', '1A', 'Brooklyn', 'NY', '11213', 
            '7184737926','2015-08-25', 'defaults/default_male_parent.jpeg');

INSERT INTO user ( username, password, email, firstname, lastname, dob, gender, 
                    usertypeid, useraddress, userunit, usercity, userstate, userzip,
                    cellphone, babysittingsince, registrationdate, profilephotopath) 
    VALUES ('rosie', 'Rosi12', 'rosie@mailnator.com', 'Rosie','Kapel','2000-08-02','F',
            2, '760 Montgomery St', '3G', 'Brooklyn', 'NY', '11213',
            '1234567890', 2012, '2015-08-25', 'defaults/default_female_babysitter.jpeg');

INSERT INTO usertype (id, usertype)
    VALUES  (0,'System Admin'),
            (1,'Community Admin'),
            (2,'Babysitter'),
            (3,'Parent');




