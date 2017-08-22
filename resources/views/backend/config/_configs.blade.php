<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>值</th>
        <th>默认</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @if(count($configs)>0)
        @foreach($configs as $config)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $config->value }}</td>
                <td>
                    @if($config->default === 1)
                        <i class="fa fa-check-circle"></i>
                    @endif
                </td>
                <td>
                    @include('backend.config._defaultForm')
                    @include('backend.config._deleteForm')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="8">
                暂时没有值
            </td>
        </tr>
    @endif
    </tbody>
</table>