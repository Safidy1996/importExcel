<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Connexion</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= asset_url('favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= plugins_url('bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= plugins_url('node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= plugins_url('animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= css_url('style.css')?>" rel="stylesheet">
	<link href="<?= css_url('custom.css')?>" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Import<b>Excel</b></a>
            <small></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?= base_url('index.php/Welcome/authentificate')?>">
                    <div class="msg">Veuillez-vous connectez</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="mail" class="form-control" name="mail" placeholder="Adresse Mail" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Se souvenir</label>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SE CONNECTER</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?= base_url('Welcome/signup')?>">Inscription</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Mot de passe oublié?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= plugins_url('jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= plugins_url('bootstrap/js/bootstrap.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= plugins_url('node-waves/waves.js')?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= plugins_url('jquery-validation/jquery.validate.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?= js_url('admin.js')?>"></script>
    <script src="<?= js_url('pages/examples/sign-in.js')?>"></script>
</body>

</html>