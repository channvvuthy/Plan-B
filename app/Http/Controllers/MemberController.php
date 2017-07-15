<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Variation;
use App\Models\Pattern;
use DB;
use App\Models\UserPattern;
use App\Models\Path;
use Auth;
use App\Models\Base;

class MemberController extends Controller
{
    public function getBaseMember()
    {
        $variations = Variation::where('status', '1')->get();
        return view('leader.baseMember')->withVariations($variations);
    }

    public function getVariationDefault(Request $request)
    {
        if ($request->ajax()) {
            $variationDefault = $request->variationDefault;
            $pattern = Pattern::where('variation_id', $variationDefault)->get();
            return $pattern;
        }
    }

    public function getAssignMember(Request $request)
    {
        $this->validate($request, [
            'variationDefault' => 'required',
            'variationGet' => 'required',
            'member' => 'required'
        ]);
        $members = $request->member;
        $variation = $request->variationDefault;
        $patterns = $request->variationGet;
        try {
            foreach ($members as $member) {
                foreach ($patterns as $pattern) {
                    $userPattern = new UserPattern();
                    $userPattern->user_id = $member;
                    $userPattern->pattern_id = $pattern;
                    $userPattern->save();
                }
            }
            return redirect()->back()->withInput()->withErrors(['notice' => 'member assigned']);
        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['error' => $ex->getMessage()]);
        }

    }

    public function getDeleteBaseAssign($id)
    {
        DB::table('user_patterns')->where('user_id', '=', $id)->delete();
        return redirect()->back()->withInput()->withErrors(['notice' => 'remove base assign successfully']);
    }

    public function getIndex(Request $request)
    {
        if (!empty($request->listOrder)) {
            try {
                if ($this->openDir($request->listOrder)) {
                    $list = $this->openDir($request->listOrder);

                    $orders = Order::whereIn('order_id', $list)->orderBy('id', 'desc')->get();
                    $total=count($orders);
                    return view('member.index')->with('orders', $orders)->with('total',$total);
                }
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
        if(!empty($request->search)){
            $search=$request->search;
            $orders = Order::where('order_id','LIKE','%'.$search.'%' )->orderBy('id', 'desc')->paginate(100);
            $total=count($orders);
            return view('member.index')->with('orders', $orders)->with('total',$total);
        }
        if(!empty($request->start) && !empty($request->to)){
            $start=$request->start;
            $end=$request->to;
            $orders = DB::select("SELECT * FROM orders WHERE DATE(`created_at`) >='".$start."'  AND  DATE(`created_at`) <='".$end."' AND member_id='".Auth::user()->id."'");
            $total=count($orders);
            return view('member.index')->with('orders', $orders)->with('total',$total);

        }elseif(empty($request->start) && !empty($request->to)){
            $end=$request->to;
            $orders = DB::select("SELECT * FROM orders WHERE   DATE(`created_at`) <='".$end."' AND member_id='".Auth::user()->id."'");
            $total=count($orders);
            return view('member.index')->with('orders', $orders)->with('total',$total);
        }elseif(!empty($request->start) && empty($request->to)){
            $start=$request->start;
            $orders = DB::select("SELECT * FROM orders WHERE DATE(`created_at`) ='".$start."' AND member_id='".Auth::user()->id."'");
            $total=count($orders);
            return view('member.index')->with('orders', $orders)->with('total',$total);
        }
        if(!empty($request->optionFilter)){
            $option=$request->optionFilter;
            if($option=="not_yet"){
                $orders = DB::select("SELECT * FROM orders WHERE  member_id='".Auth::user()->id."' AND  status=0 ");
                $total=count($orders);
                return view('member.index')->with('orders', $orders)->with('total',$total);

            }elseif($option=="ready"){
                $orders = DB::select("SELECT * FROM orders WHERE  member_id='".Auth::user()->id."' AND  status >=1");
                $total=count($orders);
                return view('member.index')->with('orders', $orders)->with('total',$total);
            }elseif($option=="reast_deadline"){
               $myTime=date("Y-m-d");
               $orders=DB::select('SELECT *,DATEDIFF(orders.dateline,"'.$myTime.'") as numberExpire FROM orders WHERE member_id="'.Auth::user()->id.'" AND status != 0 having numberExpire <=3');
               $total=count($orders);
                return view('member.index')->with('orders', $orders)->with('total',$total);
            }elseif($option==""){

            }
        }
        $orders = Order::where('member_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(100);
        $total=count($orders);
        return view('member.index')->with('orders', $orders)->with('total',$total);
    }

    public function getCreateBase()
    {
        $path = "";
        try {
            $path = Auth::user()->path->path;
        } catch (\Exception $ex) {
            $replace = '"\"';
            $replace = str_replace('"', "", $replace);
            $path = "C:" . $replace;
        }

        $versions = \App\Models\Version::where('status', '1')->get();
        $types = \App\Models\Type::where('status', '1')->get();
        $leaderPath = Path::where('path_for', 'base')->first();
        $fs = $this->openDir($path);
        return view('member.createBase')->withFs($fs)->withPath($path)->with('leaderPath', $leaderPath)->with('types', $types)->with('versions', $versions);
    }


    public function getListFolder(Request $request)
    {
        if ($request->ajax()) {
            $folder = $request->f;
            $list = $this->openDir($folder);
            return $list;
        }
    }

    public function getReadFile(Request $request)
    {

        $replace = '"\"';
        $replace = str_replace('"', "", $replace);
        $pF = $request->path . $replace . $request->fileName;
        $path = Auth::user()->path->path ?: "C:" . $replace;
        $fs = $this->openDir($path);
        $mode = "readFile";
        $ls = $this->openDir($request->path . '/' . $request->fileName);
        return view('member.createBase')->withFs($fs)->withPath($path)->withLs($ls)->with('fileName', $request->fileName)->with('newPaths', $pF)->with('mode', $mode);
    }

    public function getEditFile(Request $request)
    {
        $oldPath = $request->oldPath;
        $newPaths = $request->path;
        $oldFileName = $request->oldFileName;
        $newFileName = $request->fileName;
        $path = Auth::user()->path->path;
        $fs = $this->openDir($path);
        $ls = $this->openDir($oldPath . '/' . $oldFileName);
        return view('member.createBase')->withFs($fs)->withPath($path)->withLs($ls)->with('fileName', $oldFileName)->with('newFileName', $newFileName)->with('oldPath', $oldPath)->with('newPaths', $newPaths);
    }

    public function postSaveFile(Request $request)
    {
        try {
            $fp = fopen($request->fileName, "w");
            fwrite($fp, $request->editor);
            fclose($fp);
            return redirect()->back()->withInput()->withErrors(['notice' => 'file saved']);
        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['error' => $ex->getMessage()]);
        }


    }

    public function getReadDirectory(Request $request)
    {

        $replace = '"\"';
        $replace = str_replace('"', "", $replace);
        $fullPath = $request->fullPath;
        $fullPath = str_replace("/", $replace, $fullPath);
        $filePaths = $this->openDir($fullPath);
        return view('member.memberSubDirectory')->with('fullPath', $fullPath)->with('filePaths', $filePaths);
    }

    public function getEditFileSubDirectory(Request $request)
    {
        $fullPath = $request->fullPath;
        $filePaths = $this->openDir($fullPath);
        $fileName = $request->fileName;
        return view('member.memberSubDirectory')->with('fullPath', $fullPath)->with('filePaths', $filePaths)->with('fileName', $fileName);
    }

    public function postSaveDirectoryFile(Request $request)
    {
        try {
            $fp = fopen($request->fileName, "w");
            fwrite($fp, $request->editor);
            fclose($fp);
            return redirect()->back()->withInput()->withErrors(['notice' => 'file saved']);
        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['error' => $ex->getMessage()]);
        }
    }


    public function getCreateFolder(Request $request)
    {
        if ($request->ajax()) {
            $path = $request->path;
            $fileName = $request->fileName;
            try {
                if (mkdir($path . '/' . $fileName, 0777, true)) {
                    return "Directory has been created!";
                }
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
    }

    public function getCreateFile(Request $request)
    {
        if ($request->ajax()) {
            $path = $request->path;
            $fileName = $request->fileName;
            try {
                $myFile = fopen($path . '/' . $fileName, "w");
                fwrite($myFile, $fileName);
                fclose($myFile);
                return "File has been created!";
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }

        }
    }

    /*
     * Create path for store file of user
     */
    public function getCreatePath()
    {
        $path = Path::where('user_id', Auth::user()->id)->first();
        return view('member.createPath')->with('path', $path);
    }

    public function postCreatePath(Request $request)
    {
        $this->validate($request, [
            'pathName' => 'required',
            'pathDescription' => 'required'
        ]);
        $path = Path::where('user_id', Auth::user()->id)->first();
        $pathName = $request->pathName;
        $pathDescription = $request->pathDescription;
        if (!empty($path)) {
            $path->path = $pathName;
            $path->user_id = Auth::user()->id;
            $path->description = $pathDescription;
            $path->save();
            return redirect()->back()->withInput()->withErrors(['notice' => 'Path has been updated']);
        } else {
            $path = new Path();
            $path->path = $pathName;
            $path->user_id = Auth::user()->id;
            $path->description = $pathDescription;
            $path->save();
            return redirect()->back()->withInput()->withErrors(['notice' => 'Path saved']);
        }
    }

    /*
     * Copy and save order to Leader and Database
     */
    public function getCopyAndSave(Request $request)
    {
        $leaderPath = $request->leaderPath;
        $userPath = $request->path;
        $replace = '"\"';
        $replace = str_replace('"', "", $replace);
        $orders = $request->string;
        $leaderPath = str_replace("/", $replace, $leaderPath);
        if (!empty($orders)) {
            $orders = rtrim($orders, ",");
            $orders = explode(",", $orders);
            $variation = $request->variation;
            $variation = explode("-", $variation);
            $variation_id = $variation[0];
            $patter_id = $variation[1];
            $version = $request->version;
            $version_name = $request->version_name;
            $type = $request->type;
            $type_name = $request->type_name;
            foreach ($orders as $order) {
                $file = fopen('auth/' . Auth::user()->name . '.bat', "w");
                fwrite($file, "mkdir" . $leaderPath . $replace . $order);
                exec('auth/' . Auth::user()->name . '.bat');
                $file = fopen('auth/' . Auth::user()->name . '.bat', "w");
                $copy = "xcopy ";
                $replace = '"\"';
                $replace = str_replace('"', "", $replace);
                $from = $request->path;
                $from = str_replace("/", $replace, $from);
                $to = $request->leaderPath;
                $to = str_replace("/", $replace, $to);
                $replace=trim($replace);
                $from=rtrim($from," ");
                $to=rtrim($to," ");
                fwrite($file, $copy . '"'.$from.$replace.$order.'"' . ' ' . '"'.$to.$replace.$order.'"' . ' /h/i/c/k/e/r/y');
                fclose($file);
                exec('auth/' . Auth::user()->name . '.bat');
                $check = Base::where('name', $order)->first();
                if ($check == null) {
                    $base = new Base();
                    $base->user_id = Auth::user()->id;
                    $base->pattern_id = $patter_id;
                    $base->variation_id = $variation_id;
                    $base->name = $order;
                    $base->url = $leaderPath;
                    $base->your_url = $userPath;
                    $base->version_name = $version_name;
                    $base->version_id = $version;
                    $base->type_name = $type_name;
                    $base->type_id = $type;
                    $base->save();
                }

            }
        }
        return "Data base been saved";

    }


    public function getMemberReport(Request $request)
    {
        if (!empty($request->q)) {
            $q = $request->q;
            $userId = Auth::user()->id;
            $year = date('Y');
            $month = date("m");
            $date = date('d');
            $last_year = $year - 1;
            if ($q == "today") {
                return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id WHERE bases.user_id=$userId AND day = $date AND month =$month AND year=$year "));
            }
            if ($q == "month") {
                return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id WHERE bases.user_id=$userId AND month =$month AND year=$year "));
            }
            if ($q == "year") {
                return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id WHERE bases.user_id=$userId  AND year=$year "));
            }
            if ($q == "last_year") {
                return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id WHERE bases.user_id=$userId  AND year=$last_year "));
            }
        } else {
            $userId = $request->userId;
            $year = date('Y');
            $month = date("m");
            $date = date('d');
            return DB::select(DB::raw("select * from bases WHERE user_id =$userId AND  day=$date AND month=$month AND year =$year"));
        }
    }

    /*
    Tool
    ===========================
    */
    public function getTool()
    {
        return view('member.tool');
    }

    /*
    get all base of user
    */
    public function getMemberViewBase(Request $request)
    {
        return view('member.getBase');
    }

    /*
     * Read directory
     */

    public function getMememberViewLayout()
    {
        $folders = $this->listFolderFiles('layout');
        return view('member.viewLayout')->with('folders', $folders);
    }

    public function getDbQuery()
    {
        return response("hello");
    }

    public function listFolderFiles($dir)
    {
        $ffs = scandir($dir);
        $folders = "";
        foreach ($ffs as $ff) {
            if ($ff != '.' && $ff != '..') {
                if (is_dir($dir . '/' . $ff)) {
                    listFolderFiles($dir . '/' . $ff);

                } else {
                    $folders[] = $ff;
                }
            }
        }
        return $folders;
    }

    public function getSingleNot()
    {
        $bases = DB::table('bases')
            ->leftJoin('users', 'users.id', '=', 'bases.user_id')
            ->where('leader_check_result', '2')
            ->where('user_id', Auth::user()->id)
            ->select('users.name as userName', 'bases.*')
            ->get();
        return $bases;
    }

    public function getSingleMessage()
    {
        $bases = DB::table('bases')
            ->leftJoin('users', 'users.id', '=', 'bases.user_id')
            ->where('leader_check_result', '0')
            ->where('user_id', Auth::user()->id)
            ->select('users.name as userName', 'bases.*')
            ->get();
        return $bases;
    }

    public function getLoadMemberReport(Request $request)
    {
        $memberDate = $request->memberDate;
        $memberMonth = $request->memberMonth;
        $memberYear = $request->memberYear;
        $userId = Auth::user()->id;
        if (!empty($memberDate) && !empty($memberMonth) && !empty($memberYear)) {

            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where day =$memberDate  AND MONTH  =$memberMonth AND year=$memberYear AND user_id =$userId"));
        }
        if (!empty($memberDate) && !empty($memberMonth) && empty($memberYear)) {

            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where day =$memberDate  AND month  =$memberMonth  AND user_id =$userId"));

        }
        if (!empty($memberDate) && empty($memberMonth) && !empty($memberYear)) {

            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where day  =$memberDate  AND  year=$memberYear AND user_id =$userId "));

        }
        if (empty($memberDate) && !empty($memberMonth) && !empty($memberYear)) {
            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where  month  =$memberMonth AND year=$memberYear AND user_id =$userId"));

        }
        if (empty($memberDate) && empty($memberMonth) && !empty($memberYear)) {

            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where  year=$memberYear AND user_id =$userId "));

        }
        if (empty($memberDate) && !empty($memberMonth) && empty($memberYear)) {
            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where  month  =$memberMonth  AND user_id =$userId"));

        }
        if (!empty($memberDate) && empty($memberMonth) && empty($memberYear)) {
            return DB::select(DB::raw("select bases.name as baseName,bases.day,bases.month,bases.year ,versions.name as versionName,types.name as typeName from bases LEFT JOIN versions ON bases.version_id=versions.id LEFT JOIN types ON bases.type_id=types.id where  day  =$memberDate  AND user_id =$userId GROUP BY bases.user_id"));

        }


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
}
