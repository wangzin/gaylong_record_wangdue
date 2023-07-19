<template>
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    overview &amp; stats
                </small>
            </li>
        </ul>

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="space-6"></div>
                    <div class="col-sm-6">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title lighter">
                                    <i class="ace-icon fa fa-star orange"></i>
                                    User registration summary
                                </h4>
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Country
                                                </th>

                                                <th>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Total User
                                                </th>

                                                <th class="hidden-480">
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Registered Today
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>India</td>
                                                <td>
                                                    <b class="green">200</b>
                                                </td>
                                                <td class="hidden-480">
                                                    <span class="label label-info">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Australia</td>
                                                <td>
                                                    <b class="green">13000</b>
                                                </td>
                                                <td class="hidden-480">
                                                    <span class="label label-info">48</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>USA</td>
                                                <td>
                                                    <b class="green">145</b>
                                                </td>
                                                <td class="hidden-480">
                                                    <span class="label label-info">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Switzerland</td>
                                                <td>
                                                    <b class="green">211</b>
                                                </td>
                                                <td class="hidden-480">
                                                    <span class="label label-info">2</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vspace-12-sm"></div>
                    <div class="col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat widget-header-small">
                                <h5 class="widget-title">
                                    <i class="ace-icon fa fa-signal"></i>
                                    Overall Registration Details
                                </h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div id="piechart-placeholder"></div>
                                    <div class="hr hr8 hr-double"></div>
                                    <div class="clearfix">
                                        <div class="grid4" style=" background: #68bc31;">
                                            <h4 class="bigger text-center text-white">54000</h4>
                                        </div>
                                        <div class="grid4" style=" background: #2091cf;">
                                            <h4 class="bigger text-center text-white">20000</h4>
                                        </div>
                                        <div class="grid4" style=" background: #af4e96;">
                                            <h4 class="bigger text-center text-white">8000</h4>
                                        </div>
                                        <div class="grid4" style=" background: #da5430;">
                                            <h4 class="bigger text-center text-white">500</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr hr32 hr-dotted"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="widget-box transparent" id="recent-box">
                            <div class="widget-header">
                                <h4 class="widget-title lighter smaller">
                                    <i class="ace-icon fa fa-rss orange"></i>Notifications
                                </h4>


                            </div>

                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="tab-content padding-8">
                                        <div id="task-tab" class="tab-pane active">
                                            <ul id="tasks" class="item-list">
                                                <li class="item-red clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> National day celebration</span>
                                                    </label>
                                                    <div class="pull-right action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                        <span class="vbar"></span>
                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li class="item-green clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Data collection for Bhutanese residing abroad</span>
                                                    </label>
                                                    <div class="pull-right action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                        <span class="vbar"></span>
                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li class="item-blue clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Visit to Denmark</span>
                                                    </label>
                                                    <div class="pull-right action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                        <span class="vbar"></span>
                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li class="item-grey clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Visit to USA</span>
                                                    </label>
                                                    <div class="pull-right action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                        <span class="vbar"></span>
                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="item-pink clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Cleaning up</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title lighter smaller">
                                    <i class="ace-icon fa fa-comment blue"></i>
                                    Feedbacks
                                </h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <div class="dialogs">
                                        <div class="itemdiv dialogdiv">
                                            <div class="user">
                                                <span class=" fa fa-user"></span>
                                            </div>

                                            <div class="body">
                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">12/11/2022</span>
                                                </div>

                                                <div class="name">
                                                    <a href="#">Tashi Tshering</a>
                                                </div>
                                                <div class="text">We are not able to contact with our embasy. Is there any other ways to contact them ?</div>
                                            </div>
                                        </div>

                                        <div class="itemdiv dialogdiv">
                                            <div class="user">
                                                <span class=" fa fa-user"></span>
                                            </div>
                                            <div class="body">
                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">12/10/2022</span>
                                                </div>

                                                <div class="name">
                                                    <a href="#">Dechen</a>
                                                </div>
                                                <div class="text">The app is so helpful for us to update our information</div>
                                            </div>
                                        </div>

                                        <div class="itemdiv dialogdiv">
                                            <div class="user">
                                                <span class=" fa fa-user"></span>
                                            </div>
                                            <div class="body">
                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">01/09/2022</span>
                                                </div>

                                                <div class="name">
                                                    <a href="#">Pema</a>
                                                </div>
                                                <div class="text">Test test test test</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        return {
            response_data:'',
        }
    },
    async created(){

    }
}
</script>


