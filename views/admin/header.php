<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>ADMIN</h1>
            <h4> <?php echo "Xin Chào ".$_SESSION["name_ad"];  ?></h4>
            <p>Cẩn Thận Khi Nhập Dữ Liệu!</p>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-bottom: 20px;">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?url1=main">Trang chủ</a>
                    </li>
            </ul>
            </div>
        </nav>
    </div>
    
   

