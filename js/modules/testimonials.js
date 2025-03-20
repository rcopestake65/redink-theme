//---------------------Testimonial  Slider
export const testimonials = () => {
    const postSlide = document.querySelectorAll(".testimonial-slide");
    // const postBtnContainer = document.querySelector(".testimonial-btn-container");
    const postsNextBtn = document.querySelector(".testimonial-nextBtn");
    const postsPrevBtn = document.querySelector(".testimonial-prevBtn");
  
    // postSlide.forEach(function (slide, index) {
    //   slide.style.left = `${index * 100}%`;
    // });
  
    let postCounter = 0;
    postsNextBtn.addEventListener("click", function () {
      postCounter++;
      postsCarousel();
    });
    postsPrevBtn.addEventListener("click", function () {
      postCounter--;
      postsCarousel();
    });
  
    function postsCarousel() {
      //loop back to beginning
      const mediaQuery = window.matchMedia("(max-width: 1000px)");
  
      // Define a function to handle the change in media query
      function smallScreenChange(e) {
        if (e.matches) {
          if (postCounter === postSlide.length) {
            postCounter = 0;
          }
          if (postCounter < 0) {
            postCounter = postSlide.length - 1;
          }
          postSlide.forEach(function (slide) {
            slide.style.transform = `translateX(-${postCounter * 380}px)`;
          });
        } else {
          if (postCounter === postSlide.length - 2) {
            postCounter = 0;
          }
          if (postCounter < 0) {
            postCounter = postSlide.length - 3;
          }
          postSlide.forEach(function (slide) {
            slide.style.transform = `translateX(-${postCounter * 380}px)`;
          });
        }
      }
  
      // Attach the function to the media query
      mediaQuery.addEventListener("change", smallScreenChange);
  
      // Call the function once to run initial check
      smallScreenChange(mediaQuery);
    }
  }