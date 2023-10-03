@extends('layouts.app')
@section('bodycontent')
<h1 class="text-center font-bold text-gray-600">Welcome {{ auth()->user()->name }} ({{ auth()->user()->username }})</h1>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h5 class="font-bold text-center text-black">Profile</h5><br>
                @if (session('success'))
                    <div class="text-black m-2 p-2 bg-yellow-200">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('err'))
                    <div class="text-black m-2 p-2 bg-red-200">
                        {{ session('err') }}
                    </div>
                @endif       
                <h5 class="font-bold text-black">Change Password</h5><br>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    
                    Current Password:
                    <br>
                    <input type="password" name="current_password" id="current_password" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="current password" required>
                    @if($errors->any('current_password'))
                        <span class="text-red-500">{{$errors->first('current_password')}}</span>
                    @endif
                    <br>
                    New Password:
                    <br>
                    <input type="password" name="password" id="addpassword" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"placeholder="new password" required>
                    @if($errors->any('password'))
                        <span class="text-red-500">{{$errors->first('password')}}</span>
                    @endif
                    <br>
                    Confirm Password:
                    <br>
                    <input type="password" name="confirm_password" id="cmpassword" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="confirm password" required>
                    @if($errors->any('confirm_password'))
                        <span class="text-red-500">{{$errors->first('confirm_password')}}</span>
                    @endif
                    <span id='passwordcheck'></span>
                    <br><br>                   
                    <button type="submit" class="passwordvalid inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $('#addpassword, #cmpassword').on('keyup', function () { 

        if ($('#addpassword').val() == $('#cmpassword').val()) {
            $('#passwordcheck').html('');
            $(".passwordvalid").attr('disabled', false);
        }
        else if($('#cmpassword').val() == ''){
            $('#passwordcheck').html('');
        }
        else { 
            $('#passwordcheck').html('Passwords Not Matching').css('color', 'red');
            $(".passwordvalid").attr('disabled', true);
        }
        if ($('#addpassword').val() == '' && $('#cmpassword').val() == '') {
            $('#passwordcheck').html('');
        }  
        });
    </script>
@endpush
@endsection