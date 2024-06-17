// Add this to your blog.js file
gsap.registerPlugin(ScrollTrigger);

ScrollTrigger.batch(".hidden", {
    interval: 0.1, // time window (in seconds) for batching to occur. 
    batchMax: 3,   // maximum batch size (targets)
    onEnter: batch => gsap.to(batch, {autoAlpha: 1, stagger: 0.15, overwrite: true}),
    onLeave: batch => gsap.set(batch, {autoAlpha: 0, overwrite: true}),
    onEnterBack: batch => gsap.to(batch, {autoAlpha: 1, stagger: 0.15, overwrite: true}),
    onLeaveBack: batch => gsap.set(batch, {autoAlpha: 0, overwrite: true})
});
