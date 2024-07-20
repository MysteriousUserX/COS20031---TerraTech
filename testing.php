<?php include "script.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
   <title>php and mysql pagination</title>
</head>

<style>
*{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-size: 20px;
}
 
body{
   font-family: sans-serif;
   min-height: 100vh;
   color: #555;
   padding: 30px;
}
 
a{
   display: inline-block;
   text-decoration: none;
   color: #006cb3;
   padding: 10px 20px;
   border: thin solid #d4d4d4;
   transition: all 0.3s;
   font-size: 18px;
}
 
a.active{
   background-color: #0d81cd;
   color: #fff;
}
.page-info{
   margin-top: 90px;
   font-size: 18px;
   font-weight: bold;
}
 
.pagination{
   margin-top: 20px;
}
.content p{
   margin-bottom: 15px;
}
.page-numbers{
   display: inline-block;
}
</style>

<body>
    <div class="content">
        <?php 
        while($row = $result->fetch_assoc()){
            ?>
               <p><?php echo $row['TransactionID'] .' - '. $row["TransactionType"] ?></p>
            <?php
        }
        ?>
   </div>

    <div class="page-info">
        <?php 
        if(!isset($_GET['page-number'])){
            $page = 1;
        }else{
            $page = $_GET['page-number'];
        }
        ?>
        Showing  <?php echo $page ?> of <?php echo $number_of_pages; ?> pages
    </div>

    <div class="pagination">
         <!-- Go to the first page -->
        <a href="?page-number=1">First</a>

         <!-- Go to the previous page -->      
        <?php 
        if(isset($_GET['page-number']) && $_GET['page-number'] > 1){
            ?> <a href="?page-number=<?php echo $_GET['page-number'] - 1 ?>">Previous</a> <?php
        }else{
            ?> <a>Previous</a>	<?php
        }
      ?>
        <!-- Output the page numbers -->
        <div class="page-numbers">
            <?php 
                if(!isset($_GET['page-number'])){
                    ?> <a class="active" href="?page-number=1">1</a> <?php
                    $count_from = 2;
                }else{
                    $count_from = 1;
                }
            ?>
            
            <?php
                for ($num = $count_from; $num <= $number_of_pages; $num++) {
                    if($num == @$_GET['page-number']) {
                        ?> <a class="active" href="?page-number=<?php echo $num ?>"><?php echo $num ?></a> <?php
                    }else{
                        ?> <a href="?page-number=<?php echo $num ?>"><?php echo $num ?></a> <?php
                }
                }
            ?>
        </div>

        <!-- Go to the next page -->
        <?php 
            if(isset($_GET['page-number'])){
                if($_GET['page-number'] >= $number_of_pages){
                    ?> <a>Next</a> <?php
                }else{
                    ?> <a href="?page-number=<?php echo $_GET['page-number'] + 1 ?>">Next</a> <?php
                }
            }else{
                ?> <a href="?page-number=2">Next</a> <?php
            }
        ?>

        <!-- Go to the last page -->
        <a href="?page-number=<?php echo $number_of_pages ?>">Last</a>
    </div>
</body>
</html>	