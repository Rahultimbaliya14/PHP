<?php
   $con=mysqli_connect("localhost","root","","employee");
   if($con){
    echo  "connected";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="get">
    <div class="form">
        <input type="text" name="name" id="" placeholder="Name">
        <input type="text" name="city" id="" placeholder="City">
    </div>
    <div class="btn">
        <input type="submit" name="insert" value="Inset">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="view" value="View">
        <input type="submit" name="update" value="Update">
    </div>
</form>
<?php
    if(isset($_GET['insert'])){
    $name=$_GET['name'];
    $city=$_GET['city'];
    $quary="INSERT INTO emp(Name,City) VALUE('$name','$city')";
    $result=mysqli_query($con,$quary);
    if($result){
        echo "data is inserted";
    }
    else{
        echo "date is not inserted";
    }
    }
    if(isset($_GET['delete'])){
        $name=$_GET['name'];
        $city=$_GET['city'];
        $quary="DELETE FROM emp WHERE Name='$name'";
        $result=mysqli_query($con,$quary);
    }
    if(isset($_GET['view'])){
        $name=$_GET['name'];
        $city=$_GET['city'];
        $quary="SELECT * FROM emp";
        $result=mysqli_query($con,$quary);
        ?>
        <div class="table">
            <table border="2">
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>City</th>
                <?php
                while($row1=mysqli_fetch_array($result)){
                ?>
                </tr>
                  <td><?php echo $row1['No'];?></td>
                  <td><?php echo $row1['Name'];?></td>
                  <td><?php echo $row1['City'];?></td>

                <tr>
                    <?php
                }
                ?>

                </tr>
            </table>
        </div>
        <?php
    }

?>
<?php
if(isset($_GET['update'])){
    $name=$_GET['name'];
    $city=$_GET['city'];
    $quary="UPDATE emp SET Name='$name',City='$city' WHERE Name='$name'";
    $result=mysqli_query($con,$quary);
}
    ?>
</body>
</html>