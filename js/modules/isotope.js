//---------------------filter buttons for ISOTOPE sorting
export const isotope = () => {
    // Get all buttons and divs
    const buttons = document.querySelectorAll("[data-filter]");
    const divs = document.querySelectorAll(".isotope-container__item");
  
    // Add click event listeners to all buttons
    buttons.forEach((button) => {
      button.addEventListener("click", () => {
        // Loop through all the divs
        divs.forEach((div) => {
          // If the button's class name is not present in the div, add the new class name
          if (!div.classList.contains(button.className)) {
            div.classList.add("hide-item");
            gsap.to(".hide-item", {
              scale: 0,
              duration: 0.5,
              ease: "easeOut",
            });
            gsap.to(".hide-item", {
              display: "none",
            });
            div.classList.remove("show-item");
          } else if (div.classList.contains(button.className)) {
            div.classList.add("show-item");
  
            gsap.fromTo(
              ".show-item",
              {
                scale: 0,
                opacity: 0,
              },
              {
                scale: 1,
                opacity: 1,
                duration: 1,
              }
            );
            gsap.to(".show-item", {
              display: "block",
            });
            div.classList.remove("hide-item");
          }
        });
      });
    });
    const all = document.querySelector(".all");
    all.addEventListener("click", () => {
      divs.forEach((div) => {
        div.classList.add("show-item");
        gsap.to(".show-item", {
          display: "block",
        });
        gsap.to(".show-item", {
          scale: 1,
          duration: 0.5,
          ease: "easeOut",
        });
        div.classList.remove("hide-item");
      });
    });
  }