//web audit modal on Charities landing page
export const auditModal = () => {
const openAuditBtn = document.querySelector("[data-filter]");
const closeAuditBtn = document.querySelector(".close-modal");
const auditModals = document.querySelector(".modal-overlay");
const wpForms = document.querySelector(".wpforms-container-full");
//const body = document.querySelector("body");

openAuditBtn.addEventListener("click", () => {
  auditModals.classList.add("show-modal");
  wpForms.classList.add("show");
  gsap.fromTo(
    ".show-modal",
    { scale: 0 },
    {
      scale: 1,
      duration: 0.5,
      ease: "easeOut",
    }
  );
});

closeAuditBtn.addEventListener("click", () => {
  auditModals.classList.remove("show-modal");
  wpForms.classList.remove("show");
});
}