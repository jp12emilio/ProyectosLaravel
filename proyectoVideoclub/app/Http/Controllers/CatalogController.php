<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller {

	public function getIndex() {
		return view('catalog.index')->with('peliculas', Movie::all());
	}

	public function getShow($id) {
		return view('catalog.show')->with('pelicula', Movie::findOrFail($id));
	}

	public function getCreate() {
		return view('catalog.create');
	}

	public function getEdit($id) {
		return view('catalog.edit')->with('pelicula', Movie::findOrFail($id));
	}
	public function postCreate(Request $request) {
		$p = new Movie;
		$p->title = $request->input('title');
		$p->year = $request->input('year');
		$p->director = $request->input('director');
		$p->poster = $request->input('poster');
		$p->synopsis = $request->input('synopsis');
		$p->save();
		
		return redirect()->action('CatalogController@getIndex');

	}
	public function putEdit(Request $request, $id) {
		$p = Movie::findOrFail($id);
		$p->title = $request->input('title');
		$p->year = $request->input('year');
		$p->director = $request->input('director');
		$p->poster = $request->input('poster');
		$p->synopsis = $request->input('synopsis');
		$p->save();
		
		return view('catalog.show')->with('pelicula', Movie::findOrFail($id));
	}
}

?>