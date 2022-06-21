<head>
    <link rel="stylesheet" href=" <?= URLROOT ?>public/css/style.css">
</head>

<form action="<?php echo URLROOT ?>/AutoOverzichten/index" method="post">
    <div class="imgcontainer">
        <img src="" class="avatar">
    </div>
    <div class="container">
        <center style="padding-top: 200px;">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
        </center>
        <center>
            <button href="" type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </center>
    </div>

    <center>
        <span class="psw">Forgot tit <a title="pech.." href="#">password?</a></span>
    </center>
    </div>
</form>