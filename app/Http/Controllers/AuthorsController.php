<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Author;


class AuthorsController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $authors = Author::all();
      return $this->sucessResponse($authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'nombre' => 'required|max:255',
        'sexo' => 'required|max:255|in:hombre,mujer',
        'pais' => 'required|max:255',
      ];

      $this->validate($request, $rules);

      $author = Author::create($request->all());

      return $this->sucessResponse($author, Response::HTTP_CREATED);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $author = Author::findOrFail($id);
      return $this->sucessResponse($author);
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
      $rules = [
        'nombre' => 'max:255',
        'sexo' => 'max:255|in:hombre,mujer',
        'pais' => 'max:255',
      ];
      $this->validate($request, $rules);

      $author = Author::findOrFail($id);

      $author->fill($request->all());
      if ($author->isClean()) {
        return $this->errorResponse('Al menos tiene que cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
      }

      $author->save();

      return $this->sucessResponse($author);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $author = Author::findOrFail($id);

      $author->delete();

      return $this->sucessResponse($author);
    }

}
