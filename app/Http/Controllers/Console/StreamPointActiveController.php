<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\StreamPoint;
use Illuminate\Http\Request;

class StreamPointActiveController extends Controller
{
    public function destroy($id)
    {
        $resource = StreamPoint::findOrFail($id);
        $resource->active = false;
        $resource->save();

        session()->flash('success', 'Inativado com sucesso.');

        return back();
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $resource = StreamPoint::findOrFail($id);
        $resource->active = true;
        $resource->save();

        session()->flash('success', 'Ativado com sucesso.');

        return back();
    }
}
