<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='<?php echo Config::get('URL')?>favicon.ico' />

    <title>Login form :: Metro UI CSS - The front-end framework for developing projects on the web in Windows Metro Style</title>

    <link href="<?php echo Config::get('URL')?>css/metro.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL')?>css/metro-icons.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL')?>css/metro-responsive.css" rel="stylesheet">

    <script src="<?php echo Config::get('URL')?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo Config::get('URL')?>js/metro.js"></script>
 
    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>


        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <h1 class="text-light">Login to service</h1>
        <hr class="thin"/>
        <br />
        <form action="<?php echo Config::get('URL'); ?>login/login" method="post">
            <div class="input-control text full-size" data-role="input">
                <label for="user_name">User Name:</label>
                <input type="text" name="user_name" id="user_name" required>
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">User password:</label>
                <input type="password" name="user_password" id="user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                <label for="set_remember_me_cookie" class="remember-me-label">
                    <input type="checkbox" name="set_remember_me_cookie" class="remember-me-checkbox" />
                    Remember me for 2 weeks
                </label>
            </div>
            <br />
            <br />
            <div class="form-actions"><input type="submit" class="login-submit-button" value="Log in"/>
                <button type="submit" class="button primary">Login to...</button>
                <button type="button" class="button link">Cancel</button>
            </div>

            <!--<input type="text" name="user_name" placeholder="Username or email" required />-->


            <!-- when a user navigates to a page that's only accessible for logged a logged-in user, then
                 the user is sent to this page here, also having the page he/she came from in the URL parameter
                 (have a look). This "where did you came from" value is put into this form to sent the user back
                 there after being logged in successfully.
                 Simple but powerful feature, big thanks to @tysonlist. -->
            <?php if (!empty($this->redirect)) { ?>
                <input type="hidden" name="redirect" value="<?php echo $this->redirect ?>" />
            <?php } ?>
            <!--
                set CSRF token in login form, although sending fake login requests mightn't be interesting gap here.
                If you want to get deeper, check these answers:
                    1. natevw's http://stackoverflow.com/questions/6412813/do-login-forms-need-tokens-against-csrf-attacks?rq=1
                    2. http://stackoverflow.com/questions/15602473/is-csrf-protection-necessary-on-a-sign-up-form?lq=1
                    3. http://stackoverflow.com/questions/13667437/how-to-add-csrf-token-to-login-form?lq=1
            -->
            <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />

        </form>
        <div class="link-forgot-my-password">
            <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">I forgot my password</a>
        </div>
    </div>

</body>
</html>