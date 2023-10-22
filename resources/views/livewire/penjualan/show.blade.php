@section('title')
Dashboard - Pesan Barang
@endsection

<div>
    {{-- In work, do what you enjoy. --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesan Barang</h1>
        @if (session()->has('message'))
            <a href="#" class="alert alert-success">
                {{ session('message') }}
            </a>
        @endif
        @if (session()->has('error'))
            <a href="#" class="alert alert-danger">
                {{ session('error') }}
            </a>
        @endif
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            {{-- <th>Jumlah Barang</th> --}}
                            {{-- <th>Harga Beli</th> --}}
                            <th>Supplier</th>
                            <th>Jumlah Penjualan</th>
                            <th>Harga</th>
                            <th scope="col" style="width: 15%">Actions</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->customer }}</td>
                                <td>{{ $barang->jumlah_penjualan }}</td>
                                <td>{{ $barang->harga_jual }}</td>
                                {{--  --}}
                                <td class="text-center">
                                    <div>
                                        @if ($barang->stok == 0)
                                            <a href="{{ route('create.penjualan', $barang->id) }}" wire:navigate class="btn btn-sm btn-success disabled">Jual Barang</a>
                                        @else
                                            <a href="{{ route('create.penjualan', $barang->id) }}" wire:navigate class="btn btn-sm btn-success">Jual Barang</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            
                        @empty
                            <div class="alert alert-danger">
                                Data barang kosong
                            </div>
                        @endforelse
                        
                    </tbody>
                </table>
                {{ $barangs->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
