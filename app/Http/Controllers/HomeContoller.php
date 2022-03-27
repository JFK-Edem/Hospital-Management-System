<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeContoller extends Controller
{
    public function redirect() {

        if(Auth::id())
        {
            if(Auth::user()->role->name === 'Sub') {

                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index() {
        if(Auth::user()) {
            return redirect('home');
        }
        else {

            $doctors = Doctor::all();

            return view('user.home', compact('doctors'));
        }
    }

    public function appointment(Request $request) {
        $input = $request->all();
        $input['status'] = "In Progress";
        $input['user_id'] = Auth::user()->id;

        $appointment = Appointment::create($input);

        return redirect()->back()->with('message', 'You booked an appointment');

    }

    public function appoint () {

        if(Auth::user()) {
            $userId = Auth::user()->id;
            $appoints = Appointment::where('user_id', $userId)->get();
            return view ('user.my_Appointments', compact('appoints'));
        }

        return redirect()->back();
    }

    public function cancel ($id) {
        $data = Appointment::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
