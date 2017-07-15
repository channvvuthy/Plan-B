<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Layout;
use Illuminate\Support\Facades\Response;
use App\Models\Type;
use App\Models\Version;

class LayoutController extends Controller
{
    public function getLayout(){
        $layouts=Layout::paginate(10);
        return view('leader.layout')->withLayouts($layouts);

    }

    public function postLayout(Request $request){
        $layoutName=$request->layoutName;
        $layoutName=rtrim($layoutName,",");
        $layoutDescription=$request->layoutDescription;

        $arrayLayoutName=explode(",",$layoutName);
        foreach ($arrayLayoutName as $name){
            $layout=new Layout();
            $layout->name=$name;
            $layout->description=$layoutDescription;
            $layout->save();
        }

        return redirect()->route('createLayout')->withInput()->withErrors(['notice'=>'layout has been created']);
    }
    public function getActiveLayout($id){
        $layout=Layout::find($id);
        if($layout->status=="1"){
            $layout->status="0";
        }else if($layout->status=="0"){
            $layout->status="1";
        }
        $layout->save();
        return redirect()->route('createLayout')->withInput()->withErrors(['notice'=>'layout has been updated']);
    }
    public function getDeleteLayout($id){
        $layout=Layout::find($id);
        $layout->delete();
        return redirect()->route('createLayout')->withInput()->withErrors(['notice'=>'layout has been deleted']);
    }
    public function getEditLayout($id){
        $layout=Layout::find($id);
        return view('leader.editLayout')->withLayout($layout);
    }
    public function postUpdateLayout(Request $request){
        $id=$request->id;
        $name=$request->layoutName;
        $description=$request->layoutDescription;
        $layout=Layout::find($id);
        $layout->name=$name;
        $layout->description=$description;
        $layout->save();
        return redirect()->route('createLayout')->withInput()->withErrors(['notice'=>'layout has been updated']);
    }
    public function getUploadLayout(){
        $folders=$this->listFolderFiles('layout');
        return view('leader.uploadLayout')->withFolders($folders);
    }
    public function postUploadLayout(Request $request){
        $this->validate($request,[
           'layoutName'=>'required'
        ]);
        $file=$request->file('layoutName');
        $fileName=$file->getClientOriginalName();
        $fileName=time().$fileName;
        $ex=explode('.',$fileName);
        $ex=end($ex);
        if($ex!="pdf"){
            return redirect()->back()->withInput()->withErrors(['layoutName'=>'Please upload only pdf file']);
        }
        $file->move('layout',$fileName);

        return redirect()->back()->withInput()->withErrors(['notice'=>'layout has been upload']);
    }
    public function listFolderFiles($dir)
    {
        $ffs = scandir($dir);
        $folders="";
        foreach ($ffs as $ff) {
            if ($ff != '.' && $ff != '..') {
                if (is_dir($dir . '/' . $ff)) {
                    listFolderFiles($dir . '/' . $ff);

                }else{
                    $folders[]=$ff;
                }
            }
        }
        return $folders;
    }

    public function getPreview($name,$type){
        $filename = $name;
        $path = public_path("layout/".$filename);
        header('Content-Type', 'application/pdf');
        return response()->file($path);
    }
    public function getUploadVersion(){
        $versions=Version::where('status','1')->get();
        return view('leader.version')->with('versions',$versions);
    }
    public function  postUploadVersion(Request $request){
        $this->validate($request,[
            'version'=>'required'
        ]);
        $name=$request->version;
        $description=$request->description;
        $version=new Version();
        $version->name=$name;
        $version->description=$description;
        $version->save();
        return redirect()->back()->withInput()->withErrors(['notice'=>'Version has been added']);

    }
    public function postUpdateVersion(Request $request){
        $this->validate($request,[
            'version'=>'required'
        ]);
        $id=$request->id;
        $name=$request->version;
        $description=$request->description;
        $version=Version::find($id);
        $version->name=$name;
        $version->description=$description;
        $version->status=$request->status;
        $version->save();
        return redirect()->back()->withInput()->withErrors(['notice'=>'Version has been updated']);
    }

    public function getDeleteVersion($id){
        $id=Version::find($id);
        $id->delete();
        return redirect()->back()->withInput()->withErrors(['notice'=>'Version has been deleted']);
    }

    public function getEditVersion($id){

        $version=Version::find($id);
        return view('leader.editVersion')->with('version',$version);
    }
    public function getUploadType(){
        $types =Type::where('status','1')->get();
        return view('leader.type')->with('types',$types);
    }
    public function postUploadType(Request $request){
        $name=$request->type;
        $description=$request->description;
        $type=new Type();
        $type->name=$name;
        $type->description=$description;
        $type->save();
        return redirect()->back()->withInput()->withErrors(['notice'=>'Type has been added']);
    }
    public function postUpdateType(Request $request){
        $id=$request->id;
        $name=$request->type;
        $description=$request->description;
        $status=$request->status;
        $type=Type::find($id);
        $type->name=$name;
        $type->description=$description;
        $type->status=$status;
        $type->save();
        return redirect()->back()->withInput()->withErrors(['notice'=>'Type has been updated']);
    }
    public function  getDeleteType($id){
        $id=Type::find($id);
        $id->delete();
        return redirect()->back()->withInput()->withErrors(['notice'=>'Type has been deleted']);

    }

    public function getEditType($id){
        $type=Type::find($id);
        return view('leader.editType')->with('type',$type);
    }
}
