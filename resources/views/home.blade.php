<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Laravel Search</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
                <form action="/" method="GET"> <!-- Tambahkan action dan method formulir -->
                    <input type="search" class="form-control" placeholder="Cek resi [ENTER]" name="search" value="{{ request('search') }}">
                </form>
            </div>
        </div>
    
        @if ($barangs)
            @forelse($barangs as $barang)
                <li class="list-group-item">{{ $barang->nama_barang }}</li>
                <li class="list-group-item">{{ $barang->deskripsi }}</li>
            @empty
                <li class="list-group-item list-group-item-danger">Barang tidak ditemukan</li>
            @endforelse
        @endif

        <a href="{{ route('index') }}">reset</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
