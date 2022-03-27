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
                          <h1> All Registered Users </h1>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                          <th scope="col">Remove User</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($users as $user)

                        <tr>
                          <th scope="row">{{ $user->id }}</th>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at->diffForHumans() }}</td>
                          <td>{{ $user->updated_at->diffForHumans() }}</td>
                          <td><a class="btn btn-danger" href="{{ url("/removeUser", $user->id) }}">Remove User</a></td>
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
