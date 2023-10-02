<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CreateForm extends Component
{
    public $type;
    public $name;
    public $username;
    public $email;
    public $password;
    public $confirm_password;

    public function mount()
    {
        $this->type = '';
    }
 
    protected $rules = [
        'name' => 'required',
        'username' => 'required|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'type' => 'required',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {   
        $validatedData = $this->validate($this->rules);
        $data['name'] = $this->name;
        $data['username'] = $this->username;
        $data['email'] = $this->email;
        $data['type'] = $this->type;
        $data['password'] = Hash::make($this->password);

        $user = User::create($data);
        if($user){
            return redirect()->route('users.index')->with('status', 'User registered successfully.');  
        }
        return redirect()->route('users.index')->with('delete', 'User registration faild, try again.');       
        
    }
    
    public function render()
    {
        return view('users.components.create-form');
    }
}
