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
                        <tr>
                          <th scope="col">Patient</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Date</th>
                          <th scope="col">Message</th>
                          <th scope="col">Status</th>
                          <th scope="col">Approve </th>
                          <th scope="col">Cancel</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($appoints as $appoint)

                        <tr>
                          <th scope="row">{{ $appoint->name }}</th>
                          <td>{{ $appoint->phone }}</td>
                          <td>{{ $appoint->doctor }}</td>
                          <td>{{ $appoint->date }}</td>
                          <td>{{ $appoint->message }}</td>
                          <td>{{ $appoint->status }}</td>
                          
                          <td><a class="btn btn-success" href="{{ url('approve',$appoint->id) }}">Approve</a></td>
                          <td><a class="btn btn-danger" href="{{ url('canceled'),$appoint->id }}">Cancel</a></td>
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
