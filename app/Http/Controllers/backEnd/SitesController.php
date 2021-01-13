<?php


namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use App\Models\Site;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::all();
        // dd($site[0]['logo_image']);
        return view("backEnd.site.siteShow");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $site = Site::find($id);
        // dd($site->logo_name);
        return view('backEnd.site.siteEdit', ['site' => $site]);
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
            'logo_name' => 'required|min:5|max:50',
            'image' => 'image'
        ]);
        $logo_name = $request['logo_name'];
        if($request['image']!="")
        {
            $logo_image = $request['image']->store("images", "public");

        }
        else{
             $logo_image = $request['image'];
        }
       

        $site = Site::find($id);
        $site->update([
            'logo_name'=>$logo_name,
            'logo_image'=>$logo_image
        ]);

        session()->flash('success', 'Info Change Successfully');

        return redirect("/admin/sites");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
