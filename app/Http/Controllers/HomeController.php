<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    public function users()
    {        
        $users = \App\User::all();

        return view('user', ['users' => $users]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $search = $request->search;
        
        $user = auth()->user();

        //$services = auth()->user()->services()->where('status', '=', 'Processing')->get();
        //$services = \App\ServiceRequest::where('id_user', '=', $user->id)->get();
        
        $services = \App\ServiceRequest::on();
        
        if(!empty($search))
        {
            $services->where(function($services) use($search)
            {
                $services->orWhere('purpose', 'like', '%' . $search . '%')
                    ->orWhere('details', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            });
        }

        if($user->isAdmin == 0)
        {
            $services->where('id_user', '=', $user->id);
        }

        $services = $services->get();

        $factories = \SintexDatasource\Datasource::factories();

        return view('home', ['factories' => $factories, 'services' => $services]);
    }


}
