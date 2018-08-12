<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Grade;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        return view('pages.read-grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create-grade');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'grade'=> 'required|numeric|between:0,100'
        ]);

        if ($validator->fails()) {
            return redirect('/grades/create')->withErrors($validator)->withInput();
        }

        $name = $request->get('name');
        $percent = $request->get('grade');
        $letter = '';

        switch($percent) {
            case $percent > 90:
                $letter = 'A';
                break;
            case $percent >= 80:
                $letter = 'B';
                break;
            case $percent >= 70:
                $letter = 'C';
                break;
            case $percent >= 60:
                $letter = 'D';
                break;
            default:
                $letter = 'F';
                break;
        }

        $grade = new Grade();
        $grade->studentname = $name;
        $grade->studentpercent = $percent;
        $grade->studentlettergrade = $letter;
        $grade->save();

        Session::flash('grade-added', 'The grade has been successfully added!');
        return redirect('/grades');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view('pages.update-grade', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'grade'=> 'required|numeric|between:0,100'
        ]);

        if ($validator->fails()) {
            return redirect('/grades/'.$id.'edit')->withErrors($validator)->withInput();
        }

        $grade = Grade::find($id);
        $name = $request->get('name');
        $percent = $request->get('grade');
        $letter = '';

        switch($percent) {
            case $percent > 90:
                $letter = 'A';
                break;
            case $percent >= 80:
                $letter = 'B';
                break;
            case $percent >= 70:
                $letter = 'C';
                break;
            case $percent >= 60:
                $letter = 'D';
                break;
            default:
                $letter = 'F';
                break;
        }

        $grade->studentname = $name;
        $grade->studentpercent = $percent;
        $grade->studentlettergrade = $letter;
        $grade->save();

        Session::flash('updated-grade', $name.'\'s grade has been successfully updated!');
        return redirect('/grades');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $name = $grade->studentname;
        $grade->delete();
        Session::flash('deleted-grade', $name.'\'s grade has been successfully delete!');
        return redirect('/grades');
    }
}
