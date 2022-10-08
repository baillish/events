<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    @include('layouts/navbar')
   <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{

        background-image: url('./party.jpg');
        background-size:cover;
        background-repeat: no-repeat;
      
    }
    img{

        height: 100vh;
    }
    .test{
        display: flex;
        flex-direction: column;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }

    h1{
        color:rgba(240, 158, 6, 0.918);
        font-weight: 700;
        animation-name: logo;
        animation-duration: 4s;

    }

    @keyframes logo{
        0%{
            opacity: 0.2;
        }
        5%{
            opacity:0.4;
        }
       

        100%{
            opacity: 1;
        }
    }
    h2{
        font-weight: 600;
        color: aqua;
    }
   </style>

   <div class="test">
    <h1>Pamoja Events</h1>
    <h2>We make it happen</h2>
   </div>
</body>
</html>
