<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMember extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $image;

    public $members;
    public $isModalopen = false;

    public function render()
    {
        $this->members = Member::all();
        return view('livewire.create-member');
    }


    public function create()
    {
        $this->resetForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->openModal = true;
    }
    public function closeModal()
    {
        $this->isModalopen = false;
    }

    public function resetForm()
    {
        $this->fname = '';
        $this->lname = '';
        $this->image = '';
    }

    public function saveMember()
    {
        $dataValid = $this->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $dataValid['image'] = $this->fileName->store('members', 'public');

        Member::updateOrCreate($dataValid);

        session()->flash('message', 'Member created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->mobile = $student->mobile;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Studen deleted.');
    }
}
