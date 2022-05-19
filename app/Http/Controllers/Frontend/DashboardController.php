<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Testimony;
use Illuminate\Http\Request;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    public function __construct()
    {
        View::share([
            'memberCount' => Member::count(),
            'testimonyCount' => Testimony::count()
        ]);
    }

    public function index()
    {
        return view('dashboard');
    }

    public function memberIndex()
    {
        return view('member.index', [
            'members' => Member::query()
                ->latest()
                ->paginate(5)
        ]);
    }

    public function saveMember(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        // return $request;
        // Member::create($request->all());
        $members = new Member();
        $members->fname = $request->fname;
        $members->lname = $request->lname;
        $members->image = $request->image;
        $members->save();

        // session()->flash('message', 'Member created successfully.');
        Alert::success('Success', 'Member created successfully');

        return redirect()->route('members:index');
    }

    public function editMember(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function updateMember(Request $request, Member $member)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        return $request;
        $member->update($request->all());

        // session()->flash('message', 'Member was updated successfully');
        Alert::success('Success', 'Member updated successfully');

        return redirect()->route('members:index');
    }

    public function deleteMember(Member $member)
    {
        $member->delete();

        // session()->flash('message', 'Member was deleted successfully');
        Alert::warning('Success', 'Member deleted successfully');

        return redirect()->route('members:index');
    }



    public function testimonyIndex()
    {
        // return Testimony::with('member')->get();

        return view('testimony.index', [
            'testimonies' => Testimony::query()
                ->with('member')
                ->latest()
                ->paginate(5)
        ]);
    }
}
