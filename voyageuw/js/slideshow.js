!function(){"use strict";function e(){t===document.querySelectorAll("#hero-slides li").length&&(t=0),jQuery("#hero-slides li:nth-child("+(t+1)+")").css("visibility","visible"),jQuery("#hero-slides li:nth-child("+(i+1)+")").fadeTo(400,0,function(){jQuery("#hero-slides li:nth-child("+(i+1)+")").css("visibility","hidden"),document.querySelector("#hero-pagination li:nth-child("+(i+1)+")").style.opacity=.5}),document.querySelector("#hero-pagination li:nth-child("+(t+1)+")").style.opacity=1,jQuery("#hero-slides li:nth-child("+(t+1)+")").fadeTo(400,1,function(){i=t,t=i+1,n=setTimeout(e,l)})}var i,t,l=1e4,n=null;window.addEventListener("load",function o(r){window.removeEventListener("load",o,!1),i=0,t=1;for(var c=document.querySelectorAll("#hero-pagination li"),s=0;s<c.length;s++)c[s].onclick=function(l){return function(){l!==i&&(clearTimeout(n),jQuery("#hero-slides li").stop(!1,!0,!1),t=l,e())}}(s);n=setTimeout(e,l)},!1)}();