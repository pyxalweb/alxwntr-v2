!function(){window.onload=e=>{document.querySelector("body").classList.remove("preload")};(()=>{function e(e,t,o){let n="";if(o){let e=new Date;e.setTime(e.getTime()+24*o*60*60*1e3),n="; expires="+e.toUTCString()}document.cookie=e+"="+(t||"")+n+"; path=/"}document.documentElement;const t=document.querySelector(".theme-transition");function o(e,o){t.classList.add("isActive"),setTimeout((()=>{t.classList.add(e),setTimeout((()=>{t.classList.remove(e),o(),setTimeout((()=>{t.classList.remove("isActive")}),1e3)}),1e3)}),1)}function n(){document.documentElement.className="light-mode",e("theme","light",7)}function i(){document.documentElement.className="dark-mode",e("theme","dark",7)}const s=document.querySelector(".theme-toggle");s&&s.addEventListener("click",(()=>{document.documentElement.classList.contains("light-mode")?o("isTransitioningToDark",i):o("isTransitioningToLight",n)}))})()}();
//# sourceMappingURL=scripts.js.map