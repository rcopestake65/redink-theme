
// ---------------Utility functions
//Date in footer
export const setCurrentYear = () => {
    const date = document.getElementById("date");
    date.innerHTML = new Date().getFullYear();
};

//back to top button show on scroll offset
export const backToTopBtn = () => {
const topBtn = document.querySelector(".top-link");

window.addEventListener("scroll", () => {
  const scrollHeight = window.scrollY;
  if (scrollHeight > 500) {
    topBtn.classList.add("show-link");
  } else {
    topBtn.classList.remove("show-link");
  }
});
};
//add aria attribute to icon links in header and footer for accessibility
const iconTwitter = document.querySelectorAll(".icon-link-twitter");
const iconLinkdIn = document.querySelectorAll(".icon-link-linkdin");

iconTwitter.forEach((item) => {
  item.parentElement.setAttribute("aria-label", "Twitter");
});

iconLinkdIn.forEach((item) => {
  item.parentElement.setAttribute("aria-label", "LinkdIn");
});