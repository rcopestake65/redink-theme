
//----------------------About/Wordpress/Portfolio page hero slider
export const screenshotsSlider = () => {
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
  }