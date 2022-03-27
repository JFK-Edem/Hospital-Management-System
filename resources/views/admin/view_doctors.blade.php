<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
            

            <div style="padding-top: 80px" align="center">
                <table align="left" class="table table-hover">
                      <thead class="table-dark">
                          <h1> Available Doctors </h1>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Speciality</th>
                          <th scope="col">Room</th>
                          <th scope="col">Image</th>
                          <th scope="col">Update</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($doctors as $doctor)

                        <tr>
                          <th scope="row">{{ $doctor->id }}</th>
                          <td>{{ $doctor->name }}</td>
                          <td>{{ $doctor->phone }}</td>
                          <td>{{ $doctor->specialty }}</td>
                          <td>{{ $doctor->room }}</td>
                          <td><img style="width: 75px; height: 75px; border-radius: 20%" src="images/{{ $doctor->image }}" alt=""></td>
                          <td><a class="btn btn-warning" href="{{ url('editDoctor', $doctor->id) }}">Edit Doctor</a></td>
                          <td><a class="btn btn-danger" href="{{ url('deleteDoctor', $doctor->id) }}">Delete Doctor</a></td>
                        </tr>

                        @endforeach
                      </tbody>
                </table>

            </div>


        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
