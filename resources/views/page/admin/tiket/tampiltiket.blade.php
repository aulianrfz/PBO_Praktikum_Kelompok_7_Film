@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Pembelian Tiket tiket Bioskop</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('tiket.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" onsubmit="">
            @csrf
            <h2 class="text-center mt-4 mb-4">Tiket Bioskop</h2>

            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="time" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="waktu" placeholder="Masukkan waktu" value = "{{ $data -> waktu }}">
                @error('waktu')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                <input type="date" name="tanggal_pemesanan" class="form-control @error('tanggal_pemesanan') is-invalid @enderror" id="tanggal_pemesanan" placeholder="Masukkan tanggal pemesanan" value = "{{ $data -> tanggal_pemesanan }}">
                @error('tanggal_pemesanan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="row_kursi" class="form-label @error('row_kursi') is-invalid @enderror">Row Kursi</label>
                <select class="form-select" name="row_kursi">
                    <option value="{{ $data -> row_kursi }}">{{ $data -> row_kursi }}</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                </select>
                @error('row_kursi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <!-- <input type="text" name="row_kursi" class="form-control" id="row_kursi" placeholder="Masukkan row kursi" required> -->
            </div>

            <div class="form-group">
                <label for="seat_kursi">Seat Kursi</label>
                <input type="number" name="seat_kursi" class="form-control @error('seat_kursi') is-invalid @enderror" id="seat_kursi" placeholder="Masukkan seat kursi" value = "{{ $data -> seat_kursi }}">
                @error('seat_kursi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            
        </form>

    </div>

    <footer>
        <p>© 2023 Pembelian Tiket tiket Bioskop.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
