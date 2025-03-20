//--------------------Mobile Menu Toggle

export const mobileMenu = () => {
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
};