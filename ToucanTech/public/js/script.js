$( document ).ready(function(){
    $('#form').addClass('active');
    
    $('#form').click(function(){
        $('#data').removeClass('active');
        $('#form').addClass('active');
    })

    $('#data').click(function(){
        $('#form').removeClass('active');
        $('#data').addClass('active');
    })
    
///////////////////////////////////////////////////////////
// AJAX TO LOAD CONTACTS
///////////////////////////////////////////////////////////
$.ajax({
        
        url     :   url+"home/loadContacts",
        success :   function(data){
            
           //var contact = $.parseJSON(data);
            //var firstItem = data[Object.keys(data)[0]]
            
            //alert(data);
            $('#contact-table').append(data);
        }
        
    })
    
    
    
///////////////////////////////////////////////////////////
// AJAX ADD NEW CONTACT
///////////////////////////////////////////////////////////
$('#submit-form').on('click', '#add-new-data', function(){
        var city = $('#city').val();
        var department = $('#department').val();
        var title = $('#title').val();
        var position = $('#position').val();
    
        console.log('City = '+city+ ', Department = '+department+ ', title = '+title+', Position = '+position);
        
        var dataString = 'city='+city+'&department='+department+'&title='+title+'&position='+position;
        console.log(dataString);
    
    if(title==""||position==""){
        $('#error').html('Please fill up all the fields');
    } else {
        $.ajax({
            
            url     :   url+"home/newContact",
            data    :   dataString,
            type    :   "POST",
            success :   function(data){
                
                $('#title').val('');
                $('#position').val('');
                alert(data);
                var tr = "<tr><td>"+city+"</td><td>"+department+"</td><td>"+title+"</td><td>"+position+"</td></tr>"
                $('#contact-table').append(tr);
                
            }
            
        })
    }
    
})
    
    
})// END OF DOCUMENT READY FUNCTION





