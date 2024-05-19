@extends('layout.master')
@section('title', 'Tambah Detail Transaksi')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Tambah Sampah</strong></h2>
                        <button type="button" class="btn btn-success" id="add-product">Tambah Sampah</button>
                    </div>
                    <form action="{{ route('sampah.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_transaksi" value="{{ $transaksi->id }}">
    
                        <div id="produk-container">
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addButton = document.getElementById("add-product");
        const container = document.getElementById("produk-container");

        addButton.addEventListener("click", function () {
            const row = document.createElement("div");
            row.classList.add("produk-row");
            row.innerHTML = `
                <div class="form-group mt-4">
                    <label for="id_sampah">Sampah:</label>
                    <select class="id_sampah form-control form-control-user" name="id_sampah[]" onchange="calculateTotal(this)">
                        <option value="" disabled selected>Pilih Sampah</option>
                        @foreach($sampah as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->harga }}">{{ $item->jenis_sampah }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="qty">QTY :</label>
                    <input type="number" class="qty form-control form-control-user" name="qty[]" onchange="calculateTotal(this)" placeholder="Tambahkan QTY">
                </div>
                <div class="form-group mt-4">
                    <label for="total">Total :</label>
                    <input type="number" class="total form-control form-control-user" name="total[]" readonly>
                </div>
                <div class="row justify-content-end"> 
                            <a class="btn btn-danger ml-2" href="{{ route('transaksi.index') }}">Batal</a>
                            <button type="submit" class="btn btn-primary ml-2">Tambah</button>
                        </div>
            `;
            container.appendChild(row);
        });
    });

    function calculateTotal(element) {
        const row = element.closest(".produk-row");
        const price = row.querySelector('.id_sampah option:checked').getAttribute('data-price');
        const qty = row.querySelector('.qty').value;
        const totalInput = row.querySelector('.total');
        
        const total = price * qty;
        totalInput.value = total;
    }
    
</script>

@endauth
@endsection
