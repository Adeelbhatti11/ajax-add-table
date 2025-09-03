<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loadpage-ajax</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background: #91d7dd;
        }
        .container{
            justify-self: center;
            justify-items: center;
            align-content: center;
            background-color: #bcf0f5;
            padding: 10px;
            border: 1px solid black;
            box-sizing: border-box;
            box-shadow: 2px 2px 10px black;
           
        }
        #save-btn{
           background-color: aqua;
        }
    </style>
</head>
<body>
    
<div class="container">  
    <form id ="addform">  
    <h1>PHP with AJAX Add User</h1>
    <h3>Name :<input type="text" id="name">  Email :<input type="text" id="email"></h3>
    <input type="submit" id="save-btn" value="save">
    </form>
</div>
    
    <table id="main-table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody id="body">
            <tr>
                <td>1</td>
                <td>adeel</td>
                <td>adeelbhatti123@gmail.com</td>
            </tr>
        </tbody>
    </table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    function loadtable(){
        $.ajax({
            url : "load.php",
            type : "POST",
            success : function(data){
                $("#body").html(data); // replace only table body
            }
        });
    };
    loadtable();
    $("#save-btn").on("click", function(e){
        e.preventDefault();
        var Name = $("#name").val();
        var Email = $("#email").val();
        $.ajax({
            url : "insert.php",
            type : "post", 
            data : { name: Name, email: Email},
            success  : function(data){
                if( data == 1){
                    loadtable();
                    $("#addform").trigger("reset");
                }else{
                    alert("user can't save!");
                }
            }
        })

    });
});
</script>
</body>
</html>
