<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
        <link rel="stylesheet" type="text/css" href="<?php echo URL?>css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script>var url = "<?php echo URL; ?>";</script>
        <script src="js/lib/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <title><?php echo $pageTitle ?></title>
        <script>
          $( function() {
            $( "#tabs" ).tabs();
          } );
        </script>
    </head>
    <body>
        
        <div id="nav-bar">
        
            <ul>

                  <li id="users" class="non-active"><a href="<?php echo URL?>nav/home" rel="external" >New Student</a></li>
                  <li id="menu" class="non-active"><a href="<?php echo URL?>nav/member" rel="external" >Student list</a></li>


            </ul>
        
        </div>
        
        