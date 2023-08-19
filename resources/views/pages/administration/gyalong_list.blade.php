<section class="content-header">
    <h1>
        <span class="text-bold"> དགེ་སློང་གི་ཐོ་ཡིག།</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="showmodal('add', '')" class="btn btn-info btn-sm text-white"><i class="fa fa-plus"></i > <span class="h4"> ཐོ་གསརཔ </span></a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
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
                    <table id="table_id" cellspacing="0" width="100%" class="stripe cell-border order-column table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="h4 text-bold">ཨང་</th>
                                <th class="h4 text-bold">ངོ་པར།</th>
                                <th class="h4 text-bold">རྫོང་ཁག།</th>
                                <th class="h4 text-bold">རྒེད་འོག།</th>
                                <th class="h4 text-bold">ཡུལ།</th>
                                <th class="h4 text-bold">ངོ་མིང།</th>
                                <th class="h4 text-bold">ཆོས་མིང་།</th>
                                <th class="h4 text-bold">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང།</th>
                                <th class="h4 text-bold">གུང་ཨང།</th>
                                <th class="h4 text-bold">ཁྲམ་ཨང་།</th>
                                <th class="h4 text-bold">ལོ་རྟཊ།</th>
                                <th class="h4 text-bold">ལོ་གྲངས་།</th>
                                <th class="h4 text-bold">ཆོས་བཞུཊ་ལོ།</th>
                                <th class="h4 text-bold">ཆོས་བཞུཊ་སྤྱི་ལོ།</th>
                                <th class="h4 text-bold">ཕ་མིང།</th>
                                <th class="h4 text-bold">མ་མིང།</th>
                                <th class="h4 text-bold">མཚན་འཛིན་ཨང་།</th>
                                <th class="h4 text-bold">དྲན་གསོ།</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_data as $i=> $data)
                                <tr>
                                    <td><?=($i+1)?></td>
                                    <td>
                                        <a href="/std_pic/{{$data->pro_pic }}" target="_blank"><img src="/std_pic/{{$data->pro_pic }}" alt="no imaged" onerror="this.src='{{ asset('images/user.png') }}'" width="100" align="left"></a>
                                    </td>
                                    <td>{{$data->dzongkhag}}</td>
                                    <td>{{$data->gewog}}</td>
                                    <td>{{$data->village}}</td>
                                    <td>{{$data->person_name}}</td>
                                    <td>{{$data->choe_name}}</td>
                                    <td>{{$data->cid_no}}</td>
                                    <td>{{$data->gung_no}}</td>
                                    <td>{{$data->thrm_no}}</td>
                                    {{-- <td>{{$data->contact_no}}</td> --}}
                                    <td>{{$data->age_name}}</td>
                                    <td>{{$data->age}}</td>
                                    <td>{{$data->age_in_std}}</td>
                                    <td>{{$data->year_of_enrolment}}</td>
                                    <td>{{$data->father_name}}</td>
                                    <td>{{$data->mother_name}}</td>
                                    <td>{{$data->thodabaang}}</td>
                                    <td>{{$data->identy_no}}</td>
                                    <td>
                                        <a href="#" onclick="showmodal('edit', {{ $data }})" class="btn btn-info btn-sm btn-flat text-white"><i class="fa fa-eye"></i > <span class="h4">ཞིབ་ལྟ་འབད</span></a>
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
    <div class="modal fade popup" id="adduserModal" tabindex="-1" role="dialog" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="text-bold">དགེ་སློང་གི་ཐོ་ཡིག་རྒྱས་བཤད།</span></h4>
                </div>
                <div class="modal-body">
                    <form class="bootbox-form form-horizontal" method="post" action="/བདག་སྐྱོང/དགེ་སློང་གི་ཐོ་ཡིག་གསརཔ" id="user_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་། </span><span class="text-danger">*</span></label>
                                        <input name="cid_no" onchange="remove_error('cid_no')" id="cid_no" class="form-control" type="text">
                                        <span class="text-danger" id="cid_no_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ངོ་མིང། </span><span class="text-danger">*</span></label>
                                        <input name="person_name" onchange="remove_error('person_name')" id="person_name" class="form-control" type="text">
                                        <span class="text-danger" id="person_name_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཆོས་མིང་།</span> <span class="text-danger">*</span></label>
                                        <input name="choe_name" onchange="remove_error('choe_name')" id="choe_name" class="form-control" type="text">
                                        <span class="text-danger" id="choe_name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">རྫོང་ཁག།</span> <span class="text-danger">*</span></label>
                                        <input name="dzongkhag" onchange="remove_error('dzongkhag')" id="dzongkhag" class="form-control" type="text">
                                        <span class="text-danger" id="dzongkhag_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">རྒེད་འོག།</span> <span class="text-danger">*</span></label>
                                        <input name="gewog" onchange="remove_error('gewog')" id="gewog" class="form-control" type="text">
                                        <span class="text-danger" id="gewog_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཡུལ།</span> <span class="text-danger">*</span></label>
                                        <input name="village" onchange="remove_error('village')" id="village" class="form-control" type="text">
                                        <span class="text-danger" id="village_err"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">གུང་ཨང།</span> <span class="text-danger">*</span></label>
                                        <input name="gung_no" onchange="remove_error('gung_no')" id="gung_no" class="form-control" type="text">
                                        <span class="text-danger" id="gung_no_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཁྲམ་ཨང་། </span><span class="text-danger">*</span></label>
                                        <input name="thrm_no" onchange="remove_error('thrm_no')" id="thrm_no" class="form-control" type="text">
                                        <span class="text-danger" id="thrm_no_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">བརྒྱུད༌འཕྲིན༌ཨང༌།</span> <span class="text-danger">*</span></label>
                                        <input name="contact_no" onchange="remove_error('contact_no')" id="contact_no" class="form-control" type="text">
                                        <span class="text-danger" id="contact_no_err"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ལོ་རྟཊ།</span> <span class="text-danger">*</span></label>
                                        <input name="age_name" onchange="remove_error('age_name')" id="age_name" class="form-control" type="text">
                                        <span class="text-danger" id="age_name_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">སྐྱེས་ལོ།</span><span class="text-danger">*</span></label>
                                        <input name="age" onchange="remove_error('age')" id="age" class="form-control" type="text">
                                        <span class="text-danger" id="age_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཆོས་བཞུགས་ལོ་གྲངས།</span> <span class="text-danger">*</span></label>
                                        <input name="age_in_std" onchange="remove_error('age_in_std')" id="age_in_std" class="form-control" type="text">
                                        <span class="text-danger" id="age_in_std_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཆོས་བཞུགས་སྤྱི་ལོ།</span> <span class="text-danger">*</span></label>
                                        <input name="year_of_enrolment" onchange="remove_error('year_of_enrolment')" id="year_of_enrolment" class="form-control" type="text">
                                        <span class="text-danger" id="year_of_enrolment_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཕ་མིང།</span><span class="text-danger">*</span></label>
                                        <input name="father_name" onchange="remove_error('father_name')" id="father_name" class="form-control" type="text">
                                        <span class="text-danger" id="father_name_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">མ་མིང།</span> <span class="text-danger">*</span></label>
                                        <input name="mother_name" onchange="remove_error('mother_name')" id="mother_name" class="form-control" type="text">
                                        <span class="text-danger" id="mother_name_err"></span>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཕ་གི་བརྒྱུད༌འཕྲིན༌ཨང།</span> <span class="text-danger">*</span></label>
                                        <input name="father_no" onchange="remove_error('father_no')" id="father_no" class="form-control" type="text">
                                        <span class="text-danger" id="father_no_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">མ་གི་བརྒྱུད༌འཕྲིན༌ཨང།</span><span class="text-danger">*</span></label>
                                        <input name="mother_no" onchange="remove_error('mother_no')" id="mother_no" class="form-control" type="text">
                                        <span class="text-danger" id="mother_no_err"></span>
                                    </div> --}}
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">འབྲེལ་ཡོད་ཀྱི་མིང།</span> <span class="text-danger">*</span></label>
                                        <input name="guardian_name" onchange="remove_error('guardian_name')" id="guardian_name" class="form-control" type="text">
                                        <span class="text-danger" id="guardian_name_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">འབྲེལ་ཡོད་ཀྱི་བརྒྱུད༌འཕྲིན༌ཨང།</span><span class="text-danger">*</span></label>
                                        <input name="guardian_no" onchange="remove_error('guardian_no')" id="guardian_no" class="form-control" type="text">
                                        <span class="text-danger" id="guardian_no_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">གྲཱ་ཚང་།</span> <span class="text-danger">*</span></label>
                                        <input name="dratshang" onchange="remove_error('dratshang')" id="dratshang" class="form-control" type="text">
                                        <span class="text-danger" id="dratshang_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">སྡེ་རིམ།</span><span class="text-danger">*</span></label>
                                        <input name="deprim" onchange="remove_error('deprim')" id="deprim" class="form-control" type="text">
                                        <span class="text-danger" id="deprim_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">མཚན་འཛིན་ཨང་།</span> <span class="text-danger">*</span></label>
                                        <input name="thodabaang" onchange="remove_error('thodabaang')" id="thodabaang" class="form-control" type="text">
                                        <span class="text-danger" id="thodabaang_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">དགོན་སྡེ།</span> <span class="text-danger">*</span></label>
                                        <input name="gyandey" onchange="remove_error('gyandey')" id="gyandey" class="form-control" type="text">
                                        <span class="text-danger" id="gyandey_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ཁྲག་གི་སྡེ་ཚན།</span><span class="text-danger">*</span></label>
                                        <input name="blood_group" onchange="remove_error('blood_group')" id="blood_group" class="form-control" type="text">
                                        <span class="text-danger" id="blood_group_err"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">སྐྱེས་བའི་ཟླ་ཚེས།</span><span class="text-danger">*</span></label>
                                        <input name="dob" onchange="remove_error('dob')" id="dob" class="form-control" type="text">
                                        <span class="text-danger" id="dob_err"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">མཚན་ཨང་།</span> <span class="text-danger">*</span></label>
                                        <input name="identy_no" onchange="remove_error('identy_no')" id="identy_no" class="form-control" type="text">
                                        <span class="text-danger" id="identy_no_err"></span>
                                    </div> --}}
                                   
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label><span class="h4">ངོ་པར།</span> </label>
                                        <input name="pro_pic" onchange="remove_error('pro_pic')" id="pro_pic" class="form-control" type="file">
                                        <span class="text-danger" id="pro_pic_err"></span>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label><span class="h4">དྲན་གསོ།</span><span class="text-danger">*</span></label>
                                        <textarea name="remarks" onchange="remove_error('remarks')" id="remarks" class="form-control"></textarea>
                                        <span class="text-danger" id="remarks_err"></span>
                                    </div>
                                </div>
                                <input type="hidden" id="record_id" name="record_id">
                                <input type="hidden" id="profile_pic_exis" name="profile_pic_exis">
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
    <div class="modal fade popup" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="text-bold">གཏན་འཁེལ།</span></h4>
                </div>
                <div class="modal-body">
                    <form class="bootbox-form" method="post" action="/བདག་སྐྱོང/དགེ་སློང་གི་ཐོ་ཡིགབཏོག༌གཏང" id="master_delete_form">
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
</section>

<script>
    $(function () {
        $('#table_id').DataTable({
            "responsive": false,
            "autoWidth": true,
            scrollY:        "400px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            searching:      true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        })
    });

    function showmodal(action_type,data){
        $('#action_type').val(action_type);
        $('#password').val('');
        if(action_type=="edit"){
            $('#record_id').val(data.id);
            $('#cid_no').val(data.cid_no);
            $('#person_name').val(data.person_name);
            $('#choe_name').val(data.choe_name);
            $('#dzongkhag').val(data.dzongkhag);
            $('#gewog').val(data.gewog);
            $('#village').val(data.village);
            $('#gung_no').val(data.gung_no);
            $('#thrm_no').val(data.thrm_no);
            $('#contact_no').val(data.contact_no);
            $('#age_name').val(data.age_name);
            $('#age').val(data.age);
            $('#age_in_std').val(data.age_in_std);
            $('#year_of_enrolment').val(data.year_of_enrolment);
            $('#father_name').val(data.father_name);
            $('#mother_name').val(data.mother_name);
            $('#identy_no').val(data.identy_no);
            $('#dratshang').val(data.dratshang);
            $('#deprim').val(data.deprim);
            $('#thodabaang').val(data.thodabaang);
            $('#blood_group').val(data.blood_group);
            $('#father_no').val(data.father_no);
            $('#mother_no').val(data.mother_no);
            $('#dob').val(data.dob);
            $('#guardian_no').val(data.guardian_no);
            $('#guardian_name').val(data.guardian_name);
            $('#gyandey').val(data.gyandey);
            $('#profile_pic_exis').val(data.pro_pic);
            $('#remarks').val(data.remarks);
        }
        if(action_type=="add"){
            reset_form();
        }
        $('#adduserModal').modal('show');
    }
    function delete_user(id){
        $('#record_delete_id').val(id);
        $('#deleteModal').modal('show');
    }
    function reset_form(){
        $('#record_id').val('');
            $('#cid_no').val('');
            $('#person_name').val('');
            $('#choe_name').val('');
            $('#dzongkhag').val('');
            $('#gewog').val('');
            $('#village').val('');
            $('#gung_no').val('');
            $('#thrm_no').val('');
            $('#contact_no').val('');
            $('#age_name').val('');
            $('#age').val('');
            $('#age_in_std').val('');
            $('#year_of_enrolment').val('');
            $('#father_name').val('');
            $('#mother_name').val('');
            $('#identy_no').val('');
            $('#profile_pic_exis').val('');
            $('#remarks').val('');
    }
    function add_records(){
        if(validateform()){
            $('#user_form').submit();
            $('#addModal').modal('hide');
        }
    }
    function validateform(){
        let ret=true;
        if($('#cid_no').val()==""){
            $('#cid_no_err').html('ངོ་སྤྲེད་ཨང་བཙུགས།');
            ret=false;
        }
        if($('#person_name').val()==""){
            $('#person_name_err').html('མིང་བཙུགས།');
            ret=false;
        }
        if($('#choe_name').val()==""){
            $('#choe_name_err').html('ཆོས་མིང་བཙུགས།');
            ret=false;
        }
        if($('#dzongkhag').val()==""){
            $('#dzongkhag_err').html('རྫོང་ཁག་བཙུགས།');
            ret=false;
        }
        return ret;
    }
    function delete_records(){
        $('#master_delete_form').submit();
        $('#deleteModal').modal('hide');
    }
</script>
