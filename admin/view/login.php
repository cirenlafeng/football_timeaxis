<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>登录</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo STYLE_PATH;?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo STYLE_PATH;?>css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <!-- Bootstrap Admin Theme -->
        <script type="text/javascript" src="<?php echo STYLE_PATH;?>js/jquery-2.0.3.min.js"></script>
        <link href="<?php echo STYLE_PATH;?>css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
        <!-- Custom styles -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>
        <script type="text/javascript">
            $(function() {
                // Setting focus
                $('input[name="email"]').focus();

                // Setting width of the alert box
                var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                var alertPadding = parseInt($('.alert').css('padding'));
                $('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </head>
    <body class="bootstrap-admin-without-padding">
        <div class="container">
            <div class="row">
                <div class="alert alert-info">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    请输入正确的用户名和密码！
                </div>
                <form method="post" action="" class="bootstrap-admin-login-form">
                    <h1>登录</h1>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="密码">
                    </div>
                   
                    <button class="btn btn-lg btn-primary" type="submit">提交</button>
                </form>
            </div>
        </div>

        
        <script type="text/javascript" src="<?php echo STYLE_PATH;?>js/bootstrap.min.js"></script>
        
    </body>
</html>
