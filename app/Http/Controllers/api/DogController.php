<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dog;

class DogController extends Controller
{

    public function index()
    {
        return Dog::all();
    }

    public function store(Request $request)
    {
        $dog = Dog::create($request->all());
        return $dog;
    }

    public function show($id)
    {
        $dog = Dog::find($id);

        if (!$dog) {
            return response('Cachorro não existe', 400);
        }
        return $dog;
    }

    public function update(Request $request, $id)
    {
        $dog = Dog::find($id);

        if (!$dog) {
            return response('Cachorro não existe', 400);
        }
        $dog->update($request->all());

        return $dog;
    }

    public function destroy($id)
    {
        $dog = Dog::find($id);

        if (!$dog) {
            return response('Cachorro não existe', 400);
        }
        $dog->delete();
    }
}
