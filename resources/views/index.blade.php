<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>དགེ་སློང་ཡིག་ཐོ</title>
        <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/bower_components/Ionicons/css/ionicons.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/plugins/iCheck/square/blue.css')}}" />
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page" style="background-image: url('/images/wangdiphodrang.jpg');background-repeat:no-repeat;background-size: cover;">
        <div class="login-box">
            <div class="login-logo text-uppercase text-bold">
                <a style="color:#0a0a0a" href="/"><b>འབྲུག་ཁམས་གསུམ་དབང་འདུས་ཆོས་ཀྱི་ཕོ་བྲང་།</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg text-bold h2">མིང་རྟགས་བཀོད།</p>
                <form method="post" action="{{ route('གནང་འཛུལ')}}" id="login_form">
                    @csrf
                    @if(isset($Invalid) && $Invalid!=null)
                        @if($Invalid=="ཁྱོད་ཀྱིས་གསང་ཚིག་ བསག་བཞག་ཡི། ཁྱཽད་རའི་མིང་རྟགས་དང་ གསང་ཚིག་ ལག་ལེན་འཐབ་སྟེ་ གནང་འཛུལ་སྦེ།")
                            <div class="alert alert-info col-12 h4"> {{ $Invalid }}</div>
                        @else
                        <div class="alert alert-danger col-12 h4"> {{ $Invalid }}</div>
                        @endif
                    @endif
                    <div class="form-group has-feedback">
                        <input type="email" id="email" onchange="remove_err('email')" name="email" class="form-control" placeholder="མིང་རྟགས">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="text-danger" id="email_err"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" onchange="remove_err('passwordid')" id="passwordid" class="form-control" placeholder="གསང་ཚིག།">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class="text-danger" id="passwordid_err"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <input type="checkbox" id="chk_box" onclick="showpassword('chk_box')"> གསང་ཚིག་སྟོན།
                        </div>
                        <div class="col-xs-4">
                            <button type="button" onclick="submit_form()" class="btn btn-primary btn-block btn-flat">གནང་འཛུལ</button>
                        </div>
                    </div>
                </form>
                {{-- <a href="#">I forgot my password</a><br> --}}
            </div>
        </div>
        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            function showpassword(id){
                if($('#'+id).prop('checked')){
                    $('#passwordid').attr('type', 'text');
                }else{
                    $('#passwordid').attr('type', 'password');
                }
            }
            function submit_form(){
                if(validated()){
                    $('#login_form').submit();
                }
            }
            function validated(){
                let ret=true;
                if($('#email').val()==""){
                    $('#email_err').html('ཁྱོད་རའི་མིང་རྟགས་བཙུགས།');
                    ret=false;
                }
                if($('#passwordid').val()==""){
                    $('#passwordid_err').html('ཁྱོད་རའི་གསང་ཚིག་བཙུགས།');
                    ret=false;
                }
                return ret;
            }
            function remove_err(id){
                $('#'+id+'_err').html('');
            }
        </script>
    </body>
</html>
