<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\StreamPoint;
use Illuminate\Http\Request;

class StreamPointsController extends Controller
{
    public function index()
    {

        $collection = StreamPoint::byActive()
            ->byPriority()
            ->paginate(10);

        return view('console.stream_point.index')
            ->with(['collection' => $collection]);
    }

    public function create()
    {
        return view('console.stream_point.create')
            ->with([
                'resource' => new StreamPoint,
            ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        StreamPoint::create($data['stream_point']);

        session()->flash('success', 'Registro salvo com sucesso.');

        return redirect()->route('stream_points.index');
    }

    public function edit($id)
    {
        $resource = StreamPoint::findOrFail($id);

        return view('console.stream_point.edit')
            ->with([
                'resource' => $resource,
            ]);
    }

    public function update(Request $request, $id)
    {
        $resource = StreamPoint::findOrFail($id);
        $data = $request->all();

        $resource->fill($data['stream_point']);
        $resource->save();

        session()->flash('success', 'Registro atualizado com sucesso.');

        return redirect()->route('stream_points.index');
    }

    public function destroy($id)
    {
        $resource = StreamPoint::findOrFail($id);
        $resource->delete();

        session()->flash('success', 'Deletado com sucesso.');

        return redirect()->route('stream_points.index');
    }
}
