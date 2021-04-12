CREATE TABLE game(
  gameId int auto_increment,
  sku int,
  title varchar(255),
  Developer varchar(255),
  Genre varchar(255),
  Description varchar(255),
  price float(3),
  Primary Key(gameId)
);


-- CREATE TABLE customers(
--   customerId int auto_increment,
--   firstName varchar(255),
--   lastName varchar(255),
--   addrStreet varchar(255),
--   addrCity varchar(255),
--   addrState varchar(255),
--   addrZip int,
--   Primary Key(customerId),
--   FOREIGN KEY (email) REFERENCES userInfo(email)
-- );
CREATE TABLE orders(
  orderId int auto_increment,
  gameId int,
  customerId int,
  orderDate date,
  completedDate date,
  Completed boolean,
  Primary Key(orderId),
  FOREIGN KEY (gameId) REFERENCES game(gameId),
  FOREIGN KEY (customerId) REFERENCES customers(customerId)
);
-- CREATE TABLE userInfo(
-- email varchar(255) not null,
-- username varchar(255) not null,
-- password varchar(255),
-- Primary Key(email),
-- );
CREATE TABLE customers(
    customerId int auto_increment,
    email varchar(255) not null,
    username varchar(255) not null,
    usrpassword varchar(255),
    firstName varchar(255),
    lastName varchar(255),
    addrStreet varchar(255),
    addrCity varchar(255),
    addrState varchar(255),
    addrZip int,
    Primary Key(customerId)
);

COMMANDS:
List Customers:
Select firstName, lastName FROM customers;

List Orders:
Select orderID, customerId, orderDate, Completed, FROM customers;


List Customer order history
SELECT * FROM Orders where Orders.CustomerID
 = “[customerID goes here]”
