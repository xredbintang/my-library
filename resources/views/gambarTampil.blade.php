<!DOCTYPE html>
<html>
<head>
    <title>Gambar Diupload</title>
</head>
<body>
    <h1>Gambar yang Diupload</h1>

    @if (!empty($filename))
        <img src="{{ asset('storage/uploads/' . $filename) }}" alt="Uploaded Image" style="max-width: 500px;">
    @else
        <p>Tidak ada gambar yang diupload.</p>
    @endif
</body>
</html>
