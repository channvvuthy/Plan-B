@extends('layout.leaders.master')
@section('title')
Leader
@stop
@section('content')
@include('layout.leaders.widget.header')
@include('layout.leaders.widget.navbar')
<div class="col-md-10" style="overflow: auto;width: 1124px;">
    <div class="pangasu float">
        <ul class="list-unstyled">
            <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
            <li><a href="{{route('listBaseMember')}}">Base List</a></li>
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
                    <select>
                        <option value="">Choose Action</option>
                        <option value="">Delete</option>
                        <option value="">Update</option>
                    </select>
                    <button style="submit">Save</button>
                </div>
                <div class="col-md-4 list" style="padding-left:0px">
                    <input type="text" name="listFolder" id="" placeholder="Enter Location File">
                    <button type="submit">List</button>
                </div>
                <div class="col-md-4 search" style="padding-left:0px">
                    <input type="text" name="" id="" placeholder="Search here...">
                    <button type="submit">Search</button>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12" style="padding:0px;">
                    <div class="sort">
                        <label for="">Sort By Date</label>
                    </div>
                    <div class="sort">
                        <input type="date" name="" id="">
                    </div>
                    <div class="sort">
                        <p>To</p>
                    </div>
                    <div class="sort">
                        <input type="date" name="" id="">
                    </div>
                    <div class="sort" style="margin-top:7px;">
                        <button type="submit">Sort</button>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="showRecord">
                        <div class="show">
                            <label for="">Show Record</label>
                        </div>
                        <div class="show">
                            <select name="" id="">
                                <option value="">10</option>
                                <option value="">20</option>
                                <option value="">30</option>
                                <option value="">50</option>
                                <option value="">100</option>
                                <option value="">500</option>
                                <option value="">1000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <br>
                <table class="table-bordered table" oncontextmenu="onCopyAndPass()">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Create By</th>
                            <th>Variation Name</th>
                            <th>Pattern Name</th>
                            <th>Version</th>
                            <th>Submited QC</th>
                        </tr>

                    </thead>
                    <tbody>

                       @if(!empty($bases))
                            @foreach($bases as $base)
                                <tr>
                                    <td>{{$base->id}}</td>
                                    <td>{{$base->name}}</td>
                                    <td>{{$base->users->name}}</td>
                                    <td>{{$base->variations->name}}</td>
                                    <td>{{$base->patterns->name}}</td>
                                    <td>{{$base->version}}</td>
                                    <td class="baseCheck" >@if($base->get_it) <input type="checkbox" name="" data="{{$base->id}}" checked="checked"> @else <input type="checkbox" name="" data="{{$base->id}}">@endif</td>
                                </tr>
                            @endforeach
                       @endif
                    </tbody>

                </table>


            </div>

        </div>
    </div>
</form>
</div>
<script type="text/javascript" charset="utf-8">
    $(".baseCheck input").click(function(){
        var baseId=$(this).attr('data');
        jQuery.ajax({
            url:"{{route('submitQC')}}",
            dataType:"json",
            type:"GET",
            data:{baseId:baseId},
            success:function(){

            },
            complete:function(){

            }
        });
    });
    function onCopyAndPass(){

    }

    </script>
@stop
