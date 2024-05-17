<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Books;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendDemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class UsersBasic extends Controller
{


  public function getUsers()
  {
      $users = User::all();
      return response()->json($users);
  }

    public function index()
    {
      $users = User::all();
      return view('content.users.users-basic', ['users' => $users]);

    }

    public function saveUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'usertype' => 'required',
            'email' => 'required|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:4',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
        ], [
            'password.regex' => 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.'
        ]);

        // Encrypt the password
        $data['password'] = bcrypt($data['password']);

        // Create the user
        $register = User::create($data);

        // Send email
        try {
            Mail::to($data['email'])->send(new SendDemoEmail($data['name']));
        } catch (\Exception $e) {
            // Log the exception or handle the error as needed
            Log::error('Failed to send email: ' . $e->getMessage());
        }
    }


    public function getUserById($id){

        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function updateUser(Request $request, $id){
        $user = User::findOrFail($id);

        // Update user data based on request data
        $user->update($request->all());
        return response()->json(['message' => 'User updated successfully']);
    }

      public function deleteUser($id)
      {
          $user = User::findOrFail($id);
          $user->delete();
          return response()->json(['message' => 'User deleted successfully']);
      }

      public function countBookandUser(){
            $userCount = User::count();
            $bookCount = Books::count();

            return view('content.dashboard.dashboards-analytics', compact('userCount', 'bookCount'));
        }
  }
