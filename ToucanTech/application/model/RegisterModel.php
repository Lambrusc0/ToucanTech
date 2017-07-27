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
        
        }
        
        
    }
    
    public function newSchoolModel($checkBox, $lastId){
        
        try{
            
            $stmt = $this->db->prepare('INSERT INTO school(student_id, school_name)
                                        VALUES(:student_id, :school_name)');
            
            $stmt->execute(array(
                            ':student_id'=>$lastId,
                            ':school_name'=>$checkBox));
            
            return true;
            
        } catch(PDOException $e){
            
            return $e->getMessage();
            
        }
        
    }
    
    public function deleteStudentModel($id){
        
        try{
            
            $stmt = $this->db->prepare('DELETE FROM school WHERE student_id = :id');
            
            $stmt->execute(array(':id'=>$id));
            
        } catch(PDOException $e){
            
            echo $e->getMessage();
           
        }
        
        try{
            
            $stmt = $this->db->prepare('DELETE FROM student WHERE student_id = :id');
            
            $stmt->execute(array(':id'=>$id));
            
            return true;
            
        } catch(PDOException $e){
            
            echo $e->getMessage();
            
        }
        
    }
    
    public function editStudentModel($id){
        
        try{
            
            $stmt = $this->db->prepare('SELECT * FROM student WHERE student_id = :id');
            
            $stmt->execute(array(':id'=>$id));
            
            $details = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            return $details;
            
        } catch(PDOException $e) {
				echo $e->getMessage();
			}
        
    }
    
    public function getSchoolsModel($id){
        
        
        try{
            
            $stmt = $this->db->prepare('SELECT * FROM school WHERE student_id = :id');
            
            $stmt->execute(array(':id'=>$id));
            
            $schools = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            return $schools;
            
        } catch(PDOException $e) {
				echo $e->getMessage();
			}
        
    }
    
    
    public function updateStudentModel($name, $email, $id){
        
        try{
            
            $stmt = $this->db->prepare('UPDATE student SET student_name = :name, student_email = :email WHERE student_id = :id');
            
            $stmt->execute(array(':name'=>$name,
                                ':email'=>$email,
                                ':id'=>$id));
            
        } catch(PDOException $e) {
				echo $e->getMessage();
			}
        
        
    }
    
    public function deletSchoolModel($id){
        
        try{
            
            $stmt = $this->db->prepare('DELETE FROM school WHERE student_id = :id');
            
            $stmt->execute(array(':id'=>$id));
            
        } catch(PDOException $e) {
				echo $e->getMessage();
			}
        
    }
    
    
    public function loadStudentsModel(){
        
        
        try{
            
            $stmt = $this->db->prepare('SELECT * FROM student');
            $stmt->execute(array());
            $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $row;
            
        } catch(PDOException $e) {
                echo $e->getMessage();
        }
        
    }
    
    public function ajaxSearchStudentModel($search){
        
        $stmt = $this->db->prepare("SELECT * FROM student WHERE student_name LIKE :search ");
        
                
        $stmt->execute(array(':search'=>$search.'%'));
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                  
        return $students;
        
    }
    
    
}

?>