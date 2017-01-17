-- this is a DDL
DROP TABLE IF EXISTS 'board pin';
DROP TABLE IF EXISTS pin;
DROP TABLE IF EXISTS board;
DROP TABLE IF EXISTS profile;
-- creating the tables
CREATE TABLE profile (
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileName VARCHAR(32),
	profileDescription VARCHAR(128),
	profilePasswordHash CHAR(128),
	profileSalt CHAR(64),
	UNIQUE(profileId),
	PRIMARY KEY(profileId),
);

CREATE TABLE board (
	boardId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	boardProfileId INT UNSIGNED NOT NULL,
	boardName VARCHAR(32),
	INDEX(boardProfileId),
	FOREIGN KEY(boardProfileId) REFERENCES profile(profileId),
	PRIMARY KEY(boardId),
);

CREATE TABLE pin (
	pinId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	pinTitle VARCHAR(64),
	pinDescription VARCHAR(140),
	pinImage VARCHAR (??),
	pinUrl VARCHAR (256),
	UNIQUE(pinId),
	PRIMARY KEY(pinId)
);

CREATE TABLE 'board pin' (
	boardPinPinId INT UNSIGNED NOT NULL,
	boardPinBoardId INT UNSIGNED NOT NULL,
	FOREIGN KEY(boardPinPinId) REFERENCES pin(pinId)
)