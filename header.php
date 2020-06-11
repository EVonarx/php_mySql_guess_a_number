<?php
function nav_item(string $lien, string $title) :  string
{
$class1 = 'nav-item';
if ($_SERVER['SCRIPT_NAME']=== $lien) {
    $class1 = $class1 . ' active';
}

/* here a solution with a string */
/* $html = '<li class="' . $class1 . '"> <a class="nav-link" href="' . $lien . '">' . $title . '</a> </li>'; */

/* a help to write the above code....
    <li class="nav-item <?php if ($nav === 'Contact') : ?> active <?php endif; ?>">;
        <a class="nav-link" href="/contact.php">Contact</a>
    </li>
    */

/* With Heredoc */
$html =  <<<HTML1
    <li class="$class1"> <a class="nav-link" href="$lien">$title</a> </li>
HTML1;

    return $html; 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title> <?php echo $title; ?> </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<!-- <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json"> -->
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
       <!-- <link href="starter-template.css" rel="stylesheet"> -->
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="#">My site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    
    <!-- first solution with the variable nav
    <li class="nav-item <?php /* if ($nav === 'Home'): ?> active <?php endif; */ ?>">; 
          <a class="nav-link" href="/index.php">Home</a>
    </li>
    -->   
    
    <!-- second solution with the global variable _SERVER
    <li class="nav-item <?php /* if ($_SERVER['SCRIPT_NAME'] === '/index.php'): ?> active <?php endif; */ ?>">; 
        <a class="nav-link" href="/index.php">Home</a>
    </li>
    -->

    <!-- third solution with a function -->
    <?= nav_item('/index.php', 'Home'); ?>
    <?= nav_item('/contact.php', 'Contact'); ?>
      
    <!--
    <li class="nav-item <?php /* if ($nav === 'Contact') : ?> active <?php endif; */ ?>">;
        <a class="nav-link" href="/contact.php">Contact</a>
      </li>
    -->
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main" class="container">