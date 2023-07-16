<!doctype html>
<html lang="en">

<head>
  <title>HOME</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

    <div class="main_cotent pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Student
                        </div>
                        <div class="card-body">
                            <form action="{{ route( 'store' ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-lable">Photo</label>
                                    <input type="file" name="photo">
                                    @error('photo')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Name">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="E-Mail"> 
                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="submit" class="btn btn-primary" id=""> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Student
                        </div>
                        
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Photo</th>
                                <th scope="col">First</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php $id = 1; @endphp
                                @foreach ($get as $item)
                                    <tr>
                                        <th scope="row">{{ $id++ }}</th>
                                        <td><img src="{{ asset('uploads/'.$item->photo) }}" width="100px" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ route( 'edit', $item->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route( 'delete', $item->id ) }}" class="btn btn-danger" onclick="return confirm('are you sure ?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @if( session()->has('success') )
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>