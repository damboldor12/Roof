const header_center_sviper = document.getElementById('header_center_sviper');
function menuswipe() {
    var computedTransform = getComputedStyle(header_center_sviper).transform;
    if (computedTransform === "none" || computedTransform === "matrix(1, 0, 0, 1, 0, 0)") {
      header_center_sviper.style.transform = "translate(0, -50%)";
    } else {
      header_center_sviper.style.transform = "translate(0, 0)";
    }
  }