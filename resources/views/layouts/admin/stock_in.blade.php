@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Masukkan Pembelian</h3>
                </div>
                <form action="{{ url('stock_ins') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nomor Nota</label>
                        <input type="text" name="nota" class="form-control" placeholder="Masukkan Nomor Nota" required="">
                    </div>
                    <div class="form-group">
                        <label >Nama Product</label>
                        <select class="form-control" name="product_id">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} Merk {{ $product->merk }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <select class="form-control" name="supplier_id">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Jumlah</label>
                        <input type="text" name="qty" class="form-control" placeholder="Masukkan Jumlah" required="">
                    </div>
                    <div class="form-group">
                      <label>Harga Barang</label>
                        <input type="text" name="price" class="form-control" placeholder="Masukkan Harga Barang" required="">
                    </div>
                  </div>      
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>

        </div>
    </div>
</div>
@endsection
