-- Active: 1675172018375@@127.0.0.1@3306@MonSalonline

DROP DATABASE IF EXISTS MonSalonline;

CREATE DATABASE MonSalonline;

USE MonSalonline;



-- Path: api/tables.sql

create table if not exists Customer (
    CustomerID int not null auto_increment,
    FirstName varchar(50) not null,
    LastName varchar(50) not null,
    Email varchar(50) not null,
    PhoneNumber varchar(50) not null,
    Address varchar(50) not null,
    City varchar(50) not null,
    State varchar(50) not null,
    Customer_reference varchar(50) not null,
    primary key (CustomerID)
);



CREATE Table IF NOT EXISTS Employee (
    EmployeeID int not null auto_increment,
    FirstName varchar(50) not null,
    LastName varchar(50) not null,
    Email varchar(50) not null,
    password varchar(50) not null,
    PhoneNumber varchar(50) ,
    Address varchar(50) ,
    City varchar(50) ,
    State varchar(50) ,
    PayRate varchar(50) ,
    primary key (EmployeeID)
);

CREATE table if not exists Appointment (
    AppointmentID int not null auto_increment,
    CustomerID int not null,
    EmployeeID int not null,
    AppointmentDate date not null,
    AppointmentTime time not null,
    AppointmentType varchar(50) not null,
    AppointmentStatus varchar(50) not null,
    primary key (AppointmentID),
    foreign key (CustomerID) references Customer(CustomerID),
    foreign key (EmployeeID) references Employee(EmployeeID)
);

CREATE table if not exists SalonService (
    ServiceID int not null auto_increment,
    ServiceName varchar(50) not null,
    ServicePrice varchar(50) not null,
    ServiceDescription varchar(50) not null,
    ServiceDuration varchar(50) not null,
    primary key (ServiceID)
);

create table if not exists ServiceRendered (
    ServiceRenderedID int not null auto_increment,
    AppointmentID int not null,
    ServiceID int not null,
    EmployeeID int not null,
    primary key (ServiceRenderedID),
    foreign key (AppointmentID) references Appointment(AppointmentID),
    foreign key (ServiceID) references SalonService(ServiceID),
    foreign key (EmployeeID) references Employee(EmployeeID)
);



INSERT INTO Customer (FirstName, LastName, Email, PhoneNumber, Address, City, State, Customer_reference)
VALUES
("John", "Doe", "johndoe@email.com", "555-555-5555", "123 Main St", "Anytown", "Anystate", "ABC123"),
("Jane", "Doe", "janedoe@email.com", "555-555-5556", "456 Main St", "Anytown", "Anystate", "DEF456");

INSERT INTO Employee (FirstName, LastName, Email, password, PhoneNumber, Address, City, State, PayRate)
VALUES
("Jane", "Smith", "janesmith@email.com", "password123", "555-555-5557", "789 Main St", "Anytown", "Anystate", "20"),
("John", "Smith", "johnsmith@email.com", "password456", "555-555-5558", "987 Main St", "Anytown", "Anystate", "25");

INSERT INTO Appointment (CustomerID, EmployeeID, AppointmentDate, AppointmentTime, AppointmentType, AppointmentStatus)
VALUES
(1, 1, "2023-02-06", "10:00:00", "Haircut", "Scheduled"),
(2, 2, "2023-02-06", "11:00:00", "Manicure", "Scheduled");

INSERT INTO SalonService (ServiceName, ServicePrice, ServiceDescription, ServiceDuration)
VALUES
("Haircut", "30", "A basic haircut", "30min"),
("Manicure", "40", "A basic manicure", "45min");

INSERT INTO ServiceRendered (AppointmentID, ServiceID, EmployeeID)
VALUES
(1, 1, 1),
(2, 2, 2);


