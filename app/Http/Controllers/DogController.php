<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDogRequest;
use App\Models\Dog;
use App\Repositories\DogRepository;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dogs.index', [
            'dogs' => Dog::latest()->simplePaginate(100)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dogs.create', [
            'breeds'    => config('constants.breeds'),
            'allergies' => config('constants.allergies')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDogRequest $request, DogRepository $dogRepository)
    {
        $dogRepository->upsert($request->validated());

        return redirect()->route('dogs.index');
    }
}
