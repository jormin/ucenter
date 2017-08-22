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
    @if(count($perms)>0)
        @foreach($perms as $perm)
            <tr>
                <td class="text-left">{{ $perm->name }}</td>
                <td class="text-left">{{ $perm->display_name }}</td>
                <td class="text-left">{{ $perm->description }}</td>
                <td class="text-center">
                    <a href="{{ route('perms.edit',$perm->id) }}" data-original-title="编辑" data-toggle="tooltip">
                        [编辑]
                    </a>
                    @include('backend.auth.perm._deleteForm')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="text-center">
                暂时没有权限
            </td>
        </tr>
    @endif
    </tbody>
</table>