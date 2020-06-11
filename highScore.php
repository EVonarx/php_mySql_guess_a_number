<?php
$title = "High scores";
$nav = "High scores";
require 'header.php';


$servername = "localhost";
$username = "ericV";
$password = "ericVpw";
$dbname = "guessthenumber";



?>
<h2> High scores list </h2>

<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM highscore ORDER BY score";
    // use exec() because no results are returned
    foreach ($conn->query($sql) as $row) {
?>
        <div class="container-fluid">

            <div class="row">
             
                    <h3><?php echo $row['pseudo'] ?> &nbsp;:&nbsp; </h3>
                    <h3><?php echo $row['score'] ?> <?php if ($row['score'] == 1) { ?> attempt <?php } else { ?> attempts <?php } ?></h3>
         
               
            </div>

        </div>

<?php
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>

<br />
<form action="/index.php" method="POST">
    <button type="submit" class="btn btn-primary"> Back </button>
</form>

<?php
require 'footer.php';
?>