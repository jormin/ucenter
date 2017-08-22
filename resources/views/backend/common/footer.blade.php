<script type="text/javascript" src="/backend/js/admin.js"></script>
<script type="text/javascript" src="/vendor/layer/layer.js"></script>
<script type="text/javascript" src="/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript" src="/js/fn.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        App.init();
        App.dashBoard();
        $(".helper-btn").click(function(){
            introJs().start();
        })
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    var successInfo = "{{ session('success') }}";
    if(successInfo){
        toastr.success(successInfo);
    }
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    function refresh(){
        location.reload();
    }

    $('.del-btn').click(function(){
        var _this = $(this);
        layer.confirm('确定删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(index){
            layer.close(index);
            $("#delete-"+_this.data('model')+"-form-"+_this.data('id')).submit();
        });
    })

    $('.revert-btn').click(function(){
        var _this = $(this);
        layer.confirm('确定恢复吗？', {
            btn: ['确定','取消'] //按钮
        }, function(index){
            layer.close(index);
            $("#revert-"+_this.data('model')+"-form-"+_this.data('id')).submit();
        });
    })
    $('.default-btn').click(function(){
        var _this = $(this);
        layer.confirm('确定设置为默认项吗？', {
            btn: ['确定','取消'] //按钮
        }, function(index){
            layer.close(index);
            $("#default-"+_this.data('model')+"-form-"+_this.data('id')).submit();
        });
    })
    $("select[name=member_id]").change(function () {
        var _this = $(this);
        var id = _this.val();
        if(!id){
            return;
        }
        requestAjax(null,'GET','/members/contactinfo/'+id,function (msg) {
            if(msg.result == 0){
                $.each(msg.data,function(key){
                    _this.closest('form').find('input[name='+key+']').val(msg.data[key]);
                });
            }else{
                toastr.error("读取客户信息失败，请刷新页面重试");
            }
        });
    })

    $(document).on("click",".item-checkbox",function () {
        selectListen($(this));
        select_listen_single($(this));
    })
    $(document).on("click",".all-checkbox",function () {
        $(this).closest('table').find("input[name='item-checkbox']").prop("checked",$(this).is(":checked"));
        selectListen($(this));
    })
    function selectListen(dom){
        var orders = $(dom).closest('table').find("input[name='item-checkbox']:checked");
        var orders_array = new Array();
        for(var i=0;i<orders.length;i++){
            var dom = orders[i];
            var id = $(dom).data('id');
            orders_array.push(id);
        }
        orders = orders_array.join(',');
        if(orders == '' || orders == null){
            $(dom).closest('div.content').find(".mutil_option_group").slideUp();
        }else{
            $(dom).closest('div.content').find(".mutil_option_group").slideDown();
        }
    }
    function select_listen_single(dom){
        var checkedBoxLength = dom.closest('table').find("input[name=item-checkbox]:checked").length;
        var allCheckboxLength = dom.closest('table').find("input[name=item-checkbox]").length;
        if(checkedBoxLength > 0){
            if(checkedBoxLength === allCheckboxLength){
                dom.closest('table').find('input[name=all-checkbox]').prop("checked",true);
            }else{
                dom.closest('table').find('input[name=all-checkbox]').prop("checked",false);
            }
        }else{
            dom.closest('table').find('input[name=all-checkbox]').prop("checked",false);
        }
    }
    $(".btn-multi-cmd").click(function () {
        var _this = $(this);
        var doms = _this.closest('div.content').find('table input[name=item-checkbox]:checked');
        var ids = new Array();
        $(doms).each(function (index,item) {
            ids.push($(this).data('id'));
        })
        if(ids.length == 0){
            toastr.error("请至少选择一个订单");
            return;
        }
        layer.confirm('确定批量操作吗？', {
            btn: ['确定','取消'] //按钮
        }, function(index){
            layer.close(index);
            _this.closest('form').find('input[name=ids]').val(ids.join(','));
            var args = _this.data('args');
            if(args){
                $(args.split(",")).each(function (index,item) {
                    _this.closest('form').find('input[name='+item+']').val(_this.data(item));
                })
            }
            _this.closest('form').submit();
        });
    })
    $(".btn-remove-combination-order").click(function () {
        var _this = $(this);
        layer.confirm('确定移除订单吗？', {
            btn: ['确定','取消'] //按钮
        }, function(index){
            layer.close(index);
            _this.closest('form').submit();
        });
    });
    $(".btn-append-combination-order-modal").click(function(){
        $("#append_order_modal").closest('form').attr('action',$(this).data('uri'));
        $("#append_order_modal").modal('show');
    });
    $(".btn-append-combination-order").click(function () {
        var _this = $(this);
        var doms = _this.closest('form').find('table input[name=item-checkbox]:checked');
        var ids = new Array();
        $(doms).each(function (index,item) {
            ids.push($(this).data('id'));
        })
        if(ids.length == 0){
            toastr.error("请至少选择一个订单");
            return;
        }
        layer.confirm('确定添加订单吗？', {
            btn: ['确定','取消'] //按钮
        }, function(index){
            layer.close(index);
            _this.closest('form').find('input[name=ids]').val(ids.join(','));
            _this.closest('form').submit();
        });
    });

    $('.selectbox').each(function () {
        var _this = $(this);
        var vals = $(this).data('val');
        if(vals){
            $(vals.toString().split(',')).each(function (index,item) {
                _this.find('option[value='+item+']').attr('selected',true);
            })
        }
        $(this).multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
            afterInit: function(ms){
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e){
                        if (e.which === 40){
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e){
                        if (e.which == 40){
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    });
    $('form').submit(function () {
        if($(this).attr('target') !== '_blank'){
            $("#loading-wrap").show();
        }
        $("html,body").addClass('overhidden');
    })
</script>
@stack('scripts')
@stack('styles')
</body>
</html>