!function(){document.documentElement,document.querySelector("body");const e=document.querySelector(".site-header"),t=document.querySelector(".site-footer"),o=document.querySelector(".site-main.homepage"),s=document.querySelector(".blog"),r=document.querySelectorAll(".category__btn"),l=document.querySelector(".categories__select"),i=document.querySelectorAll(".blog__posts"),a=document.querySelectorAll(".post__item");window.onload=e=>{document.querySelector("body").classList.remove("preload")},mainElementMinHeight=()=>{const s=e.offsetHeight,r=t.offsetHeight;o&&(o.style.minHeight=`calc(100vh - ${s}px - ${r}px + 1px)`)},mainElementMinHeight();(()=>{if(!s)return;let e="all",t=null;const o=()=>{a.forEach((e=>{const o=()=>{e.classList.add("active"),setTimeout((()=>{e.classList.add("fade")}),100)},s=e.getAttribute("data-category");e.classList.remove("fade"),setTimeout((()=>{"all"===t?o():t!==s?e.classList.remove("active"):o()}),500)}))},c=()=>{slideTimeout=setTimeout((()=>{i.forEach((e=>{0===e.querySelectorAll(".post__item.active").length?(e.classList.add("empty"),console.log("no posts")):e.classList.remove("empty")}))}),1e3)};r.forEach((s=>{s.addEventListener("click",(()=>{t=s.getAttribute("data-category"),t!==e?(r.forEach((e=>{e.classList.remove("active")})),e=t,s.dataset.category===e&&s.classList.add("active"),o(),c()):(e=>{let t=!1;document.querySelector("body").insertAdjacentHTML("beforeend",'<div class="error" role="alert" aria-label="Error message"><p></p></div>');const o=document.querySelector(".error"),s=document.querySelector(".error p");t||(t=!0,s.textContent=e,o.classList.add("active"),setTimeout((function(){t=!1,o.classList.remove("active"),setTimeout((function(){o.remove()}),1e3)}),4e3))})("You're already viewing this category.")}))})),l&&l.addEventListener("change",(()=>{t=l.value,o(),c()}))})();const c=()=>{document.querySelectorAll(".slideshow").forEach((e=>{const t=e.querySelectorAll(".slideshow__slide"),o=e.querySelectorAll(".slideshow__controls"),s=e.querySelector(".slideshow__dots"),r=e.getAttribute("data-interval"),l=t.length;let i,a=0;const c=e=>{t.forEach((e=>{e.removeAttribute("data-status")})),t[e].setAttribute("data-status","active"),clearTimeout(i),i=setTimeout((()=>{c((e+1)%l),d()}),r),a=e};o&&o.forEach((e=>{const t=e.querySelector(".slideshow__prev"),o=e.querySelector(".slideshow__next");t.addEventListener("click",(()=>{0===a&&(a=l),c((a-1)%l),d()})),o.addEventListener("click",(()=>{c((a+1)%l),d()}))}));(()=>{if(!s)return;t.forEach(((e,t)=>{const o=document.createElement("button");o.classList.add("slideshow__dot"),o.setAttribute("data-slide",t),s.appendChild(o),0===t&&o.setAttribute("data-status","active")}));const e=s.querySelectorAll(".slideshow__dot");e.forEach((t=>{t.addEventListener("click",(()=>{c(t.getAttribute("data-slide")),e.forEach((e=>{e.removeAttribute("data-status")})),t.setAttribute("data-status","active")}))}))})();const d=()=>{if(!s)return;s.querySelectorAll(".slideshow__dot").forEach((e=>{e.removeAttribute("data-status"),a===parseInt(e.getAttribute("data-slide"))&&e.setAttribute("data-status","active")}))};c(a)}))};c();const d=()=>{const e=document.querySelector(".slideshow--about");if(!e)return;const t=e.querySelectorAll(".slideshow__slide");window.innerWidth>1120?t.forEach((e=>{e.classList.remove("slideshow__slide--vw600")})):window.innerWidth<=1120&&window.innerWidth>480?t.forEach((e=>{e.classList.add("slideshow__slide--vw600")})):window.innerWidth<=480&&t.forEach((e=>{e.classList.remove("slideshow__slide--vw600")}))};d(),window.addEventListener("resize",(()=>{d()}));(()=>{const e=document.querySelectorAll(".wp-block-gallery");e&&(e.forEach((e=>{e.classList.add("slideshow"),e.setAttribute("data-interval","5000");e.querySelectorAll(".wp-block-image").forEach((e=>{e.classList.add("slideshow__slide")}))})),c())})()}();
//# sourceMappingURL=scripts.js.map