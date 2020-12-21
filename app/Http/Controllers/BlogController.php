<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'contents' => json_decode(Storage::get('artikel.json'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('component.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode(Storage::get('artikel.json'), true);
        array_push($data, array(
            'author' => $request->input('author'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_at' => date('d-m-Y'),
        ));
        Storage::put('artikel.json', json_encode($data));

        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = json_decode(Storage::get('artikel.json'), true);
        $artikel = null;
        foreach ($data as $index => $datum) {
            if ($index == $id) {
                $artikel = $datum;
                break;
            }
        }

        if ($artikel === null) {
            abort(404);
        }

        return view('component.detail', [
            'content' => (object) $artikel,
            'index' => $index
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = json_decode(Storage::get('artikel.json'), true);
        $artikel = null;
        foreach ($data as $index => $datum) {
            if ($index == $id) {
                $artikel = $datum;
                break;
            }
        }

        if ($artikel === null) {
            abort(404);
        }

        return view('component.edit', [
            'content' => (object) $artikel,
            'index' => $index
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
        $data = json_decode(Storage::get('artikel.json'), true);
        $artikel = null;
        foreach ($data as $index => $datum) {
            if ($index == $id) {
                $artikel = $datum;
                $data[$index] = array_replace($datum, $request->except(['_token', '_method']));
                break;
            }
        }

        if ($artikel === null) {
            abort(404);
        } else {
            Storage::put('artikel.json', json_encode($data));
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = json_decode(Storage::get('artikel.json'), true);
        $artikel = null;
        foreach ($data as $index => $datum) {
            if ($index == $id) {
                unset($data[$index]);
                break;
            }
        }
        Storage::put('artikel.json', json_encode($data));
        return redirect('/');
    }
}
