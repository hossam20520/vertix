<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use Image;
Use DB;

use App\projects;

class DashboardController extends Controller
{
    //
    public function index(){

        $projects = DB::select('select * from projects');


        return view("home", ['projects'=> $projects]);
    }


  public function DashShow(){


    return view('dashboard');

  }


  public function SaveProjects(Request $req){
    
      

    projects::create([
        'project_name' => $req['project_name'],
        'project_meta' => $req['project_meta'],
        'description' => $req['description'],
        'img' =>  $req['image'],
        'client_name' => $req['client_name'],   
    ]);


    $req->session()->flash('status', 'Task was successful!');
    return redirect('/dahboard');
  }


  public function uploadMainImages(Request $request){
    $path = "not have";
         $filez = $request['photo_name'];
    if ($files = $request->file('photo_name')) {
     
        // for save original image
        $ImageUpload = Image::make($files);
        $originalPath = 'images/uploads/';


     // DB::update('update users set votes = 100 where name = ?', ['John']);
        // composer  require intervention/image 
        // if (!file_exists($originalPath)) {
        //     mkdir($originalPath, 666, true);
        // }

        $path = $originalPath.time().$files->getClientOriginalName();
        $ImageUpload->save($path);
        
  }

  $ar = array('img'=> $path );
   echo json_encode($ar);

  

}

}
