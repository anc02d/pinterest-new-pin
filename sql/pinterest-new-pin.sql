
DROP TABLE IF EXISTS 'boardPin';
DROP TABLE IF EXISTS pin;
DROP TABLE IF EXISTS board;
DROP TABLE IF EXISTS profile;

-- creating the tables
CREATE TABLE profile (
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileAtHandle VARCHAR(32),
	profileDescription VARCHAR(128),
	profilePasswordHash CHAR(128),
	profileSalt CHAR(64),
	UNIQUE(profileId),
	UNIQUE(profileAtHandle),
	PRIMARY KEY(profileId)
);

CREATE TABLE board (
	boardId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	boardProfileId INT UNSIGNED NOT NULL,
	boardName VARCHAR(32),
	INDEX(boardProfileId),
	FOREIGN KEY(boardProfileId) REFERENCES profile(profileId),
	PRIMARY KEY(boardId)
);

CREATE TABLE pin (
	pinId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	pinTitle VARCHAR(64),
	pinDescription VARCHAR(140),
	pinImage VARCHAR (256),
	pinUrl VARCHAR (256),
	UNIQUE(pinUrl),
	PRIMARY KEY(pinId)
);

-- weak entity connecting Board and Pin
CREATE TABLE boardPin (
	boardPinPinId INT UNSIGNED NOT NULL,
	boardPinBoardId INT UNSIGNED NOT NULL,
	FOREIGN KEY(boardPinBoardId) REFERENCES board(boardId),
	FOREIGN KEY(boardPinPinId) REFERENCES pin(pinId),
	PRIMARY KEY(boardPinBoardId, boardPinPinId)
);