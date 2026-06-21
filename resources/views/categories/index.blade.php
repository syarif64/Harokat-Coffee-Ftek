<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kategori</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   required>
        </div>

        <button class="btn btn-success">
            Simpan Kategori
        </button>
    </form>

    <hr>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>

        <tbody>

            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>