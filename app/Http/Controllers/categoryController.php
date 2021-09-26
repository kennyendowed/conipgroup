<?php

namespace App\Http\Controllers;
use App\Models\category;
use Validator;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record=category::whereStatus(1)->latest()->get();
      //  ->paginate(25);
  
          return view('admin.category', compact('record'));
            //   ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.components.NewCategory');
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $org=orgId(); 

        $projectName = $request->title;

        category::create([
            'name' => $request->title,
            'description' => $request->description,
            'category_id' => getrandomNumber(6),
            'status' => "1",
        ]);


        return redirect()->route('category.index')
            ->with('success', $projectName. ' Category Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $record=category::where("category_id",$id)->first();        
      
        return view('admin.components.ShowCategory', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record=category::where("category_id",$id)->first();        
      
        return view('admin.components.EditCategory', compact('record'));
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
       
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $projectName = $request->title;
        $record=category::where("category_id",$id)->first();  
        
  $rs=$record->update($request->all());
     
        return redirect()->route('category.index')
            ->with('success', $projectName . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where("category_id",$id)->delete();
     

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}
