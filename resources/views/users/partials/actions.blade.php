<td width="8px">
    <a class="btn btn-outline-info btn-sm mr-1 elevation-4" href=" {{route('admin.users.edit',$user)}} "><i class="fas fa-edit"></i></a>
</td>
<td width="8px">
    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger btn-sm elevation-4"><i class="fas fa-trash"></i></button>
    </form>
</td>