<?php

namespace App\Http\Controllers;

use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::where('roles','seller')->with('seller')->orderBy('name')->get();
        return view('sellers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellers.create');
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
            "name" => "required",
            "email" => "required",
            "business_address" => "required",
            "business_phone_number" => "nullable",
        ]);
        $user = new User();
        $user::create([
                    'name'      => $request->input('name'),
                    'email'     => $request->input('email'),
                    'password'  => Hash::make($request->input('password')),
                    ]);
        Seller::create([
                'user_id'               => $user->id,
                'register_number'       =>$request->input('business_address'),
                'business_phone_number' =>$request->input('business_phone_number'),
            ]);
        return redirect('/admin/seller')->with('success','Commercant enregistre');
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
        //
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
        //
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
