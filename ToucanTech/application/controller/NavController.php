<?php 



class NavController extends BaseController
{
    
    public function __construct()
    {
			$this->loadModel('NavModel');
            
	}
    
    

    
    
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
      public function index()
    {
         $pageTitle = 'Navigation';   
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
              

        
    }
    
    
    
    ////////////////////////////////////////////////////////////////////////
    // Those are the links for each pages
    ////////////////////////////////////////////////////////////////////////
    public function member()
	{
        $this->redirect('member');
    }
	
	public function home(){
        $this->redirect('home');
    }
    
    
}


?>