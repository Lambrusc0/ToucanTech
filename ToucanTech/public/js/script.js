$( document ).ready(function(){
    
    
///////////////////////////////////////////////////////////
// AJAX TO LOAD CONTACTS
///////////////////////////////////////////////////////////
// Load students for home page
$.ajax({
        
        url     :   url+"home/loadStudents",
        success :   function(data){
            
           //var contact = $.parseJSON(data);
            //var firstItem = data[Object.keys(data)[0]]
            
            //alert(data);
            $('#student-list').append(data);
        }
        
    })

    
// Load students for member page
$.ajax({
        
        url     :   url+"member/loadStudents",
        success :   function(data){
            
            $('#option-student-list').append(data);
        }
        
    })
    
    
$("#search-school").change(function() {
    
    $("#option-student-list").find("tr:gt(0)").remove();
    var school = $(this).val();
    
    var students = [];
    
    $.ajax({
        
        url     : url + "member/ajaxSearchStudent/",
        type    : "POST",
        data    :{searchData:school},
        success : function(data){
            
            
            data = JSON.parse(data);
            console.log(data);
            
            // loop through the data came from the database
            for (var i2 =0 ; i2< data.length;i2++){
                       
                id = data[i2].student_id;
                name = data[i2].student_name;
                email = data[i2].student_email;
                console.log(id);
                
                $('#option-student-list tr:last').after("<tr id="+id+"><td>"+name+"</td><td>"+email+"</td><td><form action='"+url+"member/editStudent' method='POST'><input type='hidden' name='user-id' value='"+id+"'><button type='submit' class='edit' id='edit-student' name='edit-student'><img class='img' src='"+url+"images/pencil5-512.png'></button></form></td><td><form action='"+url+"member/deleteStudent' method='POST'><input type='hidden' name='user-id' value='"+id+"'><button type='submit' class='delete' id='delete-student' name='delete-user'><img class='img' src='"+url+"images/f-cross_256-128.png'></button></form></td></tr>");
                
                
            };
            
        }
        
    })
    
})
    
$('#close').click(function(){
    
    $('#edit-model').hide();
    
})
    
    
// check if checkbox is checked
$("#checkboxes").click(function(){
        var checkboxes = $("input[type='checkbox']");
        if(checkboxes.is(":checked")){
            //alert("checked");
        } else{
            $('#canterbury').prop('checked', true); 
        }
                   
});
    
// check if checkbox is checked
$("#edit-checkboxes").click(function(){
        var editCheckboxes = $("#edit-checkboxes input[type='checkbox']");
        if(editCheckboxes.is(":checked")){
            //alert("checked");
        } else{
            // if no checkboxes checked than check one
            $('#edit-canterbury').prop('checked', true); 
        }
                   
});
    
    
$('#tab-2').on('keyup', '#search', function(){
    
    $("#student-list").find("tr:gt(0)").remove();
    var keyword = $('#search').val();
    //console.log(keyword);
    
    var students = [];
    
    $.ajax({
        
        url     : url + "home/ajaxSearchStudent/",
        type    : "POST",
        data    :{searchData:keyword},
        success : function(data){
            
            
            var names = JSON.parse(data);
            console.log(data);
            // loop through the data came from the database
            for (var i =0 ; i< names.length;i++){
                       
                id = names[i].student_id;
                name = names[i].student_name;
                email = names[i].student_email;
                console.log(name);
                
                $('#student-list tr:last').after("<tr id="+id+"><td>"+name+"</td><td>"+email+"</td><td><form action='"+url+"home/editStudent' method='POST'><input type='hidden' name='user-id' value='"+id+"'><button type='submit' class='edit' id='edit-student' name='edit-student'><img class='img' src='"+url+"images/pencil5-512.png'></button></form></td><td><form action='"+url+"home/deleteStudent' method='POST'><input type='hidden' name='user-id' value='"+id+"'><button type='submit' class='delete' id='delete-student' name='delete-user'><img class='img' src='"+url+"images/f-cross_256-128.png'></button></form></td></tr>");
                
            };
            
        }
        
    })
})
    
})// END OF DOCUMENT READY FUNCTION





