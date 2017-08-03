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


    public function joinGroup(Request $request) {
        $params = $request->all();
        $group = Group::where('group_name', '=', $params['group_name'])->where('pin', '=', $params['pin'])->get();
        // if (sizeof($group) === 0) {
        //     return response()->json(['message' => 'Check yo self. Looks like something is wrong']);
        // } else {

        //     $checkCombo = UsersGroups::where('group_id', '=', $group[0]->id)->where('user_id', '=', $params['user_id'])->first();
        //     if (count($checkCombo) === 1) {
        //         return response()->json(['message' => 'You can\'t join somthing you\'re already a part of...']);
        //     } else {
            $joiner = new UsersGroups;
            $joiner->group_id = $group[0]->id;
            $joiner->user_id = $params['user_id'];
            $joiner->save();
            // return response()->json(['message' => 'Ready to ball! Now a part of that group!']);
        //     }
        // }
    }
}
