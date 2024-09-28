<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreeCarnetAdressRequest;
use App\Http\Requests\EdiptCartAddressReuqtes;
use App\Models\CartAdress;
use Exception;
use Illuminate\Http\Request;

class CarnetAdressController extends Controller
{
    public function  index(Request $request)
    {

        try {

            return response()->json([
                'status_code' => 200,
                'status_message' => 'En voici la liste dee toute les informations sur les carnetes d adresse',
                'data' => CartAdress::all(),
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function  store(CreeCarnetAdressRequest $request)
    {

        try {
            $post = new CartAdress();
            $post->nom = $request->nom;
            $post->prenom = $request->prenom;
            $post->ville = $request->ville;
            $post->address = $request->address;
            $post->zipcode = $request->zipcode;
            $post->save();
            return response()->json([
                'staus_code' => 200,
                'message' => 'Les données ont bien été enregistré',
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function update(EdiptCartAddressReuqtes $request, CartAdress $post)
    {
        try {
            $post->nom = $request->nom;
            $post->prenom = $request->prenom;
            $post->ville = $request->ville;
            $post->address = $request->address;
            $post->zipcode = $request->zipcode;
            $post->save();
            return response()->json([
                'staus_code' => 200,
                'message' => 'Les données ont bien été mis à jour',
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function supprimer(CartAdress $post)
    {
        try {

            $post->delete();

            return response()->json([
                'staus_code' => 200,
                'message' => 'Les données ont bien été supprimées',
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
