<?php

namespace App\Http\Controllers;

use App\Models\Disk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disks = Disk::all();
        return view('disks.index', ['disks' => $disks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disk = new Disk();
        return view('disks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        $disk = new Disk();
        $disk->name = $request->name;
        $disk->album = $request->album;
        $disk->artist = $request->artist;
        $disk->genere = $request->genere;
        $disk->year = $request->year;
        if ($hasFile) {
            $file = $request->file('cover');
            $filename = $file->getClientOriginalName();
            $request->cover->storeAs('disksPics', $filename);
            $disk->cover = $filename;
        } else {
            $disk->cover = 'default.jpg';
        }
        if ($disk->save()) {
            return  redirect('/disks');
        } else {
            return route('disks.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disk = Disk::findOrFail($id);
        return view('disks.edit', ['disk' => $disk]);
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
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        $disk = Disk::find($id);
        $disk->name = $request->name;
        $disk->album = $request->album;
        $disk->artist = $request->artist;
        $disk->genere = $request->genere;
        $disk->year = $request->year;
        if ($hasFile) {
            $file = $request->file('cover');
            $filename = $file->getClientOriginalName();
            $request->cover->storeAs('disksPics', $filename);
            $disk->cover = $filename;
        }
        if ($disk->save()) {
            return  redirect('/disks');
        } else {
            return route('disks.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disk::destroy($id);
        return redirect('/users');
    }
    //search function
    public function search(Request $r)
    {
        $disks = DB::table('disks')->where($r->filter, 'LIKE', '%' . $r->key . '%')
            ->get();
        return view('disks.index', ['disks' => $disks]);
    }
}
