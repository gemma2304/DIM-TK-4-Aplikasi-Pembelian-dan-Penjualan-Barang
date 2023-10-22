@section('title')
Dashboard - Edit data barang
@endsection

<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form wire:submit="update">
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" wire:model="nama_barang"
                        placeholder="Masukkan Nama Barang">

                    @error('nama_barang')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold">Jumlah Pembelian</label>
                    <input type="text" class="form-control @error('jumlah_pembelian') is-invalid @enderror" wire:model="jumlah_pembelian"
                        placeholder="Masukkan Jumlah Pembelian">

                    @error('jumlah_pembelian')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold">Harga Beli</label>
                    <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" wire:model="harga_beli"
                        placeholder="Masukkan Harga Beli">
                    @error('harga_beli')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Supplier</label>
                    <input type="text" class="form-control @error('customer') is-invalid @enderror" wire:model="customer"
                        placeholder="Masukkan Nama Supplier">
                    
                    @error('customer')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Harga Jual</label>
                    <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" wire:model="harga_jual"
                        placeholder="Masukkan Harga Jual">
                    
                    @error('harga_jual')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                <button wire:click="destroy({{ $id_barang->id }})" wire:confirm="Apakah kamu yakin?" class="btn btn-md btn-danger" type="button">DELETE</button>
            </form>
        </div>
    </div>
</div>
