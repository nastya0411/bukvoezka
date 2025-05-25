$(() => {
    const showAlert = () => {
    setTimeout(() => {
      $(".alert").fadeIn(2500);
    }, 1500);

    setTimeout(() => {
      $(".alert").fadeOut(2000);
    }, 6000);
  };


  if ($(".alert-block .alert").length) {
    $(".alert-block .alert").css("transform", "translateY( -100%)");
    showAlert()
  }
})