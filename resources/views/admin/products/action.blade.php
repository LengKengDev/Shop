<div class="text-center">
    <a href="{{url()->route('admin.products.edit', ['product' => $slug])}}" class="btn btn-primary btn-sm" title="Edit">
        <i class="fa fa-fw fa-edit"></i>
    </a>
    <a href="#" class="btn btn-danger btn-sm" title="Delete" onclick="event.preventDefault();if(confirm('Are you sure you want to delete order?')){
            document.getElementById('product-delete-form-{{$id}}').submit();}">
        <i class="fa fa-fw fa-trash"></i>
    </a>
    <form id="product-delete-form-{{$id}}" action="{{ url()->route('admin.products.destroy', ['product' => $slug]) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        @method("DELETE")
    </form>
</div>
