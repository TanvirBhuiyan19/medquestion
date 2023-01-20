@extends('layouts.adminMaster')

@section('title') Dashboard @endsection
@section('home') active @endsection

@section('adminContent')

<div class="row">
    <div class="col-md-11 m-5 ">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th style="width:15%">Title</th>
                <th style="width:20%">Description</th>
                <th>Variant</th>
                {{-- <th>Price</th> --}}
                <th></th>
                <th></th>
                {{-- <th>Stock</th> --}}
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @forelse($products as $key => $product)
                <tr>
                    <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                    <td>
                        {{$product->title}}<br>
                        Created at: <br> 
                        {{ date('d-F-Y', strtotime($data->created_at ?? '')) }}
                    </td>
                    <td>{!! Illuminate\Support\Str::limit(strip_tags($product->description ?? ''), 120) !!}</td>
                    <td>
                        @foreach($product->productVariantPrices as $data)
                            @isset($data->productVariantPriceOne->variant) {{$data->productVariantPriceOne->variant ?? ''}}@endisset
                            @isset($data->productVariantPriceTwo->variant) /{{$data->productVariantPriceTwo ->variant ?? ''}}@endisset
                            @isset($data->productVariantPriceThree->variant) /{{$data->productVariantPriceThree ->variant ?? ''}}@endisset
                            <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->productVariantPrices as $data)
                            Price: {{$data->price}}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->productVariantPrices as $data)
                            @if($data->stock != 0 && $data->stock != null)InStack: {{$data->stock}} @else <span class="text-danger">Out of Stock</span> @endif
                            <br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('product.edit',encrypt($product->id) ) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('product.delete', encrypt($product->id) ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-danger">No data found!</td> 
            </tr>
            @endforelse
              
            </tbody>
          </table>
    </div> 
</div>

<div class="d-flex justify-content-between align-items-center ">
    @if ($products->hasPages())
    <div class="pagination">
        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
    </div>
    @endif
    @if ($products->hasPages())
        {{ $products->onEachSide(2)->links() }}
    @endif
</div>



</div>
</div>
@endsection