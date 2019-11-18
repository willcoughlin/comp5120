create table `Supplier` (
	SupplierID int not null,
    CompanyName varchar(256),
    ContactLastName varchar(128),
    ContactFirstName varchar(128),
    Phone varchar(15),
    
    constraint PK_Supplier primary key (SupplierID)
) 
ENGINE=InnoDB;

create table `Subject` (
	SubjectID int not null,
    CategoryName varchar(64),
    
    constraint PK_Subject primary key (SubjectID)
) 
ENGINE=InnoDB;

create table `Shipper` (
	ShipperID int not null,
    ShipperName varchar(256),
    
    constraint PK_Shipper primary key (ShipperID)
) 
ENGINE=InnoDB;

create table `Employee` (
	EmployeeID int not null,
    LastName varchar(128),
    FirstName varchar(128),
    
    constraint PK_Employee primary key (EmployeeID)
) 
ENGINE=InnoDB;

create table `Customer` (
	CustomerID int not null,
    LastName varchar(128),
    FirstName varchar(128),
    Phone varchar(15),
    
    constraint PK_Customer primary key (CustomerID)
) 
ENGINE=InnoDB;

create table `Order` (
	OrderID int not null,
    CustomerID int,
    EmployeeID int,
    OrderDate date,
    ShippedDate date,
    ShipperID int,
    
    constraint PK_Order primary key (OrderID),
    
    index IX_Order_CustomerID (CustomerID),
    index IX_Order_EmployeeID (EmployeeID),
    index IX_Order_ShipperID (ShipperID),
    
    constraint FK_Order_Customer foreign key (CustomerID)
		references `Customer`(CustomerID)
        on delete restrict
        on update cascade,
	constraint FK_Order_Employee foreign key (EmployeeID)
		references `Employee`(EmployeeID)
        on delete restrict
        on update cascade,
	constraint FK_Order_Shipper foreign key (ShipperID)
		references `Shipper`(ShipperID)
        on delete restrict
        on update cascade
) 
ENGINE=InnoDB;

create table `OrderDetail` (
	BookID int,
    OrderID int,
    Quantity int unsigned,
    
    index IX_OrderDetail_BookID (BookID),
    index IX_OrderDetail_OrderID (OrderID),
    
    constraint FK_OrderDetail_Book foreign key (BookID)
		references `Book`(BookID)
        on delete restrict
        on update cascade,
	constraint FK_OrderDetail_Order foreign key (OrderID)
		references `Order`(OrderID)
        on delete restrict
        on update cascade
) 
ENGINE=InnoDB;

create table `Book` (
	BookID int not null,
    Title varchar(256),
    UnitPrice decimal,
    Author varchar(256),
    Quantity int unsigned,
    SupplierID int,
    SubjectID int,
    
    constraint PK_Book primary key (BookID),
    
    index IX_Book_SupplierID (SupplierID),
    index IX_Book_SubjectID (SubjectID),
    
    constraint FK_Book_Supplier foreign key (SupplierID)
		references `Supplier`(SupplierID)
        on delete restrict
        on update cascade,
	constraint FK_Book_Subject foreign key (SubjectID)
		references `Subject`(SubjectID)
        on delete restrict
        on update cascade
) 
ENGINE=InnoDB;