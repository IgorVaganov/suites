<script>
    //alert('hello');

    var path='/../../../mylib/ajax.php';
    $.ajax({
        url: path,
        type: "POST",
        data:{update1111:'text'},
        success: function(result){
            //$('body').html(result);
            alert(result);
            //today_date.html(result);
            //$('body').html(result);
        }});

</script>