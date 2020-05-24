<?php

namespace App\Http\Controllers\Runner;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Marathon;
use App\MarathonImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\File;

class MarathonController extends Controller
{
    public function allMarathons() {
        return view('allmarathon', ['data' => Marathon::all(), 'comments' => Comment::all()]);
    }
    public function submit(Request $req, $id) {
        $comment = new Comment();
        $comment->body = $req->input('body');
        $comment->user_id = $id;
        $comment->save();

        return redirect()->route('AllMarathons')->with('success', 'Комментарий добавлен');
    }
    public function getImages($id) {
        return view('marathonImages', ['data' => Marathon::find($id)]);
    }
    public function uploadImage(Request $request) {
//        $cover = $request->file('bookcover');
//        $extension = $cover->getClientOriginalExtension();
//        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
//        $image = new MarathonImage();
//        $image->mime = $cover->getClientMimeType();
//        $image->original_filename = $cover->getClientOriginalName();
//        $image->filename = $cover->getFilename().'.'.$extension;
//        $image->marathon->id = 1;

        //Handle the user upload of avatar
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        return redirect()->route('AllMarathons')->with('success', 'Изображение добавлено');
    }
}
