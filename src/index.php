<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$dbcredentials = json_decode(file_get_contents("dbcredentials.json"), TRUE);
$conn = new mysqli($dbcredentials["host"], $dbcredentials["user"], $dbcredentials["pass"], $dbcredentials["name"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Pro -->
    <link href="https://cdn.auburn.edu/assets/fonts/fontawesome-pro-5.10.2-web/css/all.min.css" rel="stylesheet">

    <title>B-SQL Bookstore</title>

    <style>
        #book2 {
            transform: scaleX(-1);
        }
        /* override the massive padding Bootstrap gives to jumbotrons */
        .jumbotron {
            padding: 1rem !important;
        }
    </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid alert-primary text-center">
        <div class="container">
            <span class="fad fa-books display-4"></span>
            <span class="display-4">B-SQL Bookstore</span>
            <span class="fad fa-books display-4" id="book2"></span>
            <p class="lead">Proprietors: Peyton Gasink & Will Coughlin</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" id="tables-go-here">
                
            </div>

            <div class="col-md-6">
                <div class="card my-1">
                <h5 class="card-header">Enter SQL Commands</h5>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <textarea name="sqlInjector" id="sqlInjector" class="form-control"
                                      placeholder="SELECT * FROM `Book`;" rows="6"><?php echo isset($_POST["sqlInjector"]) && !empty($_POST["sqlInjector"]) ? stripslashes($_POST["sqlInjector"]) : ""; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
            
            <?php
            // Run query if one is submitted
            if (isset($_POST["sqlInjector"]) && !empty($_POST["sqlInjector"])) 
            {
                $tried_to_drop = FALSE;
                $sql_to_inject = stripslashes($_POST["sqlInjector"]);
                if (preg_match("/DROP TABLE `?.*`?/mi", $sql_to_inject) == 1) {
                    $tried_to_drop = TRUE;
                } else {
                    $result = $conn->query($sql_to_inject);
                }

            ?>

            <div class="card my-1">
                <h5 class="card-header">Result</h5>
                <div class="card-body">

                    <?php

                    if ($tried_to_drop) {
                        echo "<div class=\"alert alert-danger\">You cannot run DROP TABLE.</div>";
                    } elseif (!empty($conn->error)) {
                        // we have an error ahh
                        echo "<div class=\"alert alert-danger\">MySQL Error: " . $conn->error . "</div>";
                    } elseif (isset($result->num_rows)) {
                        echo "<div class=\"alert alert-success\">";

                        // we have a result set
                        echo $result->num_rows . " rows returned</div>";
                        echo "<div class=\"table-responsive\"><table class=\"table table-sm table-striped\"><thead><tr>";

                        // print out the column names
                        $columns = $result->fetch_fields();
                        foreach ($columns as $val) {
                            echo "<th>";
                            printf("%s",$val->name);
                            echo "</th>";
                        }
                        echo "</tr></thead>";

                        echo "<tbody>";

                        // print out the result set
                        while($row = $result->fetch_row()){ 
                            echo "<tr>";
                            for ($i = 0; $i < $result->field_count; $i++){
                                echo "<td>";
                                printf("%s", $row[$i]);
                                echo "</td>";
                            }
                            echo "</tr>";
                        } 
                        echo "</tbody></table></div>";
                    } else {
                        // no result set
                        echo "<div class=\"alert alert-success\">Command executed successfully.</div>";
                        echo "<script>$('#tables-go-here').load('tables.php');</script>";
                    }
                    ?>
                </div>
            </div>

            <?php
            }
            ?>
            </div>
        </div>

        

        
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>$("#tables-go-here").load("tables.php");</script>
  </body>
</html>