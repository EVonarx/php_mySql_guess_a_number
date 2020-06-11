<?php

$title = "Game";
$nav = "Game";
require 'header.php';
?>

<!--
<pre>
<?php //var_dump($_POST);
?>
</pre>
-->

<?php

/* declaration of variables */
$error = null;
$success = null;

//$arrayNumbers = array(); // the array where the entered numbers are saved. => Not necessery if you don't want to display the played numbers. 

$numberOfMove = 0; // to manage the number of moves

$numberRangeMin = 0; // to manage the range values after user's guess
$numberRangeMax = 100;

session_start(); // create a session

// create a session variable and set a value into it.
if (isset($_POST['pseudo'])) {
    $_SESSION['pseudo'] = $_POST['pseudo'];
}

// create session variables and set a value into them.
if (!isset($_SESSION['numberToGuess'])) {
    // it is a new game
    $_SESSION['numberToGuess'] = mt_rand(1, 100);
    //$_SESSION['arrayNumbers'] =  $arrayNumbers;
    $_SESSION['numberOfMove'] =  $numberOfMove;
    $_SESSION['numberRangeMin'] =  $numberRangeMin;
    $_SESSION['numberRangeMax'] =  $numberRangeMax;
}

/*
echo "(clue : number to find => ";
echo $_SESSION["numberToGuess"];
echo " )";
echo " | ";
*/

// read the session's variables and put them into variables
$numberToGuess = $_SESSION['numberToGuess'];
//$arrayNumbers = $_SESSION['arrayNumbers'];
$numberOfMove = $_SESSION['numberOfMove'];
$pseudo = $_SESSION['pseudo'];

if (isset($_POST['number'])) {
    $value = (int) $_POST['number'];
    $numberOfMove++;
    if ($value > $numberToGuess) {
        $error = 'Enter a smaller number';
        //saveContext($arrayNumbers, $value, "smaller", $numberOfMove);
        saveContext($value, "smaller", $numberOfMove);
    } else {
        if ($value < $numberToGuess) {
            $error = 'Enter a bigger number';
            //saveContext($arrayNumbers, $value, "bigger", $numberOfMove);
            saveContext($value, "bigger", $numberOfMove);
        } else {
            saveContext($value, "", $numberOfMove);
            $success = 'Well done, you won';
            include 'saveDataPDO.php';
            session_destroy();
        }
    }
}

/*
function saveContext($arr, $val, $rangeVal, $numbMove)  {
    array_push($arr, $val);
    $_SESSION['arrayNumbers'] =  $arr;
    $_SESSION['numberOfMove'] =  $numbMove;
    if ($rangeVal == "smaller") {
        $_SESSION['numberRangeMax'] =  $val;
    } else {
        $_SESSION['numberRangeMin'] =  $val;
    }
    
}
*/

function saveContext($val, $rangeVal, $numbMove) {
    $_SESSION['numberOfMove'] =  $numbMove;
    if ($rangeVal == "smaller") {
        $_SESSION['numberRangeMax'] =  $val;
    } else {
        $_SESSION['numberRangeMin'] =  $val;
    }
}

?>

<!-- Here begins the layout code -->

<h1><?php echo $_SESSION['pseudo'] ?>, enter a number between 1 and 100...</h1>
<br />
<h2> Attempt number : <?php echo $_SESSION['numberOfMove'] + 1 ?> </h2>

<form action="/game.php" method="POST">
    <!-- never trust an user => use htmlentities -->
    <div class="form-group">
<input type="number" class="form-control" name="number" value="<?php echo $value; ?>" <?php if ($success)  { ?> disabled="disabled" <?php } ?>>
    </div>
    <?php if ($error) { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } elseif ($success) { ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>

    <?php } ?>
    <button type="submit" class="btn btn-primary"> Check </button>
</form>

<br />

<form action="/index.php" method="POST">
    <button type="submit" class="btn btn-primary"> New game </button>
</form>

<div>
    <br />
    <p>The number to find is between <?php echo $_SESSION['numberRangeMin'] ?> and <?php echo $_SESSION['numberRangeMax'] ?> </p>

</div>

<!--
<pre>
<?php //var_dump($_SESSION);
?>
</pre>
-->

<?php require 'footer.php'; ?>