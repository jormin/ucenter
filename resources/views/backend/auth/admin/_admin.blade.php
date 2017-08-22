<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>账号</th>
        <th>姓名</th>
        <th>邮箱</th>
        <th>手机</th>
        <th>角色</th>
        <th>启用</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @if(count($admins)>0)
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->mobile }}</td>
                <td>
                    @foreach($admin->roles as $role)
                        <span class="tag">
                            {{ $role->display_name or $role->name }}
                        </span>&nbsp;
                    @endforeach
                </td>
                <td class="text-center">
                    @include('backend.auth.admin._activeForm')
                </td>
                <td class="text-center">
                    <a href="{{ route('admins.edit',$admin->id) }}" data-original-title="编辑" data-toggle="tooltip">
                        [编辑]
                    </a>
                    @include('backend.auth.admin._deleteForm')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="text-center">
                暂时没有管理员
            </td>
        </tr>
    @endif
    </tbody>
</table>