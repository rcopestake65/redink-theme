////------------------hero slider (homepage)
export const heroHomeSlider = () => {
    const slides = document.querySelectorAll(".slide");
    const header = document.querySelectorAll(".slide__heading");
    const slideStrapline = document.querySelectorAll(".slide__strapline");
    let index = 0;

    function showSlide(index) {
        slides.forEach((slide) => slide.classList.remove("active"));
        header.forEach((item) => item.classList.remove("header_active"));
        slideStrapline.forEach((item) => item.classList.remove("strapline_active"));

        slides[index].classList.add("active");
        header[index].classList.add("header_active");
        slideStrapline[index].classList.add("strapline_active");
    }

    function showNextSlide() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }

    showSlide(0);
    setInterval(showNextSlide, 7000);
};