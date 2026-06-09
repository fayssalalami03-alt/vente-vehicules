<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = Annonce::with('images');
    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ( $request->category) {
        $query->where('category_id', $request->category);
    }

    $annonces = $query->get();

    $categories = Category::all();

    return view('annonces.index', compact('annonces', 'categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categories = Category::all();
        return view('annonces.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'marque' => 'required',
        'modele' => 'required',
        'annee' => 'required|integer',
        'prix' => 'required|numeric',
        'ville' => 'required',
        'category_id' => 'required',
        'images.*' => 'image'
    ]);

    $annonce = Annonce::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'description' => $request->description,
        'marque' => $request->marque,
        'modele' => $request->modele,
        'annee' => $request->annee,
        'prix' => $request->prix,
        'ville' => $request->ville,
        'category_id' => $request->category_id
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');

            $annonce->images()->create([
                'image_path' => $path
            ]);
        }
    }

    return redirect()->route('annonces.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annonce = Annonce::with('images')->findorFail($id);
        $images = $annonce->images()->paginate(1);
         $categories = Category::all();
        return view('annonces.show', compact('annonce',"images","categories"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annonce = Annonce::with('images')->findorFail($id);
         if (Auth::user()->role !== 'admin' && $annonce->user_id !== Auth::id()) {
        return redirect()->route("annonce.index")->wtih("message","tu es pas autorise pour la modification");
    }
        $categories = Category::all();
        return view('annonces.edit', compact('annonce', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, string $id)
{
    $annonce = Annonce::with('images')->findOrFail($id);

    
    if (Auth::user()->role !== 'admin' && $annonce->user_id !== Auth::id()) {
        return redirect()
            ->route('annonces.index')
            ->with('message', "Tu n'es pas autorisé à modifier cette annonce");
    }

    
    $annonce->update([
        'title' => $request->title,
        'description' => $request->description,
        'marque' => $request->marque,
        'modele' => $request->modele,
        'annee' => $request->annee,
        'prix' => $request->prix,
        'ville' => $request->ville,
        'category_id' => $request->category_id
    ]);

   
    if ($request->hasFile('images')) {

        
        foreach ($annonce->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');

            $annonce->images()->create([
                'image_path' => $path
            ]);
        }
    }

    return redirect()
        ->route('annonces.index')
        ->with('message', 'Annonce mise à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annonce = Annonce::findorFail($id);
                  if (Auth::user()->role !== 'admin' && $annonce->user_id !== Auth::id()) {
        return redirect()->route("annonce.index")->wtih("message","tu es pas autorise pour la suppretion");
    }
        $annonce->delete();
        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}
