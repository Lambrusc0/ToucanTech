<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
        <link rel="stylesheet" type="text/css" href="<?php echo URL?>css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script>var url = "<?php echo URL; ?>";</script>
        <script src="<?php echo URL?>js/lib/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo URL?>js/script.js" type="text/javascript"></script>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body>
        
        
        <div id="edit-model">
                
                    <div id="edit-tab">
                        <span id="close">X</span>
                          <h2>Use this form to change student data</h2>
                          
                          <span id="error"></span>
                          
                        <form id="submit-form" action="<?php echo URL ?>home/updateStudent" method="POST">
                          <input type="hidden" name="student-id" value="<?php echo $id; ?>">
                            <div class="input-wrap">
                                Name<br>
                                <input type="text" name="student-name" id="student-name" value="<?php if(isset($studentName)){echo $studentName;} ?>"><br>
                            </div>
                            
                            <div class="input-wrap">
                                Email:<br>
                                <input type="text" name="student-email" id="student-name" value="<?php if (isset($studentEmail)){echo $studentEmail;} ?>"><br>
                            </div>
                            School:
                            <div class="input-wrap left-align wrap" id="edit-checkboxes">
                                
                                <div class="input-flex">
                                    <input type="checkbox" id="edit-canterbury" name="edit-school[]" value="canterbury">
                                    <label for="edit-canterbury">Canterbury Christ Church University</label>
                                </div>
                                <div class="input-flex">
                                    <input type="checkbox" id="edit-huddersfield" name="edit-school[]" value="huddersfield">
                                    <label for="edit-huddersfield">University of Huddersfield</label>
                                </div>
                                <div class="input-flex">
                                    <input type="checkbox" id="edit-staffordshire" name="edit-school[]" value="staffordshire">
                                    <label for="edit-staffordshire">Staffordshire University</label>
                                </div>
                                <div class="input-flex">
                                    <input type="checkbox" id="edit-SAE" name="edit-school[]" value="SAE">
                                    <label for="edit-SAE">SAE Institute</label>
                                </div>
                            </div>
                            
                            <input type="submit" name="submit" value="Update Student Details" id="edit-student">
                            
                          
                            <?php if(isset($canterbury)){echo $canterbury;} ?>
                            <?php if(isset($huddersfield)){echo $huddersfield;} ?>
                            <?php if(isset($staffordshire)){echo $staffordshire;} ?>
                            <?php if(isset($SAE)){echo $SAE;} ?>
                        </form>
                      </div>
                
                </div>
        
        
        <div id="nav-bar">
        
            <ul>

                  <li id="users" class="non-active"><a href="<?php echo URL?>nav/home" rel="external" >Add New Student</a></li>
                  <li id="menu" class="non-active"><a href="<?php echo URL?>nav/member" rel="external" >Search by school</a></li>


            </ul>
        
        </div>
        
        