<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

    @if (session('success'))
    <p>{{ session('success') }}</p>
    <p>File yang diupload: {{ session('filename') }}</p>
    @endif

    @if (session('error'))
    <p>{{ session('error') }}</p>
    @endif

        


</body>
</html>
