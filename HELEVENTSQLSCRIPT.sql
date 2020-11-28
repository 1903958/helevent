
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE EVENTS (   
  eventID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(16) NOT NULL,
  etype char(16) NOT NULL, 
  address text NOT NULL, 
  date date, 
  startTime time NOT NULL,
  endTime time NOT NULL,
  description text NOT NULL); 
 

 INSERT INTO EVENTS (`eventID`, `name`, `etype`, `address`, `date`, `startTime`, `endTime`, `description`) VALUES
('1', 'Exhibition', 'Art','Design Museo, Korkeavuorenkatu 23, 00130 Helsinki', '2020-12-03', '12:00:00', '16:00:00', '-'), 
('2', 'Concert', 'Music','Konserttitalo, Mannerheimintie 13 A, 00100 Helsinki', '2021-01-02', '16:00:00', '20:00:00', '-'), 
('3', 'Movie night', 'Movie', 'Finnkino, Salomonkatu 15, 00100 Helsinki', '2021-11-03', '20:00:00', '23:00:00', '-'), 
('4', 'Hullut päivät', 'Shipping','Stochmann, Aleksanterinkatu 52, 00100 Helsinki', '2021-02-04', '11:00:00', '18:00:00', '-'), 
('5', 'Ateneum', 'Art', 'Ateneum museo, Kaivokatu 2, 00100 Helsinki', '2021-03-03', '12:00:00', '16:00:00', '-'), 
('6', 'Coffee', 'Other', 'Kahvilankatu 52, 00100 Helsinki', '2021-05-05', '11:00:00', '14:00:00', '-'), 
('7', 'Private', 'Other', 'Sibeliuksen puisto, Mechelininkatu, 00250 Helsinki', '2021-10-01', '13:30:00', '23:00:00', 'Private meeting'), 
('8', 'Concert2', 'Music', 'Konserttitalo, Mannerheimintie 13 A, 00100 Helsinki', '2021-05-03', '18:00:00', '21:00:00', '-'); 


