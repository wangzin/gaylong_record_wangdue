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
                    <li class="active">User Management</li>
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
                            User List
                        </div>
                        <div>
                            <table id="user-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Name</th>
                                        <th>EID</th>
                                        <th>CID</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Mobile No</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1 </td>
                                        <td>Sonam Tashi </td>
                                        <td>1234567</td>
                                        <td>11111111111</td>
                                        <td>ICT Officer</td>
                                        <td>ICTD</td>
                                        <td>12312312</td>
                                        <td>ictd@mofa.gov.bt</td>
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
                                        <td>Dendup Tshering</td>
                                        <td>1234567</td>
                                        <td>11111111111</td>
                                        <td>ICT Officer</td>
                                        <td>ICTD</td>
                                        <td>12312312</td>
                                        <td>ic1td@mofa.gov.bt</td>
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
                                        <td>Kinga</td>
                                        <td>1234567</td>
                                        <td>11111111111</td>
                                        <td>ICT Officer</td>
                                        <td>ICTD</td>
                                        <td>12312312</td>
                                        <td>kinga@mofa.gov.bt</td>
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
                    <h4>New User Details</h4>
                    <button type="button" class="close pull-right"  @click="closeModal()" data-dismiss="modal" aria-label="Close">
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
                                <label>Designation: <span class="text-danger">*</span></label>
                                <input name="designation" @change="remove_error('designation')" :class="{ 'is-invalid': form.errors.has('designation') }" v-model="form.designation" onchange="remove_error('designation')" id="designation" class="form-control" type="text">
                                <span class="text-danger" id="designation_error" v-if="form.errors.errors.designation">{{ form.errors.errors.designation[0]}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>EID: <span class="text-danger">*</span></label>
                                <input name="eid" @change="remove_error('eid')" :class="{ 'is-invalid': form.errors.has('eid') }" v-model="form.eid" onchange="remove_error('eid')" id="eid" class="form-control" type="text">
                                <span class="text-danger" id="eid_error" v-if="form.errors.errors.eid">{{ form.errors.errors.eid[0]}}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>CID: <span class="text-danger">*</span></label>
                                <input name="cid" @change="remove_error('cid')" :class="{ 'is-invalid': form.errors.has('cid') }" v-model="form.cid" onchange="remove_error('cid')" id="cid" class="form-control" type="text">
                                <span class="text-danger" id="cid_error" v-if="form.errors.errors.cid">{{ form.errors.errors.cid[0]}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Mobile No: <span class="text-danger">*</span></label>
                                <input name="mobile_no" @change="remove_error('mobile_no')" :class="{ 'is-invalid': form.errors.has('mobile_no') }" v-model="form.mobile_no" onchange="remove_error('mobile_no')" id="mobile_no" class="form-control" type="text">
                                <span class="text-danger" id="mobile_no_error" v-if="form.errors.errors.mobile_no">{{ form.errors.errors.mobile_no[0]}}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Email: <span class="text-danger">*</span></label>
                                <input name="email" @change="remove_error('email')" :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email" onchange="remove_error('email')" id="email" class="form-control" type="text">
                                <span class="text-danger" id="email_error" v-if="form.errors.errors.email">{{ form.errors.errors.email[0]}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Department: <span class="text-danger">*</span></label>
                                <select name="department" :class="{ 'is-invalid': form.errors.has('department') }" v-model="form.department" @change="remove_error('department')" id="department" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="1">Hr and Finance</option>
                                    <option value="2">ICTD</option>
                                    <option value="3">Passport</option>
                                </select>
                                <span class="text-danger" id="department_error" v-if="form.errors.errors.department">{{ form.errors.errors.department[0]}}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Role: <span class="text-danger">*</span></label>
                                <select name="role_id" :class="{ 'is-invalid': form.errors.has('role_id') }" v-model="form.role_id" @change="remove_error('role_id')" id="role_id" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Administrator</option>
                                    <option value="3">Users</option>
                                </select>
                                <span class="text-danger" id="role_id_error" v-if="form.errors.errors.role_id">{{ form.errors.errors.role_id[0]}}</span>
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
            $('#user-table').DataTable( );
        },
    }
</script>
