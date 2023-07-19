<section class="content">
    @if (\Session::has('success'))
        <div class="alert alert-success responseMessage">
            {!! \Session::get('success') !!}
        </div>
    @endif
    @if (\Session::has('danger'))
        <div class="alert alert-danger responseMessage">
            {!! \Session::get('danger') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/pro_pic/{{session('User_Details')['profile_pic'] }}" onerror="this.src='{{ asset('images/user.png') }}'" alt="User profile picture">
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="false"><span class="h2 text-bold">གསང་ཚིག་ དུས་མཐུན་བཛོ།</span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="bootbox-form form-horizontal" method="POST" action="/update_user_password" id="change_password">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <label><span class="h3 text-bold">སྔ་དུས་གསང་ཚིག།</span></label>
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" name="curr_password" onchange="remove_err('curr_password'), validate_password('curr_password')" id="curr_password" class="form-control">
                                            <span class="text-danger h3" id="curr_password_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <label for="inputName"><span class="h3 text-bold">གསང་ཚིག་གསརཔ།</span></label>
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" onchange="remove_err('new_password')" name="new_password" id="new_password" class="form-control">
                                            <span class="text-danger h3" id="new_password_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <label for="inputName"><span class="h3 text-bold">གསང་ཚིག་ཆ་འཇོག།</span></label>
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" onchange="remove_err('confirm_password')" name="confirm_password" id="confirm_password" class="form-control">
                                            <span class="text-danger h3" id="confirm_password_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                            <button type="button" id="update_btn" onclick="update_password()" class="btn btn-block btn-primary pull-right btn-flat"><span class="fa fa-edit"></span> <span class="h3">དུས་མཐུན་བཛོ</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <script>
    function update_password(){
        if(validate_form()){
            $('#change_password').submit();
        }
    }
    function validate_password(){
        $('#update_btn').show();
        $.ajax
        ({
            type : "GET",
            url : "/validate_password/"+$('#curr_password').val(),
            dataType : "json",
            success : function(responseText){
                if(!responseText){
                    $('#curr_password_err').html('སྔ་དུས་གསང་ཚིག་ཆ་འཇོག་མ་བསྒྲུབ།');
                    $('#update_btn').hide();
                }
            }
        });
    }
    function validate_form(){
        let return_type=true;
        if($('#curr_password').val()==""){
            $('#curr_password_err').html('སྔ་དུས་གསང་ཚིག་བཙུགས།');
            return_type=false;
        }
        if($('#new_password').val()==""){
            $('#new_password_err').html('གསང་ཚིག་གསརཔ་བཙུགས།');
            return_type=false;
        }
        if($('#confirm_password').val()==""){
            $('#confirm_password_err').html('གསང་ཚིག་ཆ་འཇོག་འབད།');
            return_type=false;
        }
        if($('#new_password').val()!=$('#confirm_password').val()){
            $('#confirm_password_err').html('གསང་ཚིག་ཆ་འཇོག་མ་བསྒྲུབ།');
            return_type=false;
        }
        return return_type;
    }
    function remove_err(id){
        if($('#'+id).val()!=""){
            $('#'+id+'_err').html('');
        }
    }
  </script>
