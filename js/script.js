let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');


menu.onclick = () => {
    menu.classList.toggle('fa-times');
    menu.classList.toggle('active'); 
};

window.onscroll = () => {
    menu.classList.remove('fa-times');
    menu.classList.remove('active');
};

var swiper = new Swiper(".review-slider", {
    loop: true,
    spaceBetween: 20,
    autoHeight:true,
    grabCursor:true,
    breakpoints: {
      640: {
        slidesPerView: 1
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });


  let loadMoreBtn = document.querySelector('.packages .load-more .btn');
  let currentItem = 3;
  loadMoreBtn.onclick = () => {
    let boxes = [...document.querySelectorAll('.packages .box-container .box')];
    for(var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
    };
    currentItem += 3;
    if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
    }
  }


// slider componenet
