<?php

namespace App\Http\Controllers;

use App\Models\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::all();
        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'src' => 'required|url|max:255',
            'title' => 'required|max:50',
            'kind' => 'required|max:20',
            'cooking_time' => 'required|max:10',
            'weight' => 'required|max:10',
            'description' => 'nullable|max:65535',
        ]);


        $form_data = $request->all();
        //dd($form_data);

        $newPasta = new Pasta();

        /*$newPasta->src = $form_data["src"];
        $newPasta->title = $form_data["title"];
        $newPasta->kind = $form_data["kind"];
        $newPasta->cooking_time = $form_data["cooking_time"];
        $newPasta->weight = $form_data["weight"];
        $newPasta->description = $form_data["description"];*/

        $newPasta->fill($form_data);

        $newPasta->save();

        return redirect()->route('pastas.show', ['pasta' => $newPasta->id])->with('status', 'Formato di pasta aggiunto con successo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        //$pasta = Pasta::findOrFail($id);
        return view('pastas.show', compact('pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasta $pasta)
    {
        //$pasta = Pasta::findOrFail($id);
        return view('pastas.edit', compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pasta)
    {

        $request->validate([
            'src' => 'required|url|max:255',
            'title' => 'required|max:50',
            'kind' => 'required|max:20',
            'cooking_time' => 'required|max:10',
            'weight' => 'required|max:10',
            'description' => 'nullable|max:65535',
        ]);


        //$pasta = Pasta::findOrFail($id);
        $form_data = $request->all();
        $pasta->update($form_data);
        //return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
        return to_route('pastas.show', ['pasta' => $pasta->id])->with('status', 'Formato di pasta aggiornato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        //$pasta = Pasta::findOrFail($id);
        $pasta->delete();
        return redirect()->route('pastas.index');
    }
}
