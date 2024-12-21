<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-10">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img src="{{  url('storage/students/'.$student->photo)}}"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;" onclick="window.location='{{ route('students') }}'">
                    Go Back
                </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
                <h5>{{ $student->firstname }} {{ $student->lastname }}</h5>
                <p>{{ $student->university }}</p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5">478</p>
                <p class="small text-muted mb-0">Following</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">Biography Of Student</p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Activities</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="internships">
                <h4>Internships</h4>
                @if(count($student->internships) > 0)
                    <ul>
                        @foreach($student->internships as $internship)
                            <li>
                                {{ $internship->id }} - {{ $internship->created_at }}
                                <!-- Add delete icon and form for deleting -->
                                <form action="{{ route('internships.destroy', $internship->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this internship?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No internships found.</p>
                @endif

                <!-- Add form for adding a new internship -->
                <form action="{{ route('affectInternship') }}" method="post">
                    @csrf
                    <!-- Add input fields for new internship details -->
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add Internship
                    </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>