<?php
if(isset($_SESSION['email'])) {
    echo '<script>window.location.replace("./main.php");</script>';
} else {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Halaman Login Katalog</title>
        <link href="assets/css/style-login.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <div class="bg-img">
            <div class="content">
                <header><img src="assets/img/monopis.png" alt="" width="200px" height="200px"></header>
                <form action="./ceklogin.php" method="post">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="email" name="email" required="required" placeholder="Email">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" class="pass-key" required="required" placeholder="Password">
                    <span class="show">SHOW</span>
                </div>
                <br>
                <div class="field">
                    <input type="submit" value="LOGIN" name="submit">
                </div>
            </div>
        </div>
        <script>
            const pass_field = document.querySelector('.pass-key');
            const showBtn = document.querySelector('.show');
            showBtn.addEventListener('click', function(){
            if(pass_field.type === "password"){
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            }else{
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
            });
        </script>
    </body>
</html>
<?php } ?>