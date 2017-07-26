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

        // inserting multiple checkboxes to database
        if(isset($_POST['school'])){
            
            
            
            for ($i=0; $i<sizeof($checkBox); $i++)
                {
                    $this->model->newSchoolModel($checkBox[$i], $lastId);
                    echo $checkBox;
                }
            echo "Complete";

        }
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function loadStudents(){
        
        $contacts = $this->model->loadContactsModel();
        //var_dump($contacts);
        //echo json_encode($contacts);
        
        foreach((array)$contacts as $category){
                                        
            $city = $category['city'];
            $department = $category['department'];
            $title = $category['department'];
            $position = $category['position'];
            $id = $category['id'];
            
            echo "<tr id='".$id."'><td>".$city."</td><td>".$department."</td><td>".$title."</td><td>".$position."</td</tr>";
            
        }
           
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