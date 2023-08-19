<section class="content-header">
    <h1>
        <span class="text-bold">སྟོན་སྟེགས། </span>
        <small><span class="text-bold"> ཐོན་རིམ་ ༡ </span>(DashboardVersion 1.0)</small>
    </h1>
    
</section>
<section class="content">
    {{-- <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><a href="/transaction/record_sell" class="text-orange"><i class="ion ion-ios-cart"></i></a></span>
                <div class="info-box-content">
                    <span class="info-box-number">Todays Sale(s)</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">Weekly Sales</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">Monthly Sales</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-area-chart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">Annually Sales</span>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span class="text-bold"> དགེ་སློང་གི་ཐོ་ཡིག་གསར་ཞུག།</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12">
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
                                        <th class="h4 text-bold">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།</th>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            scrollY:        "500px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            searching:      true,
        })
    });
</script>