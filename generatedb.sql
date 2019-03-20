CREATE TABLE users (
    idUsers int PRIMARY KEY AUTO_INCREMENT,
    uidUsers tinytext not null,
    pwdUsers longtext not null,
);
CREATE TABLE quiz (
idQuiz int PRIMARY KEY AUTO_INCREMENT,
quiz VARCHAR(50)
);


CREATE TABLE questions (
    idQuestion int PRIMARY KEY AUTO_INCREMENT,
    question VARCHAR(50),
    rightAns VARCHAR(50)
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
VALUE ('Quiz test');

INSERT INTO questions (question, rightAns)
VALUE ('10 - 5 =', '5');
INSERT INTO questions (question, rightAns)
VALUE ('10 + 2 =', '12');

INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,1);
INSERT INTO collect (idQuiz, idQuestion)
VALUE (1,2);