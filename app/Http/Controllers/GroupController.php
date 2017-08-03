<?php

namespace App\Http\Controllers;

use App\Group;
use App\UsersGroups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $group = new Group;
        $group->group_name = $request->input('group_name');
        $group->pin = $request->input('pin');
        $group->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function showGroups($id)
    {
        $groups = UsersGroups::where('user_id', '=', $id)->get();
        // return $groups;
        $group_names = array();
        foreach($groups as $group) {
            array_push($group_names, Group::where('id', '=', $group->group_id)->get()[0]);
            }
        return $group_names;
    }

}
