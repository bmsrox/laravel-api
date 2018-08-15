<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PollsController extends Controller
{
    public function index()
    {
        return response()->json (Poll::get(), Response::HTTP_OK);
    }

    public function show($id)
    {
        $poll = Poll::find($id);

        if (empty($poll)) {
            $status = Response::HTTP_NOT_FOUND;
        } else {
            $status = Response::HTTP_OK;
        }

        return response()->json($poll, $status);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $poll = Poll::create($request->all());
        return response()->json ($poll, Response::HTTP_OK);
    }

    public function update(Request $request, Poll $poll)
    {
        $poll->update ($request->all());
        return response()->json ($poll, Response::HTTP_OK);
    }

    public function delete(Request $request, Poll $poll)
    {
        $poll->delete();
        return response ()->json (null, Response::HTTP_NO_CONTENT);
    }

    public function errors()
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
