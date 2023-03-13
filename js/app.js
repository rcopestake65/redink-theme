"use strict";

//check for page variable
const frontPage = document.querySelector(".home");
const portfolioPage = document.querySelector(".post-type-archive-portfolio");
const aboutPage = document.querySelector(".page-about-us");
const servicesPage = document.querySelector(".page-services");
const contact = document.querySelector(".page-contact");

//Date in footer
const date = document.getElementById("date");
date.innerHTML = new Date().getFullYear();
//back to top button show on scroll offset
const topBtn = document.querySelector(".top-link");

window.addEventListener("scroll", () => {
  const scrollHeight = window.scrollY;
  if (scrollHeight > 500) {
    topBtn.classList.add("show-link");
  } else {
    topBtn.classList.remove("show-link");
  }
});
//--------------------Mobile Menu Toggle

const toggleBtn = document.querySelector(".nav-toggle");
const mobileMenuContainer = document.querySelector(".mobile-menu-container");
const menu = document.querySelector(".mobile-menu");
const openBtnIcon = document.querySelector(".fa-bars");
const closeBtnIcon = document.querySelector(".fa-times");

toggleBtn.addEventListener("click", function () {
  const containerHeight = mobileMenuContainer.getBoundingClientRect().height;
  const linksHeight = menu.getBoundingClientRect().height;
  //const slider = document.querySelector(".slider");
  closeBtnIcon.classList.toggle("hide");
  openBtnIcon.classList.toggle("hide");

  if (containerHeight === 0) {
    mobileMenuContainer.style.height = `${linksHeight + 100}px`;
    //125px here compensates for the negative position of the slider under the navigation
  } else {
    mobileMenuContainer.style.height = 0;
  }
});
////------------------hero slider (homepage)
if (frontPage) {
  const slides = document.querySelectorAll(".slide");
  const prevButton = document.querySelector(".prev-btn");
  const nextButton = document.querySelector(".next-btn");
  const header = document.querySelectorAll(".slide__heading");
  const icon = document.querySelectorAll(".slide__icon");
  let index = 0;

  function showSlide(index) {
    // Remove the 'active' class from all slides
    slides.forEach((slide) => {
      slide.classList.remove("active");
    });
    header.forEach((item) => {
      item.classList.remove("header_active");
    });
    icon.forEach((item) => {
      item.classList.remove("icon_active");
    });

    // Add the 'active' class to the specified slide
    slides[index].classList.add("active");
    header[index].classList.add("header_active");
    icon[index].classList.add("icon_active");
  }

  function showNextSlide() {
    // Increment the index
    index++;

    // If we've reached the end of the slides, start over
    if (index >= slides.length) {
      index = 0;
    }

    // Show the next slide
    showSlide(index);
  }

  function showPrevSlide() {
    // Decrement the index
    index--;

    // If we've reached the beginning of the slides, go to the last slide
    if (index < 0) {
      index = slides.length - 1;
    }

    // Show the previous slide
    showSlide(index);
  }

  // Show the first slide
  showSlide(0);

  // Set up event listeners for the previous and next buttons
  prevButton.addEventListener("click", showPrevSlide);
  nextButton.addEventListener("click", showNextSlide);

  // Set an interval to show the next slide every 5 seconds
  setInterval(showNextSlide, 5000);
}
//---------------decorative images slider
if (frontPage) {
  const homeSlides = document.querySelectorAll(".home-slider");

  let homeIndex = 0;

  function homeSlider(homeIndex) {
    // Remove the 'active' class from all slides
    homeSlides.forEach((item) => {
      item.classList.remove("active");
    });

    // Add the 'active' class to the specified slide
    homeSlides[homeIndex].classList.add("active");
  }

  function showNextHomeSlide() {
    // Increment the homeIndex
    homeIndex++;

    // If we've reached the end of the slides, start over
    if (homeIndex >= homeSlides.length) {
      homeIndex = 0;
    }

    // Show the next slide
    homeSlider(homeIndex);
  }

  function showPrevHomeSlide() {
    // Decrement the index
    homeIndex--;

    // If we've reached the beginning of the slides, go to the last slide
    if (homeIndex < 0) {
      homeIndex = homeSlider.length - 1;
    }

    // Show the previous slide
    homeSlider(homeIndex);
  }

  // Show the first slide
  homeSlider(0);

  // Set an interval to show the next slide every 5 seconds
  setInterval(showNextHomeSlide, 5000);
}

//----------------------About page hero slider
if (aboutPage) {
  const aboutSlides = document.querySelectorAll(".screenshots");

  let aboutIndex = 0;

  function aboutSlider(aboutIndex) {
    // Remove the 'active' class from all slides
    aboutSlides.forEach((item) => {
      item.classList.remove("active");
    });

    // Add the 'active' class to the specified slide
    aboutSlides[aboutIndex].classList.add("active");
  }

  function showNextaboutSlide() {
    // Increment the aboutIndex
    aboutIndex++;

    // If we've reached the end of the slides, start over
    if (aboutIndex >= aboutSlides.length) {
      aboutIndex = 0;
    }

    // Show the next slide
    aboutSlider(aboutIndex);
  }

  function showPrevaboutSlide() {
    // Decrement the index
    aboutIndex--;

    // If we've reached the beginning of the slides, go to the last slide
    if (aboutIndex < 0) {
      aboutIndex = aboutSlider.length - 1;
    }

    // Show the previous slide
    aboutSlider(aboutIndex);
  }

  // Show the first slide
  aboutSlider(0);

  // Set an interval to show the next slide every 5 seconds
  setInterval(showNextaboutSlide, 5000);

  //----------------------About page quotes slider

  const quotesSlides = document.querySelectorAll(".quote-slides");

  let quotesIndex = 0;

  function quotesSlider(quotesIndex) {
    // Remove the 'active' class from all slides
    quotesSlides.forEach((item) => {
      item.classList.remove("active");
    });

    // Add the 'active' class to the specified slide
    quotesSlides[quotesIndex].classList.add("active");
  }

  function showNextquotesSlide() {
    // Increment the quotesIndex
    quotesIndex++;

    // If we've reached the end of the slides, start over
    if (quotesIndex >= quotesSlides.length) {
      quotesIndex = 0;
    }

    // Show the next slide
    quotesSlider(quotesIndex);
  }

  function showPrevquotesSlide() {
    // Decrement the index
    quotesIndex--;

    // If we've reached the beginning of the slides, go to the last slide
    if (quotesIndex < 0) {
      quotesIndex = quotesSlider.length - 1;
    }

    // Show the previous slide
    quotesSlider(quotesIndex);
  }

  // Show the first slide
  quotesSlider(0);

  // Set an interval to show the next slide every 5 seconds
  setInterval(showNextquotesSlide, 10000);
}

//---------------------filter buttons for ISOTOPE sorting
if (frontPage || portfolioPage) {
  // Get all buttons and divs
  const buttons = document.querySelectorAll("[data-filter]");
  const divs = document.querySelectorAll(".isotope-container__item");

  // Add click event listeners to all buttons
  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      // Loop through all the divs
      divs.forEach((div) => {
        // If the button's class name is not present in the div, add the new class name
        if (!div.classList.contains(button.className)) {
          div.classList.add("hide-item");
          gsap.to(".hide-item", {
            scale: 0,
            duration: 0.5,
            ease: "easeOut",
          });
          gsap.to(".hide-item", {
            display: "none",
          });
          div.classList.remove("show-item");
        } else if (div.classList.contains(button.className)) {
          div.classList.add("show-item");

          gsap.fromTo(
            ".show-item",
            {
              scale: 0,
              opacity: 0,
            },
            {
              scale: 1,
              opacity: 1,
              duration: 1,
            }
          );
          gsap.to(".show-item", {
            display: "block",
          });
          div.classList.remove("hide-item");
        }
      });
    });
  });
  const all = document.querySelector(".all");
  all.addEventListener("click", () => {
    divs.forEach((div) => {
      div.classList.add("show-item");
      gsap.to(".show-item", {
        display: "block",
      });
      gsap.to(".show-item", {
        scale: 1,
        duration: 0.5,
        ease: "easeOut",
      });
      div.classList.remove("hide-item");
    });
  });
}
//---------------------Testimonial  Slider
if (frontPage || aboutPage) {
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
//services modal on about page
const openBtn = document.querySelectorAll("[data-filter]");
const closeBtn = document.querySelectorAll(".close-modal");
const modals = document.querySelectorAll(".modal-overlay");
//const body = document.querySelector("body");

openBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    modals.forEach((modal) => {
      if (modal.classList.contains(btn.className)) {
        modal.classList.add("show-modal");

        gsap.fromTo(
          ".show-modal",
          { scale: 0 },
          {
            scale: 1,
            duration: 0.5,
            ease: "easeOut",
          }
        );
      }
    });
  });
});

closeBtn.forEach((item) => {
  item.addEventListener("click", () => {
    modals.forEach((modal) => {
      modal.classList.remove("show-modal");
    });
  });
});

//click on the doc to close the modal
// modals.forEach((modal) => {
//   if (modal.classList.contains("show-modal")) {
//     document.addEventListener("click", () => {
//       console.log("clicked the doc");
//       modal.classList.remove("show-modal");
//     });
//   }
// });
// window.onclick = function (event) {
//   if (event.target == modals) {
//     modals.style.display = "none";
//   }
// };
