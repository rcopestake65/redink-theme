"use strict";
//register GSAP
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(Flip);
//hide warnings in console if gsap elements don't appear on different pages
gsap.config({ nullTargetWarn: false });

//---------------------------logo

gsap.fromTo(
  ".logo",
  { x: -100, opacity: 0 },
  { x: 0, opacity: 1, duration: 1 }
);

//nav
if (document.body.classList.contains("home")) {
  gsap.fromTo(
    ".menu li",
    { x: 200, opacity: 0 },
    { x: 0, opacity: 1, stagger: 0.1, duration: 0.5 }
  );
}

//----------------------------slider heading

//play the animation on the first slide
//the x position is set in the css to x -100px
gsap.to(".header_active", {
  x: 0,
  duration: 1.5,
  delay: 0.5,
  opacity: 1,
  ease: "bounce.out",
});
gsap.set(".icon_active", { opacity: 0 });
gsap.to(".icon_active", {
  scale: 1.2,
  ease: "bounce.out",
  opacity: 1,
  duration: 1,
  delay: 0.7,
});
//then ste up a mutations observer so the animation plays each time a class is added to a header
// Select all elements with the class you're interested in
const heading = document.querySelectorAll(".slide__heading");
// Loop through the elements and set up a MutationObserver for each one
heading.forEach((element) => {
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      // Check if a class was added to the element
      if (
        mutation.type === "attributes" &&
        mutation.attributeName === "class"
      ) {
        const target = mutation.target;
        const classNames = target.className.split(" ");

        // Check if the added class is the one you're interested in
        if (classNames.includes("header_active")) {
          // run gsap
          gsap.to(".header_active", {
            x: 0,
            duration: 1.5,
            delay: 0.5,
            opacity: 1,
            ease: "bounce.out",
          });
          gsap.set(".icon_active", { opacity: 0 });
          gsap.to(".icon_active", {
            scale: 1.2,
            ease: "bounce.out",
            opacity: 1,
            duration: 1,
            delay: 0.7,
          });
        } else if (!classNames.includes("header_active"))
          // run gsap to reset position and opacity of header once the class has been removed - this way if the slides rotate and start again, the animation will also run again
          gsap.set(".header_active", {
            x: -100,
            opacity: 0,
          });
        gsap.set(".icon_active", { scale: 1, opacity: 0 });
      }
    });
  });

  // Configure the observer to listen for attribute changes on the element
  const config = { attributes: true, attributeFilter: ["class"] };

  // Start observing the element
  observer.observe(element, config);
});

//-------------------------branded headers (h2.brand etc)
gsap.fromTo(
  ".brand",
  { x: -60, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,

    scrollTrigger: {
      trigger: ".brand",
      start: "top 75%",
      end: "bottom 25%",
    },
  }
);
gsap.fromTo(
  ".work",
  { x: -60, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    scrollTrigger: {
      trigger: ".work",
    },
  }
);
gsap.fromTo(
  ".who",
  { x: -60, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    scrollTrigger: {
      trigger: ".who",
    },
  }
);
gsap.fromTo(
  ".testimonial",
  { x: -60, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    scrollTrigger: {
      trigger: ".testimonial",
    },
  }
);
//--------------------------isotope portfolio items
gsap.fromTo(
  ".isotope-container__item",
  { scale: 0, opacity: 0, rotation: 40 },
  {
    scale: 1,
    rotation: 0,
    opacity: 1,
    duration: 0.25,
    stagger: 0.1,
    scrollTrigger: {
      trigger: ".isotope-container__item",
      //markers: true,
      start: "top 85%",
      end: "bottom 25%",
    },
  }
);
//home page intro section image slider
gsap.fromTo(
  ".home-grid__right",
  { x: 60, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    delay: 0.75,
    ease: "bounce.out",
    scrollTrigger: {
      trigger: ".brand",
      start: "top 75%",
      end: "bottom 25%",
    },
  }
);
gsap.fromTo(
  ".laurel",
  { x: -60, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    delay: 0.75,
    ease: "bounce.out",
    scrollTrigger: {
      trigger: ".brand",
      start: "top 75%",
      end: "bottom 25%",
    },
  }
);
//About page hero CTA
const overlay = document.querySelector(".hero__overlay");
const ctaHeader = document.querySelector(".hero__overlay__left h2");
const ctaStrapline = document.querySelector(".hero__overlay__left p");
const ctaBtn = document.querySelector(".gsap-btn-container");
const ctaScreenshots = document.querySelectorAll(".hero__overlay__right img");
gsap
  .timeline()
  .fromTo(
    overlay,
    { opacity: 0, scale: 0.5 },
    { scale: 1, opacity: 1, duration: 0.25, ease: "power2.out" }
  )
  .fromTo(
    ctaHeader,
    { opacity: 0, x: -60 },
    { x: 0, opacity: 1, duration: 0.25, ease: "power2.out" }
  )
  .fromTo(
    ctaStrapline,
    { opacity: 0, y: 60 },
    { y: 0, opacity: 1, duration: 0.25, ease: "power2.out" }
  )
  .fromTo(
    ctaBtn,
    { opacity: 0, x: 60, scale: 1 },
    {
      opacity: 1,
      x: 0,
      duration: 0.25,
      scale: 1,
      ease: "power2.out",
    }
  )
  .fromTo(
    ctaScreenshots,
    { opacity: 0, x: 60 },
    { x: 0, opacity: 1, duration: 0.25, ease: "power2.out" }
  );
//animate on hover the screenshots
const tween = gsap.to(ctaScreenshots, { scale: 1.05, paused: true });
ctaScreenshots.forEach((item) => {
  item.addEventListener("mouseenter", function () {
    tween.play();
  });
  item.addEventListener("mouseleave", function () {
    tween.reverse();
  });
});

//about page intro, biog image and quotes
const intro = document.querySelector(".intro");
const btn = document.querySelector(".about-grid__left .gsap-btn-container");
const biogImg = document.querySelector(".about-grid__right img");
const caption = document.querySelector(".caption");
const quotes = document.querySelector(".quote-slides-container");

gsap
  .timeline({
    scrollTrigger: {
      trigger: ".intro",
      start: "top 75%",
      end: "bottom 25%",
    },
  })
  .fromTo(
    intro,
    { x: -60, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      duration: 0.5,
      ease: "back",
    }
  )
  .fromTo(
    biogImg,
    { x: 60, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      duration: 0.5,
      ease: "back",
    }
  )

  .fromTo(
    caption,
    { x: 60, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      duration: 0.5,
      ease: "back",
    }
  )
  .fromTo(
    quotes,
    { x: 60, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      duration: 0.5,
      ease: "back",
    }
  )

  .fromTo(
    btn,
    { x: 60, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      duration: 1,
      ease: "back",
    }
  );
//---------------service modals (about page)
if (aboutPage) {
  const servicesItem = document.querySelectorAll(".services-item");
  const servicesBtn = document.querySelectorAll("[data-filter]");
  const servicesIcon = document.querySelectorAll("#icon");
  const allBtn = document.querySelector(".services-grid .gsap-btn-container");
  gsap
    .timeline({
      scrollTrigger: {
        trigger: ".services-grid",
        start: "top 75%",
        end: "bottom 25%",
        //markers: true,
      },
    })
    .fromTo(
      servicesItem,
      { opacity: 0, y: 200 },
      { opacity: 1, y: 0, duration: 0.75, stagger: 0.25 }
    )
    .fromTo(
      allBtn,
      { x: 60, opacity: 0 },
      {
        x: 0,
        opacity: 1,
        duration: 1,
        ease: "back",
      }
    );

  //animate icon on hover of the read more btn
  servicesBtn.forEach((btn) => {
    btn.addEventListener("mouseenter", () => {
      servicesIcon.forEach((icon) => {
        if (icon.className == btn.className) {
          icon.classList.add("pulse");
          gsap.to(".pulse", { scale: 1.1, color: "#cc0000", duration: 0.5 });
        } else {
          icon.classList.remove("pulse");
        }
      });
    });

    btn.addEventListener("mouseout", () => {
      servicesIcon.forEach((icon) => {
        gsap.to(".pulse", { scale: 1, color: "#000000", duration: 0.5 });
        icon.classList.remove("pulse");
      });
    });
  });
}

//--------------hero photo credit button
if (aboutPage || servicesPage) {
  const creditBtn = document.querySelector(".photo-credit-container");
  const arrow = document.querySelector(".photo-credit-container .fa-circle-up");

  gsap.set(creditBtn, { y: 45 });
  creditBtn.addEventListener("mouseenter", () => {
    gsap.to(creditBtn, { y: 0, duration: 1 });
    gsap.to(arrow, { scale: 1.3, duration: 0.2, color: "#cc0000" });
  });
  creditBtn.addEventListener("mouseleave", () => {
    gsap.to(creditBtn, { y: 45, duration: 1 });
    gsap.to(arrow, { scale: 1, color: "#000000", duration: 0.2 });
  });

  //same but for click on mobile
  if (window.innerWidth < 1200) {
    gsap.set(creditBtn, { y: 45 });
    creditBtn.addEventListener("click", () => {
      gsap.to(creditBtn, { y: 0, duration: 1 });
      gsap.to(arrow, { scale: 1.3, duration: 0.2, color: "#cc0000" });
    });
  }

  //--------------services page hero icon
  const faIcon = document.querySelectorAll(".fa-icon");
  //loading effect
  gsap.fromTo(
    faIcon,
    {
      x: -50,
      opacity: 0,
    },
    { x: 0, opacity: 1, stagger: 0.2 }
  );

  //hover effect

  faIcon.forEach((icon) => {
    icon.addEventListener("mouseenter", () => {
      gsap.to(icon, { scale: 1.1, duration: 0.15 });
    });
    icon.addEventListener("mouseleave", () => {
      gsap.to(icon, { scale: 1, duration: 0.15 });
    });
  });
}
//-------------services page main
const serviceBlock = gsap.utils.toArray(".services-main-grid__item");
const serviceBlockHeader = document.querySelectorAll(
  ".services-main-grid__item__header"
);
const serviceBlockCopy = document.querySelectorAll(
  ".services-main-grid__item__copy"
);
const serviceBlockIcon = document.querySelectorAll(
  ".services-main-grid__item__icon"
);

serviceBlock.forEach((item) => {
  gsap.fromTo(
    serviceBlock,
    { x: -50, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      stagger: 0.3,
      ease: "back",
      scrollTrigger: {
        trigger: ".services-main-grid__item",
        start: "top 75%",
        end: "bottom 25%",
      },
    }
  );
  gsap.fromTo(
    serviceBlockIcon,
    {
      x: -50,
      opacity: 0,
    },
    {
      x: 0,
      opacity: 1,
      stagger: 0.3,
      delay: 0.2,
      ease: "back",
    }
  );
  gsap.fromTo(
    serviceBlockHeader,
    {
      x: -50,
      opacity: 0,
    },
    {
      x: 0,
      opacity: 1,
      stagger: 0.3,
      delay: 0.4,
      ease: "back",
    }
  );
  gsap.fromTo(
    serviceBlockCopy,
    {
      x: -50,
      opacity: 0,
    },
    {
      x: 0,
      opacity: 1,
      stagger: 0.3,
      delay: 0.5,
      ease: "back",
    }
  );
});
