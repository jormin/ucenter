<div class="cl-sidebar" data-step="1" data-position="right" data-intro="hello intro">
    <div class="cl-toggle">
        <i class="fa fa-bars"></i>
    </div>
    <div class="cl-navblock">
        <div class="menu-space">
            <div class="content">
                <ul class="cl-vnavigation">
                    @foreach($navbarMenus as $menu)
                        @if($menu->hasPermission())
                            @if($menu->isParentMenuShow())
                                <li class="@if ($menu->route && url()->current() == $menu->route()) active @endif nav-item" data-level="1" >
                                    <a href="@if(count($menu->children)>0) javascript:; @elseif($menu->route)  {{ $menu->route() }} @endif">
                                        <i class="fa {{ $menu->icon }}"></i>
                                        <span>{{ $menu->name }}</span>
                                    </a>
                                    @if(count($menu->children)>0)
                                        <ul class="sub-menu">
                                            @foreach($menu->children as $subMenu)
                                                @if($subMenu->hasPermission())
                                                    <li data-level="2" class="@if (url()->current() == $subMenu->route())  active @endif nav-item">
                                                        <a href="@if($subMenu->route) {{ $subMenu->route() }} @endif">
                                                            <span>{{ $subMenu->name }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
            <input type="text" class="form-control search nav-search" placeholder="Search...">
            <button id="sidebar-collapse" class="btn btn-default" style="">
                <i style="color:#fff;" class="fa fa-angle-left"></i>
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(".nav-search").on("input",function(){
            var text = $(this).val();
            if(!text){
                $(".cl-sidebar").find('.nav-item').removeClass('hide');
                return;
            }
            $(".cl-sidebar").find('.nav-item[data-level=1]').each(function(index,item){
                var ptext = $(this).find('span').text();
                if($(this).find('.nav-item').length > 0){
                    $(this).find('.nav-item').each(function(index,item){
                        var nav = $(this).find('span').text();
                        if(nav.indexOf(text) < 0 ){
                            $(this).addClass('hide');
                        }else{
                            $(this).removeClass('hide');
                        }
                    })
                    if($(this).find('.nav-item').length == $(this).find('.nav-item.hide').length){
                        $(this).addClass('hide');
                    }else{
                        $(this).removeClass('hide');
                    }
                }else{
                    if(ptext.indexOf(text) < 0){
                        $(this).addClass('hide');
                    }else{
                        $(this).removeClass('hide');
                    }
                }
            });
        })
    </script>
@endpush