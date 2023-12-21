
  $(document).ready(function() {
    

    $(".addItemBtn").click(function(e) {
      alert("click");
      e.preventDefault();
      var $form = $(this).closest(".submit-form");
      var item_id = $form.find(".item_id").val();
      var item_name = $form.find(".item_name").val();
      var item_description = $form.find(".item_description").val();
      var item_price = $form.find(".item_price").val();
      var item_image = $form.find(".item_image").val();
      var item_code = $form.find(".item_code").val();

      // var pqty = $form.find(".pqty").val();

      // $.ajax({
      //   url: 'ajax/action.php',
      //   method: 'post',
      //   data: {
      //     item_id: item_id,
      //     item_name: item_name,
      //     pprice: pprice,
      //     pqty: pqty,
      //     pimage: pimage,
      //     pcode: pcode
      //   },
      //   success: function(response) {
      //     $("#message").html(response);
      //     window.scrollTo(0, 0);
      //     load_cart_item_number();
      //   }
      // });
    });




    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'ajax/action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });
    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      alert("click2");
      e.preventDefault();
    //   var $form = $(this).closest(".form-submit");
    //   var pid = $form.find(".pid").val();
    //   var pname = $form.find(".pname").val();
    //   var pprice = $form.find(".pprice").val();
    //   var pimage = $form.find(".pimage").val();
    //   var pcode = $form.find(".pcode").val();

    //   var pqty = $form.find(".pqty").val();

    //   $.ajax({
    //     url: 'ajax/action.php',
    //     method: 'post',
    //     data: {
    //       pid: pid,
    //       pname: pname,
    //       pprice: pprice,
    //       pqty: pqty,
    //       pimage: pimage,
    //       pcode: pcode
    //     },
    //     success: function(response) {
    //       $("#message").html(response);
    //       window.scrollTo(0, 0);
    //       load_cart_item_number();
    //     }
    //   });
    // });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'ajax/action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
