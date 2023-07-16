$(document).ready(function(){

    $("#sendcomment").on('click', function(e){
        e.preventDefault();

        var formdata = $("#comment_data").serialize() + '&submit=submit';

        $.ajax({
            type: 'POST',
            url: 'addComment.php',
            data: formdata,

            success: function(data){

                if( data == 0 ) {
                    alert('you must login');
                }else if(data == 1){
                    alert( 'something wrong!'+formdata );
                }else{

                    $("#comment").val("");
                    $("#msg").html(data).toggleClass('alert alert-success bg-success text-white mt-3');

                    setTimeout(function(){ 
                        $("#msg").hide();
                    }, 3000);

                    
                    var q = getID();
                    $(".replace").load("getComment.php"+window.location.search, {pid:q});

                }
            }
        });
    });
});

function getID() {
    var queryString = window.location.search;
    var q = new URLSearchParams(queryString);
    return q.get('id');
}