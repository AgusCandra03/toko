@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Stok Keluar</h3>
                </div>
                <form action="{{ url('stock_outs') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Nama Product</label>
                        <select class="form-control" name="product_id">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} Merk {{ $product->merk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Jumlah</label>
                        <input type="text" name="qty" class="form-control" placeholder="Masukkan Jumlah" required="">
                    </div>
                    <div class="form-group">
                      <label>Decription</label>
                        <input type="text" name="description" class="form-control" placeholder="Masukkan Deskripsi" required="">
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
