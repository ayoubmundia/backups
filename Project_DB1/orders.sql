drop database IF EXISTS orders;
create database IF NOT EXISTS orders;
  use orders;
  create table categories(
    CategoryID int(11) primary key,
    CategoryName varchar(25),
    Description varchar(80)
  );
  create table suppliers(
    SupplierId int(11),
    SupplierName varchar(50),
    ContactName varchar(50),
    Addresse varchar(100),
    City varchar(50),
    PostalCode varchar(25),
    Country varchar(25) ,
    Phone varchar(25)
  );
  create table products(
    ProductID int(11) primary key ,
    ProductName varchar(50) NOT NULL,
    SupplierId int(10) NOT NULL references suppliers(SupplierId),
    CategoryID int(11) NOT NULL references categories(CategoryID),
    Unit varchar(50) NOT NULL,
    Price decimal(6,2) NOT NULL
    -- CONSTRAINT Fun1 NOT NULL (ProductName)
  );
  create table shippers(
    ShipperID int(11)  primary key ,
    ShipperName varchar(50),
    Phone varchar(50)
  );
  create table customers(
    CustomerID int(11),
    CustomerName varchar(50),
    ContactName varchar(50),
    Addresse varchar(100),
    City varchar(50),
    PostalCode varchar(25),
    Country varchar(25)
  );
  create table employees(
    EmployeeID int(11),
    LastName varchar(50),
    FirstName varchar(50),
    BirthData date ,
    Photo varchar(50),
    Notes varchar(255)
  );
  create table orders(
    OrderID int(10) primary key ,
    CustomerID int(11) references customers(CustomerID),
    EmployeeID int(11) references employees(EmployeeID),
    OrderDate date ,
    ShipperID int(11) references shippers(ShipperID)
  );
  create table orderdetaills(
    OrderDetailID int(11) primary key,
    OrderID int(11) references orders(OrderID),
    ProductID int(11) references products(ProductID),
    Quantity int(11)
  );
