@extends('layout.master')
@section('title', 'Detail Riwayat Permintaan')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Riwayat Permintaan</strong></h2>
                        <form action="{{ route('transaksi.updateStatus', ['id' => $transaksi->id]) }}" class="col-md-2" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-0">
                                <select class="form-control form-control-user" id="status" name="status" onchange="this.form.submit()">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="waiting" {{ $transaksi->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                    <option value="verified" {{ $transaksi->status == 'verified' ? 'selected' : '' }}>Verified</option>
                                    <option value="on_going" {{ $transaksi->status == 'on_going' ? 'selected' : '' }}>On going</option>
                                    <option value="finished" {{ $transaksi->status == 'finished' ? 'selected' : '' }}>Finished</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong>Tanggal Transaksi</strong>
                            <p>{{ \Carbon\Carbon::parse($transaksi->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col">
                            <strong>Nama Pengaju</strong>
                            <p>{{ $transaksi->User->name }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <strong>Jadwal Penjemputan</strong>
                            <p>{{ \Carbon\Carbon::parse($transaksi->JadwalPickup->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col">
                            <strong>Status</strong>
                            <p>{{ ucfirst(str_replace('_', ' ', $transaksi->status)) }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <strong>Alamat Pengiriman</strong>
                            <p>{{ $transaksi->alamat_jemput }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Sampah</strong></h2>
                        <a href="{{ route('sampah.create', ['id_transaksi' => $transaksi->id]) }}" class="btn btn-primary">Tambah Sampah</a>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Sampah</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($detailTransaksi->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-start">Tidak ada sampah yang ditambahkan.</td>
                                    </tr>
                                    @else
                                    @foreach($detailTransaksi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Sampah->jenis_sampah }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>
                                            <a href="{{ route('sampah.edit', $item->id) }}" class="mr-1"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('sampah.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus sampah ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Total Keseluruhan</strong></td>
                                        <td colspan="2"><strong>{{ $detailTransaksi->sum('total') }}</strong></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
