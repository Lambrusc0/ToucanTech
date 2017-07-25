<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="js/lib/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/script.js"></script>
        <title>Assignment 2</title>
        <script>
          $( function() {
            $( "#tabs" ).tabs();
          } );
        </script>
    </head>
    <body>
        <div id="content-wrap">
        
            <div id="content">
            
                <div id="tabs">
                  <ul>
                    <li><a id="form" href="#tabs-1">NEW CONTACT</a></li>
                    <li><a id="data" href="#tabs-2">CONTACT LIST</a></li>
                  </ul>
                
                    <div id="tab-wrap">
                    
                      <div id="tabs-1">
                          <h2>Use this form to add new contact</h2>
                          <span id="error"></span>
                        <form id="submit-form" methid="POST">
                          
                            City:<br>
                            <select name="city" id="city">
                                <option>London</option>
                                <option>Oxford</option>
                                <option>Cambridge</option>
                                <option>Edinburg</option>
                            </select><br>
                            Department:<br>
                            <select name="department" id="department">
                                <option>Office</option>
                                <option>Digital</option>
                                <option>Rental</option>
                            </select><br>
                            Title:<br>
                            <input type="text" name="title" id="title"><br>
                            Position:<br>
                            <input type="text" name="position" id="position"><br>
                            <input type="button" value="Add data" id="add-new-data">
                            
                          
                        </form>
                      </div>
                      <div id="tabs-2">
                        <h2>Here you can find all the inserted contacts</h2>
                          
                          <table id="contact-table">
                          
                            <tr>
                                <th>City</th>
                                <th>Department</th>
                                <th>Title</th>
                                <th>Position</th>
                            </tr>
                          
                          </table>
                          
                      </div>
                        
                    </div>
                </div>
            
            </div>
        
        </div>
    </body>
</html>
