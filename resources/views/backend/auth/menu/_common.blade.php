@push('scripts')
    <script type="text/javascript" src="/backend/js/fontawesome.iconpicker/js/fontawesome-iconpicker.min.js"></script>
    <script>
        $('.icp-auto').iconpicker();
        $("select[name=pid]").change(function(){
            if($(this).val() != 0){
                $(".icon-wrap").hide();
            }else{
                $(".icon-wrap").show();
            }
        })
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="/backend/js/fontawesome.iconpicker/css/fontawesome-iconpicker.min.css"/>
@endpush