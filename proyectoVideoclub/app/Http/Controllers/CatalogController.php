<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Movie;

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
}

?>