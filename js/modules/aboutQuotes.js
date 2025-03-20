//----------------------About page quotes slider
export const aboutQuotes = () => {
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
  