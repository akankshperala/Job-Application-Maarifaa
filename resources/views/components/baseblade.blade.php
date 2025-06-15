<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job - Application</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    {{-- <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: #EAE2D6;
        }
        .logo-text{
            font-size: 20px;
            font-weight: bold;
        }
        .flex{
            
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .nav{
            position: sticky;
            top: 0;
            padding: 10px;
            background-color: #FFF2E0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <x-nav-bar></x-nav-bar>
    {{$slot}}
    
</body>
</html>