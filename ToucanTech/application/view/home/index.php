
        <div id="content-wrap">
        
            <div id="content">
            
                
                    <div id="tab-wrap">
                    
                      <div id="tab-1">
                          <h2>Use this form to add new student to the list</h2>
                          
                          <span id="error"></span>
                          
                        <form id="submit-form" action="<?php echo URL ?>home/newStudent" method="POST">
                          
                            <div class="input-wrap">
                                Name<br>
                                <input type="text" name="student-name" id="student-name"><br>
                            </div>
                            
                            <div class="input-wrap">
                                Email:<br>
                                <input type="text" name="student-email" id="student-name"><br>
                            </div>
                            School:
                            <div class="input-wrap left-align wrap">
                                
                                <div class="input-flex">
                                    <input type="checkbox" id="canterbury" name="school[]" value="canterbury">
                                    <label for="canterbury">Canterbury Christ Church University</label>
                                </div>
                                <div class="input-flex">
                                    <input type="checkbox" id="huddersfield" name="school[]" value="huddersfield">
                                    <label for="huddersfield">University of Huddersfield</label>
                                </div>
                                <div class="input-flex">
                                    <input type="checkbox" id="staffordshire" name="school[]" value="staffordshire">
                                    <label for="staffordshire">Staffordshire University</label>
                                </div>
                                <div class="input-flex">
                                    <input type="checkbox" id="SAE" name="school[]" value="SAE">
                                    <label for="SAE">SAE Institute</label>
                                </div>
                            </div>
                            
                            <input type="submit" name="submit" value="Add New Student" id="add-new-student">
                            
                          
                        </form>
                      </div>
                        
                        <div id="tab-2">
                        
                            <h3>Student list</h3>
                            <table>
                            
                                <tr>
                                    <th>Student name</th>
                                    <th>Student email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            
                            </table>
                            
                        </div>
                      
                        
                    </div>
                </div>
            
            </div>
        