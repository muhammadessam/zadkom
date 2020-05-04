<script>
    $(function () {
        $("#@yield('name')").DataTable({
            "language":
                {
                    "paginate":
                        {
                            "next":
                                "التالي",
                            "previous":
                                "السابق"
                        }
                    ,
                    "search":
                        "بحث : ",
                    "lengthMenu":
                        "عرض _MENU_ سائقين",
                    "entries":
                        "سائق"
                }
            ,
            "info":
                false,
        });
    })
    ;
    $(document).ready(function () {
        $('#drivers_filter').addClass('offset-8');
    });

    function myFunction() {
        if (!confirm("هل تريد تاكيد الخذف"))
            event.preventDefault();
    }
</script>
