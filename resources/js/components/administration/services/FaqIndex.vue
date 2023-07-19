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
                    <li class="active">Services</li>
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
                            FAQ List
                        </div>
                        <div>
                            <table id="faq-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Question</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1 </td>
                                        <td>Sample question 1</td>
                                        <td>Active</td>
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
                                        <td>Sample question 2</td>
                                        <td>Active</td>
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
                                        <td>Sample question 3</td>
                                        <td>Active</td>
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
                    <h4>FAQ</h4>
                    <button type="button" class="close pull-right"  @click="closeModal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="bootbox-form" method="post" action="#" id="master_form">
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Question: <span class="text-danger">*</span></label>
                                <input name="name" @change="remove_error('name')" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name" onchange="remove_error('name')" id="name" class="form-control" type="text">
                                <span class="text-danger" id="name_error" v-if="form.errors.errors.name">{{ form.errors.errors.name[0]}}</span>
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
                    designation:'',
                    name:'',
                    eid:'',
                    cid:'',
                    mobile_no:'',
                    email:'',
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
            $('#faq-table').DataTable( );
        },
    }
</script>
