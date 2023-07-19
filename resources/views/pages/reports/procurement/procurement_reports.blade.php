<section class="content-header">
    <h1>
        Home
        <small>Procurement Reports</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="showmodal('generate', '')" class="btn btn-info btn-sm text-white"><i class="fa fa-plus"></i > Generate Report</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    Procurement Details
                </div>
                <div class="box-body"  style="overflow: auto;">
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
                    <table id="searchresult" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Particular</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Price(NU.)</th>
                                <th>Procured From</th>
                                <th>Procured At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_data as $i=> $data)
                                <tr>
                                    <td><?=($i+1)?></td>
                                    <td>{{$data->category_name}}</td>
                                    <td>{{$data->sub_category_name}}</td>
                                    <td>{{$data->product_name}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->unit_name}}</td>
                                    <td>{{$data->current_price}}</td>
                                    <td>{{$data->procuring_agency}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade popup" id="adduserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filters</h4>
            </div>
            <div class="modal-body">
                <form class="bootbox-form form-horizontal" method="post" action="/report/generate_procurement_reports" id="procured_form_id">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Category:</label>
                                    <select name="category_id" class="form-control" onchange="load_sub_cat('category_id','sub_cat_id'),load_items('category_id','item_id'),remove_error('category_id')" id="category_id">
                                        <option value="">Select</option>
                                        @foreach ($active_parent_data as $i=> $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="category_id_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Sub Category:</label>
                                    <select name="sub_cat_id" class="form-control" onchange="remove_error('sub_cat_id'),load_items_by_sub_cat('sub_cat_id','item_id')" id="sub_cat_id">
                                        <option value="">Select</option>
                                    </select>
                                    <span class="text-danger" id="sub_cat_id_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Item Name: </label>
                                    <select name="item_id" class="form-control" onchange="remove_error('item_id')" id="item_id">
                                        <option value="">Select</option>
                                        @foreach ($item_list as $i=> $role)
                                            <option value="{{$role->id}}">{{$role->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="item_id_err"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Procured From:</label>
                                    <select name="master_purchase_from_id" class="form-control" onchange="remove_error('master_purchase_from_id')" id="master_purchase_from_id">
                                        <option value="">Select</option>
                                        @foreach ($procured_data as $i=> $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="master_purchase_from_id_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>From Date:<span class="text-danger">*</span></label>
                                    <input name="from_date" onchange="remove_error('from_date')" id="from_date" class="form-control" type="date">
                                    <span class="text-danger" id="from_date_err"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>To Date:<span class="text-danger">*</span></label>
                                    <input name="to_date" onchange="remove_error('to_date')" id="to_date" class="form-control" type="date">
                                    <span class="text-danger" id="to_date_err"></span>
                                </div>
                            </div>
                            <input type="hidden" id="record_id" name="record_id">
                            <input type="hidden" id="action_type" name="action_type">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="footer_btn">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        <button type="button" id="action_btn_save" onclick="generate_report()" class="btn btn-primary"> <span class="fa fa-donwload"></span> Generate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script>
    $('#searchresult').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel',  'print'//'pdf',
        ]
    } );
    function showmodal(action_type,data){
        $('#action_type').val(action_type);
        reset_form();
        $('#adduserModal').modal('show');
    }
    function load_sub_cat(parent_id,target_id,selectval){
        let parentval=$('#'+parent_id).val();
        $('#'+target_id).empty();
        let option="<option value=''> Select </option>";
        var url = '/administration/master/load_sub_category/'+parentval;
        $.ajax({
            url:url,
            type:"GET",
            dataType:"json",
            success:function(data){
                $.each(data,function(key, value){
                    option=option+"<option value='"+value.id+"'> "+value.name+" </option>";
                });
                $('#'+target_id).append(option);
                if(selectval!=undefined && selectval!="NA" && selectval!=""){
                    $('#'+target_id).val(selectval);
                }
            },
        });
    }
    function load_items(parent_id,target_id,selectval){
        let parentval=$('#'+parent_id).val();
        $('#'+target_id).empty();
        let option="<option value=''> Select </option>";
        var url = '/administration/master/load_items_by_category/'+parentval;
        $.ajax({
            url:url,
            type:"GET",
            dataType:"json",
            success:function(data){
                $.each(data,function(key, value){
                    option=option+"<option value='"+value.id+"'> "+value.product_name+" </option>";
                });
                $('#'+target_id).append(option);
                if(selectval!=undefined && selectval!="NA" && selectval!=""){
                    $('#'+target_id).val(selectval);
                }
            },
        });
    }

    function load_items_by_sub_cat(parent_id,target_id,selectval){
        let parentval=$('#'+parent_id).val();
        $('#'+target_id).empty();
        let option="<option value=''> Select </option>";
        var url = '/administration/master/load_items_by_sub_cat/'+parentval;
        $.ajax({
            url:url,
            type:"GET",
            dataType:"json",
            success:function(data){
                $.each(data,function(key, value){
                    option=option+"<option value='"+value.id+"'> "+value.product_name+" </option>";
                });
                $('#'+target_id).append(option);
                if(selectval!=undefined && selectval!="NA" && selectval!=""){
                    $('#'+target_id).val(selectval);
                }
            },
        });
    }

    function generate_report(){
        if(validateform()){
            $('#procured_form_id').submit();
            $('#addModal').modal('hide');
        }
    }
    function validateform(){
        let ret=true;
        if($('#from_date').val()==""){
            $('#from_date_err').html('Please choose from date');
            ret=false;
        }
        if($('#to_date').val()==""){
            $('#to_date_err').html('Please to date');
            ret=false;
        }
        return ret;
    }
    function reset_form(){
        $('#category_id').val('');
        $('#sub_cat_id').val('');
        $('#item_id').val('');
        $('#master_purchase_from_id').val('');
    }

</script>
