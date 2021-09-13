<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    
    private $repository;

    public function __construct(Table $table){

        $this->repository = $table;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = $this->repository->latest()->paginate(10);
        return view('admin.pages.tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreUpdateTable $request)
    {

        
        $this->repository->create( $request->all());
        return redirect()->route('tables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $table = $this->repository->find($id)

        if(!$table){
            return redirect()->back();
        }

        return view('admin.pages.tables.show',compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = $this->repository->find($id)

        if(!$table)
            return redirect()->back();

        return view('admin.pages.tables.create_edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdateTable $request,$id)
    {
        $table = $this->repository->find($id)

        if(!$table)
            return redirect()->back();

        $table->update($request->all());
        return redirect()->route('tables.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');
        $tables = $this->repository->search($request->filter);

        return view('admin.pages.tables.index',compact('tables','filters'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = $this->repository->find($id)
        if(!$table)
            return redirect()->back();
    

        $table->delete();
        return redirect()->route('tables.index');
    }
}
