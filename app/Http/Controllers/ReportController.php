<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userData = Auth::user();

        return view('report.create')->with('userData', $userData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = explode('.', $request->image->getClientOriginalName());
        $fileExt = end($filename);
        $id = $this->generateId();

        // $path = $request->file('avatar')->storeAs(
        //     'avatars', $request->user()->id
        // );
        $path = Storage::putFileAs(
            'public/evidences', $request->file('image'), $request->user()->id.'-'.$id.'.'.$fileExt
        );

        $report = new Report;
        $report->id = $this->generateId();
        $report->number = $request['number'];
        $report->violation = $request['violation'];
        $report->description = $request['description'];
        $report->location = $request['location'];
        $report->image = $path;

        $user = User::find(Auth::id());
        $user->reports()->save($report);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        // if(Auth::id)
        return view('report.detail')->with('report', $report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateId(){
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
        $id = "";
        for($i=0;$i<6;$i++){
            $id = $id.$char[rand(0, 15)];
        }

        return $id;
    }
}