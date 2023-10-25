DROP DATABASE IF EXISTS `UNDERGROUND_RADIO_DB`;

CREATE DATABASE `UNDERGROUND_RADIO_DB`;

USE `UNDERGROUND_RADIO_DB`;

CREATE TABLE SHOW_TABLE(
    `ID` INT NOT NULL AUTO INCREMENT ,
    `SHOW_NAME` VARCHAR(128) NOT NULL, 
    `LOGO_PATH` VARCHAR(512) NOT NULL, 
    `PRODUCER_1` VARCHAR(256) NOT NULL,
    `PRODUCER_2` VARCHAR(256),
    `PRODUCER_3` VARCHAR(256),
    `PRODUCER_4` VARCHAR(256), 
    `DESCRIPTION` VARCHAR(1000) NOT NULL, 
    PRIMARY KEY (`SHOW_NAME`));

CREATE TABLE CURRENT_SHOW(
    `SHOW_NAME` VARCHAR(128) NOT NULL, 
    PRIMARY KEY(`SHOW_NAME`));

CREATE TABLE BROADCAST(
    `DAY` VARCHAR(16) NOT NULL, 
    `START_TIME` TIME NOT NULL, 
    `END_TIME` TIME NOT NULL,
    `SHOW_NAME` VARCHAR(128) NOT NULL, 
    `PRODUCER_1` VARCHAR(256),
    `PRODUCER_2` VARCHAR(256),
    `PRODUCER_3` VARCHAR(256),
    `PRODUCER_4` VARCHAR(256), 
    PRIMARY KEY(`DAY`, `START_TIME`));

CREATE TABLE NEXT_SHOW(
    `DAY` VARCHAR(16) NOT NULL, 
    `START_TIME` TIME NOT NULL, 
    `SHOW_NAME` VARCHAR(128) NOT NULL, 
    PRIMARY KEY(`SHOW_NAME`));

ALTER TABLE BROADCAST ADD CONSTRAINT FK_BR_SHOW_TABLE FOREIGN KEY(`SHOW_NAME`) REFERENCES SHOW_TABLE(`SHOW_NAME`);

ALTER TABLE NEXT_SHOW ADD CONSTRAINT FK_BR_NEXT FOREIGN KEY(`DAY`, `START_TIME`) REFERENCES BROADCAST(`DAY`, `START_TIME`);