<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Select username:

    <select name="" id="sel_user">
            <?php

            foreach ($users as $user) {
                
              echo  " <option value='".$user['username']."'>".$user['username']."</option>";
            }

            ?>
            
    </select>

    <div>
                Username : <span id="suname"></span> <br>
                Name : <span id="sname"></span> <br>
                Email : <span id="semail"></span> <br>
    </div>
   
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script>
        $(document).ready(function(){
            
            $('#sel_user').change(function(){
                
                var username=$(this).val();

                // alert(username);

                $.ajax({
                    url: 'http://localhost:8012/CiRestAPI/user/userDetails',
                    type :'POST',
                    data: {username :username},
                    dataType:'json',
                    success:function(response){
                        var len= response.length;

                        $('#suname, #sname, #semail').text('');
                        
                        if(len >0){
                            var uname= response[0].username;
                            var name= response[0].name;
                            var email= response[0].email;

                            $('#suname').text(uname);
                            $('#sname').text(name);
                            $('#semail').text(email);
                        }

                    }
                })
            })
        })
        
</script>