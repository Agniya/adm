<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- Bootstrap -->
    <link href="<?=BASE_URL?>v/css/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    body {
        background: url(/v/img/2.png);
    }
    #wrap {
        background: url(/v/img/3.png);
        width: 470px;
        height: 685px;
        margin:0 auto;
        position: relative;
        top:11px;
        font-family: sans;
    }
    label{
      font-size: 22px;
font-weight:normal;
color: #838383;
    }
    .chklabale{
       font-size: 14px;
    }
    #inwrap {
        position: relative;
        top: 123px;
        width: 462px;
        margin:0 auto;
        text-align: center;
    }
    #inwrap form {
        position: relative;
        top: 60px;
    }
    #inwrap form a{
        text-decoration: underline;
        position: relative;
bottom: 20px;
    }
    .inwrapinput {
        width: 300px;
    }
    .formcontrol {
       width: 300px;
       margin: 0 auto;
        margin-bottom: 20px;
    }
    .fleft {
       float: left;
    }
    .fright {
       float: right;
    }
    </style>
</head>

<body>
<a href="/auth/login">LOGIN</a> | <a href="/auth/signup">SIGN UP</a><br/>
  	<?=$content?>
</body>
</html>