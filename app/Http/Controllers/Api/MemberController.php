<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        // return "Hello Ezra!!!";
        return response()->json([
            'members' => Member::all(),
            'message' => 'All members returned',
            'status'  => 200
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => ''
        ]);

        $member = Member::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Member created successfully',
            'member' => $member
        ]);
    }

    public function show(Member $member)
    {
        return response()->json([
            'status' => 200,
            'member' => $member
        ]);
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'optional'
        ]);

        $member->update($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Member updated successfully',
            'member' => $member
        ]);
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Member deleted successfully'
        ]);
    }
}
