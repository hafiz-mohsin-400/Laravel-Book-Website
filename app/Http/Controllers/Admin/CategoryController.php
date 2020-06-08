<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$searchTerm = request()->get('s');
        $categories = Category::orWhere('title', 'LIKE', "%{$searchTerm}%")->orderBy('id', 'DESC')->paginate(10);
        return view('admin/category/index')
        ->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|unique:category,title',
            'slug' => 'required'
        ]);


        Category::Create([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'description' => request()->get('description'),
            'status' => 'DEACTIVE',
        ]);
        return redirect()->to('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin/category/edit')
        ->with(compact('category'));
        
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
        $category = Category::find($id);
         $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required'
        ]);
         
        $category->update([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'description' => request()->get('description')
        ]);
        return redirect()->to('/admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $category = Category::find($id); //db column name should be id
            $category->delete();
            return 'true';
        }
    return 'false';
    }

    public function status(Request $request, $id)
    {
        if ($request->ajax()) {
            $category = Category::find($id);
            $newStatus = ($category->status == 'DEACTIVE') ? 'ACTIVE': 'DEACTIVE';
            $category->update([
                'status' => $newStatus
            ]);
            return $newStatus;
        } 
        return redirect()->back();
        // return redirect()->back(); 
    }
    public function statusActive(Request $request)
    {
        if ($request->ajax()) 
        {
            foreach ($request->statusAll as $key => $value) {
                Category::where('id', $value)->update(['status' => 'ACTIVE']);
            } 
            $record = Category::find($request->statusAll);
            return $record;
        }
        return false;
    }
    public function statusDeactive(Request $request)
    {
        if ($request->ajax()) 
        {
            foreach ($request->statusAll as $key => $value) {
                Category::where('id', $value)->update(['status' => 'DEACTIVE']);
            } 
            $record = Category::find($request->statusAll);
            return $record;
        }
        return false;
    }
    public function deleteAll(Request $request)
    {
        if ($request->ajax()) 
        {
            foreach ($request->statusAll as $key => $value) {
                Category::where('id', $value)->delete();
            } 
            $record = Category::find($request->statusAll);
            return $record;
        }
        return false;
    }
}
