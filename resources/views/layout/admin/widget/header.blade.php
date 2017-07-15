<div class="header bg-primary">
    <div class="col-md-6">
        <div class="systemTitle font-impact" style="margin:10px 0px 0px 0px;">
            Employee Management System of Plan-B
        </div>

    </div>
    <div class="col-md-6">
        <div class="systemAlert pull-right colorWrite">
            <ul class="list-unstyled">
                <li><a href="{{route('updateMyProfile')}}"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->name}}</a></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>