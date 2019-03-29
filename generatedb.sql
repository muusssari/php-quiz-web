CREATE TABLE users (
    idUsers int PRIMARY KEY AUTO_INCREMENT,
    uidUsers tinytext not null,
    pwdUsers longtext not null
);
CREATE TABLE quiz (
idQuiz int PRIMARY KEY AUTO_INCREMENT,
quiz VARCHAR(50)
);


CREATE TABLE questions (
    idQuestion int PRIMARY KEY AUTO_INCREMENT,
    question VARCHAR(50),
    rightAns VARCHAR(50),
    qType boolean
);

CREATE TABLE userAns (
    idUserAns int PRIMARY KEY AUTO_INCREMENT,
    userAns VARCHAR(50),
    idQuestion int,
    idUsers int,
    FOREIGN KEY (idQuestion) REFERENCES questions(idQuestion),
    FOREIGN KEY (idUsers) REFERENCES users(idUsers)
);
CREATE TABLE collect (
    idCollect int PRIMARY KEY AUTO_INCREMENT,
    idQuiz int,
    idQuestion int,
    FOREIGN KEY (idQuiz) REFERENCES quiz(idQuiz),
    FOREIGN KEY (idQuestion) REFERENCES questions(idQuestion)
);
---------------------------------------------------------------------------------
INSERT INTO quiz (quiz)
VALUE ('Quiz test1');

INSERT INTO questions (question, rightAns, qType)
VALUE ('10 - 5 =', '5', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('10 + 2 =', '12', false);
INSERT INTO questions (question, rightAns, qType)
VALUE ('10 - 2 =', '8', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,3);


INSERT INTO quiz (quiz)
VALUE ('Quiz test2');

INSERT INTO questions (question, rightAns, qType)
VALUE ('22cm =', '2.2', true);
INSERT INTO questions (question, rightAns, qType)
VALUE ('13m =', '2.2', true);

INSERT INTO collect (idQuiz, idQuestion)
VALUE (2,4);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (2,5);

INSERT INTO quiz (quiz)
VALUE ('Quiz test3');

INSERT INTO questions (question, rightAns, qType)
VALUE ('1100=', '100', true);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (3,6);