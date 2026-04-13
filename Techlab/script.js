 
document.addEventListener('DOMContentLoaded', function () {
  if (typeof Splide !== 'undefined') {
    new Splide('.slide-new', {
      type: 'loop',
      perPage: 3,
      arrows: false,
      pagination: false,
    arrows:true,
    gap:17,
      breakpoints: {
        1280: { perPage: 2 },
        768: { perPage: 1, gap: '1rem', height: 'auto' },
      },
    }).mount();
  } else {
    console.error('Splide not loaded.');
  }
});

 
 
 
 document.addEventListener('DOMContentLoaded', function () {
  // Check if Splide is available
  if (typeof Splide !== 'undefined') {
    new Splide('.splide-first', {
      type: 'loop',
      perPage: 5,
      autoplay: true,
     arrows:false,
     pagination:false,
     
      gap: 10.,
      breakpoints: {
        1360: { perPage: 4 },
        1090: { perPage: 3 },
        838: { perPage: 2 },
        700: { perPage: 1 },
      },
    }).mount();
  } else {
    console.error('Splide is not loaded');
  }
});




  


  

  document.addEventListener('DOMContentLoaded', function () {
    // Check if Splide is available
    if (typeof Splide !== 'undefined') {
      var splide = new Splide('.abouttest', {
        type: 'slide',
        
        perPage: 2,       // Default: show 2 cards
        perMove: 1,       // Move 1 slide at a time
        gap: '1rem',      // Optional: gap between slides
        pagination: false,
        arrows: true,

        // Responsive breakpoints
        breakpoints: {
          1024: {
            perPage: 1,   // Tablets
          },
          768: {
            perPage: 1,   // Mobile
          },
        },
      });

   // Progress bar reference
      var bar = splide.root.querySelector('.my-carousel-progress-bar');

      // Update bar on mount & move
      splide.on('mounted move', function () {
        // Total number of pages (not slides)
        var totalPages = splide.Components.Controller.getEnd() + 1;

        // Current page index (starts from 0)
        var currentPage = splide.index;

        // Progress ratio
        var rate = Math.min((currentPage + 1) / totalPages, 1);

        // Set bar width
        bar.style.width = (rate * 100) + '%';
      });


      splide.mount();
    } else {
      console.error('Splide is not loaded');
    }
  });


  const repeat = document.getElementById('repeat');
  const marquee = document.getElementById('myMarquee');

  const content = repeat.outerHTML;

  for (let i = 0; i < 30; i++) {
    marquee.insertAdjacentHTML('beforeend', content);
  }



  const scrollTopBtn = document.getElementById("scrollTopBtn");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 600) {
      scrollTopBtn.classList.remove("hidden");
    } else {
      scrollTopBtn.classList.add("hidden");
    }
  });

