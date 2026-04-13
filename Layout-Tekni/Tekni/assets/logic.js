document.addEventListener('DOMContentLoaded', function () {
  var splide = new Splide('.banner-first', {
    type        : 'fade',
    rewind      : true,
    autoplay    : true,
    interval    : 2000,
    pauseOnHover: false,
    pauseOnFocus: false,
    pagination  : false,
    
    // Responsive breakpoints
    breakpoints: {
      1200: {
     
        arrows: false,
        pagination: false,
      },

    }
  });

  splide.mount();
});


document.addEventListener('DOMContentLoaded', function () {
  new Splide('.second', {
    type: 'loop',
    perPage: 2,
    autoplay: true,
    interval: 4000,
    pagination: true,
    arrows: false,
    gap: '1.5rem',
    
    breakpoints: {
      1024: {
        perPage: 1,
        gap: '1rem',
      },
      768: {
        perPage: 1,
        gap: '1rem',
      },
      480: {
        perPage: 1,
        gap: '0.5rem',
      }
    }
  }).mount();
});
    const toggleBtn = document.getElementById('menu-toggle');
    const closeBtn = document.getElementById('menu-close');
    const menu = document.getElementById('mobile-menu');

    toggleBtn.addEventListener('click', () => {
      menu.classList.remove('offcanvas-hidden');
      menu.classList.add('offcanvas-visible');
    });

    closeBtn.addEventListener('click', () => {
      menu.classList.remove('offcanvas-visible');
      menu.classList.add('offcanvas-hidden');
    });
    
  window.addEventListener('scroll', function () {
    const header = document.getElementById('main-header');

    if (window.scrollY > 10) {
      header.classList.add('bg-white', 'shadow');
      header.classList.remove('bg-[hsl(0,18%,97%)]');
    } else {
      header.classList.remove('bg-white', 'shadow');
      header.classList.add('bg-[hsl(0,18%,97%)]');
    }
  });
  var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}