/*
Creator : Tien Pham
Purpose : Display tbroker base on the amount of their customer in order
Version : 1.0.0 
*/

CREATE DATABASE record;
USE record;

CREATE TABLE brokers(
	ID INT NOT NULL AUTO_INCREMENT,
    NAME VARCHAR(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE customers(
	ID INT NOT NULL AUTO_INCREMENT,
    NAME VARCHAR(255) NOT NULL ,
    AMOUNT INT NOT NULL ,
    BROKER_ID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY(BROKER_ID) REFERENCES brokers(ID)
);

INSERT INTO brokers(name)
VALUE ('Ted'),('Mark'),('Aaron'),('Luke');

INSERT INTO customers(NAME , AMOUNT ,BROKER_ID)
VALUE ("sam" , 3000 , 4) ,
		("john" , 4000 , 2) ,
		("mack" , 5000 , 2) ,
        ("test" , 3000 , 3) ,
        ("june" , 2000 , 3) ,
        ("mike" , 4000 , 1) ,
        ("annie" , 4000 , 2) ,
        ("micheal" , 2000 , 1) ,
        ("tom" , 2000 , 4) ,
        ("jason" , 6000 , 4) ;



SELECT b.NAME AS Broker, COUNT(a.ID) as Amount_Customer 
FROM brokers AS b 
LEFT JOIN customers AS a ON b.ID = a.BROKER_ID 
GROUP BY b.ID
ORDER BY Amount_Customer , Broker ;









