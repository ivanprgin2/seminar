<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateZanrPostRequest; /* dodali smo kako bi radio validator npr. na edit zanru */
use App\Zanr;

class AdminZanrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zanrovi = Zanr::orderBy('naziv','asc')->get();
        return view ('protected.admin.zanrovi.index',['zanrovi'=>$zanrovi]); //putanja do indexa
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('protected.admin.zanrovi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateZanrPostRequest $request)
    {
        $zanr = new Zanr;
        $input = $request->only('naziv');
        $zanr->naziv = $input['naziv'];
        $zanr->save();
        
        return redirect()->route('admin.zanrovi.index')->withFlashMessage('Uspješno ste dodali novi žanr!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zanr = Zanr::find($id); /* pozivanje na model Zanr kako bi pronašli id */
   
        return view('protected.admin.zanrovi.edit',['zanr'=>$zanr]); /* index 'zanr' postaje varijabla u viewu */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateZanrPostRequest $request, $id)
    {
        $zanr = Zanr::find($id);
        
        $input = $request->only('naziv');  
        $zanr->naziv = $input['naziv'];
        $zanr->save();
  
        return redirect()->route('admin.zanrovi.index')->withFlashMessage('Uspješno ste uredili žanr "'.$zanr->naziv.'"!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zanr = Zanr::find($id);
        $zanr->delete();
        return redirect()->route('admin.zanrovi.index')->withFlashMessage('Uspješno ste izbrisali žanr "'.$zanr->naziv.'"!');
    }
}
