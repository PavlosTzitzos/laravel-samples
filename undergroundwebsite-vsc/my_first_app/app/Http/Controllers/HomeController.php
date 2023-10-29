<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentShow;
use App\Models\Show;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current_show = CurrentShow::all();
        $data = $current_show->where('priority','=',0);
        foreach($data as $dt)
        {
            $priority_0 = $dt->show_id;
        }
        $current_show = Show::find($priority_0);
        
        //dd($current_show); // for debugging
        
        return view('home.index',['current_show' => $current_show]);
    }
    public function edit(CurrentShow $current_show)
    {
        $shows = Show::all();
        return view('home.edit',['current_show' => $current_show,'shows' => $shows]);
    }
    public function update(CurrentShow $current_show , Request $request)
    {
        $this->authorize('can:update',$current_show);

        $data = $request->validate([
            'show_id' => 'required',
        ]);
        $program->update($data);
        return redirect(route('home.index'))->with('success','Current Show On Air !!');
    }
}
