<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Edit Blog</title>
</head>
<body>
    <div class="container">
        <h3>Blogs</h3>
        <form action="{{url('update-blog').'/'.$editBlog['id']}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" id="title" name="title" value="{{$editBlog['title']}}">
                <span class="text-danger"  style="margin-top: 1px;" id="errorTitle">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10" >
                    {{$editBlog['description']}}
                </textarea>
                <span class="text-danger"  style="margin-top: 1px;" id="errorlast_name">
                    @error('description')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input class="form-control" type="date" id="start_date" name="start_date" value="{{$editBlog['start_date']}}">
                <span class="text-danger"  style="margin-top: 1px;" id="errorStart_date">
                    @error('start_date')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input class="form-control" type="date" id="end_date" name="end_date" value="{{$editBlog['end_date']}}">
                <span class="text-danger"  style="margin-top: 1px;" id="errorEnd_date">
                    @error('end_date')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="file_path">Image</label>
                <input class="form-control" type="file" id="file_path" name="file_path">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Blog">
                <a href="{{url('/admin')}}" class="btn btn-dark">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
