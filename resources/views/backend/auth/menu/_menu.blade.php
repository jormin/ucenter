<li class="dd-item" data-id="{{ $menu->id }}">
    <div class="dd-handle dd-nodrag">
        @if(!$menu->pid)
            <i class="fa {{ $menu->icon }}"></i>
        @endif
        <a href="{{ route('menus.edit',$menu->id) }}">
            {{ $menu->name }}
        </a>

        @if($menu->permission_id)
            <span class="tag">{{ $menu->permission()->display_name }}</span>
        @endif

        @include('backend.auth.menu._deleteForm')
        <a href="{{ route('menus.edit',$menu->id) }}" class="pull-right cmd-btn" data-original-title="编辑" data-toggle="tooltip">
            [编辑]
        </a>
        @if($menu->route)
            <a href="{{ $menu->route() }}" class="pull-right cmd-btn" data-original-title="{{ $menu->route() }}" data-toggle="tooltip">
                [访问]
            </a>
        @endif
    </div>
    @if(count($menu->children)>0)
        <ol class="dd-list">
            @each('admin.auth.menu._menu',$menu->children,'menu')
        </ol>
    @endif
</li>
