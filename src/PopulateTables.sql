INSERT INTO wfc0003db.Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (1, 'supplier1', 'company1', 'company1', '1111111111');
INSERT INTO wfc0003db.Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (2, 'supplier2', 'company2', 'company2', '2222222222');
INSERT INTO wfc0003db.Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (3, 'supplier3', 'company3', 'company3', '3333333333');
INSERT INTO wfc0003db.Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (4, 'supplier4', 'company4', '', '4444444444');

INSERT INTO wfc0003db.Subject (SubjectID, CategoryName) VALUES (1, 'category1');
INSERT INTO wfc0003db.Subject (SubjectID, CategoryName) VALUES (2, 'category2');
INSERT INTO wfc0003db.Subject (SubjectID, CategoryName) VALUES (3, 'category3');
INSERT INTO wfc0003db.Subject (SubjectID, CategoryName) VALUES (4, 'category4');
INSERT INTO wfc0003db.Subject (SubjectID, CategoryName) VALUES (5, 'category5');

INSERT INTO wfc0003db.Shipper (ShipperID, ShipperName) VALUES (1, 'shipper1');
INSERT INTO wfc0003db.Shipper (ShipperID, ShipperName) VALUES (2, 'shipper2');
INSERT INTO wfc0003db.Shipper (ShipperID, ShipperName) VALUES (3, 'shipper3');
INSERT INTO wfc0003db.Shipper (ShipperID, ShipperName) VALUES (4, 'shipper4');

INSERT INTO wfc0003db.Employee (EmployeeID, LastName, FirstName) VALUES (1, 'lastname5', 'firstname5');
INSERT INTO wfc0003db.Employee (EmployeeID, LastName, FirstName) VALUES (2, 'lastname6', 'firstname6');
INSERT INTO wfc0003db.Employee (EmployeeID, LastName, FirstName) VALUES (3, 'lastname6', 'firstname9');

INSERT INTO wfc0003db.Customer (CustomerID, LastName, FirstName, Phone) VALUES (1, 'lastname1', 'firstname1', '334-001-001');
INSERT INTO wfc0003db.Customer (CustomerID, LastName, FirstName, Phone) VALUES (2, 'lastname2', 'firstname2', '334-002-002');
INSERT INTO wfc0003db.Customer (CustomerID, LastName, FirstName, Phone) VALUES (3, 'lastname3', 'firstname3', '334-003-003');
INSERT INTO wfc0003db.Customer (CustomerID, LastName, FirstName, Phone) VALUES (4, 'lastname4', 'firstname4', '334-004-004');

INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (1, 1, 1, '2016-08-01', '2016-08-03', 1);
INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (2, 1, 2, '2016-08-04', null, null);
INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (3, 2, 1, '2016-08-01', '2016-08-04', 2);
INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (4, 4, 2, '2016-08-04', '2016-08-04', 1);
INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (5, 1, 1, '2016-08-04', '2016-08-05', 1);
INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (6, 4, 2, '2016-08-04', '2016-08-05', 1);
INSERT INTO wfc0003db.`Order` (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (7, 3, 1, '2016-08-04', '2016-08-04', 1);

INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (1, 1, 2);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (4, 1, 1);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (6, 2, 2);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (7, 2, 3);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (5, 3, 1);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (3, 4, 2);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (4, 4, 1);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (7, 4, 1);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (1, 5, 1);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (1, 6, 2);
INSERT INTO wfc0003db.OrderDetail (BookID, OrderID, Quantity) VALUES (1, 7, 1);

INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (1, 'book1', 12, 'author1', 5, 3, 1);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (2, 'book2', 57, 'author2', 2, 3, 1);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (3, 'book3', 90, 'author3', 10, 2, 1);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (4, 'book4', 35, 'author4', 12, 3, 2);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (5, 'book5', 79, 'author5', 5, 2, 2);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (6, 'book6', 12, 'author6', 30, 1, 3);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (7, 'book7', 57, 'author2', 17, 3, 4);
INSERT INTO wfc0003db.Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (8, 'book8', 33, 'author7', 2, 1, 3);