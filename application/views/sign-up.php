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
    <link href=".<?= plugins_url('bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')?>" rel="stylesheet" />
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
                <form id="sign_up" method="POST" action="<?= base_url('index.php/Welcome/validate_signup')?>">
                    <div class="msg">Inscription</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nom" placeholder="Nom" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="prenom" placeholder="Prénom" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">favorite</i>
                        </span>
                        <div class="form-line">
                            <select name="sexe" class="form-control show-tick">
                                <option value="">Sexe</option>
                                <option value="M">Masculin</option>
                                <option value="F">féminin</option>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="mail" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 p-t-5">
                            
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">S'INSCRIRE</button>
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
    
    <script src="<?= plugins_url('autosize/autosize.js')?>"></script>

    <script src="<?= plugins_url('momentjs/moment.js')?>"></script>

    <script src="<?= plugins_url('bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')?>"></script>

    <script src="<?= js_url('pages/examples/sign-up.js')?>"></script>

    <script src="<?= js_url('pages/forms/basic-form-elements.js')?>"></script>

</body>

</html>