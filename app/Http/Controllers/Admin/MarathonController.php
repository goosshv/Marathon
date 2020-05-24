<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Marathon;
use Illuminate\Http\Request;

class MarathonController extends Controller
{
    public function submit(Request $req) {
        $marathon = new Marathon();
        $marathon->name = $req->input('name');
        $marathon->date = $req->input('date');
        $marathon->length = $req->input('length');
        $validation = $req->validate([
            'name' => 'required |min:5|max:50',
            'date' => 'required',
            'length' => 'required'
        ]);
        $marathon->save();

        return redirect()->route('home')->with('success', 'Марафон добавлен');
    }

    public function showOneMarathon($id) {
        $marathon = new Marathon();
        return view('oneMarathon', ['data' => $marathon->find($id)]);
    }

    public function updateOneMarathon($id) {
        $marathon = new Marathon();
        return view('oneMarathon', ['data' => $marathon->find($id)]);
    }

    public function updateMarathon($id, Request $req) {
        $marathon = Marathon::find($id);
        $marathon->name = $req->input('name');
        $marathon->date = $req->input('date');
        $marathon->length = $req->input('length');

        $marathon->save();
        return redirect()->route('AllMarathons')->with('success', 'Марафон изменен');
    }

    public function deleteOneMarathon($id) {
        Marathon::find($id)->delete();
        return redirect()->route('AllMarathons')->with('success', 'Марафон удален');
    }
}
