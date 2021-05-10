<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use DB;

class Form extends Component
{
    public $fname, $lname, $gender, $phone, $education ;
    public $data = [];
    public $hiddenId;

    protected $rules = [
        'fname' => 'required|min:3|max:20',
        'lname' => 'required|min:3|max:20',
        'gender' => 'required',
        'phone' => 'required',
        'education' => 'required|min:2|max:20'
    ];
    public function submit()
    {
        $validateData = $this->validate();
        $updateId = $this->hiddenId;
        if($updateId>0){
            //update
            $updateArray = array(
                'fname'=>$validateData['fname'],
                'lname'=>$validateData['lname'],
                'gender'=>$validateData['gender'],
                'phone'=>$validateData['phone'],
                'education'=>$validateData['education']
            );
            DB::table('students')->where('id', $updateId)->update($updateArray);
        }else{
            Student::create($validateData);
        }
        session()->flash('success', 'Data is Submitted.');
    }
    public function add()
    {
        $this->fname = '';
        $this->lname = '';
        $this->gender = '';
        $this->phone = '';
        $this->education = '';
        $this->hiddenId = '';
    }

    public function edit($id)
    {
        $singleData = Student::find($id);
        $this->fname = $singleData->fname;
        $this->lname = $singleData->lname;
        $this->gender = $singleData->gender;
        $this->phone = $singleData->phone;
        $this->education = $singleData->education;
        $this->hiddenId = $singleData->id;


    }
    public function delete($id)
    {
        DB::table('students')->where('id', $id)->delete();
        session()->flash('success', 'Records deleted.');
    }

    public function render()
    {
        $this->data = Student::all();
        return view('livewire.form');
    }
}
