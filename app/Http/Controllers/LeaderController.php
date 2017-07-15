<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Group;
use App\Models\Layout;
use App\Models\Order;
use App\Models\Path;
use App\Models\Pattern;
use App\Models\User;
use App\Models\Variation;
use Auth;
use DB;
use Excel;
use File;
use Illuminate\Http\Request;
use PDF;

class LeaderController extends Controller
{
    public function getIndex()
    {
        $groups = Group::where('status', '1')->get();
        return view('leader.index')->withGroups($groups);
    }

    public function getCreateBaseType()
    {
        $variations = Variation::paginate(10);
        return view('leader.baseType')->withVariations($variations);
    }

    public function postCreateVariation(Request $request)
    {
        $this->validate($request, [
            'variationName' => 'required',
            'variationDescription' => 'required'
        ]);
        $variation = new Variation();
        $variation->name = $request->variationName;
        $variation->description = $request->variationDescription;
        $variation->save();
        return redirect()->back()->withInput()->withErrors(['notice' => 'variation has been created']);
    }

    public function getEditVariation(Request $request, $id)
    {
        $variation = Variation::find($id);
        return view('leader.editVariation')->withVariation($variation);
    }

    public function postUpdateVariation(Request $request)
    {
        $id = $request->id;
        $name = $request->variationName;
        $description = $request->variationDescription;
        $variation = Variation::find($id);
        $variation->name = $name;
        $variation->description = $description;
        $variation->save();
        return redirect()->route('createBaseType')->withInput()->withErrors(['notice' => 'variation has been update complete']);
    }

    public function getDeleteVariation($id)
    {
        $variation = Variation::find($id);
        $variation->delete();
        $variation->pattern()->detach($id);
        return redirect()->back()->withInput()->withErrors(['notice' => 'variation has been deleted']);
    }

    public function getAjaxUpdateOrder(Request $request)
    {
        $id = $request->id;
        if (!empty($request->CheckResult)) {
            $value = $request->value;
            $order = Order::find($id);
            $order->leader_check_result = $request->CheckResult;
            $order->save();
            return "Success";
        } else {
            $value = $request->value;
            $order = Order::find($id);
            $order->leader_check_description = $value;
            $order->save();
            return "Success";
        }
    }

    public function getActiveVariation($id)
    {
        $variation = Variation::find($id);
        if ($variation->status == 1) {
            $variation->status = "0";
        } else {
            $variation->status = "1";
        }
        $variation->save();
        return redirect()->back()->withInput()->withErrors(['notice' => 'variation has been update']);

    }

    public function getCreatePattern()
    {

        $variations = Variation::where('status', '1')->get();
        $patterns = Pattern::paginate(10);
        return view('leader.pattern')->withVariations($variations)->withPatterns($patterns);
    }

    public function postCreatePattern(Request $request)
    {
        $this->validate($request, [
            'patternName' => 'required',
            'patternURL' => 'required',

        ]);
        $patternFile = $request->patternFile;
        if (!empty($patternFile)) {
            $fileName = time() . $patternFile->getClientOriginalName();
            $ex = explode(".", $fileName);
            $ex = end($ex);
            if ($ex == "zip" || $ex == "ra") {
                $patternFile->move('uploads/', $fileName);

            } else {
                return redirect()->back()->withInput()->withErrors(['patternFile' => 'File allow only zip and ra']);
            }
            $pattern = new Pattern();
            $pattern->variation_id = $request->variation;
            $pattern->name = $request->patternName;
            $pattern->url = $request->patternURL;
            $pattern->file_name = $fileName;
            $pattern->description = $request->patternDescription;
            $pattern->save();
        } else {
            $pattern = new Pattern();
            $pattern->variation_id = $request->variation;
            $pattern->name = $request->patternName;
            $pattern->url = $request->patternURL;
            $pattern->description = $request->patternDescription;
            $pattern->save();
        }
        return redirect()->route('createPattern')->withErrors(['notice' => 'pattern has been created']);


    }

    public function getEditPattern($id)
    {
        $pattern = Pattern::find($id);
        $variations = Variation::where('status', '1')->get();
        return view('leader.editPattern')->withPattern($pattern)->withVariations($variations);
    }

    public function postUpdatePattern(Request $request)
    {
        $pattern = Pattern::find($request->id);
        $patternFile = $request->patternFile;
        if (!empty($patternFile)) {
            $fileName = time() . $patternFile->getClientOriginalName();
            $ex = explode(".", $fileName);
            $ex = end($ex);
            if ($ex == "zip" || $ex == "ra") {
                $patternFile->move('uploads/', $fileName);

            } else {
                return redirect()->back()->withInput()->withErrors(['patternFile' => 'File allow only zip and ra']);
            }
            $pattern->variation_id = $request->variation;
            $pattern->name = $request->patternName;
            $pattern->url = $request->patternURL;
            $pattern->file_name = $fileName;
            $pattern->description = $request->patternDescription;
            File::delete('uploads/' . $pattern->file_name);
            $pattern->save();
        } else {

            $pattern->variation_id = $request->variation;
            $pattern->name = $request->patternName;
            $pattern->url = $request->patternURL;
            $pattern->description = $request->patternDescription;
            $pattern->save();
        }
        return redirect()->route('createPattern')->withInput()->withErrors(['notice' => 'pattern update complete']);
    }

    public function getActivePattern($id)
    {
        $pattern = Pattern::find($id);
        if ($pattern->status == "1") {
            $pattern->status = "0";
        } else {
            $pattern->status = "1";
        }
        $pattern->save();
        return redirect()->route('createPattern')->withInput()->withErrors(['notice' => 'pattern has been updated']);
    }

    public function getDeletePattern($id)
    {
        $pattern = Pattern::find($id);
        $pattern->delete();
        return redirect()->route('createPattern')->withInput()->withErrors(['notice' => 'pattern has been deleted']);
    }

    public function getBaseDirectory()
    {
        $path = Path::where('user_id', Auth::user()->id)->first();
        return view('leader.createPath')->with('path', $path);
    }

    public function postBaseDirectory(Request $request)
    {
        $oldPath=$request->oldPath;
        $path = Path::where('user_id', Auth::user()->id)->first();
        $this->validate($request, [
            'pathName' => 'required',
            'pathDescription' => 'required'
        ]);
        if (!empty($path)) {
            $path->path = $request->pathName;
            $path->user_id = Auth::user()->id;
            $path->description = $request->pathDescription;
            $path->path_for = 'base';
            $path->save();
            return redirect()->back()->withInput()->withErrors(['notice' => 'directory has been updated!']);
        } else {
            $path = new Path();
            $path->path = $request->pathName;
            $path->user_id = Auth::user()->id;
            $path->description = $request->pathDescription;
            $path->path_for = 'base';
            $path->save();
            return redirect()->back()->withInput()->withErrors(['notice' => 'directory has been created!']);

        }
    }

    public function getBaseList(Request $request)
    {
        if (!empty($request->num_row)) {
            $bases = Base::where('used', NULL)->paginate($request->num_row);
        } else {
            $bases = Base::where('used', NULL)->paginate(100);
        }

        $layouts = Layout::where('status', '1')->get();
        $groups = Group::where('type', 'first')->get();
        return view('leader.getBaseList')->withBases($bases)->withLayouts($layouts)->withGroups($groups);
    }

    public function postBaseList(Request $request)
    {

    }

    public function getSaveLayoutAjax(Request $request)
    {
        $layout = $request->layout;
        $baseId = $request->baseId;
        $baseExist = \App\Models\BaseLayout::where('base_id', $baseId);
        $baseExist->delete();
        if (!empty($layout)) {
            foreach ($layout as $l) {
                DB::table('base_layout')->insert(['base_id' => $baseId, 'layout_id' => $l]);
            }
        }
        return "Save Success";

    }

    public function getLeaderUpdateBase(Request $request)
    {
        if (!empty($request->listFolder)) {
            $select = $this->openDir($request->listFolder);
            if (!empty($select)) {
                $bases = Base::whereIn('name', $select)->get();
                return view('leader.listFolder')->with('bases', $bases);
            }
            return redirect()->back();
        }
        if (!empty($request->search)) {
            $search = $request->search;
            $bases = Base::where('name', 'LIKE', '%' . $search . '%')->get();
            $layouts = Layout::where('status', '1')->get();
            $groups = Group::where('type', 'first')->get();
            return view('leader.getBaseSearch')->withBases($bases)->withLayouts($layouts)->withGroups($groups);

        }
        if (!empty($request->from && !empty($request->to))) {
            $from = $request->from;
            $from = explode("-", $from);
            $yearFrom = $from[0];
            $monthFrom = $from[1];
            $dateFrom = $from[2];
            $dateFrom;
            $to = $request->to;
            $to = explode("-", $to);
            $yearTo = $to[0];
            $monthTo = $to[1];
            $dateTo = $to[2];
            $bases = Base::whereMonth('created_at', '>=', $monthFrom)->whereMonth('created_at', '<=', $monthTo)->whereYear('created_at', '>=', $yearFrom)->whereYear('created_at', '<=', $yearTo)->get();
            $layouts = Layout::where('status', '1')->get();
            $groups = Group::where('type', 'first')->get();
            return view('leader.getBaseSearch')->withBases($bases)->withLayouts($layouts)->withGroups($groups);
        } else if (!empty($request->from && empty($request->to))) {
            $from = $request->from;
            $from = explode("-", $from);
            $yearFrom = $from[0];
            $monthFrom = $from[1];
            $dateFrom = $from[2];
            $dateFrom;
            $bases = Base::whereMonth('created_at', '>=', $monthFrom)->whereYear('created_at', '>=', $yearFrom)->get();
            $layouts = Layout::where('status', '1')->get();
            $groups = Group::where('type', 'first')->get();
            return view('leader.getBaseSearch')->withBases($bases)->withLayouts($layouts)->withGroups($groups);
        }

        $ids = $request->id;
        $i = 0;
        $version = $request->version_name;
        $version_id = $request->version_id;
        $note = $request->note;
        $used_by = $request->used_by;
        $used_by_id = $request->used_by_id;
        $leader_check_name = $request->leader_check_name;
        if (!empty($request->choose_action)) {
            $action = $request->choose_action;
            if ($action == "Update") {
                if (!empty($ids)) {
                    foreach ($ids as $id) {
                        $base = Base::find($id);
                        $base->version_name = $version[$i];
                        $base->version_id = $version_id[$i];
                        $base->note = $note[$i];
                        $base->used_by = $used_by[$i];
                        $base->used_by_id = $used_by_id[$i];
                        $base->leader_check_name = $leader_check_name[$i];
                        $base->save();
                        $i++;
                    }
                    return redirect()->back()->withInput()->withErrors(['notice' => 'update success']);
                }
            } elseif ($action == "Delete") {
                if (!empty($request->check)) {
                    foreach ($request->check as $key) {
                        $base = Base::find($key);
                        $base->delete();
                    }
                }
                return redirect()->back()->withInput()->withErrors(['notice' => 'Base delete success']);
            }
        }
        return redirect()->back();

    }

    public function openDir($dir = null)
    {
        try {
            $folders = "";
            if (!empty($dir)) {
                $ds = scandir($dir);
                foreach ($ds as $d) {
                    if ($d != "." && $d != "..") {
                        $folders[] = $d;
                    }
                }
                return $folders;

            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function getUpdateStatusBaseLeaderCheck(Request $request)
    {
        $baseId = $request->baseId;
        $baseName = $request->baseName;
        $base = Base::find($baseId);
        $base->leader_check_result = $baseName;
        $base->save();
        return "Update Status Success";
    }

    public function getUpdateProblemBase(Request $request)
    {
        $baseId = $request->baseId;
        $baseProblem = $request->val;
        if (!empty($baseId)) {
            $base = Base::find($baseId);
            $base->leader_check_problem = $baseProblem;
            $base->save();
        }
        return $baseProblem;
    }

    public function getUpdatNote(Request $request)
    {
        $baseId = $request->baseId;
        $baseProblem = $request->val;
        if (!empty($baseId)) {
            $base = Base::find($baseId);
            $base->note = $baseProblem;
            $base->save();
        }
        return $baseProblem;
    }

    public function getSubmitQC(Request $request)
    {
        $base = Base::find($request->baseId);
        if ($base->get_it == "0") {
            $base->get_it = "1";
        } else {
            $base->get_it = "0";
        }
        $base->save();
        return "updated";
    }

    public function getNotificationLeader()
    {
        $bases = DB::table('bases')
            ->leftJoin('users', 'users.id', '=', 'bases.user_id')
            ->where('leader_check_result', '2')
            ->select('users.name as userName', 'bases.*')
            ->get();
        return $bases;
    }

    public function getMessageLeader()
    {
        $bases = DB::table('bases')
            ->leftJoin('users', 'users.id', '=', 'bases.user_id')
            ->where('leader_check_result', '0')
            ->select('users.name as userName', 'bases.*')
            ->get();
        return $bases;
    }

    public function getBaseReport(Request $request)
    {
        $select_report = $request->select_report;
        $date = date("d");
        $month = date('m');
        $year = date('Y');
        $last_year = $year - 1;
        if ($select_report == "today") {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where day =$date  AND MONTH  =$month AND year=$year GROUP BY bases.user_id"));
        } elseif ($select_report == 'month') {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where month =$month AND year=$year GROUP BY bases.user_id"));
        } else if ($select_report == 'year') {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where year=$year GROUP BY bases.user_id"));
        } elseif ($select_report == 'last_year') {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where year=$last_year GROUP BY bases.user_id"));
        } else {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id  GROUP BY bases.user_id"));
        }
    }

    public function getLoadBaseReport(Request $request)
    {
        $dateReport = $request->dateReport;
        $monthReport = $request->monthReport;
        $yearReport = $request->yearReport;
        if (!empty($dateReport) && !empty($monthReport) && !empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where day =$dateReport AND month=$monthReport AND  year=$yearReport GROUP BY bases.user_id"));
        }
        if (!empty($dateReport) && !empty($monthReport) && empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where day =$dateReport AND month=$monthReport GROUP BY bases.user_id"));

        }
        if (!empty($dateReport) && empty($monthReport) && empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where  day=$dateReport GROUP BY bases.user_id"));

        }
        if (empty($dateReport) && empty($monthReport) && !empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where  year=$yearReport GROUP BY bases.user_id"));

        }
        if (empty($dateReport) && !empty($monthReport) && !empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where month =$monthReport  AND  year=$yearReport GROUP BY bases.user_id"));

        }
        if (empty($dateReport) && !empty($monthReport) && empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where month=$monthReport GROUP BY bases.user_id"));
        }
        if (!empty($dateReport) && empty($monthReport) && !empty($yearReport)) {
            return DB::select(DB::raw("select bases.id,bases.name as BaseName,bases.user_id,count(bases.user_id) as Total,users.name  from bases LEFT JOIN users on users.id=bases.user_id where day =$dateReport  AND  year =$yearReport GROUP BY bases.user_id"));
        }
        return null;

    }

    public function getLeaderFirstGetBase(Request $request)
    {
        $leaderGroupID = Auth::user()->group->id;
        if ($request->action) {
            $filter_export = $request->option_filter;
            if ($filter_export == "" || $filter_export == 'all') {
                $export = DB::table('bases')
                    ->rightJoin('base_layout', 'bases.id', '=', 'base_layout.base_id')
                    ->rightJoin('layouts', 'layouts.id', '=', 'base_layout.layout_id')
                    ->leftJoin('versions', 'bases.version_id', '=', 'versions.id')
                    ->leftJoin('types', 'bases.type_id', '=', 'types.id')
                    ->select('bases.name AS Base_Name', 'layouts.name AS Layout_Name', 'versions.name as VersionName', 'types.name as typeName')
                    ->where('used_by_id', $leaderGroupID)
                    ->get();
                foreach ($export as $ex) {
                    DB::table('exports')->insert(['Base_Name' => $ex->Base_Name, 'Layout_Name' => $ex->Layout_Name, 'type' => $ex->typeName, 'version' => $ex->VersionName]);
                }
                $export = \App\Models\Export::orderBy('Base_Name', 'DESC')->get();
                DB::table('exports')->truncate();
                Excel::create('Export Custome', function ($excel) use ($export) {
                    $excel->sheet('Sheet1', function ($sheet) use ($export) {
                        $sheet->fromArray($export);
                    });
                })->export('xlsx');

            }
            if ($filter_export == "used") {

                $export = DB::table('bases')
                    ->rightJoin('base_layout', 'bases.id', '=', 'base_layout.base_id')
                    ->rightJoin('layouts', 'layouts.id', '=', 'base_layout.layout_id')
                    ->leftJoin('versions', 'bases.version_id', '=', 'versions.id')
                    ->leftJoin('types', 'bases.type_id', '=', 'types.id')
                    ->select('bases.name AS Base_Name', 'layouts.name AS Layout_Name', 'versions.name as VersionName', 'types.name as typeName')
                    ->where('used', '!=', Null)
                    ->where('used_by_id', $leaderGroupID)
                    ->get();
                foreach ($export as $ex) {
                    DB::table('exports')->insert(['Base_Name' => $ex->Base_Name, 'Layout_Name' => $ex->Layout_Name, 'type' => $ex->typeName, 'version' => $ex->VersionName]);
                }
                $export = \App\Models\Export::orderBy('Base_Name', 'DESC')->get();
                DB::table('exports')->truncate();
                Excel::create('Export Custome', function ($excel) use ($export) {
                    $excel->sheet('Sheet1', function ($sheet) use ($export) {
                        $sheet->fromArray($export);
                    });
                })->export('xlsx');
            }
            if ($filter_export == "not_yet") {
                $export = DB::table('bases')
                    ->rightJoin('base_layout', 'bases.id', '=', 'base_layout.base_id')
                    ->rightJoin('layouts', 'layouts.id', '=', 'base_layout.layout_id')
                    ->leftJoin('versions', 'bases.version_id', '=', 'versions.id')
                    ->leftJoin('types', 'bases.type_id', '=', 'types.id')
                    ->select('bases.name AS Base_Name', 'layouts.name AS Layout_Name', 'versions.name as VersionName', 'types.name as typeName')
                    ->where('used', '=', Null)
                    ->where('used_by_id', $leaderGroupID)
                    ->get();
                foreach ($export as $ex) {
                    DB::table('exports')->insert(['Base_Name' => $ex->Base_Name, 'Layout_Name' => $ex->Layout_Name, 'type' => $ex->typeName, 'version' => $ex->VersionName]);
                }
                $export = \App\Models\Export::orderBy('Base_Name', 'DESC')->get();
                DB::table('exports')->truncate();
                Excel::create('Export Custome', function ($excel) use ($export) {
                    $excel->sheet('Sheet1', function ($sheet) use ($export) {
                        $sheet->fromArray($export);
                    });
                })->export('xlsx');
            }
        }

        if (!empty($request->option_filter)) {
            $filter = $request->option_filter;
            if ($filter == "used") {
                $baseOfGroups = Base::where('used_by_id', $leaderGroupID)->where('used', '!=', '')->get();
                return view('leader.leaderFirstGetBase')->with('baseOfGroups', $baseOfGroups);
            } else if ($filter == "not_yet") {
                $baseOfGroups = Base::where('used_by_id', $leaderGroupID)->where('used', '=', Null)->get();
                return view('leader.leaderFirstGetBase')->with('baseOfGroups', $baseOfGroups);
            }
        }

        $baseOfGroups = Base::where('used_by_id', $leaderGroupID)->get();
        return view('leader.leaderFirstGetBase')->with('baseOfGroups', $baseOfGroups);
    }

    public function getAddNewOrder(Request $request)
    {
        return view('leader.addNewOrder');
    }

    public function postAddNewOrder(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);
        $file = $request->file('file');
        $fileName = "";
        if (!empty($file)) {
            $fileName = $file->getClientOriginalName();
            $arrayString = explode(".", $fileName);
            $extension = end($arrayString);
            if ($extension != "csv") {
                return redirect()->back()->withInput()->withErrors(['error' => 'Please upload only csv file']);
            } else {
                Excel::load($request->file('file'), function ($reader) {
                    $reader->each(function ($sheet) {
                        Order::firstOrCreate($sheet->toArray());
                    });
                });
                return redirect()->back()->withInput()->withErrors(['notice' => 'Order Uploaded']);

            }


        }

    }

    public function getLeaderFirstGetOrder(Request $request)
    {

        $Leader = Auth::user();
        $groupID = $Leader->group;
        $groupName=$groupID->name;
        $users = $groupID->users;
        $groups = Group::where('status', '1')->where('type', 'first')->get();
        $qcs = Group::where('type', 'qc')->first()->id;
        $member_qc = User::where('group_id', $qcs)->where('status', '1')->get();
        if (!empty($request->searchOrder)) {
            $search = $request->searchOrder;
            $search = explode(",", $search);
            $orders = Order::orderBy('id', 'desc')->whereIn('order_id', $search)->get();
            return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

        }
        if (!empty($request->listFolder)) {
            try {
                if (!empty($this->openDir($request->listFolder))) {
                    $orders = Order::orderBy('id', 'desc')->whereIn('order_id', $this->openDir($request->listFolder))->get();
                    return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);
                }
            } catch (\Exception $ex) {
                return redirect()->route('leaderFirstGetOrder')->withInput()->withErrors(['danger' => 'Please enter your location orders']);
            }
        }
        if (!empty($request->action)) {
            $action = $request->action;
            if ($action == "update") {
                $id = $request->orderID;
                $userID = $request->userID;
                $group = $request->group;
                $leader_description = $request->leader_description;
                $index = 0;
                foreach ($id as $key => $value) {
                    $order = Order::find($value);
                    $order->member_id = $userID[$index];
                    $order->leader_check_description = $leader_description[$index];
                    $order->group_name = $group[$index];
                    $order->save();
                    $index++;
                }
                return redirect()->route('leaderFirstGetOrder')->withInput()->withErrors(['notice' => 'Order has been update completed']);

            } else {
                $deleteID = $request->deleteID;
                if (!empty($deleteID)) {
                    foreach ($deleteID as $key => $value) {
                        $order = Order::find($value);
                        $order->isdelete = "0";
                        $order->save();
                    }
                }
                return redirect()->route('leaderFirstGetOrder')->withInput()->withErrors(['notice' => 'Order has been deleted']);
            }
        }
        $orders = Order::orderBy('id', 'desc')->where('isdelete', '1')->where('group_name',$groupName)->paginate(200);
        return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);
    }

    public function getFirstReport(Request $request)
    {
        session(['start'=>$request->start]);
        session(['end'=>$request->end]);
        if(!empty($request->start) && !empty($request->end)){
            $start=$request->start;
            $end  =$request->end;
            $orders =     $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) >='".$start."'  AND  DATE(`created_at`) <='".$end."' GROUP BY member_id" );
            return view('leader.reportResult')->with('orders',$orders);



        }elseif(!empty($request->start) && empty($request->end)){
            $start=$request->start;
            $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) ='".$start."' GROUP BY member_id" );
            return view('leader.reportResult')->with('orders',$orders);

        }elseif(empty($request->start) && !empty($request->end)){
            $end  =$request->end;
            $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) <='".$end."' GROUP BY member_id" );
            return view('leader.reportResult')->with('orders',$orders);

        }

        $date=date("Y-m-d");
        $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) = '".$date."' GROUP BY member_id" );
        return view('leader.reportResult')->with('orders',$orders);


    }

    public function getLeaderReportFirstLeader(Request $request){
        if(!empty(session()->get('start')) && !empty(session()->get('end'))){
            $start=session()->get('start');
            $end  =session()->get('end');
            $orders =     $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) >='".$start."'  AND  DATE(`created_at`) <='".$end."' GROUP BY member_id" );
            $pdf = PDF::loadView('leader.month_report',['orders'=>$orders]);
            return $pdf->download('report.pdf',['orders'=>$orders]);
        }elseif(!empty(session()->get('start')) && empty(session()->get('end'))){
            $start=session()->get('start');
            $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) >='".$start."' GROUP BY member_id" );
            $pdf = PDF::loadView('leader.month_report',['orders'=>$orders]);
            return $pdf->download('report.pdf',['orders'=>$orders]);

        }elseif(empty(session()->get('start')) && !empty(session()->get('end'))){
            $end  =session()->get('end');
            $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) <='".$end."' GROUP BY member_id" );
            $pdf = PDF::loadView('leader.month_report',['orders'=>$orders]);
            return $pdf->download('report.pdf',['orders'=>$orders]);
        }


        $orders = DB::select("SELECT *, COUNT(order_id) as Total  FROM orders WHERE DATE(`created_at`) ='".date('Y-m-d')."' GROUP BY member_id" );
        $pdf = PDF::loadView('leader.month_report',['orders'=>$orders]);
        return $pdf->download('report.pdf',['orders'=>$orders]);
    }

    public function getReportResult()
    {
        include 'Test.php';
    }

    public function getFilterOrder(Request $request)
    {
        $Leader = Auth::user();
        $groupID = $Leader->group;
        $users = $groupID->users;
        $groups = Group::where('status', '1')->where('type', 'first')->get();
        $qcs = Group::where('type', 'qc')->first()->id;
        $member_qc = User::where('group_id', $qcs)->where('status', '1')->get();
        if (!empty($request->start) && !empty($request->to)) {
            $start = $request->start;
            $arrayStart = explode("-", $start);
            $end = $request->to;
            $arrayEnd = explode("-", $end);
            $yearStart = $arrayStart[0];
            $monthStart = $arrayStart[2];
            $yearEnd = $arrayEnd[0];
            $monthEnd = $arrayEnd[2];
            $dateStart = $arrayStart[1];
            $dateEnd = $arrayEnd[1];
            $orders = Order::whereDay('created_at', '>=', $dateStart)->whereMonth('created_at', '>=', $monthStart)->whereYear('created_at', '>=', $yearStart)->orderBy('id', 'desc')->whereDay('created_at', '<=', $dateEnd)->whereMonth('created_at', '<=', $monthEnd)->whereYear('created_at', '<=', $yearEnd)->get();;
            return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

        } elseif (!empty($request->start) && empty($request->to)) {
            $start = $request->start;
            $arrayStart = explode("-", $start);
            $yearStart = $arrayStart[0];
            $monthStart = $arrayStart[2];
            $dateStart = $arrayStart[1];
            $orders = Order::whereDay('created_at', '=', $dateStart)->whereMonth('created_at', '=', $monthStart)->whereYear('created_at', '=', $yearStart)->orderBy('id', 'desc')->get();;
            return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

        } elseif (empty($request->start) && !empty($request->to)) {
            $end = $request->to;
            $arrayEnd = explode("-", $end);
            $yearEnd = $arrayEnd[0];
            $dateEnd = $arrayEnd[1];
            $monthEnd = $arrayEnd[2];
            $orders = Order::orderBy('id', 'desc')->whereDay('created_at', '<=', $dateEnd)->whereMonth('created_at', '<=', $monthEnd)->whereYear('created_at', '<=', $yearEnd)->get();;
            return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

        }
        if (!empty($request->filter_component)) {
            $filter = $request->filter_component;
            switch ($filter) {
                case "stock":
                    $orders = Order::where('isdelete','!=','0')->get();
                    return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

                    break;
                case "upload":
                    $orders = Order::where('upload_status', '=', '1')->where('isdelete','!=','0')->get();
                    return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

                    break;
                case "rest_date":
                    $year = date("Y");
                    $m = date("m");
                    $d = date("d");
                    $start = \Carbon\Carbon::create($year, $m, $d);
                    $end = $start->copy()->addDays(2);
                    return ;
                    break;
                case "not_complete":
                    $orders = Order::where('status', '!=', '1')->where('isdelete','!=','0')->get();
                    return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

                    break;
                case "ready":
                    $orders = Order::where('status', '=', '1')->where('isdelete','!=','0')->get();
                    return view('leader.leaderFirstGetOrder')->with('orders', $orders)->with('users', $users)->with('groups', $groups)->with('member_qc', $member_qc);

                    break;
                default:
                    break;
            }

        }
        return redirect()->back();


    }
}
