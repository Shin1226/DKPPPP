<html lang="en">
<head>
    <title>Dashboard Admin Berita</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Dashboard Admin - Tambah Berita</h2>
        <form id="newsForm">
            <div class="form-group">
                <label for="title">Judul Berita:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Isi Berita:</label>
                <div id="summernote"></div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Berita</button>
        </form>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Masukkan isi berita di sini',
            tabsize: 2,
            height: 300
        });

        $('#newsForm').on('submit', function(e) {
            e.preventDefault();
            let title = $('#title').val();
            let content = $('#summernote').summernote('code');

            // Lakukan operasi simpan ke database (backend)
            $.ajax({
                url: '/path/to/your/api/save-news',  // Ganti dengan URL API backend untuk menyimpan berita
                type: 'POST',
                data: { title: title, content: content },
                success: function(response) {
                    alert('Berita berhasil disimpan!');
                },
                error: function() {
                    alert('Gagal menyimpan berita.');
                }
            });
        });
    </script>
</body>
</html>
