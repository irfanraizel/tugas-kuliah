$(document).ready(function () {
  $(".item1").click(function () {
    var selectedValue = $(this).text();
    $(".btn-pertama").val(selectedValue);
  });

  $(".item2").click(function () {
    var selectedValue2 = $(this).text();
    $(".btn-kedua").val(selectedValue2);
  });
});
