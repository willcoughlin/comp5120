<?php
$db_host = "mysql.auburn.edu";
$db_name = "wfc0003db";
$db_user = "wfc0003";
$db_pass = "PoNERpA";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Get all DB records
$books = $conn->query("SELECT * FROM `Book`");
$customers = $conn->query("SELECT * FROM `Customer`");
$employees = $conn->query("SELECT * FROM `Employee`");
$orders = $conn->query("SELECT * FROM `Order`");
$order_details = $conn->query("SELECT * FROM `OrderDetail`");
$shippers = $conn->query("SELECT * FROM `Shipper`");
$subjects = $conn->query("SELECT * FROM `Subject`");
$suppliers = $conn->query("SELECT * FROM `Supplier`");
?>

<div class="card my-1">
    <h5 class="card-header">Browse Data</h5>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="true">Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="customer" aria-selected="false">Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="employee-tab" data-toggle="tab" href="#employee" role="tab" aria-controls="employee" aria-selected="false">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="orderdetail-tab" data-toggle="tab" href="#orderdetail" role="tab" aria-controls="orderdetail" aria-selected="false">OrderDetail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shipper-tab" data-toggle="tab" href="#shipper" role="tab" aria-controls="shipper" aria-selected="false">Shipper</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="subject-tab" data-toggle="tab" href="#subject" role="tab" aria-controls="subject" aria-selected="false">Subject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="supplier-tab" data-toggle="tab" href="#supplier" role="tab" aria-controls="supplier" aria-selected="false">Supplier</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Books -->
            <div class="tab-pane fade show active table-responsive" id="book" role="tabpanel" aria-labelledby="book-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>BookID</th>
                            <th>Title</th>
                            <th>UnitPrice</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>SupplierID</th>
                            <th>SubjectID</th>
                        </tr>
                    </thead>
                    <tbody id="books">
                        <?php
                        if ($books->num_rows > 0) {
                            while ($row = $books->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["BookID"] . "</td>";
                                echo "<td>" . $row["Title"] . "</td>";
                                echo "<td>" . $row["UnitPrice"] . "</td>";
                                echo "<td>" . $row["Author"] . "</td>";
                                echo "<td>" . $row["Quantity"] . "</td>";
                                echo "<td>" . $row["SupplierID"] . "</td>";
                                echo "<td>" . $row["SubjectID"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Customers -->
            <div class="tab-pane fade table-responsive" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>CustomerID</th>
                            <th>LastName</th>
                            <th>FirstName</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($customers->num_rows > 0) {
                            while ($row = $customers->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["CustomerID"] . "</td>";
                                echo "<td>" . $row["LastName"] . "</td>";
                                echo "<td>" . $row["FirstName"] . "</td>";
                                echo "<td>" . $row["Phone"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Employees  -->
            <div class="tab-pane fade table-responsive" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>EmployeeID</th>
                            <th>LastName</th>
                            <th>FirstName</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($employees->num_rows > 0) {
                            while ($row = $employees->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["EmployeeID"] . "</td>";
                                echo "<td>" . $row["LastName"] . "</td>";
                                echo "<td>" . $row["FirstName"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Order  -->
            <div class="tab-pane fade table-responsive" id="order" role="tabpanel" aria-labelledby="order-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>OrderID</th>
                            <th>CustomerID</th>
                            <th>EmployeeID</th>
                            <th>OrderDate</th>
                            <th>ShippedDate</th>
                            <th>ShipperID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($orders->num_rows > 0) {
                            while ($row = $orders->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["OrderID"] . "</td>";
                                echo "<td>" . $row["CustomerID"] . "</td>";
                                echo "<td>" . $row["EmployeeID"] . "</td>";
                                echo "<td>" . $row["OrderDate"] . "</td>";
                                echo "<td>" . $row["ShippedDate"] . "</td>";
                                echo "<td>" . $row["ShipperID"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- OrderDetail  -->
            <div class="tab-pane fade table-responsive" id="orderdetail" role="tabpanel" aria-labelledby="orderdetail-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>BookID</th>
                            <th>OrderID</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($order_details->num_rows > 0) {
                            while ($row = $order_details->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["BookID"] . "</td>";
                                echo "<td>" . $row["OrderID"] . "</td>";
                                echo "<td>" . $row["Quantity"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Shippers  -->
            <div class="tab-pane fade table-responsive" id="shipper" role="tabpanel" aria-labelledby="shipper-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>ShipperID</th>
                            <th>ShipperName</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($shippers->num_rows > 0) {
                            while ($row = $shippers->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["ShipperID"] . "</td>";
                                echo "<td>" . $row["ShipperName"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Subject  -->
            <div class="tab-pane fade table-responsive" id="subject" role="tabpanel" aria-labelledby="subject-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>SubjectID</th>
                            <th>CategoryName</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($subjects->num_rows > 0) {
                            while ($row = $subjects->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["SubjectID"] . "</td>";
                                echo "<td>" . $row["CategoryName"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Supplier  -->
            <div class="tab-pane fade table-responsive" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>SupplierID</th>
                            <th>CompanyName</th>
                            <th>ContactLastName</th>
                            <th>ContactFirstName</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($suppliers->num_rows > 0) {
                            while ($row = $suppliers->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["SupplierID"] . "</td>";
                                echo "<td>" . $row["CompanyName"] . "</td>";
                                echo "<td>" . $row["ContactLastName"] . "</td>";
                                echo "<td>" . $row["ContactFirstName"] . "</td>";
                                echo "<td>" . $row["Phone"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>