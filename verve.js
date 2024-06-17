document.addEventListener('DOMContentLoaded', () => {
    gsap.registerPlugin(ScrollTrigger);

    ScrollTrigger.batch(".hidden", {
        interval: 0.1, // Time window (in seconds) for batching to occur.
        batchMax: 3,   // Maximum batch size (targets).
        onEnter: batch => gsap.to(batch, { autoAlpha: 1, stagger: 0.15, overwrite: true }),
        onLeave: batch => gsap.set(batch, { autoAlpha: 0, overwrite: true }),
        onEnterBack: batch => gsap.to(batch, { autoAlpha: 1, stagger: 0.15, overwrite: true }),
        onLeaveBack: batch => gsap.set(batch, { autoAlpha: 0, overwrite: true }),
    });
});
