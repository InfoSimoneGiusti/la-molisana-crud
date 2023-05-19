<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pasta\StorePastaRequest;
use App\Http\Requests\Pasta\UpdatePastaRequest;
use App\Models\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(StorePastaRequest $request)
    {

        /*$request->validate([
            'src' => 'required|url|max:255',
            'title' => 'required|max:50',
            'kind' => 'required|max:20',
            'cooking_time' => 'required|max:10',
            'weight' => 'required|max:10',
            'description' => 'nullable|max:65535',
        ]);*/


        //$form_data = $this->validation($request->all());
        //dd($form_data);

        $form_data = $request->validated();

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
    public function update(UpdatePastaRequest $request, Pasta $pasta)
    {

        /*$request->validate([
            'src' => 'required|url|max:255',
            'title' => 'required|max:50',
            'kind' => 'required|max:20',
            'cooking_time' => 'required|max:10',
            'weight' => 'required|max:10',
            'description' => 'nullable|max:65535',
        ]);*/


        //$pasta = Pasta::findOrFail($id);
        //$form_data = $this->validation($request->all());

        $form_data = $request->validated();

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


    private function validation($data) {

        $validator = Validator::make(
            $data,
            [
                'src' => 'required|url|max:255',
                'title' => 'required|max:50',
                'kind' => 'required|max:20',
                'cooking_time' => 'required|max:10',
                'weight' => 'required|max:10',
                'description' => 'nullable|max:65535',
            ],
            [
                'src.required' => "Url dell'immagine richiesta",
                'src.url' => "L'url dell'immagine deve essere valida, esempio: http://www.miosito.com",
                'src.max' => "L'url dell'immagine deve essere al massimo di 255 caratteri",
                'title.required' => "Il titolo è richiesto",
                'title.max' => "Il titolo deve essere al massimo di 50 caratteri",
                'kind.required' => "Il tipo è richiesto",
                'kind.max' => "Il tipo deve essere al massimo di 20 caratteri",
                'cooking_time.required' => "Il tempo di cottura è richiesto",
                'cooking_time.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
                'weight.required' => "Il peso è richiesto",
                'weight.max' => "Il campo peso deve essere al massimo di 10 caratteri",
                'description.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",
            ]
        )->validate();

        return $validator;

    }


}
