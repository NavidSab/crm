<script>
    var menus = {
        "oneThemeLocationNoMenus": "",
        "moveUp": "Move up",
        "moveDown": "Mover down",
        "moveToTop": "Move top",
        "moveUnder": "Move under of %s",
        "moveOutFrom": "Out from under  %s",
        "under": "Under %s",
        "outFrom": "Out from %s",
        "menuFocus": "%1$s. Element menu %2$d of %3$d.",
        "subMenuFocus": "%1$s. Menu of subelement %2$d of %3$s."
    };
    var arraydata = [];
    var addcustommenur = '{{ route("custommenu.create") }}';
    var updateitemr = '{{ route("menuitem.delete")}}';
    var generatemenucontrolr = '{{ route("generate.menucontrol") }}';
    var deleteitemmenur = '{{ route("menuitem.delete") }}';
    var deletemenugr = '{{ route("menu.delete") }}';
    var createnewmenur = '{{ route("menu.create") }}';
    var csrftoken = "{{ csrf_token() }}";
    var menuwr = "{{ url()->current() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrftoken
        }
    });
</script>
<script type="text/javascript" src="{{Module::asset('menu:js/menuscripts.js')}}"></script>
<script type="text/javascript" src="{{Module::asset('menu:js/mainmenuscripts.js')}}"></script>
<script type="text/javascript" src="{{Module::asset('menu:js/menu.js')}}"></script>