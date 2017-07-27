<?php


/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

class HomeController extends BaseController
{
    
    public function __construct()
    {
			$this->loadModel('RegisterModel');
            
	}
    
    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        
        $pageTitle = 'Home';
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
        
    }
    
    // redirect new page
    public function member()
	{
				$this->redirect('member');
    }

    
    
    
    public function newStudent(){
        
        $name = $this->filterUserInput($_POST['student-name']);
        $email = $this->filterUserInput($_POST['student-email']);
        
        // sending data to model
        $lastId = $this->model->newStudentModel($name, $email);
        
        $checkBox = $_POST['school'];
        //var_dump($checkBox);
        
        // inserting multiple checkboxes to database
        if(isset($_POST['school'])){
            
            
            for ($i=0; $i<sizeof($checkBox); $i++)
                {
                    $this->model->newSchoolModel($checkBox[$i], $lastId);
                }
            
            $this->redirect('home');

        }
        
        
        
    }
    
    
    
    
    
    public function loadStudents(){
        
        $students = $this->model->loadStudentsModel();
        //var_dump($contacts);
        //echo json_encode($contacts);
        
        foreach((array)$students as $student){
                          
            $id = $student['student_id'];
            $name = $student['student_name'];
            $email = $student['student_email'];
            $regDate = $student['reg_date'];
            
            echo "<tr id='".$id."'><td>".$name."</td><td>".$email."</td><td>
            <form action='".URL."home/editStudent' method='POST'>
            <input type='hidden' name='user-id' value='".$id."'>
            <input type='hidden' name='page' id='page' value=''>
            <button type='submit' class='edit' id='edit-student' name='edit-student'><img class='img' src='".URL."images/pencil5-512.png'></button>
            </form>
            </td>
            <td>
            <form action='".URL."home/deleteStudent' method='POST'>
            <input type='hidden' name='user-id' value='".$id."'>
            <button type='submit' class='delete' id='delete-student' name='delete-user'><img class='img' src='".URL."images/f-cross_256-128.png'></button>
            </form>
            </td></tr>";
            
        }
           
    }
    
    
    public function deleteStudent(){
        
        $id = $_POST['user-id'];
        //echo $id;
        $delete = $this->model->deleteStudentModel($id);
        
        if($delete == true){
            
            $this->redirect('home');
            
        }else{
            echo $delete;
        }
        
    }
    
    public function editStudent(){
        
        $pageTitle = 'Edit Student'; 
        
        $id = $_POST['user-id'];
        
        $details = $this->model->editStudentModel($id);
        
        foreach($details as $detail){
            
            $studentName = $detail['student_name'];
            $studentEmail = $detail['student_email'];
            
        }
        
        $schools = $this->model->getSchoolsModel($id);
        //var_dump($schools);
        foreach($schools as $school){
            
            $studentSchool = $school['school_name'];
            
            if($studentSchool == 'canterbury'){
                $canterbury = "<script type='text/javascript'>document.getElementById('edit-canterbury').checked = true;</script>";
            }else if($studentSchool == 'huddersfield'){
                $huddersfield = "<script type='text/javascript'>document.getElementById('edit-huddersfield').checked = true;</script>";
            }else if($studentSchool == 'staffordshire'){
                $staffordshire = "<script type='text/javascript'>document.getElementById('edit-staffordshire').checked = true;</script>";
            }else if($studentSchool == 'SAE'){
                $SAE = "<script type='text/javascript'>document.getElementById('edit-SAE').checked = true;</script>";
            }
            
        }
        
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
        
        
        echo "<script type='text/javascript'>";
        echo "document.getElementById('edit-model').style.display = 'block';";
        echo "</script>";
    }
    
    
    public function updateStudent(){
        
        $name = $this->filterUserInput($_POST['student-name']);
        $email = $this->filterUserInput($_POST['student-email']);
        $id = $_POST['student-id'];
        $checkBox = $_POST['edit-school'];
        $lastId = $id;
        var_dump($checkBox);
        
        
        $this->model->updateStudentModel($name, $email, $id);
        
        $this->model->deletSchoolModel($id);
        
        // inserting multiple checkboxes to database
        if(isset($_POST['edit-school'])){
            
            
            for ($i=0; $i<sizeof($checkBox); $i++)
                {
                    $error = $this->model->newSchoolModel($checkBox[$i], $lastId);
                var_dump ($error);
                }
            

        }
        
        $this->redirect('home');
        
        
    }
    
    
    public function ajaxSearchStudent(){
        
        $search = $this->filterUserInput($_POST['searchData']);
        
        //return var_dump($search);
        $data = $this->model->ajaxSearchStudentModel($search);
        //var_dump($data);
        echo json_encode($data);
        
    }
    
    
    // This function is to filter all the input come from the form
    public function filterUserInput($data) {

		// trim() function will remove whitespace from the beginning and end of string.
		$data = trim($data);

		// Strip HTML and PHP tags from a string
		$data = strip_tags($data);

		/* The stripslashes() function removes backslashes added by the addslashes() function.
			Tip: This function can be used to clean up data retrieved from a database or from an HTML form.*/
		$data = stripslashes($data);

		// htmlspecialchars() function converts special characters to HTML entities. Say '&' (ampersand) becomes '&amp;'
		$data = htmlspecialchars($data);
		return $data;

	} # End of filter_user_input function
    
}
?>