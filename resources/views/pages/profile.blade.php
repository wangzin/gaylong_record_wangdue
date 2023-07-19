<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/pro_pic/{{session('User_Details')['profile_pic'] }}" onerror="this.src='{{ asset('images/user.png') }}'" alt="User profile picture">
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    {{-- <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Role</b><br> <a class="">{{$user->role_name}}</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="false">Profile</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="inputName"><span class="h4">མིང་གསལ།</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="text-blue ">{{$user->name}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="inputName"> <span class="h4">ལག་ཁྱུར་ཨང་།</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="text-blue ">{{$user->email}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="inputName"> <span class="h4">བརྒྱུད༌འཕྲིན༌ཨང༌།</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="text-blue ">{{$user->phone_no}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="inputName"> <span class="h4">གོ་གནས།</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="text-blue ">{{$user->designation}}</label>
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
