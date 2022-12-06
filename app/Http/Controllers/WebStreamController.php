<?php

namespace App\Http\Controllers;

use App\Models\WebStream;
use Illuminate\Http\Request;
use Monolog\Processor\WebProcessor;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class WebStreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webStreams = WebStream::all()->toArray();

        $data= $this->paginate($webStreams);

        return view('index', ['webstreams' => $data]);
    }


    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'tokens_price'=>'required',
            'type'=>'required',
            'date_expiration'=>'required'
        ]);

        $webStream = new WebStream([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'tokens_price' => $request->get('tokens_price'),
            'type' => $request->get('type'),
            'date_expiration' => $request->get('date_expiration')
        ]);
        $webStream->save();
        return redirect('/')->with('success', 'Web Stream saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebStream  $webStream
     * @return \Illuminate\Http\Response
     */
    public function show(WebStream $webStream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebStream  $webStream
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webStream = WebStream::find($id);
        return view('edit', ['webstream' => $webStream]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebStream  $webStream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'tokens_price'=>'required',
            'type'=>'required',
            'date_expiration'=>'required'
        ]);

        $webStream = WebStream::find($id);
        $webStream->title = $request->get('title');
        $webStream->description = $request->get('description');
        $webStream->tokens_price = $request->get('tokens_price');
        $webStream->type = $request->get('type');
        $webStream->date_expiration = $request->get('date_expiration');
        
        $webStream->save();

        return redirect('/')->with('success','Stream updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebStream  $webStream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webStream = WebStream::find($id);
        $webStream->delete();
        return redirect('/')->with('success', 'Stream removed');
    }
}
