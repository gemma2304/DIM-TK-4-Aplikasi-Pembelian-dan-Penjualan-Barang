@section('title')
Dashboard - Daftar Penjualan
@endsection

<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Penjualan</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Nama Customer</th>
                            <th>Total Beli</th>
                            <th scope="col" style="width: 15%">Actions</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penjualans as $penjualan)
                            <tr>
                                <td>{{ $penjualan->barangs->nama_barang }}</td>
                                <td>{{ $penjualan->nama_customer }}</td>
                                <td>{{ $penjualan->total_beli }}</td>
                                {{--  --}}
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('edit.penjualan', $penjualan->id) }}" wire:navigate class="btn btn-sm btn-primary">Edit</a>
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
                {{ $penjualans->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
