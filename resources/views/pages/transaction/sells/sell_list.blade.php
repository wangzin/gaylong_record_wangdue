<section class="content-header">
    <h1>
        Home
        <small>Sells</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="showmodal('add', '')" class="btn btn-info btn-sm text-white"><i class="fa fa-plus"></i > Add Sells</a></li>
      @if(session('User_Details')!=null && session('User_Details')['role_name']=="Admin")
            <li><a href="/transaction/list_all_sells" class="btn btn-success btn-sm text-white"><i class="fa fa-list"></i > List All Sells</a></li>
        @endif
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    Sell List for a day
                </div>
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Transaction Jr.No</th>
                                <th>Item Name</th>
                                <th>Code</th>
                                <th>Total SP</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_data as $i=> $data)
                                <tr>
                                    <td><?=($i+1)?></td>
                                    <td>{{$data->c_name}}</td>
                                    <td>{{$data->c_address}}</td>
                                    <td>{{$data->c_contact}}</td>
                                    <td>{{$data->jr_no}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->rate}}</td>
                                    <td>{{$data->qty}}</td>
                                    <td>
                                        <a href="#" onclick="showmodal('view', '{{$data->id}}')" class="btn btn-success btn-sm btn-flat text-white"><i class="fa fa-eye"></i > View</a>
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
                <form class="bootbox-form" method="post" action="/transaction/delete_sells" id="master_delete_form">
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
                <form class="bootbox-form form-horizontal" method="post" action="/transaction/add_sells" id="product_form_id">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Customer Name</label>
                            <input type="text" name="c_name" id="c_name" class="form-control">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Address</label>
                            <textarea type="text" name="c_address" id="c_address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Contact No</label>
                            <input type="text" name="c_contact" id="c_contact" class="form-control">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email</label>
                            <input type="text" name="c_email" id="c_email" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Search Item</label><br>
                                    <select name="product_id" class="select2" id="product_id" onchange="chooseItem('product_id')">
                                        <option value="">Select</option>
                                        @foreach ($item_list as $i=> $role)
                                            <option value="{{$role->id}}">{{$role->code}} - {{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="product_id_err"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad">
                                    <input type="hidden" name="tbl_row_count0" id="tbl_row_count" value="1">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="addmore('sells_table')"><span class="fa fa-plus"></span> Add Row</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="remove('sells_table')"><span class="fa fa-times"></span> Delete Row</button>
                                </div>
                            </div>
                            <table id="sells_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 25%">Itemc Name <span class="text-danger">*</span></th>
                                        <th style="width: 25%">Qty <span class="text-danger">*</span></th>
                                        <th style="width: 25%">Rate(NU.) / Item: <span class="text-danger">*</span></th>
                                        <th style="width: 25%">Total:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="item_name[]" readonly id="item_name_0" class="form-control" type="text">
                                            <input name="item_id[]" id="item_id_0" class="form-control" type="hidden">
                                            <span class="text-danger" id="item_id_0_err"></span>
                                        </td>
                                        <td>
                                            <input name="qty[]" onchange="remove_error('qty_0'),calculate_total('qty_0')" id="qty_0" class="form-control" type="number" value="1">
                                            <span class="text-danger" id="qty_0_err"></span>
                                        </td>
                                        <td>
                                            <input name="rate[]" onchange="remove_error('rate_0'),calculate_total('rate_0')" id="rate_0" class="form-control" type="text">
                                            <span class="text-danger" id="rate_0_err"></span>
                                        </td>
                                        <td>
                                            <input name="total_price[]" readonly id="total_price_0" class="form-control" type="text">
                                            <span class="text-danger" id="total_price_0_err"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <label>Total: <span id="g_total"></span></label>
                                </div>
                            </div>
                            <div class="row form-group" id="table_action">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Transaction Jr. No.:</label>
                            <input type="text" name="jr_no" onchange="remove_error('jr_no')" id="jr_no" class="form-control">
                            <span class="text-danger" id="jr_no_err"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Remark</label>
                            <textarea type="text" name="remarks" id="remarks" class="form-control"></textarea>
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

<div class="modal fade popup" id="view_detaisModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Customer Name</label>
                        <span id="c_name_view"></span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Address</label>
                        <span id="c_address_view"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Contact No</label>
                        <span id="c_contact_view"></span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Email</label>
                        <span id="c_email_view"></span>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="sells_table_view" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Qty:</th>
                                    <th>Rate(NU.):</th>
                                    <th>Total(NU.):</th>
                                </tr>
                            </thead>
                            <tbody id="sells_table_view_contet">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Transaction Jr.No</label>
                        <span id="c_jr_view"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Ramrks</label>
                        <span id="remarks_view"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="footer_btn">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.select2').select2({
        tags: true,
        width: '100%'
    });
    let g_total=0;
    function showmodal(action_type,data){
        $('#action_type').val(action_type);
        if(action_type=="add"){
            var table = document.getElementById('sells_table');
            var rowCount = table.rows.length;
            if (rowCount > 2) {
                for(let i=(rowCount-1);i>=2;i--){
                    table.deleteRow(i);
                }
                $('#c_name').val('');
                $('#c_address').val('');
                $('#c_contact').val('');
                $('#c_email').val('');
                $('#remarks').val('');
                $('#item_id_0').val('');
                $('#rate_0').val('');
                $('#item_id_0').empty();
                g_total=0;
            }
            $('#adduserModal').modal('show');
        }
        else{
            var url = '/transaction/get_sell_details/'+data;
            $.ajax({
                url:url,
                type:"GET",
                dataType:"json",
                success:function(response_data){
                    $('#c_name_view').html(response_data.c_name);
                    $('#c_address_view').html(response_data.c_address);
                    $('#c_contact_view').html(response_data.c_contact);
                    $('#c_email_view').html(response_data.c_email);
                    $('#c_jr_view').html(response_data.jr_no);
                    $('#remarks_view').html(response_data.remarks);
                    $items_det='';
                    $('#sells_table_view_contet').empty();
                    let tot=0;
                    response_data.sells.forEach(element=> {
                        $items_det=$items_det+'<tr>';
                            $items_det=$items_det+'<td>'+element.code+' - '+element.name+'</td>';
                            $items_det=$items_det+'<td>'+element.qty+'</td>';
                            $items_det=$items_det+'<td>'+element.rate+'</td>';
                            $items_det=$items_det+'<td>'+element.rate * element.qty+'</td>';
                        $items_det=$items_det+'</tr>';
                        tot+=parseInt(element.rate * element.qty);
                    });
                    $items_det=$items_det+'<tr><td></td><td></td><td>Total SP: </td><td>'+tot+'</td></tr>';
                    $('#sells_table_view_contet').append($items_det);
                },
            });
            $('#view_detaisModal').modal('show');
        }
    }

    function chooseItem(id){
        var table = document.getElementById('sells_table');
        var rowCount = table.rows.length;
        if(rowCount==2){
            $('#item_id_0').val($('#'+id).val());
            $('#item_name_0').val($('#'+id+' option:selected').text());
        }else{
            $('#item_id_'+(rowCount-2)).val($('#'+id).val());
            $('#item_name_'+(rowCount-2)).val($('#'+id+' option:selected').text());
        }
    }

    function add_records(){
        if(validateform()){
            $('#product_form_id').submit();
            $('#addModal').modal('hide');
        }
    }
    function calculate_total(id){
        var table = document.getElementById('sells_table');
        var rowCount = table.rows.length;
        g_total=0;
        for(let i=0;i<=parseInt(rowCount-2);i++){
            let val=$('#rate_'+i).val();
            let qty=$('#qty_'+i).val();
            if(val==""){
            val=0;
            }
            let tot=parseInt(val)*parseInt(qty);
            $('#total_price_'+i).val(tot);
            g_total+=parseInt(tot);
        }
        $('#g_total').html(g_total);
    }
    function validateform(){
        let ret=true;
        var table = document.getElementById('sells_table');
        var rowCount = table.rows.length;
        let item='';
        for(let i=0;i<(rowCount-1);i++){
            if(item.includes($('#item_id_'+i).val())){
                $('#item_id_'+i+'_err').html('This item is already added. Please select another one or delete it');
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
            if($('#rate_'+i).val()=="" || $('#rate_'+i).val()=="0"){
                $('#rate_'+i+'_err').html('Please mention selling price');
                ret=false;
            }
        }

        // if($('#jr_no').val()==""){
        //     $('#jr_no_err').html('Please mention jr.no');
        //     ret=false;
        // }
        return ret;
    }

    function delete_category(id){
        $('#record_delete_id').val(id);
        $('#deleteModal').modal('show');
    }
    function delete_records(){
        $('#master_delete_form').submit();
        $('#deleteModal').modal('hide');
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
    function remove(tableID){
        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		if (rowCount > 2) {
			table.deleteRow(rowCount - 1);
		}
    }
</script>
