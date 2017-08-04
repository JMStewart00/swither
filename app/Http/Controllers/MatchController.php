<?php

namespace App\Http\Controllers;

use App\Match;
use App\Likes;
use App\UsersGroups;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Match::where('group_id', '=', $request->group_id);
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
            return Match::where('group_id', '=', $request->group_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       return Match::where('group_id', '=', $request->group_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }

    public function getMatches(Request $request) {
        $group_members = UsersGroups::where('group_id', '=', $request->group_id)->count();
        $likes = Likes::orderBy('business_id')->where('group_id', '=', $request->group_id)->pluck('business_id');
        $likes_array = array();


        for($i=0; $i < count($likes) - 1; $i++) {
            array_push($likes_array, $likes[$i]);
        }

        $counts = array_count_values($likes_array);
        $matches = array();
        $fullMatch = array();

        foreach($counts as $key => $value) {
            if ($value === $group_members) {
                array_push($matches, $key);
            }
        }

        foreach($matches as $match) {
            $params = $request->all();
            $fullMatch = new Match;
            $newmatch = Likes::where('business_id', '=', $match)->first(['business_info']);
            $checkCombo = Match::where('business_id', '=', $match)->where('group_id', '=', $params['group_id'])->first();
            if (count($checkCombo) !== 1) {
                $fullMatch->business_info = $newmatch->business_info;
                $fullMatch->group_id = $request->group_id;
                $fullMatch->business_id = $match;
                $fullMatch->save();
            }
        } // end foreach $matchs as $match

        return Match::where('group_id', '=', $request->group_id)->get();

    } // end matches


        

}
