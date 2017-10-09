
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/metisMenu.min.js"></script>
<script src="js/icheck.min.js"></script>
<!--<script src="js/homer.js"></script>-->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>

<script>

    $(function () {

        // Initialize Example 1
        $('#example2').dataTable( {
            "ajax": 'api/datatables.json',
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });

        // Initialize Example 2
        $('#categoryTable').dataTable();
		$('#signup_users').dataTable();
		$('#monthlyRevenue').dataTable();
    });

</script>


</body>
</html>