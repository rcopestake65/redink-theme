//---------------decorative images slider
export const homeSlider = () => {   
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
  