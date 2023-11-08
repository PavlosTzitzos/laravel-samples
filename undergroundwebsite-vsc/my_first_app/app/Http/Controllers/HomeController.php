<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentShow;
use App\Models\NextShow;
use App\Models\Show;
use App\Models\Program;
use Carbon\Carbon; // used to get current time

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
        try{
            // normal code
            if(CurrentShow::exists())
            {
                $current_show = CurrentShow::find(1);
            }else{
                $current_show = new CurrentShow(['show_id'=>1]);
                $current_show->save();
            }
            //dd($current_show); // for debugging
        }
        catch (exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('home.index',['current_show' => $current_show]);
    }
    public function edit(CurrentShow $current_show)
    {
        try{
            // dd($current_show);
            $shows = Show::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('home.edit',['current_show' => $current_show,'shows' => $shows]);
    }
    public function update(CurrentShow $current_show , Request $request)
    {
        try{
            // dd($request); // for debugging
            // dd($current_show); // for debugging

            $data = $request->validate([
                'show_id' => 'required',
            ]);

            $current_show->update($data);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('home.index'))->with('success','Current Show On Air !!');
    }
}
