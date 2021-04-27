var banner1 = document.getElementById("banner1");
var banner2 = document.getElementById("banner2");
var banner3 = document.getElementById("banner3");

var banners = [banner1, banner2, banner3];
var currentIndex = 0;

var scheduled = null;
var delayTime = 8000;
var BannerTexts = document.querySelectorAll(".BannerTexts");

function nextBanner() {
  clearInterval(scheduled);
  var BannerTextChilds = BannerTexts[currentIndex].querySelectorAll("*");
  BannerTextChilds.forEach(grantchild => {
    grantchild.classList.remove("RevealAnimated");
  });

  banners[currentIndex].classList.add("non-active");
  banners[currentIndex].classList.remove("animateBanner");
  if (currentIndex + 1  >= 3) {
    currentIndex = 0;
    banners[currentIndex].classList.remove("non-active");
    banners[currentIndex].classList.add("animateBanner");
  } else {
    banners[currentIndex + 1].classList.remove("non-active");
    banners[currentIndex + 1].classList.add("animateBanner");
    currentIndex++;
  }
  var NextBannerTextChilds = BannerTexts[currentIndex].querySelectorAll("*");
  NextBannerTextChilds.forEach(grantchild => {
    grantchild.classList.add("RevealAnimated");
  });
  scheduled = setInterval("nextBanner()", delayTime);
}

function prevBanner() {
  clearTimeout(scheduled);
  var BannerTextChilds = BannerTexts[currentIndex].querySelectorAll("*");
  BannerTextChilds.forEach(grantchild => {
    grantchild.classList.remove("RevealAnimated");
  });
  banners[currentIndex].classList.add("non-active");
  banners[currentIndex].classList.remove("animateBanner");
  if (currentIndex - 1  < 0) {
    currentIndex = 2;
    banners[currentIndex].classList.remove("non-active");
    banners[currentIndex].classList.add("animateBanner");
  } else {
    banners[currentIndex - 1].classList.remove("non-active");
    banners[currentIndex - 1].classList.add("animateBanner");
    currentIndex--;
  }
  var NextBannerTextChilds = BannerTexts[currentIndex].querySelectorAll("*");
  NextBannerTextChilds.forEach(grantchild => {
    grantchild.classList.add("RevealAnimated");
  });
  scheduled = setInterval("nextBanner()", delayTime);
}

document.addEventListener("DOMContentLoaded", function(event) {
  var BannerTextChilds = BannerTexts[currentIndex].querySelectorAll("*");
  BannerTextChilds.forEach(grantchild => {
    grantchild.classList.add("RevealAnimated");
  });
  scheduled = setInterval("nextBanner()", delayTime);
});
