/************************ Image on scroll animation ***************************/
window.addEventListener("load", () => {
  const results = Splitting({
    target: ".image",
    by: "cells",
    image: true,
    rows: 15
  });

  function myCallback(el) {
    var a = new TimelineMax();
    return a.staggerFromTo(
      ".cell",
      0.9,
      {
        x: 400,
        opacity: 0
      },
      {
        x: 0,
        opacity: 1,
        ease: Power2.ease
      },
      0.09
      );
  }

  $(".image").waypoint(
    function(direction) {
      if (direction === "down") {
        /* add this.destroy() if you want the animation to only play once */
        myCallback();
      }
    },
    {
      offset: "100%"
    }
    );
});
// reveal scroll 
gsap.registerPlugin(ScrollTrigger);

let revealContainers = document.querySelectorAll(".reveal");

revealContainers.forEach((container) => {
  let image = container.querySelector("img");
  let tl = gsap.timeline({
    scrollTrigger: {
      trigger: container,
      toggleActions: "restart none none reset"
    }
  });

  tl.set(container, { autoAlpha: 1 });
  tl.from(container, 1.5, {
    xPercent: -100,
    ease: Power2.out
  });
  tl.from(image, 1.5, {
    xPercent: 100,
    scale: 1.3,
    delay: -1.5,
    ease: Power2.out
  });
});

// feature yscroll
gsap.registerPlugin(ScrollTrigger);
let container = document.getElementById('container-yscroll');
gsap.to(container, {
  x: () => -(container.scrollWidth - document.documentElement.clientWidth) + "px",
  ease: "none",
  scrollTrigger: {
    trigger: container,
    start: "top top",
    end: () => "+=" + container.offsetWidth,
    scrub: true,
    pin: true,
    anticipatePin: 1
  }

});
ScrollTrigger.refresh();
gsap.registerPlugin(ScrollTrigger);
gsap.to('progress', {
  value: 100,
  ease: 'none',
  scrollTrigger: { scrub: 0.3 }
});