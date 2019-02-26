<script>
    //alert('hello');
   /*
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
    */
   //работа с базой данных начало
   var database={
       path:'/../../../mylib/ajax.php',
       update_text:function (table, column, text, id) {
           $.ajax({
               url: this.path,
               type: "POST",
               data:{table:table, column:column, text:text, id:id},
               success: function(result){
                   alert(result);
               }});
           //alert(column);
       }
   };
   //работа с базой данных окончание

    $( "body" ).on('click', '.read_cat', function(){ //save of file
        var table=$(this).attr('data-table');
        var column=$(this).attr('data-col');
        var text=$(this).parent().parent().find('.myhref').text();
        var id=$(this).attr('data-id');
        //alert(id);
        database.update_text(table, column, text,  id);
    });

</script>