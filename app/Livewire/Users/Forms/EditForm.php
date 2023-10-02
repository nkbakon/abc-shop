<?php

namespace App\Livewire\Users\Forms;

use Livewire\Component;
use App\Models\User;

class EditForm extends Component
{
    public $user;
    public $type;
    public $name;
    public $username;
    public $email;
    public $status;

    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $this->user->id,
            'email' => 'required|unique:users,email,' . $this->user->id,
            'type' => 'required',
            'status' => 'required',
        ];
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->type = $user->type;
        $this->status = $user->status;
    }

    public function update()
    {
        $validatedData = $this->validate($this->rules());
        $data['name'] = $this->name;
        $data['username'] = $this->username;
        $data['email'] = $this->email;
        $data['type'] = $this->type;
        $data['status'] = $this->status;
        
        $this->user->update($data);        
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function render()
    {
        return view('users.components.edit-form');
    }
}