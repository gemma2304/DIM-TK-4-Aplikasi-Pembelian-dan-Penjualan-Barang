@section('title')
Dashboard
@endsection

<!-- Begin Page Content -->
<div>
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Laba Kotor
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($laba_kotor)</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Laba Rugi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($laba_rugi) (<span class="{{ $laba_rugi > 0 ? 'text-success' : 'text-danger' }}"> {{ $pesan }} </span>)</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-solid fa-sack-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
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
                            <th>Jumlah Pembelian</th>
                            <th>Harga Beli</th>
                            <th>Supplier</th>
                            <th>Jumlah Penjualan</th>
                            <th>Harga Jual</th>
                            <th scope="col" style="width: 15%">Actions</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang as $barangs)
                            <tr>
                                <td>{{ $barangs->nama_barang }}</td>
                                <td>{{ $barangs->jumlah_pembelian }}</td>
                                <td>{{ $barangs->harga_beli }}</td>
                                <td>{{ $barangs->customer }}</td>
                                <td>{{ $barangs->jumlah_penjualan }}</td>
                                <td>{{ $barangs->harga_jual }}</td>
                                {{--  --}}
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('edit-barang', $barangs->id) }}" wire:navigate class="btn btn-sm btn-primary">EDIT</a>
                                        {{-- <button wire:click="destroy({{ $barangs->id }})" wire:confirm="Apakah kamu yakin?" class="btn btn-sm btn-danger" type="button">DELETE</button> --}}
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
                {{ $barang->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->