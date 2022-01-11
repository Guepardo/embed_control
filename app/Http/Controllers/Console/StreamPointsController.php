<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\StreamPoint;
use Illuminate\Http\Request;

class StreamPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = StreamPoint::orderBy('priority', 'ASC')
            ->paginate(10);

        return view('console.stream_point.index')
            ->with(['collection' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('console.stream_point.create')
            ->with([
                'resource' => new StreamPoint,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        StreamPoint::create($data['stream_point']);

        session()->flash('success', 'Registro salvo com sucesso.');

        return redirect()->route('stream_points.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = StreamPoint::findOrFail($id);

        return view('console.stream_point.edit')
            ->with([
                'resource' => $resource,
            ]);
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
        $resource = StreamPoint::findOrFail($id);
        $data = $request->all();

        $resource->fill($data['stream_point']);
        $resource->save();

        session()->flash('success', 'Registro atualizado com sucesso.');

        return redirect()->route('stream_points.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = StreamPoint::findOrFail($id);
        $resource->delete();

        session()->flash('success', 'Deletado com sucesso.');

        return redirect()->route('stream_points.index');
    }
}
