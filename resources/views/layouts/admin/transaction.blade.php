@extends('layouts.admin')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form  method="POST" id="dinamic">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Product</label>
                        <select class="form-control" name="multi">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"> {{ $product->name }} Merk {{ $product->merk }} ({{ $product->satuan }}) </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" id="qty" name="qty" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="button" class="btn btn-primary" id="add" value="Masukkan Produk" onclick="addProduct();">
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col">
                      <div class="card">
                        <div class="card-body p-0">
                          <table class="table table-striped" id="tbl">
                            <thead>
                              <tr>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th style="width: 40px"></th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
      function addProduct(){
        alert("hello");
      }
    </script>
@endsection