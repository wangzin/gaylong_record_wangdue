<template>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Administration</a>
                    </li>
                    <li class="active">Master Management</li>
                </ul>
                <div class="nav-search" id="nav-search">
                    <button class="btn btn-white btn-info btn-bold" @click="AddModal()">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Add New
                    </button>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-header">
                            Country Master
                        </div>
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Added at</th>
                                        <th>Added by</th>
                                        <th>Updated at</th>
                                        <th>Updated by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1 </td>
                                        <td>Bhutan </td>
                                        <td>0001</td>
                                        <td>Bhutanese</td>
                                        <td>Active</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                            <span class="vbar"></span>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2 </td>
                                        <td>India </td>
                                        <td>0002</td>
                                        <td>Indian</td>
                                        <td>Active</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                            <span class="vbar"></span>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3 </td>
                                        <td>Austrilia </td>
                                        <td>0004</td>
                                        <td>Austrilian</td>
                                        <td>Active</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                            <span class="vbar"></span>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4 </td>
                                        <td>Bangladesh </td>
                                        <td>0005</td>
                                        <td>Banglidesh</td>
                                        <td>Active</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>2022-01-01</td>
                                        <td>Admin</td>
                                        <td>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                            <span class="vbar"></span>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade popup" id="addModal" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="master_title">Country</h4>
                    <button type="button" class="close"  @click="closeModal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="bootbox-form" method="post" action="#" id="master_form">
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Name: <span class="text-danger">*</span></label>
                                <input name="name" @change="remove_error('name')" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name" onchange="remove_error('name')" id="name" class="form-control" type="text">
                                <span class="text-danger" id="name_error" v-if="form.errors.errors.name">{{ form.errors.errors.name[0]}}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Description: <span class="text-danger">*</span></label>
                                <input name="description" @change="remove_error('description')" :class="{ 'is-invalid': form.errors.has('description') }" v-model="form.description" onchange="remove_error('description')" id="description" class="form-control" type="text">
                                <span class="text-danger" id="description_error" v-if="form.errors.errors.description">{{ form.errors.errors.description[0]}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Code: <span class="text-danger">*</span></label>
                                <input name="code" @change="remove_error('code')" :class="{ 'is-invalid': form.errors.has('code') }" v-model="form.code" onchange="remove_error('code')" id="code" class="form-control" type="text">
                                <span class="text-danger" id="code_error" v-if="form.errors.errors.code">{{ form.errors.errors.code[0]}}</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Status: <span class="text-danger">*</span> </label><br>
                                <label><input type="radio" v-model="form.status" name="status" value="1"/> Active</label>
                                &nbsp;&nbsp;
                                <label><input type="radio" v-model="form.status" name="status" value="0" /> In active</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="button" @click="closeModal()" class="btn btn-warning" data-dismiss="modal"> <span class="fa fa-times"></span> Close</button>
                            &nbsp;
                            <button type="button" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                customerlist:[],
                form: new form({
                    id: '',
                    description:'',
                    name:'',
                    code:'',
                    status:1,
                    action:'add'
                }),
            }
        },
        methods:{
            closeModal(){
                $('#addModal').modal('hide');
            },
            AddModal(){
                $('#addModal').modal('show');
            }
        },
        mounted(){
            $('#dynamic-table').DataTable( );
        },
    }
</script>
