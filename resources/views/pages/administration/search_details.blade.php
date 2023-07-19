<section class="content">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-search"></i></a></li>
        <li class="active"><span class="h3">ཐོ་བཀོད་འཚོལ། </span></li>
    </ol>
    <div class="box box-success">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img class="img-responsive"
                    src="/std_pic/{{$user->pro_pic}}" onerror="this.src='/images/user.png'" alt="User profile picture">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <img style="width: 100%;height: 117px;" class="img-responsive" src="/images/logo.JPG">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered">
                        <tr>
                            <td class="h4 text-bold">མིང</td>
                            <td><span class="h4">{{$user->person_name}}</span></td>
                            <td class="h4 text-bold">གྲཱ་ཚང་</td>
                            <td><span class="h4">{{$user->dratshang}}</td>
                            <td class="h4 text-bold">སྡེ་རིམ</td>
                            <td><span class="h4">{{$user->deprim}}</td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">ལོ་དྲང་</td>
                            <td><span class="h4">{{$user->age}}</span></td>
                            <td class="h4 text-bold">རྫོང་ཁག</td>
                            <td><span class="h4">{{$user->dzongkhag}}</span></td>
                            <td class="h4 text-bold">རྒེད་འོག</td>
                            <td><span class="h4">{{$user->gewog}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">ཡུལ</td>
                            <td><span class="h4">{{$user->village}}</span></td>
                            <td class="h4 text-bold">ངོ་སྤྲེད་ཨང</td>
                            <td><span class="h4">{{$user->cid_no}}</span></td>
                            <td class="h4 text-bold">བརྒྱུད༌འཕྲིན༌ཨང་</td>
                            <td><span class="h4">{{$user->contact_no}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">མཚན་འཛིན་ཐོ་དེབ་ཨང་</td>
                            <td><span class="h4">{{$user->thodabaang}}</span></td>
                            <td class="h4 text-bold">དགོན་སྡེ་</td>
                            <td><span class="h4">{{$user->contact_no}}</span></td>
                            <td class="h4 text-bold">ཁྲག་གི་སྡེ་ཚན</td>
                            <td><span class="h4">{{$user->blood_group}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">ཕ་མིང་དང་བརྒྱུད༌འཕྲིན༌ཨང</td>
                            <td><span class="h4">{{$user->father_name}}</span></td>
                            <td><span class="h4">{{$user->father_no}}</span></td>
                            <td class="h4 text-bold">འབྲེལ་ཡོད་ཀྱི་མིང་དང་བརྒྱུད༌འཕྲིན༌ཨང</td>
                            <td><span class="h4">{{$user->guardian_name}}</span></td>
                            <td><span class="h4">{{$user->guardian_no}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">ཕ་མིང་དང་བརྒྱུད༌འཕྲིན༌ཨང</td>
                            <td><span class="h4">{{$user->mother_name}}</span></td>
                            <td><span class="h4">{{$user->mother_no}}</span></td>
                            <td class="h4 text-bold">སྐྱེས་བའི་ཚེས་དང་སྤྱི་ལོ</td>
                            <td colspan="2"><span class="h4">{{$user->dob}}</span></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <span class="h4 text-bold">མཚན་རྟགས</span>
                </div>
            </div>
            <br>
                    <br>
                    <br>
        </div>
    </div>
  </section>
  <script>
    $(function () {
        $("#application_table").DataTable({
            scrollY:        "400px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
        });
     });
</script>

