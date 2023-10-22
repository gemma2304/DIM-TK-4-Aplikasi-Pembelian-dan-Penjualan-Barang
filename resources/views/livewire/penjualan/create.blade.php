@section('title')
Dashboard - Pesan Barang
@endsection

<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jual Barang</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form wire:submit="store">
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" wire:model="nama_barang"
                        placeholder="Nama barang" disabled>

                    @error('nama_barang')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold">Harga Jual</label>
                    <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" wire:model="harga_jual"
                        placeholder="Harga jual barang" disabled>

                    @error('harga_jual')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold">Sisa Barang</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" wire:model="stok"
                        placeholder="Harga jual barang" disabled>

                    @error('stok')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Customer</label>
                    <input type="text" class="form-control @error('customer') is-invalid @enderror" wire:model="customer"
                        placeholder="Masukkan nama pembeli">

                    @error('customer')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Total Beli</label>
                    <input type="text" class="form-control @error('total_beli') is-invalid @enderror" wire:model="total_beli"
                        placeholder="Masukkan total beli">

                    @error('total_beli')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
            </form>
        </div>
    </div>
</div>
