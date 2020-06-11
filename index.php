
<?php 
$title = "Home";
$nav = "Home";
require 'header.php'; ?>

<!-- _SERVER is very interessing to have lots of information about your application -->
<!--
<pre>
  <?php /*print_r($_SERVER); */?>
</pre>
-->

  <div class="starter-template">
    <h1>Want to guess a number between 1 and 100 ?</h1>
    <!--
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    -->
    <?php require 'inscription.php'; ?>
  </div>

  <br>
  <br>
<!--
  <div class="starter-template">
    <h1>Want to eat an icecream ?</h1>
    <?php //require 'icecream.php'; ?>
  </div>
  -->


  <br>
  <br>
  
  <pre>
  <?php /*var_dump($_GET); */?>
  </pre>

  <pre>
  <?php /*var_dump($_POST); */?>
  </pre>

  <?php require 'footer.php'; ?>
