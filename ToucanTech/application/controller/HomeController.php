<?php


//use Opeldo\Core\Controller;
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

    public function newContact(){
        
        $city = $_POST['city'];
        $department = $_POST['department'];
        $title = $_POST['title'];
        $position = $_POST['position'];
        
        
        
        $sendData = $this->model->newContactModel($city,$department,$title,$position);
        
        echo $sendData;
        
    }
    
    public function loadContacts(){
        
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
    
}
?>