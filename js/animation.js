
let panels = document.querySelectorAll(".panel");
let fronts = document.querySelectorAll(".front");
let backs = document.querySelectorAll(".back");
let replay_btn = document.querySelector(".replay");

const mirrorTL = gsap.timeline();
const titleTL = gsap.timeline();

gsap.set(replay_btn, { opacity: 0 });
replay_btn.addEventListener("click", (e) => {
	console.log("replay clicked");
	mirrorTL.restart();
	titleTL.restart();
	gsap.to(e.target, 0.5, { opacity: 0 });
	console.log(e.target);
});

mirrorTL
	.to(fronts, 2.5, { backgroundPosition: "30px 0px", ease: "expo.inOut" })
	.to(panels, 2.5, { z: -300, rotationY: 180, ease: "expo.inOut" }, "-=2.3")
	.from(
		backs,
		2.5,
		{
			backgroundPosition: "-30px 0px",
			ease: "expo.inOut",
			onComplete: () => {
				console.log("animation completed");
				gsap.to(replay_btn, 1, { opacity: 1 });
			}
		},
		"-=2.3"
	);

titleTL
	.to(".layer", 1, { clipPath: "polygon(3% 0, 100% 0%, 100% 100%, 0% 100%" })
	.to(".layer h1", 2, { x: 400, ease: "expo.inOut" }, "-=0.5")
	.to(".cta", 2, { x: 0, ease: "expo.inOut" }, "-=2");

  