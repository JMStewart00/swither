<?php

namespace App\Http\Controllers;

use App\UsersGroups;
use App\Group;
use Illuminate\Http\Request;

class UsersGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group_name = $request->input('group_name');
        $group = Group::where('group_name', '=', $group_name)->get();
        $new = new UsersGroups;
        $new->group_id = $group[0]->id;
        $new->user_id = $request->input('user_id');
        $new->save();
        return $new;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersGroups  $usersGroups
     * @return \Illuminate\Http\Response
     */
    public function show(UsersGroups $usersGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersGroups  $usersGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersGroups $usersGroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersGroups  $usersGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersGroups $usersGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsersGroups  $usersGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersGroups $usersGroups)
    {
        //
    }
}
