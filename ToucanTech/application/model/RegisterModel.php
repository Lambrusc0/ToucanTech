<?php 



class RegisterModel extends BaseModel{
    
    
    
    public function newStudentModel($name, $email){
        
        
    try{
            
        $stmt = $this->db->prepare('INSERT INTO student(student_name, student_email)
                                        VALUEs(:student_name, :student_email)');
        $stmt->execute(array(
                            ':student_name'=>$name,
                            ':student_email'=>$email));
            
            return $this->db->lastInsertId();
                
        } catch(PDOException $e) {
        
            echo $e->getMessage();
            return "There was a problem to put the data to the database";
        
        }
        
        
    }
    
    public function newSchoolModel($checkBox, $lastId){
        
        try{
            
            $stmt = $this->db->prepare('INSERT INTO school(student_id, school_name)
                                        VALUES(:student_id, :school_name)');
            
            $stmt->execute(array(
                            ':student_id'=>$lastId,
                            ':school_name'=>$checkBox));
            
            return "true";
            
        } catch(PDOException $e){
            
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