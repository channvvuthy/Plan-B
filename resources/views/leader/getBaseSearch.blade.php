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
            <li><a href="{{route('createUser')}}">Base List</a></li>
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
                    <input type="text" name="search" id="" placeholder="Search here...">
                    <button type="submit">Search</button>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12" style="padding:0px;">
                    <div class="sort">
                        <label for="">Sort By Date</label>
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
                        <button type="submit">Filter</button>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Create By</th>
                            <th>Variation Name</th>
                            <th>Pattern Name</th>
                            <th>Version</th>
                            <th>Not</th>
                            <th>Used By</th>
                            <th>Layout</th>
                            <th>URL</th>
                            <th>Check By</th>
                            <th>Check Result</th>
                            <th>Check Problem</th>
                            <th>QC  Name</th>
                            <th>QC Check Result</th>
                            <th>QC Check Problem</th>

                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <select name="" id="version" onchange="changeInput('version')" class="form-control">
                                    <option value="VSS.01.1">VSS.01.1</option>
                                    <option value="VCS.02.1">VCS.02.1</option>
                                    <option value="VCA.01">VCA.01</option>
                                    <option value="VCA.02">VCA.02</option>
                                </select>
                            </td>
                            <td></td>
                            <td>

                                <select name="" id="changeUseBy" class="form-control">
                                    @if(!empty($groups))
                                    @foreach($groups as $group)
                                        <option value="{{$group->name}}" data="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                    @endif
                                    
                                </select>
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
                            <td>{{$base->id}}<input type="hidden" value="{{$base->id}}" name="id[]"></td>
                            <td>{{$base->name}}</td>
                            <td>{{$base->user->name}}</td>
                            <td>{{$base->variations->name}}</td>
                            <td>{{$base->patterns->name}}</td>
                            <td class="version">
                                <input type="text" name="version[]" id="" value="{{$base->version}}">
                            </td>
                            <td>
                                <input type="text" name="note[]" class="note" value="{{$base->note}}" data="{{$base->id}}" title="{{$base->note}}">
                            </td>
                            <td class="userby" >
                                <input type="text" name="used_by[]" id="" value="{{$base->column}}">
                                <input type="hidden" name="" value="">
                            </td>
                            <td class="tdLayout">
                                <input type="text" name="laout[]" id="" value="@if(!empty($base->layouts)) @foreach($base->layouts as $layout) {{$layout->name}}, @endforeach @endif" data="{{$base->id}}">
                            </td>
                            <td class="baseURL">
                                {{-- <input type="text" name="url[]" id="" class="baseURL"> --}}
                                <a href="{{$base->url.'/'.$base->name}}">{{$base->url.'/'.$base->name}}</a>
                            </td>
                            <td>
                                @if(Auth::check())
                                    <p>{{Auth::user()->name}}</p>
                                @endif
                            </td>
                            
                            <td>
                                <select name="" id="leaderChingResult" data="{{$base->id}}" class="form-control" @if($base->leader_check_result=="0") style="background-color:red;" @elseif($base->leader_check_result=="1") style="background-color:green;" @elseif($base->leader_check_result=="2" )style="background-color:darkorange;" @else style="background-color:#00BCD4;" @endif>
                                   <option value="0" @if($base->leader_check_result=="0") selected @endif>Recorect</option>
                                    <option value="1" @if($base->leader_check_result=="1") selected @endif>Complete</option>
                                    <option value="2" @if($base->leader_check_result=="2") selected @endif>Edited</option>
                                    <option value="3" @if($base->leader_check_result!="0" &&$base->leader_check_result!="1"  && $base->leader_check_result!="2"  && $base->leader_check_result!="3"  ) selected @endif>Not yet check</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="" value=" {{$base->leader_check_problem}}" class="baseLeaderCheckingProblem" data="{{$base->id}}" title="{{$base->leader_check_problem}}" placeholder="No problem found!">
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
                
            </div>
            
        </div>
    </div>
</form>
</div>
<script type="text/javascript" charset="utf-8">
    $(".table td.version input").on('mouseover',function(){
        var isActive= $(this).parent().hasClass('isActive');
        if(isActive==false){
            $(this).parent().addClass("isActive")
            isActive=true;
        }else if(isActive==true){
            $(this).parent().removeClass("isActive")
            isActive=false;
        }
        
    });
    $(".table td.userby input").on('mouseover',function(){
        var isActive= $(this).parent().hasClass('useByActive');
        if(isActive==false){
            $(this).parent().addClass("useByActive")
            isActive=true;
        }else if(isActive==true){
            $(this).parent().removeClass("useByActive")
            isActive=false;
        }
        
    });
    $(".table td.baseURL input").on('mouseover',function(){
        var isActive= $(this).parent().hasClass('baseURLActive');
        if(isActive==false){
            $(this).parent().addClass("baseURLActive")
            isActive=true;
        }else if(isActive==true){
            $(this).parent().removeClass("baseURLActive")
            isActive=false;
        }
        
    });
    $("#baseURL").on("keyup",function(){
        var baseValue=$(this).val();
        $(".baseURLActive input").val(baseValue);
    });

    function changeInput(controlBox){
        var vC=$("#"+controlBox+"").val();
        $(".isActive input").val(vC);
        $(".isActive").removeClass("isActive");
    }
    $("#changeUseBy").on('change',function(){
        var vC=$(this).val();
        var hiddenId=$(this).attr('id');
        var attr=$("#"+hiddenId+" :selected").attr('data');
        $(".useByActive  input").val(vC);
        $(".useByActive  input[type='hidden']").val(attr);
        $(".useByActive").removeClass("useByActive");
    });
    $(".userby input").mouseout(function(){
        var valExist=$(this).val();
        if(valExist){
            $(this).parent().removeClass("useByActive");
        }
    });
    $(".version input").mouseout(function(){
        var valExist=$(this).val();
        if(valExist){
            $(this).parent().removeClass("isActive");
        }
    });
    var baseId;
    $(".tdLayout input").click(function(){
        $(".modal").modal("show");
        baseId=$(this).attr('data');
    });
    
    $("body").on('click','.assignLayout',function(){
        var layout=$("#layout").val();
        jQuery.ajax({
            url:"{{route('SaveLayout')}}",
            type:"GET",
            dataType:"json",
            data:{baseId:baseId,layout:layout},
            success:function(data){
                console.log(data)
            },
            complete:function(data){
               location.reload();
            }
        });
    });

    function onCopyAndPass(){

    }
    $("body").on('change','#leaderChingResult',function(){
        var baseId=$(this).attr('data');
        var baseName=$(this).val();
        $("#leaderChingResult optoin[value="+baseName+"]").attr('selected','selected');
        if(baseName=="0"){
            $(this).css({"background-color":"red"});

        }else if(baseName=="1"){
            $(this).css({"background-color":"green"})
        }else if(baseName=="2"){
            $(this).css({"background-color":"darkorange"})
        }else if(baseName=="3"){
            $(this).css({"background-color":"#00BCD4"})
        }
        jQuery.ajax({
            url:"{{route('upateResuleBaseLeaderCheck')}}",
            type:"GET",
            dataType:"json",
            data:{baseName:baseName,baseId:baseId},
            success:function(data){
                
            },
            complete:function(data){
                
            },
            error:function(){

            }
        });

    });

    $("body").on('keyup','.baseLeaderCheckingProblem',function(){
        var baseId=$(this).attr('data');
        var val=$(this).val();
        if(val){
            jQuery.ajax({
                url:"{{route('leaderCheckingProblem')}}",
                type:"GET",
                dataType:"json",
                data:{baseId:baseId,val:val},
                success:function(){

                },
                complete:function(data){
                
                },
                error:function(){

                }
            });
        }

    });
    $("body").on('keyup','.note',function(){
        var baseId=$(this).attr('data');
        var val=$(this).val();
        if(val){
            jQuery.ajax({
                url:"{{route('leaderCheckingNote')}}",
                type:"GET",
                dataType:"json",
                data:{baseId:baseId,val:val},
                success:function(){

                },
                complete:function(data){
                
                },
                error:function(){

                }
            });
        }

    });
     $("#showNumrow").on('change',function(){
        var url=window.location.href;
        var number=$(this).val();
        var n = url.indexOf('?num_row');
        url = url.substring(0, n != -1 ? n : url.length);
        window.location.href=url+"?num_row="+number;

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
                                    <option value="{{$layout->id}}">{{$layout->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary assignLayout">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@stop
