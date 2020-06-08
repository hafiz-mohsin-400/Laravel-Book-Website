<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('admin/user/index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_img' => 'required|image|mimes:jpeg,jpg,gif,png'
        ]);

        $fileName = null;
        if (request()->hasFile('user_img')) 
        {
            $file = request()->file('user_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        User::create([
            'name' => request()->get('name'),
            'designation' => request()->get('designation'),
            'email' => request()->get('email'),
            'password' => request()->get('password'),
            'user_img' => $fileName,
            'bio' => request()->get('bio'),
            'status' => 'DEACTIVE',
        ]);
        return redirect()->to('/admin/user');
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
        $user = User::find($id);
        return view('admin/user/edit')
        ->with(compact('user'));
        
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
        $user = User::find($id);
        $this->validate(request(),[
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required',
            'password' => 'required',
            'bio' => 'required'
        ]);
        
        $currentImage = $user->user_img;
        $fileName = null;
        if (request()->hasFile('user_img')) 
        {
            $file = request()->file('user_img');
            $fileName = md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move('./uploads/',$fileName);
        }

        $user->update([
            'name' => request()->get('name'),
            'designation' => request()->get('designation'),
            'email' => request()->get('email'),
            'password' => request()->get('password'),
            'user_img' => ($fileName) ? $fileName : $currentImage,
            'bio' => request()->get('bio'),
        ]);
        if ($fileName)
            File::delete('./uploads/'. $currentImage);
        return redirect()->to('admin/user');
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
            $user = User::find($id);
            $currentImage = $user->user_img;
            File::delete('./uploads/'. $currentImage); 
            $user->delete();
            return 'true';
        }    
        return 'false';
    }
    public function status(Request $request, $id)
    {
        if ($request->ajax()) {
        $user = User::find($id);
        $newStatus = ($user->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $user->update([ 'status' => $newStatus ]);
        return $newStatus;    
        }
        return redirect()->back();
    }
}


