@extends('layout.leaders.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('createUser')}}" style="width:170px;"><i class="fa fa-address-card-o"></i> Order</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('leaderFirstGetOrder')}}" class="SystemForm" method="get" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            @if($errors->first('danger'))
                <div class="alert alert-danger">{{$errors->first('danger')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Order</h4>
                </div>
                <div class="panel-body" style="padding:15px;">
                    <div class="box_search">
                        <div class="box">
                            <select name="action" id="">
                                <option value="">Choose Action</option>
                                <option value="update">Update</option>
                                <option value="delete">Delete</option>
                            </select>
                            <div class="goTop">
                                <button type="submit" name="save" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-save"></i> Save</button>
                            </div>
                        </div>
                        <div class="box">
                            <input type="text" placeholder="Enter locaton order" name="listFolder">
                            <div class="goTop">
                                <button type="submit" name="list" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-inbox"></i> List</button>
                            </div>
                        </div>
                        <div class="box">
                            <input type="text" placeholder="Search ..." name="searchOrder">
                            <div class="goTop">
                                <button type="submit" name="search" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-search"></i> Search Now</button>
                            </div>
                        </div>

                    </div>
                    <div class="btn btn-success btn-block button_option"><i class="glyphicon glyphicon-signal"></i> Other Option</div>

                    <hr>
                    <div class="clear-top-simple"></div>
                    <div class="order_list">
                        <table>
                            <thead>
                            <tr>
                                <th></th>
                                <th>Order_ID</th>
                                <th>Base Name</th>
                                <th>Layout_ID</th>
                                <th>Staff_Name</th>
                                <th>Group_Name</th>
                                <th>Type</th>
                                <th>Block</th>
                                <th>Sub</th>
                                <th>Leader_Check_Result</th>
                                <th>Leader_Check_Problem</th>
                                <th>QC_Name</th>
                                <th>QC_Check_Result</th>
                                <th>QC_Check_Problem</th>
                                <th>Dateline</th>
                                <th>Dateready</th>
                                <th>Ready Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style="background-color:#dff0d8">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <select name="" id="" class="form-control user_select">
                                        @if(!empty($users))
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}"
                                                        data-name="{{$user->name}}">{{$user->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control group_first" name="group_first">
                                        @if(!empty($groups))
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>

                                <td></td>
                                <td>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="date" class="form-control">
                                </td>
                                <td>
                                    <input type="date" class="form-control">
                                </td>
                                <td>
                                    <input type="date" class="form-control">
                                </td>
                            </tr>
                            @if(!empty($orders))
                                @foreach($orders as $order)
                                    <tr>
                                        <td><input type="checkbox" name="deleteID[]" id="" value="{{$order->id}}"></td>
                                        <td>{{$order->order_id}}</td>
                                        <td>{{$order->base_name}}</td>
                                        <td>{{$order->layout}}</td>
                                        <td>
                                            @if(!empty($order->user->name))
                                                <input type="text" name="user[]" id="" value="{{$order->user->name}}"
                                                       class="form-control userby" title="{{$order->user->name}}">
                                                <input type="hidden" name="userID[]" value="{{$order->user->id}}"
                                                       class="userHidden">
                                            @else
                                                <input type="text" name="user[]" id="" value=""
                                                       class="form-control userby" title="">
                                                <input type="hidden" name="userID[]" value=""
                                                       class="userHidden">
                                            @endif

                                        </td>
                                        <input type="hidden" name="orderID[]" value="{{$order->id}}">
                                        <td>
                                            <input type="text" name="group[]" class="form-control groupName"
                                                   value="{{$order->group_name}}" title="{{$order->group_name}}">

                                        </td>
                                        <td>
                                            <input type="text" name="type[]" id="" value="{{$order->type}}"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{$order->top_page}}"
                                                   name="top[]">
                                        </td>
                                        <td>
                                            <input type="text" value="{{$order->sup_page}}" class="form-control"
                                                   name="sub">
                                        </td>
                                        <td>
                                            <select name="leader_check_result" id=""
                                                    class="leader_check_result form-control" data-id="{{$order->id}}"
                                                    @if($order->leader_check_result=="")
                                                    style="color:#292b2c;"
                                                    @elseif($order->leader_check_result=="1")
                                                    style="color:#d9534f;"

                                                    @elseif($order->leader_check_result=="2")
                                                    style="color:#f0ad4e;"

                                                    @elseif($order->leader_check_result=="3")
                                                    style="color:#5cb85c;"

                                                    @elseif($order->leader_check_result=="4")
                                                    style="color:#0275d8;"
                                                    @endif


                                            >
                                                <option value="0"
                                                        @if($order->leader_check_result=="") selected="selected" @endif>
                                                    Leader Check
                                                </option>
                                                <option value="1"
                                                        @if($order->leader_check_result=="1") selected="selected" @endif>
                                                    Recorrect
                                                </option>
                                                <option value="2"
                                                        @if($order->leader_check_result=="2") selected="selected" @endif>
                                                    Warning
                                                </option>
                                                <option value="3"
                                                        @if($order->leader_check_result=="3") selected="selected" @endif>
                                                    Complete
                                                </option>
                                                <option value="4"
                                                        @if($order->leader_check_result=="4") selected="selected" @endif>
                                                    Ok
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="leader_description[]"
                                                   class="form-control leader_description" data-order="{{$order->id}}" value="{{$order->leader_check_description}}">
                                        </td>
                                        <td>
                                            <input type="text" name="qc_name[]" id="" class="form-control">
                                        </td>
                                        <td>
                                            <select name="qc_result[]" id="" class="form-control" disabled

                                                    @if($order->qc_check_result=="")
                                                    style="color:#292b2c;"
                                                    @elseif($order->qc_check_result=="1")
                                                    style="color:#d9534f;"

                                                    @elseif($order->qc_check_result=="2")
                                                    style="color:#f0ad4e;"

                                                    @elseif($order->qc_check_result=="3")
                                                    style="color:#5cb85c;"

                                                    @elseif($order->qc_check_result=="4")
                                                    style="color:#0275d8;"
                                                    @endif
                                            >
                                                <option value="0"
                                                        @if($order->qc_check_result=="") selected="selected" @endif>QC
                                                    Check
                                                </option>
                                                <option value="1"
                                                        @if($order->qc_check_result=="1") selected="selected" @endif>
                                                    Recorrect
                                                </option>
                                                <option value="2"
                                                        @if($order->qc_check_result=="2") selected="selected" @endif>
                                                    Warning
                                                </option>
                                                <option value="3"
                                                        @if($order->qc_check_result=="3") selected="selected" @endif>
                                                    Complete
                                                </option>
                                                <option value="4"
                                                        @if($order->qc_check_result=="4") selected="selected" @endif>Ok
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="qc_description[]" id="" class="form-control"
                                                   disabled>
                                        </td>
                                        <td>
                                            <input type="text" name="dateline[]" value="{{$order->dateline }}"
                                                   class="form-control">
                                            <input type="hidden" name="dateline_hidden[]">

                                        </td>

                                        <td>
                                            <input type="text" class="form-control" value="{{$order->date_ready}}"
                                                   name="date_ready[]">
                                        </td>
                                        <td>
                                            <input type="text" class="{{($order->status)?'Ready':'Not Yet Complete'}}"
                                                   name="status[]">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                    @if(!empty($users))
                        <ul class="list-unstyled user_in_group">
                            @foreach($users as $user)
                                <li value="{{$user->id}}" data-name="{{$user->name}}">{{$user->name}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(!empty($groups))
                        <ul class="list-unstyled group_firsts">
                            @foreach($groups as $group)
                                <li value="{{$group->id}}" name="{{$group->name }}">{{$group->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
        {{--Modal Option Filer--}}
        <div class="modal fade modal_option" id="modal-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('filterOrder')}}" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Filter</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="start" id="start" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <b style="display: block;margin-top:9px;" >To</b>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="to" id="to" class="form-control">
                                </div>

                            </div>
                            <br>
                            <hr>
                            <br>

                            <div class="row filter">
                                <div class="col-md-12">
                                    <label class="checkbox-inline">
                                        <input type="radio" value="stock" name="filter_component">Stock
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="upload" name="filter_component" >Uploaded
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="rest_date" name="filter_component" >Rest Dateline
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="not_complete" name="filter_component" >Not Complete
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="ready" name="filter_component" >Ready
                                    </label>

                                </div>

                            <br>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-success"><span class="fa fa-search"></span>
                                Search
                            </button>
                        </div>
                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{--End Modal Option--}}
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".user_in_group").css({"display": "none"});
            $(".userby").mouseover(function (e) {
                var x = $(this).position().top;
                var y = $(this).position().left;
                $(".user_in_group").css({"margin-top": (x + 200) + "px"});
                $(".user_in_group").css({"margin-left": (y + 125) + "px"});

                $(".group_firsts").removeAttr("style").hide();
                $(".user_in_group").css({"display": "block"});

            });
            $(".userby").keyup(function (e) {
                var x = $(this).position().top;
                var y = $(this).position().left;
                $(".user_in_group").css({"margin-top": (x + 200) + "px"});
                $(".user_in_group").css({"margin-left": (y + 125) + "px"});
                $(".user_in_group").css({"display": "block"});

            });
            $(".user_in_group li").click(function () {
                var id = $(this).attr('value');
                var name = $(this).text();
                $(".useByActive input[type='text']").val(name);
                $(".useByActive input[type='hidden']").val(id);
                $(".user_in_group").css({"display": "none"});
                $(".useByActive").removeClass("useByActive");

            });
            $("body").click(function () {
                $(".user_in_group").css({"display": "none"});
                $(".group_firsts").removeAttr("style").hide();
            })
        });
        $("table td .userby").on('mouseover', function () {
            var isActive = $(this).parent().hasClass('useByActive');
            if (isActive == false) {
                $(this).parent().addClass("useByActive")
                isActive = true;
            } else if (isActive == true) {
                $(this).parent().removeClass("useByActive")
                isActive = false;
            }

        });
        $(".user_select").on('change', function () {
            var id = $(this).val();
            var text = $(".user_select option:selected").text();
            $(".useByActive .userby").val(text);
            $(".useByActive .userHidden").val(id);

        });

        $(".groupName").mouseover(function (event) {
            /* Act on the event */
            $(this).parent().addClass('isActive');
            var x = $(this).position().top;
            var y = $(this).position().left;
            $(".group_firsts").css({"margin-top": (x + 200) + "px"});
            $(".group_firsts").css({"margin-left": (y + 132) + "px"});
            $(".group_firsts").css({"display": "block"});
            $(".user_in_group").css({"display": "none"});

        });


        $(".group_first").change(function (event) {
            /* Act on the event */
            var value = $(".group_first option:selected").text();
            $(".isActive input").val(value);
        });
        $(".group_firsts li").on('click', function () {
            var textThis = $(this).text();
            $(".isActive input").val(textThis);
            $(".isActive").removeClass('isActive');
        });

        $('.leader_description').on('keyup keypress blur change', function (e) {
            // e.type is the type of event fired
            var id = $(this).attr('data-order');
            var value = $(this).val();
            jQuery.ajax({
                url: "{{route('update.order')}}",
                type: "GET",
                dataType: "json",
                data: {id: id, value: value},
                success: function (data) {
                    console.log(data);
                },
                error: function () {

                }
            });

        });
        $('.leader_check_result').on('change', function (e) {
            // e.type is the type of event fired
            var CheckResult = $(this).val();
            var id = $(this).attr('data-id');
            jQuery.ajax({
                url: "{{route('update.order')}}",
                type: "GET",
                dataType: "json",
                data: {CheckResult: CheckResult, id: id},
                success: function (data) {
                    window.location.reload();
                },
                error: function () {

                }
            });

        });
        $(function () {
            $("#start").datepicker({dateFormat: 'yy-dd-mm'}).val();
            $("#to").datepicker({dateFormat: 'yy-dd-mm'}).val();
        });
        $(".button_option").click(function () {
            $(".modal_option").modal('show');
        });
    </script>
@stop

