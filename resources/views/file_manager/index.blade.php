<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
</head>
<body>
<div class="container">
<table class="table">
    <thead>
    <tr>
        <th>Current Name</th>
        <th>Previous Name</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th>Number of Files</th>
        <th>Size (KB)</th>
        <th>Permission</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
    @if(Route::getCurrentRequest()->path() != 'file_manager')
        <tr>
            <td><a href="/{{ $previous_folder }}">..</a></td>
        </tr>
    @endif
    @foreach($folders as $folder)
    <tr>
        <td><a href="{{ Request::getPathInfo() . '/' . $folder->current_name }}">{{ $folder->current_name }}</a></td>
        <td>{{ is_null($folder->previous_name) ? '-' : $folder->previous_name }}</td>
        <td>{{ $folder->createdBy->name }}</td>
        <td>{{ is_null($folder->updatedBy) ? '-' : $folder->updatedBy->name }}</td>
        <td>{{ $folder->number_of_files }}</td>
        <td>{{ $folder->size }}</td>
        <td>{{ $folder->permission }}</td>
        <td>{{ $folder->created_at }}</td>
        <td>{{ $folder->updated_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<table class="table">
    @if($files->isNotEmpty())
    <thead>
    <tr>
        <th>Current Name</th>
        <th>Previous Name</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th>Downloads</th>
        <th>Views</th>
        <th>Size (KB)</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
            <tr>
                <td><a href="{{ Storage::url($file->path . '/' . $file->current_name) }}">{{ $file->current_name }}</a></td>
                <td>{{ is_null($file->previous_name) ? '-' : $file->previous_name }}</td>
                <td>{{ $file->createdBy->name }}</td>
                <td>{{ is_null($file->updatedBy) ? '-' : $file->updatedBy->name }}</td>
                <td>{{ $file->downloads }}</td>
                <td>{{ $file->views }}</td>
                <td>{{ $file->size }}</td>
                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
    @else
        <p>empty :(</p>
    @endif
</table>
<form action="{{ route('file_manager.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="text" name="new_folder">
    <br>
    <input type="submit" value="Submit">
</form>
<form action="{{ route('file_manager.upload') }}" class="dropzone" id="my-awesome-dropzone">
    <input type="hidden" name="path" value="{{ Request::getPathInfo() }}">
    {{ csrf_field() }}
</form>
</div>
</body>
</html>