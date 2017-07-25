<?php 



class RegisterModel extends BaseModel{
    
    
    
    public function newContactModel($city,$department,$title,$position){
        
        
    try{
            
        $stmt = $this->db->prepare('INSERT INTO list(city, department, title, position)
                                        VALUEs(:city, :department, :title, :position)');
        $stmt->execute(array(
                            ':city'=>$city,
                            ':department'=>$department,
                            ':title'=>$title,
                            ':position'=>$position));
            
            return "Data has been added";
                
        } catch(PDOException $e) {
                echo $e->getMessage();
            return "There was a problem to put the data to the database";
        }
        
        
    }
    
    
    
    public function loadContactsModel(){
        
        
        try{
            
            $stmt = $this->db->prepare('SELECT * FROM list');
            $stmt->execute(array());
            $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $row;
            
        } catch(PDOException $e) {
                echo $e->getMessage();
            return "There was a problem to put the data to the database";
        }
        
    }
    
    
}

?>