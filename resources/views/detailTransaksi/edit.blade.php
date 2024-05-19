@extends('layout.master')
@section('title', 'Edit Detail Transaksi')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Edit Sampah</strong></h2>
                        <button type="button" class="btn btn-success" id="add-product">Tambah Sampah</button>
                    </div>
                 <form action="{{ route('sampah.update',  $detail_transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_transaksi" value="{{ $detail_transaksi->id_transaksi }}">
                        <div class="form-group mt-4">
                            <label for="id_sampah">Sampah:</label>
                            <select id="id_sampah" name="id_sampah" class="form-control form-control-user @error('id_sampah')is-invalid @enderror">
                                <option value="" disabled selected>Pilih Jenis Sampah</option>
                                @foreach($sampah as $item)
                                    <option value="{{ $item->id }}" {{ $detail_transaksi->id_sampah == $item->id ? 'selected' : '' }} data-harga="{{ $item->harga }}">{{ $item->jenis_sampah }}</option>
                                @endforeach
                            </select>
                            @error('id_sampah')
                                <span class="invalid-feedback"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="qty">QTY :</label>
                            <input type="number" class="form-control form-control-user" value="{{ $detail_transaksi->qty }}" name="qty" id="qty" onchange="calculateTotal()">
                        </div>
                        <div class="form-group mt-4">
                            <label for="total">Total :</label>
                            <input type="number" class="form-control form-control-user" name="total" id="total" value="{{ $detail_transaksi->total }}" readonly>
                        </div>

                        
                    <div class="row justify-content-end">
                        <a class="btn btn-danger" href="{{ route('transaksi.show', $detail_transaksi->id_transaksi) }}">Batal</a>
                        <button type="submit" class="btn btn-primary ml-2">Tambah</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<script>
    function calculateTotal() {
        var hargaSampah = parseFloat($('#id_sampah option:selected').data('harga'));
        var qty = parseInt($('#qty').val());
        var total = hargaSampah * qty;
        $('#total').val(total);
    }
    
    $(document).ready(function() {
        calculateTotal(); // Panggil fungsi saat dokumen siap
    });
</script>

@endauth
@endsection
