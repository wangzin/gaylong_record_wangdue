<section class="content-header">
    <h1>
        Home
        <small>Procurement</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="showmodal('add', '')" class="btn btn-info btn-sm text-white"><i class="fa fa-plus"></i > Add New</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    Procurement List for a month
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Code</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Purchase Rate(Nu.) / Item</th>
                                <th>Description</th>
                                {{-- <th>Status</th> --}}
                                <th>Procured At</th>
                                <th>Recorded By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_data  as $i=> $data)
                                <tr>
                                    <td><?=($i+1)?></td>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->rate}}</td>
                                    <td>{{$data->description}}</td>
                                    {{-- <td>{{$data->status==1? 'Available':'Sold'}}</td> --}}
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->user_name}}</td>
                                    <td>
                                      @if(session('User_Details')!=null && session('User_Details')['role_name']=="Admin")
                                          <a href="#" onclick="delete_category('{{$data->id}}')" class="btn btn-danger btn-sm btn-flat text-white"><i class="fa fa-trash"></i > Delete</a>
                                      @endif
                                        
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
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <form class="bootbox-form" method="post" action="/transaction/delete_procurement" id="master_delete_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Are you sure you wish to delete </label>
                            <input type="hidden" id="record_delete_id" name="record_delete_id">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                        <button type="button" onclick="delete_records()" class="btn btn-primary">Yes</button>
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
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <form class="bootbox-form form-horizontal" method="post" action="/transaction/add_procurement" id="product_form_id">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{-- <label class="text-danger">You are recording procuring</label> --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table id="procure_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Item Name <span class="text-danger">*</span></th>
                                                <th style="width: 25%">Qty <span class="text-danger">*</span></th>
                                                <th style="width: 25%">Purchase Rate(NU.)/Item</th>
                                                <th style="width: 25%">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="item_id[]" class="form-control" onchange="remove_error('item_id_0')" id="item_id_0">
                                                        <option value="">Select</option>
                                                        @foreach ($master_data as $i=> $role)
                                                            <option value="{{$role->id}}">{{$role->code}} - {{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger" id="item_id_0_err"></span>
                                                </td>
                                                <td>
                                                    <input name="quantity[]" onchange="remove_error('quantity_0')" id="quantity_0" class="form-control" type="number">
                                                    <span class="text-danger" id="quantity_0_err"></span>
                                                </td>
                                                <td>
                                                    <input name="rate[]" onchange="remove_error('rate_0')" id="rate_0" class="form-control" type="number">
                                                    <span class="text-danger" id="rate_0_err"></span>
                                                </td>

                                                <td>
                                                    <input name="description[]" onchange="remove_error('description_0')" id="description_0" class="form-control" type="text">
                                                    <span class="text-danger" id="description_0_err"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row form-group" id="table_action">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="hidden" name="tbl_row_count0" id="tbl_row_count" value="1">
                                            <button type="button" class="btn btn-primary btn-sm" onclick="addmore('procure_table')"><span class="fa fa-plus"></span> Add Row</button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="remove('procure_table')"><span class="fa fa-times"></span> Delete Row</button>
                                        </div>
                                    </div>
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
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" id="action_btn_save" onclick="add_records()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showmodal(action_type,data){
        $('#action_type').val(action_type);
        if(action_type=="add"){
            reset_form();
        }
        $('#adduserModal').modal('show');
    }
    function reset_form(){
        $('#code_0').val('');
        $('#name_0').val('');
        $('#rate_0').val('');
        $('#description_0').val('');
    }
    function addmore(tableID){
        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var colCount = table.rows[1].cells.length;
		for ( var i = 0; i < colCount; i++) {
			var newcell = row.insertCell(i);
			var text = table.rows[1].cells[i].innerHTML;
			if (text.indexOf("[0]") > 0) {
				text = text.replaceAll("[0]", "[" + (rowCount - 1) + "]");
			}
			if (text.indexOf("_0") > 0) {
				text = text.replaceAll("_0", "_" + (rowCount - 1));
			}
			newcell.innerHTML = text;
			text = text.substring(text.indexOf('id='),text.length);
			var elementId = text.substring(3,text.indexOf(" ")).replace(/\"/g,'');
			switch (newcell.childNodes[0].type){
				case "text":
					newcell.childNodes[0].value = "";
				break;
				case "number":
					newcell.childNodes[0].value = "";
				break;
				case "checkbox":
					newcell.childNodes[0].checked = false;
				break;
			}
		}
        $('#item_id_'+rowCount).empty();
    }

    function add_records(){
        if(validateform()){
            $('#product_form_id').submit();
            $('#addModal').modal('hide');
        }
    }
    function validateform(){
        let ret=true;
        var table = document.getElementById('procure_table');
        var rowCount = table.rows.length;
        let item='';
        for(let i=0;i<(rowCount-1);i++){
            if(item.includes($('#item_id_'+i).val())){
                $('#item_id_'+i+'_err').html('This item is already selected. Please select another one');
                ret=false;
            }
            if(i==0){
                item=$('#item_id_'+i).val();
            }
            if(!item.includes($('#item_id_'+i).val())){
                item=item+'__'+$('#item_id_'+i).val();
            }
            if($('#item_id_'+i).val()==""){
                $('#item_id_'+i+'_err').html('Please select item');
                ret=false;
            }
            if($('#quantity_'+i).val()=="" || $('#quantity'+i).val()=="0"){
                $('#quantity_'+i+'_err').html('Please mention qty');
                ret=false;
            }
        }
        return ret;
    }
    function remove(tableID){
        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		if (rowCount > 2) {
			table.deleteRow(rowCount - 1);
		}
    }

    function delete_category(id){
        $('#record_delete_id').val(id);
        $('#deleteModal').modal('show');
    }
    function delete_records(){
        $('#master_delete_form').submit();
        $('#deleteModal').modal('hide');
    }

</script>
