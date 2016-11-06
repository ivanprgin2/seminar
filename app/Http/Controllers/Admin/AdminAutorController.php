<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAutorPostRequest; /* dodali smo kako bi radio validator */ 
use App\Autor;

class AdminAutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autori = Autor::orderBy('prezime','asc')->get();
        return view ('protected.admin.autori.index',['autori'=>$autori]); //putanja do indexa
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('protected.admin.autori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAutorPostRequest $request)
    {
        $autor = new Autor;
        $input = $request->only('ime', 'prezime');
        $autor->ime = $input['ime'];
        $autor->prezime = $input['prezime'];
        $autor->save();
        
        return redirect()->route('admin.autori.index')->withFlashMessage('Uspješno ste dodali novog autora!');
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
        $autor = Autor::find($id); /* pozivanje na model Autor kako bi pronašli sve autore po id-u */
   
        return view('protected.admin.autori.edit',['autor'=>$autor]); /* index 'autor' postaje varijabla u viewu */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAutorPostRequest $request, $id)
    {
        $autor = Autor::find($id);
        
        $input = $request->only('ime', 'prezime');  
        $autor->ime = $input['ime'];
        $autor->prezime = $input['prezime'];
        $autor->save();
  
        return redirect()->route('admin.autori.index')->withFlashMessage('Uspješno ste uredili autora - '.$autor->ime.' '.$autor->prezime.'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autor::find($id);
        $autor->delete();
        return redirect()->route('admin.autori.index')->withFlashMessage('Uspješno ste izbrisali autora - '.$autor->ime.' '.$autor->prezime.'!');
    }
}
