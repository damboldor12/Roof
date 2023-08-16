let slidersPosition = 0;
const sliders = document.getElementById("sliders");
const dots = document.querySelectorAll(".dot");
const positions = [0, -100, -200, -300];


function move_slider_right() {
    if (slidersPosition === -300) {
        slidersPosition = 0;
        sliders.style.transform = `translate(${slidersPosition}%, 0px)`;
    } else {
        slidersPosition -= 100;
        sliders.style.transform = `translate(${slidersPosition}%, 0px)`;
    }

    updateDotsColor();
}

function move_slider_left() {
    if (slidersPosition === 0) {
        slidersPosition = -300;
        sliders.style.transform = `translate(${slidersPosition}%, 0px)`;
    } else {
        slidersPosition += 100;
        sliders.style.transform = `translate(${slidersPosition}%, 0px)`;
    }
    updateDotsColor();
}
function updateDotsColor (){
    for (let i = 0; i < dots.length; i++) {
        if (slidersPosition === positions[i]) {
            dots[i].style.fill = '#FCC000';
        } else {
            dots[i].style.fill = 'white';
        }
    }
}


const element = document.querySelector('.sliders');
const swipeThreshold = 100;
let startX, endX;
element.addEventListener('touchstart', (event) => {
  startX = event.touches[0].clientX;
});

element.addEventListener('touchmove', (event) => {
  endX = event.touches[0].clientX;
});

element.addEventListener('touchend', () => {
  const distance = Math.abs(endX - startX);
  if (distance > swipeThreshold) {
    if (endX < startX) {
      move_slider_right();
    } else if (endX > startX) {
      move_slider_left();
    }
  }
});