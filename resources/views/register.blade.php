<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h3>Register here</h3>
        <form action="" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" name="first_name">
                <span class="text-danger"  style="margin-top: 1px;" id="errorfirst_name">
                    @error('first_name')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" name="last_name">
                <span class="text-danger"  style="margin-top: 1px;" id="errorlast_name">
                    @error('last_name')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input class="form-control" type="email" id="email" name="email">
                <span class="text-danger"  style="margin-top: 1px;" id="errorEmail">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input class="form-control" type="password" id="password" name="password">
                <span class="text-danger"  style="margin-top: 1px;" id="errorPassword">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input class="form-control" type="date" id="dob" name="dob">
                <span class="text-danger"  style="margin-top: 1px;" id="errorDob">
                    @error('dob')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="file_path">Image</label>
                <input class="form-control" type="file" id="file_path" name="file_path">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="" disabled selected>Choose Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <span class="text-danger"  style="margin-top: 1px;" id="errorRole">
                    @error('role')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
            <div>
                <a href="{{url('/')}}" class="btn btn-primary">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
