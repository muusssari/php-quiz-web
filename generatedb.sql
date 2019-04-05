DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS quiz;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS userAns;
DROP TABLE IF EXISTS subName;
DROP TABLE IF EXISTS collect;

CREATE TABLE users (
    idUsers int PRIMARY KEY AUTO_INCREMENT,
    uidUsers tinytext not null,
    pwdUsers longtext not null,
    permiss boolean DEFAULT FALSE
);
CREATE TABLE quiz (
idQuiz int PRIMARY KEY AUTO_INCREMENT,
subName VARCHAR(50),
quiz VARCHAR(50)
);

CREATE TABLE questions (
    idQuestion int PRIMARY KEY AUTO_INCREMENT,
    question VARCHAR(50),
    rightAns VARCHAR(50),
    rightAnsQ VARCHAR(50),
    qType boolean
);

CREATE TABLE userAns (
    idUserAns int PRIMARY KEY AUTO_INCREMENT,
    userAns VARCHAR(50),
    userAnsQ VARCHAR(50),
    idQuestion int,
    idUsers int,
    submit boolean,
    FOREIGN KEY (idQuestion) REFERENCES questions(idQuestion),
    FOREIGN KEY (idUsers) REFERENCES users(idUsers)
);
CREATE TABLE subName (
    idSub int PRIMARY KEY AUTO_INCREMENT,
    sub VARCHAR(50)
);

CREATE TABLE collect (
    idCollect int PRIMARY KEY AUTO_INCREMENT,
    idQuiz int,
    idSub int,
    idQuestion int,
    FOREIGN KEY (idQuiz) REFERENCES quiz(idQuiz),
    FOREIGN KEY (idQuestion) REFERENCES questions(idQuestion),
    FOREIGN KEY (idSub) REFERENCES subName(idSub)
);
---------------------------------------------------------------------------------
INSERT INTO quiz (quiz)
VALUE ('Quiz test1');

INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('10 - 5 =', '5', true);
INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('10 + 2 =', '12', false);
INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('10 - 2 =', '8', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,3);


INSERT INTO quiz (quiz)
VALUE ('Quiz test2');

INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('22cm =', '2.2', true);
INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('13m =', '2.2', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (2,4);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (2,5);

INSERT INTO quiz (quiz)
VALUE ('Quiz test3');

INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('1100=', '100', true);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (3,6);

-----------------------------------------------------------------------------------

INSERT INTO quiz (quiz)
VALUE ('Math test for selecting students');

INSERT INTO subName (subName)
VALUE ('Basic Calculations 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('98 + 56 - 45 =', '109,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('626 - 668 + 538 =', '496,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('6 - 7 * 9 - 5 =', '-62,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('46 * 5 + 21 * 7 - 587 =', '-210,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2.6 * 6 + 35 / 7 =', '20,600', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('134.45 * 5.5 =', '739,475', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('1278.45 / 8 =', '159,806', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('748.5 * 1.5 =', '1122,750', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('4500 / 5 =', '900,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2500 * 4 =', '10000,000', false);

-------------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Units 20 Points');

--Change to milligrams

INSERT INTO questions (question, rightAns, qType)
VALUE ('735 micrograms =', '0,735', true);  
INSERT INTO questions (question, rightAns, qType)
VALUE ('400 micrograms =', '0,400', false);

--Change to grams

INSERT INTO questions (question, rightAns, qType)
VALUE ('3870 mg =', '3,870', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('75 mg =', '0,075', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('135 mg =', '0,135', true);

--Change to Milliliters

INSERT INTO questions (question, rightAns, qType)
VALUE ('7.5 L =', '7500,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2.7 L =', '2700,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('5.5 L =', '5500,000', true);

--Change to Liters

INSERT INTO questions (question, rightAns, qType)
VALUE ('225mL =', '0,225', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('85mL =', '0,085', true);

--Change to micrometer

INSERT INTO questions (question, rightAns, qType)
VALUE ('128 mm =', '128000,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('32 mm =', '32000,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('3.55 mm =', '3550,000', true);

--Change to seconds

INSERT INTO questions (question, rightAns, qType)
VALUE ('1.5 minutes =', '90,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('5 minutes =', '300,000', true);

--Change to gram

INSERT INTO questions (question, rightAns, qType)
VALUE ('0.83 kg =', '830,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('34 mg =', '0,034', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('650 mg =', '0,650', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('1.625 kg =', '1625,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2200 mg =', '2,200', true);

-------------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Percentage 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('10 % of 1250 =', '125,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('30 % of 750 =', '225,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('50 % of 650 =', '325,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('80 % of 9200 =', '7360,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('15 % of 1100 =', '165,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('35 % of 2500 =', '875,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('42 % of 2000 =', '840,00', false);

--Find the Percentage

INSERT INTO questions (question, rightAns, qType)
VALUE ('1000ml out of 2500ml =', '40,00', true); -- %
INSERT INTO questions (question, rightAns, qType)
VALUE ('1600ml out of 4000ml =', '40,00', true); -- %
INSERT INTO questions (question, rightAns, qType)
VALUE ('850ml out of 1000ml =', '85,00', true); -- %

-----------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Expressions / Simplify/ Division & Multiplication (by 10,100,1000) 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('X + 35 = 75   What is X?', '40,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('X - 262 = 228    What is X?', '490,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('If X = 10 then, 5X + 8 - 4X =', '18,00', false);

--Simplify (‘Cancel Down’) 

INSERT INTO questions (question, rightAns, qType)
VALUE ('1200 / 150000 =', '1/125', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('90 / 150 =', '3/5', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('350 / 500 =', '7/10', false);

--Division & Multiplication

INSERT INTO questions (question, rightAns, qType)
VALUE ('24.25 / 100 =', '0,2425', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('222.86 * 1000 =', '222860,0000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('7.77 * 100 =', '777,0000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2.4 / 10 =', '0,2400', false);

------------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Roman Numbers 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('XXIII =', '23', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XXXVI =', '36', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XLIX =', '49', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XXXIX =', '39', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XLI =', '41', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('33 =', 'XXXIII', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('47 =', 'XLVII', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('8 =', 'VIII', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('19 =', 'XIX', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('44 =', 'XLIV', false);


-----------------------------------------------------

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,3);
=======
CREATE TABLE users (
    idUsers int PRIMARY KEY AUTO_INCREMENT,
    uidUsers tinytext not null,
    pwdUsers longtext not null,
    permiss boolean
);
CREATE TABLE quiz (
idQuiz int PRIMARY KEY AUTO_INCREMENT,
quiz VARCHAR(50)
);

CREATE TABLE questions (
    idQuestion int PRIMARY KEY AUTO_INCREMENT,
    question VARCHAR(50),
    rightAns VARCHAR(50),
    rightAnsQ VARCHAR(50),
    qType boolean
);

CREATE TABLE userAns (
    idUserAns int PRIMARY KEY AUTO_INCREMENT,
    userAns VARCHAR(50),
    userAnsQ VARCHAR(50),
    idQuestion int,
    idUsers int,
    submit boolean,
    FOREIGN KEY (idQuestion) REFERENCES questions(idQuestion),
    FOREIGN KEY (idUsers) REFERENCES users(idUsers)
);
CREATE TABLE subName (
    idSub int PRIMARY KEY AUTO_INCREMENT,
    subName int
);

CREATE TABLE collect (
    idCollect int PRIMARY KEY AUTO_INCREMENT,
    idQuiz int,
    idSub int,
    idQuestion int,
    FOREIGN KEY (idQuiz) REFERENCES quiz(idQuiz),
    FOREIGN KEY (idQuestion) REFERENCES questions(idQuestion),
    FOREIGN KEY (idSub) REFERENCES subName(idSub)
);
---------------------------------------------------------------------------------
INSERT INTO quiz (quiz)
VALUE ('Quiz test1');

INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('10 - 5 =', '5', true);
INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('10 + 2 =', '12', false);
INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('10 - 2 =', '8', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,3);


INSERT INTO quiz (quiz)
VALUE ('Quiz test2');

INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('22cm =', '2.2', true);
INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('13m =', '2.2', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (2,4);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (2,5);

INSERT INTO quiz (quiz)
VALUE ('Quiz test3');

INSERT INTO questions (question, rightAns, userAnsQ, qType)
VALUE ('1100=', '100', true);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (3,6);

-----------------------------------------------------------------------------------

INSERT INTO quiz (quiz)
VALUE ('Math test for selecting students');

INSERT INTO subName (subName)
VALUE ('Basic Calculations 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('98 + 56 - 45 =', '109,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('626 - 668 + 538 =', '496,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('6 - 7 * 9 - 5 =', '-62,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('46 * 5 + 21 * 7 - 587 =', '-210,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2.6 * 6 + 35 / 7 =', '20,600', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('134.45 * 5.5 =', '739,475', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('1278.45 / 8 =', '159,806', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('748.5 * 1.5 =', '1122,750', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('4500 / 5 =', '900,000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2500 * 4 =', '10000,000', false);

-------------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Units 20 Points');

--Change to milligrams

INSERT INTO questions (question, rightAns, qType)
VALUE ('735 micrograms =', '0,735', true);  
INSERT INTO questions (question, rightAns, qType)
VALUE ('400 micrograms =', '0,400', false);

--Change to grams

INSERT INTO questions (question, rightAns, qType)
VALUE ('3870 mg =', '3,870', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('75 mg =', '0,075', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('135 mg =', '0,135', true);

--Change to Milliliters

INSERT INTO questions (question, rightAns, qType)
VALUE ('7.5 L =', '7500,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2.7 L =', '2700,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('5.5 L =', '5500,000', true);

--Change to Liters

INSERT INTO questions (question, rightAns, qType)
VALUE ('225mL =', '0,225', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('85mL =', '0,085', true);

--Change to micrometer

INSERT INTO questions (question, rightAns, qType)
VALUE ('128 mm =', '128000,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('32 mm =', '32000,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('3.55 mm =', '3550,000', true);

--Change to seconds

INSERT INTO questions (question, rightAns, qType)
VALUE ('1.5 minutes =', '90,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('5 minutes =', '300,000', true);

--Change to gram

INSERT INTO questions (question, rightAns, qType)
VALUE ('0.83 kg =', '830,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('34 mg =', '0,034', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('650 mg =', '0,650', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('1.625 kg =', '1625,000', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2200 mg =', '2,200', true);

-------------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Percentage 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('10 % of 1250 =', '125,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('30 % of 750 =', '225,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('50 % of 650 =', '325,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('80 % of 9200 =', '7360,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('15 % of 1100 =', '165,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('35 % of 2500 =', '875,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('42 % of 2000 =', '840,00', false);

--Find the Percentage

INSERT INTO questions (question, rightAns, qType)
VALUE ('1000ml out of 2500ml =', '40,00', true); -- %
INSERT INTO questions (question, rightAns, qType)
VALUE ('1600ml out of 4000ml =', '40,00', true); -- %
INSERT INTO questions (question, rightAns, qType)
VALUE ('850ml out of 1000ml =', '85,00', true); -- %

-----------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Expressions / Simplify/ Division & Multiplication (by 10,100,1000) 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('X + 35 = 75   What is X?', '40,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('X - 262 = 228    What is X?', '490,00', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('If X = 10 then, 5X + 8 - 4X =', '18,00', false);

--Simplify (‘Cancel Down’) 

INSERT INTO questions (question, rightAns, qType)
VALUE ('1200 / 150000 =', '1/125', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('90 / 150 =', '3/5', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('350 / 500 =', '7/10', false);

--Division & Multiplication

INSERT INTO questions (question, rightAns, qType)
VALUE ('24.25 / 100 =', '0,2425', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('222.86 * 1000 =', '222860,0000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('7.77 * 100 =', '777,0000', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('2.4 / 10 =', '0,2400', false);

------------------------------------------------------

INSERT INTO subName (subName)
VALUE ('Roman Numbers 10 Points');

INSERT INTO questions (question, rightAns, qType)
VALUE ('XXIII =', '23', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XXXVI =', '36', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XLIX =', '49', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XXXIX =', '39', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('XLI =', '41', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('33 =', 'XXXIII', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('47 =', 'XLVII', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('8 =', 'VIII', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('19 =', 'XIX', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('44 =', 'XLIV', false);


-----------------------------------------------------

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,3);

