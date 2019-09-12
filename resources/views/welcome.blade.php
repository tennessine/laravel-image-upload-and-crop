<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="photo" />
            <button type="submit">upload</button>
        </form>
    </body>
</html>
