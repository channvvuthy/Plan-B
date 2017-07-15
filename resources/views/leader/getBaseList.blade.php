@extends('layout.leaders.master')
@section('title')
    Leader
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10" style="overflow: auto;width: 1124px;">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('listBaseMember')}}"> <i class="glyphicon glyphicon-folder-open"></i>&nbsp;Base List</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        <form action="{{route('leaderUpdateBase')}}" class="SystemForm" method="get">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default" style="overflow: auto;">
                <div class="panel-heading">
                    <h4>Base List</h4>
                </div>
                <div class="panel-body" style="padding:10px;">
                    <div class="col-md-4 choose" style="padding-left:0px">
                        <select name="choose_action">
                            <option value="">Choose Action</option>
                            <option value="Delete">Delete</option>
                            <option value="Update">Update</option>
                        </select>
                        <button style="submit"><i class="glyphicon-save glyphicon"></i> Save</button>
                    </div>
                    <div class="col-md-4 list" style="padding-left:0px">
                        <input type="text" name="listFolder" id="" placeholder="Enter Location File">
                        <button type="submit"><i class="glyphicon glyphicon-th"></i> List</button>
                    </div>
                    <div class="col-md-4 search" style="padding-left:0px">
                        <input type="text" name="search" id="" placeholder="Search here...">
                        <button type="submit"><i class="glyphicon-search glyphicon"></i> Search</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12" style="padding:0px;">
                        <div class="sort">
                            <label for="">Sort By Month</label>
                        </div>
                        <div class="sort">
                            <input type="date" name="from" id="">
                        </div>
                        <div class="sort">
                            <p>To</p>
                        </div>
                        <div class="sort">
                            <input type="date" name="to" id="">
                        </div>
                        <div class="sort" style="margin-top:7px;">
                            <button type="submit"><i class="glyphicon glyphicon-sort-by-order-alt"></i> Filter</button>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="showRecord">
                            <div class="show">
                                <label for="">Show Record</label>
                            </div>
                            <div class="show">
                                <select name="" id="showNumrow">
                                    <option value=""></option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <br>
                    <table class="table-bordered table" oncontextmenu="onCopyAndPass()" style="width:2600px;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Create By</th>
                            <th>Variation Name</th>
                            <th>Pattern Name</th>
                            <th>Version</th>
                            <th>Type</th>
                            <th>Not</th>
                            <th>Used By</th>
                            <th>Layout</th>
                            <th>URL</th>
                            <th>Check By</th>
                            <th>Check Result</th>
                            <th>Check Problem</th>
                            <th>QC Name</th>
                            <th>QC Check Result</th>
                            <th>QC Check Problem</th>


                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                @if(!empty(Session::get('version')))
                                    <select name="" id="versionOption" class="form-control" onchange="changeInput('versionOption')">
                                        @foreach(Session::get('version') as $version)
                                            <option value="{{$version->id}}">{{$version->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    @php
                                        Session::put('version',App\Models\Version::where('status','1')->get());
                                    @endphp
                                    <select name="" id="versionOption" class="form-control" onchange="changeInput('versionOption')">
                                        @foreach(Session::get('version') as $version)
                                            <option value="{{$version->id}}">{{$version->name}}</option>
                                        @endforeach
                                    </select>

                                @endif
                            </td>
                            <td></td>
                            <td></td>
                            <td>

                                <select name="" id="changeUseBy" class="form-control">
                                    @if(!empty($groups))
                                        @foreach($groups as $group)
                                            <option value="{{$group->name}}"
                                                    data="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                                <div class="group" style="position: absolute;">
                                    <ul class="list-unstyled">
                                        @foreach($groups as $group)
                                            <li data="{{$group->id}}">{{$group->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td>

                            </td>
                            <td>
                                <input type="text" name="" id="baseURL" placeholder="Enter Base URL">
                            </td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($bases))
                            @foreach($bases as $base)
                                <tr>
                                    <td><input type="checkbox" name="check[]" id="" value="{{$base->id}}"></td>
                                    <td id="{{$base->name}}">{{$base->id}}<input type="hidden" value="{{$base->id}}" name="id[]"></td>
                                    <td>{{$base->name}}</td>
                                    <td>{{(!empty($base->user->name))?$base->user->name:""}}</td>
                                    <td>{{(!empty($base->variations->name)?$base->variations->name:"")}}</td>
                                    <td>{{(!empty($base->patterns->name))?$base->patterns->name:""}}</td>
                                    <td class="version">
                                        <input type="text" name="version_name[]" id="" value="{{$base->version_name}}">
                                        <input type="hidden" name="version_id[]" >
                                    </td>
                                    <td>
                                        <input type="text" name="" id="" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="note[]" class="note" value="{{$base->note}}"
                                               data="{{$base->id}}" title="{{$base->note}}">
                                    </td>
                                    <td class="userby">
                                        <input type="text" name="used_by[]" id="" value="{{$base->used_by}}">
                                        <input type="hidden" name="used_by_id[]" value="{{$base->used_by_id}}">
                                    </td>
                                    <td class="tdLayout">
                                        <input type="text" name="laout[]" id=""
                                               value="@if(!empty($base->layouts)) @foreach($base->layouts as $layout) {{$layout->name}}, @endforeach @endif"
                                               title="@if(!empty($base->layouts)) @foreach($base->layouts as $layout) {{$layout->name."/"}} @endforeach @endif"
                                               data="{{$base->id}}">
                                    </td>
                                    <td class="baseURL">
                                        {{-- <input type="text" name="url[]" id="" class="baseURL"> --}}
                                        <a href="{{$base->url.'/'.$base->name}}">{{$base->url.'/'.$base->name}}</a>
                                    </td>
                                    <td>
                                        @if(Auth::check())
                                            <input type="text" name="leader_check_name[]" id="" value="{{Auth::user()->name}}">
                                        @endif
                                    </td>

                                    <td>
                                        <select name="" id="leaderChingResult" data="{{$base->id}}" class="form-control"
                                                @if($base->leader_check_result=="0") style="background-color:red;"
                                                @elseif($base->leader_check_result=="1") style="background-color:green;"
                                                @elseif($base->leader_check_result=="2" )style="background-color:darkorange;"
                                                @else style="background-color:#00BCD4;" @endif>
                                            <option value="0" @if($base->leader_check_result=="0") selected @endif>
                                                Recorect
                                            </option>
                                            <option value="1" @if($base->leader_check_result=="1") selected @endif>
                                                Complete
                                            </option>
                                            <option value="2" @if($base->leader_check_result=="2") selected @endif>
                                                Edited
                                            </option>
                                            <option value="3"
                                                    @if($base->leader_check_result!="0" &&$base->leader_check_result!="1"  && $base->leader_check_result!="2"  && $base->leader_check_result!="3"  ) selected @endif>
                                                Not yet check
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="" value=" {{$base->leader_check_problem}}"
                                               class="baseLeaderCheckingProblem" data="{{$base->id}}"
                                               title="{{$base->leader_check_problem}}" placeholder="No problem found!">
                                    </td>
                                    <td>

                                    </td>

                                    <td>
                                        <select name="" id="" class="form-control" disabled="">
                                            <option value="0">Recorect</option>
                                            <option value="1">Complete</option>
                                            <option value="2">Edited</option>
                                            <option value="3">Not yet check</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text">
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>
                    {{ $bases->links() }}

                </div>

            </div>
            <div class="panel-default">
                <div class="panel-heading">
                    <h4>Report Daily</h4>
                </div>
                <div class="panel-body" style="border:1px solid #ddd">
                    <div class="report">
                        <select name="select_report" id="select_report" class="form-control">
                            <option value="today">Today</option>
                            <option value="month">This Month</option>
                            <option value="year">This Year</option>
                            <option value="last_year">Last Year</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                    <div class="report">
                        <b>OR</b>
                    </div>
                    <div class="report">
                        <select name="" id="dateReport" class="form-control">
                            <option value="">Select Date</option>
                            @for($i=1;$i<=31;$i++)
                                <option value="@if($i<=10)0{{$i}}@else{{$i}}@endif">@if($i<10)
                                        0{{$i}} @else {{$i}} @endif</option>
                            @endfor
                        </select>
                    </div>

                    <div class="report">
                        <select name="" id="monthReport" class="form-control">
                            <option value="">Select Month</option>
                            @for($i=1;$i<=12;$i++)
                                <option value="@if($i<=10)0{{$i}}@else{{$i}}@endif">@if($i<10)
                                        0{{$i}}@else{{$i}}@endif</option>

                            @endfor
                        </select>
                    </div>
                    <div class="report">
                        <input type="text" name="report" id="yearReport" class="form-control" placeholder="2017">
                    </div>
                    <div class="report" style="text-align: left;">
                        <button type="button" class="btn btn-success load"><i class="glyphicon glyphicon-download-alt"></i> Load</button>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="progress loadingData hidden">
                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            Loading Data
                        </div>
                    </div>
                    <div class="reportResult">

                    </div>

                </div>
            </div>
    </div>
    </form>
    </div>
    <script type="text/javascript" charset="utf-8">
        $(".table td.version input").on('mouseover', function () {
            var isActive = $(this).parent().hasClass('isActive');
            if (isActive == false) {
                $(this).parent().addClass("isActive")
                isActive = true;
            } else if (isActive == true) {
                $(this).parent().removeClass("isActive")
                isActive = false;
            }

        });
        $(".table td.userby input").on('mouseover', function () {
            var isActive = $(this).parent().hasClass('useByActive');
            if (isActive == false) {
                $(this).parent().addClass("useByActive")
                isActive = true;
            } else if (isActive == true) {
                $(this).parent().removeClass("useByActive")
                isActive = false;
            }

        });
        $(".table td.baseURL input").on('mouseover', function () {
            var isActive = $(this).parent().hasClass('baseURLActive');
            if (isActive == false) {
                $(this).parent().addClass("baseURLActive")
                isActive = true;
            } else if (isActive == true) {
                $(this).parent().removeClass("baseURLActive")
                isActive = false;
            }

        });
        $("#baseURL").on("keyup", function () {
            var baseValue = $(this).val();
            $(".baseURLActive input").val(baseValue);
        });

        function changeInput(controlBox) {
            var vC = $("#" + controlBox + "").val();
            var tx=$("#" + controlBox + "").find(":selected").text();
            $(".isActive input[type='text']").val(tx);
            $(".isActive input[type='hidden']").val(vC);
            $(".isActive").removeClass("isActive");
        }
        $("#changeUseBy").on('change', function () {
            var vC = $(this).val();
            var hiddenId = $(this).attr('id');
            var attr = $("#" + hiddenId + " :selected").attr('data');
            $(".useByActive  input").val(vC);
            $(".useByActive  input[type='hidden']").val(attr);
            $(".useByActive").removeClass("useByActive");
        });
        $(".userby input").mouseout(function () {
            var valExist = $(this).val();
            if (valExist) {
                $(this).parent().removeClass("useByActive");
            }
        });
        $(".version input").mouseout(function () {
            var valExist = $(this).val();
            if (valExist) {
                $(this).parent().removeClass("isActive");
            }
        });
        var baseId;
        $(".tdLayout input").click(function () {
            var vl=$(this).val();

            $(".modal").modal("show");
            baseId = $(this).attr('data');
        });

        $("body").on('click', '.assignLayout', function () {
            var layout = $("#layout").val();
            var array = JSON.parse("[" + layout + "]");
            var ln=array.length;
            jQuery.ajax({
                url: "{{route('SaveLayout')}}",
                type: "GET",
                dataType: "json",
                data: {baseId: baseId, layout: layout},
                success: function (data) {
                    console.log(data)
                },
                complete: function (data) {
                    location.reload();
                }
            });
        });
        $("body").on('mouseout','#layout',function () {
            var layout = $("#layout").val();
            var array = JSON.parse("[" + layout + "]");
            var ln=array.length;
            $(".totalSelect").html(ln+" layout selected");
        });

        function onCopyAndPass() {

        }
        $("body").on('change', '#leaderChingResult', function () {
            var baseId = $(this).attr('data');
            var baseName = $(this).val();
            $("#leaderChingResult optoin[value=" + baseName + "]").attr('selected', 'selected');
            if (baseName == "0") {
                $(this).css({"background-color": "red"});

            } else if (baseName == "1") {
                $(this).css({"background-color": "green"})
            } else if (baseName == "2") {
                $(this).css({"background-color": "darkorange"})
            } else if (baseName == "3") {
                $(this).css({"background-color": "#00BCD4"})
            }
            jQuery.ajax({
                url: "{{route('upateResuleBaseLeaderCheck')}}",
                type: "GET",
                dataType: "json",
                data: {baseName: baseName, baseId: baseId},
                success: function (data) {

                },
                complete: function (data) {

                },
                error: function () {

                }
            });

        });

        $("body").on('keyup', '.baseLeaderCheckingProblem', function () {
            var baseId = $(this).attr('data');
            var val = $(this).val();
            if (val) {
                jQuery.ajax({
                    url: "{{route('leaderCheckingProblem')}}",
                    type: "GET",
                    dataType: "json",
                    data: {baseId: baseId, val: val},
                    success: function () {

                    },
                    complete: function (data) {

                    },
                    error: function () {

                    }
                });
            }

        });
        $("body").on('keyup', '.note', function () {
            var baseId = $(this).attr('data');
            var val = $(this).val();
            if (val) {
                jQuery.ajax({
                    url: "{{route('leaderCheckingNote')}}",
                    type: "GET",
                    dataType: "json",
                    data: {baseId: baseId, val: val},
                    success: function () {

                    },
                    complete: function (data) {

                    },
                    error: function () {

                    }
                });
            }

        });
        $("#showNumrow").on('change', function () {
            var url = window.location.href;
            var number = $(this).val();
            var n = url.indexOf('?num_row');
            url = url.substring(0, n != -1 ? n : url.length);
            window.location.href = url + "?num_row=" + number;

        });
        var select_report = $("#select_report").val();
        var tableReport = "<table class='table table-bordered'><thead><tr><td>Member Name</td><td>Total</td></tr></thead><tbody>";
        var total = 0;
        var endTableReport = "</tbody></table>"
        jQuery.ajax({
            url: "{{route('reportBase')}}",
            type: "GET",
            dataType: "json",
            data: {select_report: select_report},
            beforeSend: function () {
                $(".loadingData").removeClass("hidden");
            },
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    tableReport += "<tr><td>" + data[i]['name'] + "</td><td>" + data[i]['Total'] + "</td></tr>"
                    total = total + data[i]['Total'];
                }
                tableReport += "<tr><td colspan='2'align='right'>Total:" + total + "</td></tr>";
                tableReport += endTableReport;
                $(".reportResult").html(tableReport);
            },
            complete: function () {
                $(".loadingData").addClass("hidden");
            }
        });
        $("#select_report").on('change', function () {
            var select_report = $("#select_report").val();
            var tableReport = "<table class='table table-bordered'><thead><tr><td>Member Name</td><td>Amount</td></tr></thead><tbody>";
            var endTableReport = "</tbody></table>";
            var total = 0;
            select_report = $(this).val();
            jQuery.ajax({
                url: "{{route('reportBase')}}",
                type: "GET",
                dataType: "json",
                data: {select_report: select_report},
                beforeSend: function () {
                    $(".loadingData").removeClass("hidden");
                },
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        tableReport += "<tr><td>" + data[i]['name'] + "</td><td>" + data[i]['Total'] + "</td></tr>";
                        total = total + data[i]['Total'];

                    }
                    tableReport += "<tr><td colspan='2'align='right'>Total:" + total + "</td></tr>";
                    tableReport += endTableReport;

                    $(".reportResult").html(tableReport);
                },
                complete: function () {
                    $(".loadingData").addClass("hidden");

                }
            });
        });

        $(".load").click(function () {
            var tableReport = "<table class='table table-bordered'><thead><tr><td>Member Name</td><td>Total</td></tr></thead><tbody>";
            var endTableReport = "</tbody></table>"
            var dateReport = $("#dateReport").val();
            var monthReport = $("#monthReport").val();
            var yearReport = $("#yearReport").val();
            var total = 0;
            jQuery.ajax({
                url: "{{route('loadReportBase')}}",
                type: "GET",
                dataType: "",
                data: {dateReport: dateReport, monthReport: monthReport, yearReport: yearReport},
                beforeSend: function () {
                    $(".loadingData").removeClass("hidden");
                },
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        tableReport += "<tr><td>" + data[i]['name'] + "</td><td>" + data[i]['Total'] + "</td></tr>";
                        total = total + data[i]['Total'];
                    }
                    tableReport += "<tr><td colspan='2'align='right'>Total:" + total + "</td></tr>";
                    tableReport += endTableReport;
                    $(".reportResult").html(tableReport);
                },
                complete: function () {
                    $(".loadingData").addClass("hidden");
                }
            });
        });
        $(document).ready(function () {
            $(".group").css({"display": "none"});
            $(".userby input").mouseover(function (e) {
                var x = $(this).position().top;
                var y = $(this).position().left;
                $(".group").css({"margin-top": x + "px"});
                $(".group").css({"margin-left": (y - 200) + "px"});
                $(".group").css({"display": "block"});
            });
            $(".userby input").keyup(function (e) {
                var x = $(this).position().top;
                var y = $(this).position().left;
                $(".group").css({"margin-top": x + "px"});
                $(".group").css({"margin-left": (y - 200) + "px"});
                $(".group").css({"display": "block"});
            });
            $(".group li").click(function () {
                var id = $(this).attr('data');
                var name = $(this).text();
                $(".useByActive input[type='text']").val(name);
                $(".useByActive input[type='hidden']").val(id);
                $(".group").css({"display": "none"});
                $(".useByActive").removeClass("useByActive");

            });
            $("body").click(function () {
                $(".group").css({"display": "none"});
            })
        });

    </script>
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Select Layout</h4>
                </div>
                <div class="modal-body">
                    <select name="layout[]" id="layout" multiple="multiple" class="form-control" style="height:300px;">
                        @if(!empty($layouts))
                            @foreach($layouts as $layout)
                                <option value="{{$layout->id}}" data="{{$layout->name}}">{{$layout->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <hr>
                    <p class="totalSelect"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary assignLayout">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
