<!DOCTYPE html>
<html>
<head>
    <title>Code Duplication Warnings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Code Duplication Warnings</h1>
    @if(empty($warnings))
        <div class="alert alert-success">No duplications found!</div>
    @else
        <div class="alert alert-warning">Duplications found!</div>
        <ul class="list-group">
            @foreach($warnings as $hash => $files)
                <li class="list-group-item">
                    <strong>Hash:</strong> {{ $hash }}
                    <ul>
                        @foreach($files as $file)
                            <li>{{ $file }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</body>
</html>
