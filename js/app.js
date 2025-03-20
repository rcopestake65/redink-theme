"use strict";
import { setCurrentYear, backToTopBtn} from './modules/utils.js';
import { mobileMenu } from './modules/mobileMenu.js';
import { heroHomeSlider } from './modules/heroSliderHome.js'; 
import { homeSlider } from './modules/homeSlider.js';
import { frontPage, aboutPage, portfolioPage, wordpressPage } from './modules/pageCheck.js';
import { screenshotsSlider } from './modules/screenshotsSlider.js';
import { biogOverlay } from './modules/biogOverlay.js';
import { aboutQuotes } from './modules/aboutQuotes.js';
import { isotope } from './modules/isotope.js';
import { testimonials } from './modules/testimonials.js';
import { servicesModal } from './modules/servicesModal.js';
import { auditModal } from './modules/auditModal.js';

// Initialize common features
setCurrentYear();
backToTopBtn();
mobileMenu();

// Initialize page-specific features

if (frontPage) {
    heroHomeSlider();
    homeSlider();
}

if (aboutPage || portfolioPage || wordpressPage) {
    screenshotsSlider();
}

if (aboutPage) {
    biogOverlay();
    aboutQuotes();
    servicesModal();
}

if (frontPage || portfolioPage) {
    isotope();
}

if (frontPage || aboutPage) {
    testimonials();
}

if (charitiesPage) {
    auditModal();
}













//dynamic grid columns on single posts page so that if an image is added to a paragraph there are two cols otherwise just one

const postImg = document.querySelectorAll(".posts-writtent-content__item__img");

postImg.forEach((item) => {
  item.parentElement.classList.add("two-cols");
});
