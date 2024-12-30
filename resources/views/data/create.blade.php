<!-- filepath: /c:/laragon/www/grotima/resources/views/data/create.blade.php -->
<form action="{{ route('data.store') }}" method="POST">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops! Ada masalah dengan input Anda:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div>
        <label for="marketplace">Marketplace:</label>
        <select name="marketplace" id="marketplace" required>
        <option value="">Select Marketplace</option>
        @foreach ($marketplace as $m)            
        <option value="{{ $m->id }}" @if (old('id')==$m->id) selected @endif>{{ $m->marketplace_name }}</option>
        @endforeach
        </select>
    </div>

    <div>
        <label for="ekspedisi">Ekspedisi:</label>
        <select name="ekspedisi" id="ekspedisi" required>
        <option value="">Select ekspedisi</option>
        @foreach ($ekspedisi as $e)            
        <option value="{{ $e->id }}" @if (old('id')==$e->id) selected @endif>{{ $e->ekspedisi_name }}</option>
        @endforeach
        </select>
    </div>

    <div>
        <label for="stok">Stok Awal:</label>
        @if ($stok)
            <input type="number" name="stok" id="stok" value="{{ $stok->jumlah_stok }}" required>
        @else
            <input type="number" name="stok" id="stok" value="0" required>
        @endif
    </div>

    <div>
        <label for="stok_terambil">Stok Terambil:</label>
        <input type="number" name="stok_terambil" id="stok_terambil" value="0" required>
    </div>

    <div>
        <label for="jumlah_stok">Jumlah Stok:</label>
        <input type="number" name="jumlah_stok" id="jumlah_stok" value="0" readonly>
    </div>

    <script>
        document.getElementById('stok_terambil').addEventListener('input', function() {
            var stokAwal = parseInt(document.getElementById('stok').value);
            var stokTerambil = parseInt(this.value);
            var jumlahStok = stokAwal - stokTerambil;
            document.getElementById('jumlah_stok').value = jumlahStok;
        });
    </script>
    <button type="submit">Simpan</button>
</form>