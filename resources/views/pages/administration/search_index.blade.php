<section class="content">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-search"></i></a></li>
        <li class="active"><span class="h3">ཐོ་བཀོད་འཚོལ། </span></li>
      </ol>
    <div class="box box-success">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="search_form_id" class="form-horizontal" action="/བདག་སྐྱོང/ཐོ་བཀོད་འཚོལ་ནི" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @if ($message!=null && $message!="")
                                <div class="alert alert-warning alert-dismissible">
                                    {{$message}}
                                </div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                                        <label for="inputName"><span class="h3">ངོ་སྤྲེད་ཨང།</span><span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <input name="application_number" onchange="remove_error('application_number')" id="application_number" class="form-control" type="text">
                                        <span class="text-danger h4" id="application_number_err"></span>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                        <button type="button" onclick="load_application()" class="btn btn-primary"> <span class="fa fa-search"></span> <span class="h4">འཚོལ། </span></button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$param}}" name="param"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
  <script>
    function load_application(){
        if($('#application_number').val()==""){
            $('#application_number_err').html('ངོ་སྤྲེད་ཨང་བཙུགས།');
        }else{
            $('#search_form_id').submit();
        }
    }
  </script>
