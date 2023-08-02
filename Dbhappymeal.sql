CREATE TABLE Customers (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    GENDER VARCHAR(10) NOT NULL,
    Phone VARCHAR(15) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    City VARCHAR(50) NOT NULL,
    State VARCHAR(50) NOT NULL,
    ZipCode VARCHAR(10) NOT NULL    
);


CREATE TABLE TiffinProviders (
    ProviderID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Phone VARCHAR(15) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    City VARCHAR(50) NOT NULL,
    State VARCHAR(50) NOT NULL,
    ZipCode VARCHAR(10) NOT NULL,
    Rating DECIMAL(3,2) NOT NULL
);

INSERT INTO `tiffinproviders` (`ProviderID`, `Name`, `Email`, `Phone`, `Password`, `Address`, `City`, `State`, `ZipCode`, `Rating`) VALUES
(1, 'Suman Tiffin Services', 'sumantiffins@gmail.com', '9876543216', 'password123', '11/2 Ambika Society, Sadhu Vaswani Road', 'Rajkot', 'Gujarat', '360001', 4.50),
(4, 'Gujarati Thali', 'gujaratithali@example.com', '9876543212', 'GujaratiThali@003', '15/7 Shanti Park, Kotecha Chowk', 'Rajkot', 'Gujarat', '380001', 4.90),
(5, 'Rajkot Tiffin Services', 'rajkottiffinservices@gmail.com', '9876543210', 'password123', '12/3 Shanti Park, Kotecha Chowk', 'Rajkot', 'Gujarat', '360001', 4.50),
(6, 'Shri Krishna Tiffin Service', 'shrikrishnatiffins@gmail.com', '9876543211', 'password123', '20 Happy Residency, Virani Chowk', 'Rajkot', 'Gujarat', '360002', 4.20),
(7, 'Swad Tiffin Services', 'swadtiffinservices@gmail.com', '9876543212', 'password123', '54/2 Virani Chowk, University Road', 'Rajkot', 'Gujarat', '360005', 4.70),
(8, 'Maa Tara Tiffin Services', 'maataratiffins@gmail.com', '9876543213', 'password123', '10/2 Nandanvan Society, Kalawad Road', 'Rajkot', 'Gujarat', '360005', 4.00),
(9, 'Annapurna Tiffin Services', 'annapurnatiffins@gmail.com', '9876543214', 'password123', '15/1 Happy Home, Race Course Road', 'Rajkot', 'Gujarat', '360001', 4.30),
(10, 'Rajeshwari Tiffin Services', 'rajeshwaritiffins@gmail.com', '9876543215', 'password123', '8/2 Dharamnagar Society, Mavdi Main Road', 'Rajkot', 'Gujarat', '360004', 4.80),
(11, 'Tasty Tiffins', 'tastytiffin@gmail.com', '6732549867', 'password@123', '101, ABC Apartment, Near XYZ Circle', 'Rajkot', 'Gujarat', '360007', 4.00),
(13, 'Moms Kitchen', 'momskitchen@gmail.com', '5699871245', 'password123', 'Nr. Raiya Chowk', 'Rajkot', 'Gujarat', '36007', 5.00);


CREATE TABLE Tiffins (
    TiffinID INT PRIMARY KEY AUTO_INCREMENT,
    ProviderID INT NOT NULL,
    TiffinName VARCHAR(50) NOT NULL,
    Description VARCHAR(100) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    CONSTRAINT FK_Tiffins_TiffinProviders FOREIGN KEY (ProviderID) REFERENCES TiffinProviders(ProviderID)
);

INSERT INTO `tiffins` (`TiffinID`, `ProviderID`, `TiffinName`, `Description`, `Price`) VALUES
(1, 1, 'Dinner', '2 Sabji, Rice, Roti, Dal, Salad, Buttermilk, Sweet', 2850.00),
(2, 1, 'Lunch', '2 Sabji, Rice, Roti, Dal, Salad, Curd, Sweet', 2850.00),
(3, 1, 'Lunch + Dinner', 'The combination tiffin includes a wholesome meal for both lunch and dinner.', 5500.00),
(4, 4, 'Lunch', '2 Sabji, 5 Roti, Dal, Rice, Buttermilk, Sweet, Salad and papad', 3000.00);

CREATE TABLE Orders (
    OrderID INT PRIMARY KEY AUTO_INCREMENT,
    CustomerID INT NOT NULL,
    TiffinID INT NOT NULL,
    OrderDate VARCHAR(10) NOT NULL,
    LastDate VARCHAR(10) NOT NULL,
    TotalAmount DECIMAL(10, 2) NOT NULL,
    CONSTRAINT FK_Orders_Customers FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
    CONSTRAINT FK_Orders_Tiffins FOREIGN KEY (TiffinID) REFERENCES Tiffins(TiffinID)
);

CREATE TABLE admin (   
  username VARCHAR(50) NOT NULL PRIMARY KEY,
  password VARCHAR(255) NOT NULL
);

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'Test@123');
