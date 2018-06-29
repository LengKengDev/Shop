<a href="{{route('admin.users.show', $id)}}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-eye"></i> View </a>

@if ($active == false)
    <a href="#" class="btn btn-success btn-sm"
       onclick="event.preventDefault();document.getElementById('active-{{$id}}').submit();">
        <i class="fa fa-fw fa-check"></i> Kích hoạt </a>
@endif

<a href="#" class="btn btn-danger btn-sm"
   onclick="event.preventDefault();document.getElementById('delete-{{$id}}').submit();">
    <i class="fa fa-fw fa-trash"></i> Xoá </a>
<form action="{{route("admin.users.destroy", $id)}}" method="POST" id="delete-{{$id}}">
    {{csrf_field()}}
    @method("DELETE")
</form>

@if ($active == false)
    <form action="{{route("admin.users.update", $id)}}" method="POST" id="active-{{$id}}">
        {{csrf_field()}}
        @method("PATCH")
        <input type="hidden" name="active" value="1">
    </form>
@endif
