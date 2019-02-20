<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveHeadlineRequest;
use Auth;
use App\User;
use App\Headline;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('headlines.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headlines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SaveHeadlineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveHeadlineRequest $request)
    {
        $headline = new Headline();        

        if(!$this->saveHeadline(new Headline(), $request)){
            return back()->with('error', 'Error.')->withInput();
        }

        return back()->with('success', 'Success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($headline_id)
    {
        $headline = Headline::find($headline_id);

        if(!$headline){            
            return redirect('/');
        }

        $author = User::find($headline->user_id);
        
        return view('headlines.show')->with('headline', $headline)->with('author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($headline_id)
    {
        $headline = Headline::find($headline_id);

        if(!$headline){            
            return redirect('headlines');
        }
        
        return view('headlines.edit')->with('headline', $headline);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SaveHeadlineRequest  $request
     * @param  int  $headline_id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveHeadlineRequest $request, $headline_id)
    {               
        if(!$this->saveHeadline(Headline::FindOrFail($headline_id), $request)){
            return back()->with('error', 'Error updating headline.')->withInput();
        }

        return back()->with('success', 'Updated successfully.');
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

    private function saveHeadline(Headline $headline, SaveHeadlineRequest $request)
    {
        $user = Auth::user();
        $headline->fill($request->all());
        $headline->user_id = $user->user_id;
        $headline->save();

        $file = $request->file('image');

        if($file){
            $fileName = $headline->headline_id.time().'-'.Str::random(32).'.'.$request->image->getClientOriginalExtension();

            Storage::disk('local')->put("images/headlines/".$fileName, File::get($file));
            $headline->featured_photo = $fileName;
            $headline->update();
        }

        return $headline;
    }

    public function getHeadlineImage($filename)
    {
        $file = Storage::disk('local')->get("images/headlines/".$filename);
        
        return new Response($file, 200);
    }
}
