<div class="col-md-2 navLeft">
    <ul class="list-unstyled">

        @if(Auth::user()->group['type']=='base')


            <li><a href="{{route('createBaseType')}}"><i class="fa fa-id-card" ></i> Variation
                </a></li>
            <li><a href="{{route('createPattern')}}"><i class="fa fa-tags" ></i> Pattern</a>
            </li>


            <li><a href="{{route('uploadLayout')}}"><i class="fa fa-map" aria-hidden="true"></i> UploadLayout</a></li>
                    <li><a href="{{route('createLayout')}}"><i class="fa fa-shopping-bag"></i> Layout Name</a></li>
            <li><a href="{{route('uploadVersion')}}"><i class="glyphicon glyphicon-book"></i>
                    Version</a></li>
            <li><a href="{{route('uploadType')}}"><i class="glyphicon glyphicon-leaf"></i>
                    Type</a></li>
            <li><a href="{{route('getMemberBase')}}"><i class="glyphicon glyphicon-link"></i>&nbsp;Assign Taks</a></li>
            <li><a href="{{route('listBaseMember')}}"><i class="glyphicon glyphicon-folder-open" ></i>&nbsp; All Base</a>
            </li>
            <li><a href="{{route('baseDirectory')}}"><i class="glyphicon glyphicon-paperclip" ></i> Directory</a>
            </li>
            <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-log-out" ></i> Logout</a>
            </li>
        @elseif(Auth::user()->group['type']=='first')
            <li><a href="{{route('leaderFirstGetBase')}}"><i class="fa fa-envira"></i> Get Base</a>
            </li>
            <li><a href="{{route('addNewOrder')}}"><i class="fa fa-address-book" ></i> Add New Order</a>
            </li>
            <li><a href="{{route('leaderFirstGetOrder')}}"><i class="fa fa-address-card-o" ></i>  Order</a>
            </li>
            <li><a href="{{route('FirstLeaderReport')}}"><i class="fa fa-print"></i> Report</a></li>
            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
            </li>

        @endif
    </ul>
</div>