<section class="content">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-search"></i></a></li>
        <li class="active"><span class="h3">ཐོ་བཀོད་འཚོལ། </span></li>
        <li class="pull-right">
            <a href="#" onclick="printcertificate()" class="btn btn-info btn-sm text-white"><i class="fa fa-print"></i > <span class="h4"> པར་སྐྲིན </span></a>
        </li>
    </ol>
    <div class="box box-success" id="contentMainDiv">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table">
                        <tr>
                            <td style="width:20%;">
                                <img class="img-responsive img-rounded img-bordered-sm"
                                src="/std_pic/{{$user->pro_pic}}" onerror="this.src='/images/user.png'" alt="User profile picture">
                            </td>
                            <td style="width:80%"><img class="img-responsive center-block" src="/images/logo.JPG"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered" style="border: 1px">
                        <tr>
                            <td class="h4 text-bold">ངོ་མིང་།</td>
                            <td><span class="h4">{{$user->person_name}}</span></td>
                            <td class="h4 text-bold">རྫོང་ཁག།</td>
                            <td><span class="h4">{{$user->dzongkhag}}</span></td>
                            <td class="h4 text-bold">སྐྱེས་བའི་ཟླ་ཚེས།</td>
                            <td><span class="h4">{{$user->dob}}</span></td>
                            <td class="h4 text-bold">དྲན་གསོ།</td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">ཆོས་མིང་།</td>
                            <td><span class="h4">{{$user->choe_name}}</span></td>
                            <td class="h4 text-bold">རྒེད་འོག།</td>
                            <td><span class="h4">{{$user->gewog}}</span></td>
                            <td class="h4 text-bold">ཆོས་བཞུགས་སྤྱི་ལོ།</td>
                            <td><span class="h4">{{$user->year_of_enrolment}}</span></td>
                            <td rowspan="5"><span class="h4">{{$user->remarks}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">སྐྱེས་ལོ།</td>
                            <td><span class="h4">{{$user->age}}</span></td>
                            <td class="h4 text-bold">ཡུལ།</td>
                            <td><span class="h4">{{$user->village}}</span></td>
                            <td class="h4 text-bold">ཆོས་བཞུགས་ལོ་གྲངས།</td>
                            <td><span class="h4">{{$user->age_in_std}}</td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།</td>
                            <td><span class="h4">{{$user->cid_no}}</span></td>
                            <td class="h4 text-bold">གྲཱ་ཚང་།</td>
                            <td><span class="h4">{{$user->dratshang}}</span></td>
                            <td class="h4 text-bold">ཕ་མིང་།</td>
                            <td><span class="h4">{{$user->father_name}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">མཚན་འཛིན་ཨང་།</td>
                            <td><span class="h4">{{$user->thodabaang}}</span></td>
                            <td class="h4 text-bold">དགོན་སྡེ་</td>
                            <td><span class="h4">{{$user->gyandey}}</span></td>
                            <td class="h4 text-bold">མ་མིང་།</td>
                            <td><span class="h4">{{$user->mother_name}}</span></td>
                        </tr>
                        <tr>
                            <td class="h4 text-bold">བརྒྱུད༌འཕྲིན༌ཨང་།</td>
                            <td><span class="h4">{{$user->contact_no}}</span></td>
                            <td class="h4 text-bold">སྡེ་རིམ།</td>
                            <td><span class="h4">{{$user->deprim}}</span></td>
                            {{-- <td class="h4 text-bold">བརྒྱུད༌འཕྲིན༌ཨང་།</td>
                            <td><span class="h4">{{$user->mother_no}}</span></td> --}}
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
     function printcertificate(){
        window.print();
    }

</script>

