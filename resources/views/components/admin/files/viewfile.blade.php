<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $file->filename }}</title>
</head>

<body>

    <div>
        <iframe style="margin-right:100px" height="650" width="1370" src="/admin-document/{{ $file->filename }}"> <iframe>
    </div>

</body>

</html>
