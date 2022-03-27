<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">



    @include('admin.css')
  </head>
  <body>

    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        <div class="container">
    <h1>Edit Doctor</h1>
    @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
    </div>

    @endif

    {!! Form::model($doctor, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminController@updateDoctor', $doctor->id], 'files' => true]) !!}
    @csrf

    <div class="mb-3">
        {!! Form::label('name', 'Doctor Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('phone', 'Phone Number:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('specailty', 'Specialty:') !!}
        {!! Form::select('specialty', array(0 => 'Choose specialty',
         'Dermatologist' => 'Dermatologist',
         'Dentist' => 'Dentist',
         'Physiotherapist' => 'Physiotherapist',
         'Surgeon' => 'Surgeon',
         'Cardiologist' => 'Cardiologist',
         'Pharmacist' => 'Pharmacist',
         'Urologist' => 'Urologist'),
          0, ['class' => 'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('room', 'Room:') !!}
        {!! Form::text('room', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-9">

        <img height="100px" src="images/{{ $doctor->image }}" alt="" class="img-responsive img-rounded">

    </div>
    <div class="mb-3">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::submit('Edit Doctor', ['class' => 'btn btn-success']) !!}
    </div>


    {!! Form::close() !!}

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif


        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</div>
  </body>
</html>
