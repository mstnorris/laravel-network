<?php

namespace App\Http\Controllers;

use App\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStatusRequest;

class StatusesController extends Controller
{
    public function getBlogPosts()
    {
        $statuses = Status::latest()->with('author')->paginate(5);

        return view('statuses.all', compact('statuses'));
    }

    public function getWriteStatus()
    {
        return view ('statuses.create');
    }

    /**
     * Save a new article.
     *
     * @param StatusRequest $request
     * @return Response
     */
    public function postSaveStatus(CreateStatusRequest $request)
    {
        auth()->user()->statuses()->create($request->all());

        return redirect()->route('individual_user_statuses_path', $request->user()->profile->username);
    }
}
