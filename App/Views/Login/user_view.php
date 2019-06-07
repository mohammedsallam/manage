<style>
    body {
        background-color: #00BCD4;
        padding-left: 0;
        max-width: 360px;
        margin: 5% auto;
        overflow-x: hidden; }
    .login-box .msg {
        color: #555;
        margin-bottom: 30px;
        text-align: center; }
    .login-box a {
        font-size: 14px;
        text-decoration: none;
        color: #00BCD4; }
    .login-box .logo {
        margin-bottom: 20px;
    }
    .login-box .logo img{
        width: 30%;
        display: block;
        margin: auto;
    }
    .login-box .logo a {
        font-size: 36px;
        display: block;
        width: 100%;
        text-align: center;
        color: #fff; }
    .login-box .logo small {
        display: block;
        width: 100%;
        text-align: center;
        color: #fff;
        margin-top: -5px; }
</style>

<div class="login-box">
    <div class="logo">
        <img src="<?= $this->route->baseUrl() . IMAGES_PATH ?>male.png" alt="">
        <div class="clearfix"></div>
        <a>Sign in</a>
    </div>
    <div class="card">
        <div class="body">
            <div class="alert alert-danger alert-dismissible error_msg hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <div class="alert alert-success alert-dismissible success_msg hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <form id="sign_in" method="POST" action="<?=  $this->route->baseUrl() . 'login/checkLogin' ?>">
                <div class="msg">Sign in to start your session</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button id="login" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
<!--                <div class="row m-t-15 m-b--20">-->
<!--                    <div class="col-xs-6">-->
<!--                        <a href="">Register Now!</a>-->
<!--                    </div>-->
<!--                </div>-->
            </form>
        </div>
    </div>
</div>