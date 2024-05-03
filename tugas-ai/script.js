$(document).ready(function () {
  var itemSelected = false;
  $(".item1").click(function () {
    var selectedValue = $(this).text();
    $(".btn-pertama").val(selectedValue);
    // itemSelected = true;
    // if (itemSelected) {
    //   $(".item2").prop("disabled", true);
    // }
  });

  $(".item2").click(function () {
    var selectedValue2 = $(this).text();
    $(".btn-kedua").val(selectedValue2);
    // if (itemSelected) {
    //   $(this).prop("disabled", true);
    // }
  });

  if (selectedValue) {
  }
});
