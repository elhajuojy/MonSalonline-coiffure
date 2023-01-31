
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



