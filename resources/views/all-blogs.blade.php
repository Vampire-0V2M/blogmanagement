<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>All Blogs</title>
</head>
<body>
    <div class="container">
        <h1> Hello All</h1>
        <div>
            <a href="{{url('/')}}" class="btn btn-primary">Go Back to Login</a>
        </div>
        <div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($blogData as  $data)
                    <tr>
                    <td><img src="{{asset('public/images/blogImages/')}}/{{$data["file_path"]}}" alt="Not Available"></td>
                    <td>{{$data['title']}}</td>
                    <td>{{$data['description']}}</td>
                    <td>{{date('d-m-Y', strtotime($data['start_date']))}}</td>
                    <td>{{date('d-m-Y', strtotime($data['end_date']))}}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</body>
</html>
