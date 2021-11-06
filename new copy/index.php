<?
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    
<div class="center">
        <h1>Which one are you?</h1>
        <a href="admin.php" target="#" id="adm" >
            <button>Admin</button>
        </a>
        <a href="applicant.php" target="#" id="app">
            <button>Applicant</button>
        </a>
    </div>
<div class="footer">
    <p style="text-align: center;color: rgba(255, 255, 255, 0.493);bottom: 5%">&copy; <script>document.write(new Date().getFullYear())</script> Vilas Hegde All Rights Reserved</p>
</div>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
        body{
            background: #333;
            text-align: center;
        }
        h1{
            color: #fff;
            margin-top: 20%;
            margin-bottom: 50px;
            text-shadow: 7px 7px 4px rgb(0, 0, 0);
        }
        button:hover{
            background: rgb(0, 0, 0);
            color: #fff;
            outline: none;
            border: none;
            transition: 0.5s;
        }
        a{
            text-decoration: none;
            font-size: 25px;
            margin: 2px;
            align-items: center;
            text-align: center;
            padding: 20px 30px;
            color: #fff;
        }
        button{
            font-size: 20px;
            box-shadow: 0 10px 10px black;
            background: #fff;
            padding: 20px 30px;
            margin: 40px;
            outline: none;
            border: none;
            border-radius: 5px;
        }
        .footer{
            width: 100%;
            position: absolute;
            bottom: 3%;
        }

       
        
    </style>
</body>
</html>