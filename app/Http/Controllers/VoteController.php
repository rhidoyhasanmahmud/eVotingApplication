<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Group;
use App\CoreMechanism\Acl;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class VoteController extends Controller
{
	public function all_votes()
    {
     

        // $data['groups'] = Group::all()->where('display', 1);

        return view('vote.index');
    }

    public function all_votes_by_country()
    {
        
        //$acl->has_permissions('view_groups');

        //$data['groups'] = Group::all()->where('display', 1);

        return view('vote.all_votes_by_country');
    }

    public function view_Ans()
    {
    	return view('vote.view_Ans');
    }

    public function question(){
    	return view('vote.question');
    }

	public function votepanel(){
    	return view('vote.votepanel');
    }

    public function add_vote(){
    	return view('vote.add_vote');
    }

}