<!-- resources/views/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <div class="container">
        <h1>Edit Student: {{ $siswa->nama }}</h1>

        <!-- Update the form action to use 'no_pendaftaran' instead of 'id' -->
        <form action="{{ route('siswa.update', $siswa->no_pendaftaran) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nama">Name:</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}" required>

            <label for="alamat">Address:</label>
            <input type="text" name="alamat" value="{{ $siswa->alamat }}" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
