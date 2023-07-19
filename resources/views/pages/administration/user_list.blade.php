<section class="content-header">
    <h1>
        <span class="text-bold"> ལག་ལེན་པའི་ཐོ་ཡིག།</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="showusermodal('add', '')" class="btn btn-info text-white text-info bg-aqua-active"><i class="fa fa-plus text-white"></i ><span class="h3"> ལག་ལེན་པ་གསརཔ </span></a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body" style="overflow: auto;">
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
                    <table id="user_data_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ཨང་གྲངས།</th>
                                <th>མིང་གསལ།</th>
                                <th>ལག་ཁྱུར་ཨང་།</th>
                                <th>བརྒྱུད༌འཕྲིན༌ཨང༌།</th>
                                <th>གོ་གནས།</th>
                                <th>ངོ་པར།</th>
                                <th>དང་ལེན།</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_data as $i=> $data)
                                <tr>
                                    <td>{{($i+1)}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone_no}}</td>
                                    <td>{{$data->designation}}</td>
                                    <td>
                                        <a href="/pro_pic/{{$data->profile_pic }}" target="_blank"><img src="/pro_pic/{{$data->profile_pic }}" alt="no imaged" onerror="this.src='{{ asset('images/user.png') }}'" width="100" align="left"></a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="showusermodal('edit', {{ $data }})" class="btn btn-info btn-sm btn-flat text-white"><i class="fa fa-edit"></i > <span class="h4">ཞུན་དག་རྐྱབ</span></a>
                                        <a href="#" onclick="delete_user('{{$data->id}}')" class="btn btn-danger btn-sm btn-flat text-white"><i class="fa fa-trash"></i > <span class="h4">བཏོག༌གཏང</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade popup" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="text-bold">གཏན་འཁེལ།</span></h4>
            </div>
            <div class="modal-body">
                <form class="bootbox-form" method="post" action="/བདག་སྐྱོང/བཏོག༌གཏང" id="master_delete_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label><span class="h4">ཐེ་རེ་བ་རེ་བཏོག་བཏང་ནི་ཨིན་ན?</span> </label>
                            <input type="hidden" id="record_delete_id" name="record_delete_id">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="h4">མེན་</span></button>
                        <button type="button" onclick="delete_records()" class="btn btn-primary"><span class="h4">ཨིན</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade popup" id="adduserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="text-bold">ལག་ལེན་པའི་རྒྱས་བཤད།</span></h4>
            </div>
            <div class="modal-body">
                <form class="bootbox-form form-horizontal" method="post" action="/བདག་སྐྱོང/ལག་ལེན་པ་གསརཔ" id="user_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label><span class="h4">མིང་གསལ།</span> <span class="text-danger">*</span></label>
                                    <input name="full_name" onchange="remove_error('full_name')" id="full_name" class="form-control" type="text">
                                    <span class="text-danger" id="full_name_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label><span class="h4">ལག་ཁྱུར་ཨང་།</span> <span class="text-danger">*</span></label>
                                    <input name="email" onchange="remove_error('email')" id="email" class="form-control" type="email">
                                    <span class="text-danger" id="email_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label><span class="h4">བརྒྱུད༌འཕྲིན༌ཨང༌།</span> <span class="text-danger">*</span></label>
                                    <input name="mobile_no" onchange="remove_error('mobile_no')" id="mobile_no" class="form-control" type="text">
                                    <span class="text-danger" id="mobile_no_err"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label><span class="h4">གོ་གནས།</span> <span class="text-danger">*</span></label>
                                    <input name="designation" onchange="remove_error('designation')" id="designation" class="form-control" type="text">
                                    <span class="text-danger" id="designation_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label><span class="h4">གསང་ཚིག།</span> <span class="text-danger">*</span></label>
                                    <input name="password" onchange="remove_error('password')" id="password" class="form-control" type="text">
                                    <span class="text-danger" id="password_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label><span class="h4">ངོ་པར།</span> </label>
                                    <input name="pro_pic" onchange="remove_error('pro_pic')" id="pro_pic" class="form-control" type="file">
                                    <span class="text-danger" id="pro_pic_err"></span>
                                </div>
                            </div>
                            <input type="hidden" id="profile_pic_exis" name="profile_pic_exis">
                            <input type="hidden" id="record_id" name="record_id">
                            <input type="hidden" id="action_type" name="action_type">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="h4">བསྡམ</span></button>
                        <button type="button" id="action_btn_save" onclick="add_records()" class="btn btn-primary"><span class="h4">ཐོ་སྐྱེད་རྐྱབ</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#user_data_table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    });
    function showusermodal(action_type,data){
        $('#action_type').val(action_type);
        $('#password').val('');
        if(action_type=="edit"){
            $('#record_id').val(data.id);
            $('#full_name').val(data.name);
            $('#mobile_no').val(data.phone_no);
            $('#email').val(data.email);
            $('#designation').val(data.designation);
            $('#profile_pic_exis').val(data.profile_pic);
            
            $('#password').val(data.password);
        }
        if(action_type=="add"){
            reset_form();
        }
        $('#adduserModal').modal('show');
    }
    function add_records(){
        if(validateform()){
            $('#user_form').submit();
            $('#addModal').modal('hide');
        }
    }
    function validateform(){
        let ret=true;
        if($('#full_name').val()==""){
            $('#full_name_err').html('མིང་གསལ་བཙུགས།');
            ret=false;
        }
        if($('#mobile_no').val()==""){
            $('#mobile_no_err').html('བརྒྱུད༌འཕྲིན༌ཨང་བཙུགས།');
            ret=false;
        }
        if($('#email').val()==""){
            $('#email_err').html('ལག་ཁྱུར་ཨང་བཙུགས།');
            ret=false;
        }
        if($('#designation').val()==""){
            $('#designation_err').html('གོ་གནས་བཙུགས།');
            ret=false;
        }

        if($('#action_type').val()=="add" && $('#password').val()==""){
            $('#password_err').html('གསང་ཚིག་བཙུགས།');
            ret=false;
        }
        return ret;
    }
    function reset_form(){
        $('#record_id').val('');
        $('#full_name').val('');
        $('#mobile_no').val('');
        $('#email').val('');
        $('#status').val('');
        $('#roleid').val('');
    }
    
    function delete_user(id){
        $('#record_delete_id').val(id);
        $('#deleteModal').modal('show');
    }
    function delete_records(){
        $('#master_delete_form').submit();
        $('#deleteModal').modal('hide');
    }
</script>
