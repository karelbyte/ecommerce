<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {;
        return User::all();
    }

    public function store(UserRequest $request) {
        try
        {
            User::query()->create($request->all());

            return response()->json('Usuario creado con exito!');

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 500 );

        }
    }

    public function update(Request $request, $id) {
        try
        {
            User::query()->where('id', $id)->update($request->all());

            return response()->json('Usuario actulizado con exito!');

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 500 );

        }
    }
    public function destroy($id) {

        User::destroy($id);

        return response()->json('Usuario eliminado con exito!');

    }
}
