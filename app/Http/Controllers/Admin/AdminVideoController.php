<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVideoPostRequest;
use App\Video;
use App\Autor;
use App\Zanr;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video:: orderBy('naslov','asc')->get();
        return view ('protected.admin.video.index',['video'=>$video]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autori = Autor::orderBy('prezime','asc')->get();
        $zanrovi = Zanr::orderBy('naziv', 'asc')->get();
        
        $autori_array = [];
        $zanrovi_array = [];

        foreach ($autori as $autor)
        {
            $pisac = $autor->prezime.', '.$autor->ime;
            $autori_array = array_add($autori_array,$autor->id,$pisac);
        } 

        foreach ($zanrovi as $zanr)
        {
            $naziv_zanr = $zanr->naziv;
            $zanrovi_array = array_add($zanrovi_array, $zanr->id,$naziv_zanr);
        }

        return view ('protected.admin.video.create',['autori'=>$autori_array,'zanrovi'=> $zanrovi_array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVideoPostRequest $request)
    {
        $video = new Video;
        
        $input = $request->only('naslov', 'autor_id', 'zanr_id', 'godina', 'slika');
        $video->naslov = $input['naslov'];
        $video->autor_id = $input ['autor_id'];
        $video->zanr_id = $input['zanr_id'];        
        $video->godina = $input ['godina'];
        $video->slika = $input ['slika'];
        $video->save();
        
        return redirect()->route('admin.video.index')->withFlashMessage('Video added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $autori = Autor::orderBy('prezime','asc')->get();
        $zanrovi = Zanr::orderBy('naziv', 'asc')->get();
        
        $autori_array = [];
        $zanrovi_array = [];

        foreach ($autori as $autor)
        {
            $pisac = $autor->prezime.', '.$autor->ime;
            $autori_array = array_add($autori_array,$autor->id,$pisac);
        } 

        foreach ($zanrovi as $zanr)
        {
            $naziv_zanr = $zanr->naziv;
            $zanrovi_array = array_add($zanrovi_array, $zanr->id,$naziv_zanr);
        }

        return view ('protected.admin.video.edit',['autori'=>$autori_array,'zanrovi'=> $zanrovi_array, 'video'=>$video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVideoPostRequest $request, $id)
    {
        $video = Video::find($id);
        
        $input = $request->only('naslov', 'autor_id', 'zanr_id', 'godina', 'slika');
        $video->naslov = $input['naslov'];
        $video->autor_id = $input ['autor_id'];
        $video->zanr_id = $input['zanr_id'];        
        $video->godina = $input ['godina'];
        $video->slika = $input ['slika'];
        $video->save();
        
        return redirect()->route('admin.video.index')->withFlashMessage('Edited - "'.$video->naslov.'"!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        
        return redirect()->route('admin.video.index')->withFlashMessage('Deleted "'.$video->naslov.'"!');
    }
}
