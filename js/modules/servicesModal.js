//services modal on about page
export const servicesModal = () => {
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
}