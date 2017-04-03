<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;

class GalleryController extends Controller
{
	//Set table name
	private $table = 'galleries';
	
    //List Galleries 
	public function index(){
		//Get All Galleries
		$galleries = DB::table($this->table)->get();
		
		//Render View
		return view('gallery/index', compact('galleries'));
	}
	
	//Show create Form
	public function create(){
		//Check if Logged In
		if(!Auth::check()){
			return \Redirect::route('gallery.index');
		}
		//Render View
		return view('gallery/create');
	}
	
	//Store gallery
	public function store(Request $request){
		//Get Request Input
		$name = $request->input('name');
		$description = $request->input('description');
		$image = $request->file('image');;
		$owner_id = 1;
		
		//Check Image Upload
		if($image){
			$image_filename = $image->getClientOriginalName();
			$image->move(public_path('images'), $image_filename);
		} else {
			$image_filename = 'noimage.jpg';
		}
		
		//Insert Gallery
		DB::table($this->table)->insert(
			[
				'name' => $name,
				'description' => $description,
				'cover_image' => $image_filename,
				'owner_id' => $owner_id
			]
		
		);
		
		//Set Message
		\Session::flash('message', 'Gallery Added');
		
		
		//Redirect
		return \Redirect::route('gallery.index');
	}
	
	//Show Gallery Photos
	public function show($id){
		//Get gallery
		$gallery = DB::table($this->table)->where('id', $id)->first();
		//Get Photos
		$photos = DB::table('photos')->where('gallery_id', $id)->get();
		//Render View
		return view('gallery/show', compact('gallery', 'photos'));
	}
}
