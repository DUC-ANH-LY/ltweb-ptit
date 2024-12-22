if (Theme === undefined) var Theme = {};

Theme.Cart = {
  add: function (product_id, quantity) {
    return;

    $.ajax({
      url: "index.php?route=checkout/cart/add",
      type: "post",
      data:
        "product_id=" +
        product_id +
        "&quantity=" +
        (typeof quantity != "undefined" ? quantity : 1),
      dataType: "json",
      beforeSend: function () {
        $("#cart > button").button("loading");
      },
      complete: function () {
        $("#cart > button").button("reset");
      },
      success: function (json) {
        $(".alert-dismissible, .text-danger").remove();

        if (json["redirect"]) {
          location = json["redirect"];
        }

        if (json["success"]) {
          $("#alert-box").append(
            '<div class="alert alert-success alert-dismissible">' +
              json["success"] +
              ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>'
          );

          $("#alert-box").addClass("open");

          // Need to set timeout otherwise it wont update the total
          $("#cart").parent().load("index.php?route=common/cart/info");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(
          thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
        );
      },
    });
  },

  update: function (key, quantity) {},

  remove: function (key) {},
};

Theme.Alert = {
  show: function (message) {
    $(".alert-top .message").html(message);
    $(".alert-top").addClass("show");
  },
};

Theme.Gui = {
  // init: function () {
  //   $("[data--action]").each(function () {
  //     on = "click";
  //     if (this.dataset.On) on = this.dataset.On;
  //     $(this).on(on, Theme.Gui[this.dataset.Action]);
  //   });
  // },
  // addCart: function () {
  //   var product = $(this).parents("[data-product]");
  //   var img = $("[data-img]", product).attr("src");
  //   var name = $("[data-name]", product).text();
  //   Theme.Cart.add(this.dataset.product_id);
  //   Theme.Alert.show(
  //     '<img height=50 src="' + img + '"> &ensp; ' + name + " thêm vào giỏ hàng"
  //   );
  //   return false;
  // },
};

Theme.Gui.init();
