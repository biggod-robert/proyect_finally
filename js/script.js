document.addEventListener("DOMContentLoaded",(()=>{const e=document.getElementById("loginForm"),t=document.getElementById("registerForm"),d=document.getElementById("showRegisterForm"),n=document.getElementById("showLoginForm");d.addEventListener("click",(d=>{d.preventDefault(),e.classList.add("hidden"),t.classList.remove("hidden")})),n.addEventListener("click",(d=>{d.preventDefault(),t.classList.add("hidden"),e.classList.remove("hidden")}))}));