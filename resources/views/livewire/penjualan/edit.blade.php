@section('title')
Dashboard - Edit Pesanan
@endsection

<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Penjualan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form wire:submit="update">
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
                    <label class="fw-bold">Total Beli</label>
                    <input type="text" class="form-control @error('total_beli') is-invalid @enderror " disabled wire:model="total_beli"
                        placeholder="Harga Jual">

                    @error('total_beli')
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

                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                <button wire:click="destroy({{ $id_penjualan->id }})" wire:confirm="Apakah kamu yakin?" class="btn btn-md btn-danger" type="button">DELETE</button>
            </form>
        </div>
    </div>
</div>
