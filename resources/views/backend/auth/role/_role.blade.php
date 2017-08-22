<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>名称</th>
        <th>显示名称</th>
        <th>说明</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @if(count($roles)>0)
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td class="text-center">
                    <a href="{{ route('roles.edit',$role->id) }}" data-original-title="编辑" data-toggle="tooltip">
                        [编辑]
                    </a>
                    @include('backend.auth.role._deleteForm')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="text-center">
                暂时没有角色
            </td>
        </tr>
    @endif
    </tbody>
</table>