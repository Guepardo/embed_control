<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource = Setting::first();

        if (!$resource) {
            $resource = Setting::create();
        }

        return view('console.setting.edit')
            ->with(['resource' => $resource]);
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
        $resource = Setting::first();
        $data = $request->all();

        $resource->fill($data['setting']);
        $resource->save();

        session()->flash('success', 'Registro atualizado com sucesso.');

        return redirect()->route('settings.index');
    }

}
