<script>
    window.datatable = function (tableId, responsive = true, lengthChange = false, autoWidth = false, searching = true, ordering = false) {
        $("#" + tableId).DataTable({
            "responsive": responsive,
            "lengthChange": lengthChange,
            "autoWidth": autoWidth,
            "searching": searching,
            "ordering": ordering
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    };
</script>