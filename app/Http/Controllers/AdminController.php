<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;

class AdminController extends Controller
{
    public function homeView () {
        return view ('admin.home');

    }

    public function addview () {

        return view('admin.add_doctor');
    }

    public function uploadDoc (DoctorRequest $request) {

        $input = $request->all();
        $file = $request->file('image');
        if($file) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }

        $doctor = Doctor::create($input);
        return redirect()->back()->with('message', 'Doctor Successfully Added');
    }

    public function viewAppointments() {
        $appoints = Appointment::all();
        return view('admin.viewAppointments', compact('appoints'));
    }

    public function approveAppointment($id) {

        $approval = Appointment::findOrFail($id);

        $approval->status = "Approved";

        $approval->save();

        return redirect()->back();
    }

    public function cancelAppointment($id) {

        $cancel = Appointment::findOrFail($id);

        $cancel->status = "Canceled";

        $cancel->save();

        return redirect()->back();
    }

    public function viewDoctors() {
        $doctors = Doctor::all();
        return view('admin.view_doctors', compact('doctors'));
    }


    public function editDoctor($id) {

        $doctor = Doctor::findOrFail($id);

        return view('admin.editDoctor', compact('doctor'));
    }


    public function updateDoctor (Request $request,$id) {
        $doctor = Doctor::findOrFail($id);

        $input = $request->all();

        $file = $request->file('image');

        if($file) {
            $name = time() . '.' .$file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }

        $doctor->whereId($id)->first()->update($input);

        return redirect()->back()->with('message', 'Doctor details updated successfully');

    }


    public function deleteDoctor ($id) {

        $doctor = Doctor::findOrFail($id);

        $doctor->delete();

        return redirect()->back();
    }



    public function viewUsers () {

        $users = User::all();

        return view('admin.all_users', compact('users'));
    }



    public function removeUser ($id) {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back();
    }




}
