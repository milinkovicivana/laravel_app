<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminPhotosController extends Controller
{
    public function index(){

        $photos = Photo::all();

        return view('admin.photos.index', compact('photos'));
    }

    public function create(){

        return view('admin.photos.create');
    }

    public function store(Request $request){

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);
    }

    public function destroy($id){

        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

        Session::flash('deleted_photo', 'Photo has been deleted.');

        return redirect('/admin/photos');
    }
}



