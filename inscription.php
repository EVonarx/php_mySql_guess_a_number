<?php
session_start();
session_destroy();
?>

<form action="/game.php" method="POST">
    <!-- never trust an user => use htmlentities -->
    <div class="form-group">
        <br />
        <h2> Enter your pseudo </h2>
        <input type="text" class="form-control" name="pseudo" value="">
    </div>
    <button type="submit" class="btn btn-primary"> OK </button>
</form>
<br/>
<form action="/highScore.php" method="POST">
    <button type="submit" class="btn btn-primary"> High scores </button>
</form>