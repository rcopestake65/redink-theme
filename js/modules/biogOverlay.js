//----------------------About page biogs click to show
export const biogOverlay = () => {
const biogOverlay = document.querySelectorAll(".biog-imgs__overlay");
const biogOverlayItem = document.querySelectorAll(".biog-imgs__overlay__item");

biogOverlay.forEach((item) => {
  item.addEventListener("click", () => {
    biogOverlayItem.forEach((item) => {
      item.classList.toggle("show-biog");
    });
  });
});}