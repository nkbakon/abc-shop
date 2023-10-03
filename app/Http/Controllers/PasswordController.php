<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6',
        ]);

        if(Hash::check($request->current_password,$user->password)){
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('home')->with('success', 'Password updated successfully.');
        }else{
            return redirect()->route('home')->with('err', 'Invalid current password.');            
        }        
    }
}