@php $ordersBlades =App\Models\Order::orderBy('id','desc')->paginate(200);@endphp
@php $total=count($ordersBlades);@endphp

@if(!empty($ordersBlades))
    <form action="{{route('member.index')}}" class="SystemForm" method="get" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{Session::token()}}">
        @if($errors->first('notice'))
            <div class="alert alert-success">{{$errors->first('notice')}}</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>My Orders</h4>
            </div>
            <div class="panel-body" style="padding:10px;">
                <div class="boxList">
                    <div class="boxs">
                        <input type="text" name="listOrder" id="" class="form-control"
                               placeholder="Enter your order locatin ">
                    </div>
                    <div class="boxs">
                        <div class="bt">
                            <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-inbox"></i> List</button>
                        </div>

                    </div>
                    <div class="boxs">
                        <input type="text" name="search" id="" class="form-control" placeholder="Search...">
                    </div>
                    <div class="boxs">
                        <div class="bt">
                            <button type="submit" class="btn btn-success btn-block"><i class="glyphicon-search glyphicon"></i> Search</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="memberFilter">
                    <div class="box">
                        <input type="text" name="start" id="start" class="form-control">
                    </div>
                    <div class="box">
                        <b>To</b>
                    </div>
                    <div class="box">
                        <input type="text" name="to" id="to" class="form-control">
                    </div>
                    <div class="box">
                        <label class="checkbox-inline">
                            <span>Ready</span><input type="radio" value="ready" name="optionFilter">
                        </label>
                        <label class="checkbox-inline">
                            <span>Not Yet Complete</span><input type="radio" value="not_yet" name="optionFilter">
                        </label>
                        <label class="checkbox-inline">
                            <span>Rest Deadline</span><input type="radio" value="reast_deadline" name="optionFilter">
                        </label>
                    </div>
                    <div class="box">
                        <div>
                            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-filter"></i> Filter</button>

                        </div>
                    </div>

                </div>

                <hr>

                <table class="table-bordered table-responsive table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Deadline</th>
                        <th>base_name</th>
                        <th>layout_name</th>
                        <th>type</th>
                        <th>qc_check_name</th>
                        <th>qc_check_result</th>
                        <th>qc_check_description</th>
                        <th>qc_second_check_name</th>
                        <th>qc_second_check_result</th>
                        <th>qc_second_check_description</th>
                        <th>status</th>
                        <th>date_ready</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            @php $qcs=DB::select("SELECT groups.name,groups.type,users.name as UserName,users.id as UserID FROM groups LEFT JOIN users ON groups.id =users.group_id WHERE groups.type='qc'");@endphp
                            <select name="qc_check_name" id="qc_check_name" class="form-control qc_check_name">
                                @if(!empty($qcs))

                                    @foreach($qcs as $qc)

                                        <option value="{{$qc->UserName}}">{{$qc->UserName}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            @php $qcs=DB::select("SELECT groups.name,groups.type,users.name as UserName,users.id as UserID FROM groups LEFT JOIN users ON groups.id =users.group_id WHERE groups.type='qc'");@endphp
                            <select name="qc_check_name" id="qc_check_name" class="form-control qc_check_name">
                                @if(!empty($qcs))

                                    @foreach($qcs as $qc)

                                        <option value="{{$qc->UserName}}">{{$qc->UserName}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @if(!empty($ordersBlades))
                        <?php $total_Incorrect = 0;$total_qc = 0;?>
                        @foreach($ordersBlades as $order)
                            @if($order->leader_check_result!="")
                                @php $total_Incorrect=$total_Incorrect+1;  @endphp
                            @endif
                            @if($order->qc_check_result!="")
                                @php $total_qc=$total_qc+1;  @endphp

                            @endif
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->dateline}}</td>
                                <td>{{$order->base_name}}</td>
                                <td>{{$order->layout}}</td>
                                <td>{{$order->type}}</td>


                                <td>
                                    <input type="text" name="qc_check_name" id="" class="form-control"
                                           value="{{$order->qc_check_name}}">
                                </td>
                                <td>

                                    <select name="qc_check_result" id=""
                                            class="leader_check_result form-control" data-id="{{$order->id}}"
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
                                                @if($order->qc_check_result=="") selected="selected" @endif>
                                            Leader Check
                                        </option>
                                        <option value="1"
                                                @if($order->qc_check_result=="1") selected="selected" @endif>
                                            Re-correct
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
                                                @if($order->qc_check_result=="4") selected="selected" @endif>
                                            Ok
                                        </option>
                                    </select>

                                </td>
                                <td>
                                    <input type="text" name="qc_check_description" id="" class="form-control"
                                           value="{{$order->qc_check_description}}">
                                </td>
                                <td>
                                    <input type="text" name="qc_second_check_name" id="" class="form-control"
                                           value="{{$order->qc_second_check_name}}">
                                </td>
                                <td>

                                    <select name="qc_check_result" id=""
                                            class="leader_check_result form-control" data-id="{{$order->id}}"
                                            @if($order->qc_second_check_result=="")
                                            style="color:#292b2c;"
                                            @elseif($order->qc_second_check_result=="1")
                                            style="color:#d9534f;"

                                            @elseif($order->qc_second_check_result=="2")
                                            style="color:#f0ad4e;"

                                            @elseif($order->qc_second_check_result=="3")
                                            style="color:#5cb85c;"

                                            @elseif($order->qc_second_check_result=="4")
                                            style="color:#0275d8;"
                                            @endif

                                    >
                                        <option value="0"
                                                @if($order->qc_second_check_result=="") selected="selected" @endif>
                                            Leader Check
                                        </option>
                                        <option value="1"
                                                @if($order->qc_second_check_result=="1") selected="selected" @endif>
                                            Re-correct
                                        </option>
                                        <option value="2"
                                                @if($order->qc_second_check_result=="2") selected="selected" @endif>
                                            Warning
                                        </option>
                                        <option value="3"
                                                @if($order->qc_second_check_result=="3") selected="selected" @endif>
                                            Complete
                                        </option>
                                        <option value="4"
                                                @if($order->qc_second_check_result=="4") selected="selected" @endif>
                                            Ok
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="qc_second_check_description" id=""
                                           value="{{$order->qc_second_check_description}}">
                                </td>
                                <td>
                                    <input type="text" name="" id=""
                                           value="@if($order->status==1) Complete @else Not Yet Complete @endif">
                                </td>
                                <td>
                                    <input type="text" name="" id="" value="{{$order->date_ready}}">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <hr>
                <div class="alert alert-success">All Group</div>
                <div class="clearfix"></div>
                <p>Total Order: {{@$total}} = 100%</p>
                <p>Re-Correct QC: {{@$total_qc}}= {{(@$total_qc)?(@$total_qc/@$total*100).'%':' 0%'}}</p>
                <p>Evaluate:

                    @if(@$total_qc>0)
                        @php $evaluate=@$total_qc/@$total*100; @endphp
                        @if($evaluate==0)
                            Perfect
                        @elseif($evaluate<=20)
                            Very Good
                        @elseif($evaluate<=30)
                            Good
                        @elseif($evaluate<=40)
                            Accepted
                        @else
                            Failed/Unsatisfactory

                        @endif
                    @else
                        Perfect
                    @endif
                </p>
                <hr>
            </div>

        </div>


        <script type="text/javascript">
            $('#start').datepicker({dateFormat: 'yy-mm-d'});
            $('#to').datepicker({dateFormat: 'yy-mm-d'});
            $('table').DataTable();
        </script>
    </form>
@endif