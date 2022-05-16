<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use App\Models\TestimonyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonyController extends Controller
{
    public function index()
    {
        return Testimony::latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id'         => 'required',
            'testimony_type_id' => 'optional',
            'test_title'        => 'required',
            'test_body'         => 'required',
            'type'              => 'required'
        ]);

        Testimony::create([
            'member_id'  => Auth::user()->id,
            'testimony_type_id' => $request->testimony_type_id,
            'test_title' => $request->test_title,
            'test_body'  => $request->test_body
        ]);
        TestimonyType::create([
            'type' => $request->type
        ]);

        return response()->json(['messages' => 'Testimony created successfully']);
    }

    public function show(Testimony $testimony)
    {
        return $testimony;
    }

    public function update(Request $request, Testimony $testimony, TestimonyType $testimonyType)
    {
        $request->validate([
            'member_id'         => 'required',
            'testimony_type_id' => 'optional',
            'test_title'        => 'required',
            'test_body'         => 'required',
            'type'              => 'required'
        ]);

        $testimony->update($request->all());
        $testimonyType->update($request->all());

        return response()->json(['message' => 'Testimony updated successfully']);
    }

    public function destroy(Testimony $testimony)
    {
        return $testimony->delete();
    }
}
