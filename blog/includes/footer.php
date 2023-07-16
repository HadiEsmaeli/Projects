</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/comment.js"></script>
<script src="rate-plugin/src/jquery.star-rating-svg.js"></script>

<script>
  $(".my-rating").starRating({
      starSize: 25,
      initialRating: <?php if( isset($rate->rating) ) echo $rate->rating; else echo 0; ?> ,
      callback: function(currentRating, $el){
          $("#rating").val(currentRating);

          $(".my-rating").click(function(e){
              e.preventDefault(); 

              var formdata = $("#form-data").serialize() + "&insert=insert";
              
              $.ajax({
                  type: "POST",
                  url: "insertRating.php",
                  data: formdata,

                  success: function(respons) {
                      if( respons == 1 )
                          alert("your rate inserted successfully.");
                      else if ( respons == 0 )
                          alert("something wrong!");
                  }
              });
          });
      }
  });

  //live search

$("#search_data").keyup(function(){
    var search;

    search = $(this).val();
    
    if( search !== '' ){

        $(".row").css('display', 'none');
        $("main").css('display', 'none');

        $.ajax({
            type: "POST",
            url: "search.php",
            data: {
                search: search
            },
            success: function(data) {
                $("#search-data").html(data);
            }
        });
    }else {
        $("#search-data").css('display', 'none');
        $(".row").css('display', 'block');
        $("main").css('display', 'block');
    }

});

</script>
</body>
</html>