<?php

namespace App\Http\Controllers;

use App\{Material, Subscriber, Visitor};
use Storage, Exception, Crypt;

class MaterialController extends Controller
{
    public function index($uuid)
    {
        $subscriber = Subscriber::where('link_id', $uuid)->firstOrFail();
        $materials = Material::all();

        if(now() >= $subscriber->expired_on){
            abort(401);
        }
        return view('materials.index', compact('subscriber', 'materials'));
    }

    public function show($hash, $file_src)
    {
        try{
            $data = explode(", ", Crypt::decryptString($hash));
        }catch(Exception $e){
            abort('404');
        }

        $material = Material::findOrFail($data['0']);

        if($material->src !== $data['2']){
            abort('404');
        }

        return response()->file(Storage_path('app/public/'. $material->src));
    }
}
