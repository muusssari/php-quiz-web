SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS quiz;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS userAns;
DROP TABLE IF EXISTS subName;
DROP TABLE IF EXISTS collect;
SET FOREIGN_KEY_CHECKS = 1;

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
INSERT INTO subName (subName)
VALUE ("testiostio 1");
INSERT INTO subName (subName)
VALUE ("testiostio 2");
INSERT INTO subName (subName)
VALUE ("testiostio 3");

INSERT INTO quiz (quiz)
VALUE ('Quiz test1');

INSERT INTO questions (question, rightAns, rightAnsQ, qType)
VALUE ('10 - 5 =', '1','5', true);
INSERT INTO questions (question, rightAns, rightAnsQ, qType)
VALUE ('10 + 2 =', '2','12', false);
INSERT INTO questions (question, rightAns, rightAnsQ, qType)
VALUE ('10 - 2 =', '3','8', true);

INSERT INTO collect (idQuiz, idQuestion,idSub)
VALUE (1,1,1);
INSERT INTO collect (idQuiz, idQuestion,idSub)
VALUE (1,2,1);
INSERT INTO collect (idQuiz, idQuestion,idSub)
VALUE (1,3,1);

INSERT INTO quiz (quiz)
VALUE ('Quiz test2');

INSERT INTO questions (question, rightAns, rightAnsQ, qType)
VALUE ('22cm =', '3','2.2', true);
INSERT INTO questions (question, rightAns, rightAnsQ, qType)
VALUE ('13m =', '3','2.2', true);

INSERT INTO collect (idQuiz, idQuestion,idSub)
VALUE (2,4,2);
INSERT INTO collect (idQuiz, idQuestion,idSub)
VALUE (2,5,2);

INSERT INTO quiz (quiz)
VALUE ('Quiz test3');

INSERT INTO questions (question, rightAns, rightAnsQ, qType)
VALUE ('1100=', '3','100', true);
INSERT INTO collect (idQuiz, idQuestion,idSub)
VALUE (3,6,3);

-----------------------------------------------------------------------------------

INSERT INTO quiz (quiz)
VALUE ('Math test for selecting students');

INSERT INTO questions (question, rightAns, qType)
VALUE ('98 + 56 - 45 =', '109', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('626 - 668 + 538 =', '496', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('6-7*9-5 ', '8', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,3);
