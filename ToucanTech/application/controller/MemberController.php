<?php 

class MemberController extends BaseController{
    
    
    public function __construct()
    {
			$this->loadModel('MemberModel');
            
	}
    
    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        
        $pageTitle = 'Member';
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/member/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    // redirect new page
    public function home()
	{
				$this->redirect('home');
    }
    
}



?>