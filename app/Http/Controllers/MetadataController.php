<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadata;
use Illuminate\Support\Facades\DB;

class MetadataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metadatas = DB::table('metadata')->paginate(10);
        return view('metadata.index', ['metadatas' => $metadatas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metadata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $meta = json_decode($request->input('metadata'));
        } catch (\Exception $e) {
            \Log::warning($e);
            return back()->with('error', 'Json format error!');
        }

        try {
            $metas = [];
            foreach ($meta as $key => $value) {
                $m = Metadata::find($key + 1);
                if (!$m) {
                    $m = new Metadata;
                    $m->id = $key + 1;
                }
                $m->metadata = json_encode($value);
                $m->save();
            }

        } catch (\Exception $e) {
            \Log::warning($e);
            return back()->with('error', 'Metadata create failed!');
        }

        return back()->with('msg', 'Metadata created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meta = Metadata::find($id + 1);
        return response()->json($meta ? $meta->metadata : $meta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('metadata.update', ['metadata' =>  Metadata::find($id + 1)]);
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
        try {
            $meta = json_decode($request->input('metadata'));
        } catch (\Exception $e) {
            \Log::warning($e);
            return back()->with('error', 'Json format error!');
        }

        $metadata = Metadata::find($id + 1);
        $metadata->metadata = json_encode($meta);

        try {
            $metadata->save();
        } catch (\Exception $e) {
            \Log::warning($e);
            return back()->with('error', 'Metadata update failed!');
        }

        return back()->with('msg', 'Metadata updated!');
    }
}
