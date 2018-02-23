jQuery(document).ready(function($){

	// Off canvas Menu

	$('#wk-off-canvas-icon').click(function(){
		$('body').toggleClass('off-canvas-is-active');
	});

	$(window).on('resize', function(){
		var win = $(this);
		if(win.width() < 770) {
		} else {
			$('body').removeClass('off-canvas-is-active');
		}
	});

	//! modernizr 3.5.0 (Custom Build) | MIT *
	//* https://modernizr.com/download/?-cssfilters-cssgradients-flexbox-setclasses !*/
	!function(e,t,n){function r(e,t){return typeof e===t}function s(){var e,t,n,s,o,i,l;for(var a in x)if(x.hasOwnProperty(a)){if(e=[],t=x[a],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(s=r(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)i=e[o],l=i.split("."),1===l.length?Modernizr[l[0]]=s:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=s),C.push((s?"":"no-")+l.join("-"))}}function o(e){var t=w.className,n=Modernizr._config.classPrefix||"";if(b&&(t=t.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),b?w.className.baseVal=t:w.className=t)}function i(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):b?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function l(e,t){return!!~(""+e).indexOf(t)}function a(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function f(e,t){return function(){return e.apply(t,arguments)}}function u(e,t,n){var s;for(var o in e)if(e[o]in t)return n===!1?e[o]:(s=t[e[o]],r(s,"function")?f(s,n||t):s);return!1}function d(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function p(t,n,r){var s;if("getComputedStyle"in e){s=getComputedStyle.call(e,t,n);var o=e.console;if(null!==s)r&&(s=s.getPropertyValue(r));else if(o){var i=o.error?"error":"log";o[i].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else s=!n&&t.currentStyle&&t.currentStyle[r];return s}function c(){var e=t.body;return e||(e=i(b?"svg":"body"),e.fake=!0),e}function m(e,n,r,s){var o,l,a,f,u="modernizr",d=i("div"),p=c();if(parseInt(r,10))for(;r--;)a=i("div"),a.id=s?s[r]:u+(r+1),d.appendChild(a);return o=i("style"),o.type="text/css",o.id="s"+u,(p.fake?p:d).appendChild(o),p.appendChild(d),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(t.createTextNode(e)),d.id=u,p.fake&&(p.style.background="",p.style.overflow="hidden",f=w.style.overflow,w.style.overflow="hidden",w.appendChild(p)),l=n(d,e),p.fake?(p.parentNode.removeChild(p),w.style.overflow=f,w.offsetHeight):d.parentNode.removeChild(d),!!l}function g(t,r){var s=t.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(d(t[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+d(t[s])+":"+r+")");return o=o.join(" or "),m("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==p(e,null,"position")})}return n}function v(e,t,s,o){function f(){d&&(delete j.style,delete j.modElem)}if(o=r(o,"undefined")?!1:o,!r(s,"undefined")){var u=g(e,s);if(!r(u,"undefined"))return u}for(var d,p,c,m,v,y=["modernizr","tspan","samp"];!j.style&&y.length;)d=!0,j.modElem=i(y.shift()),j.style=j.modElem.style;for(c=e.length,p=0;c>p;p++)if(m=e[p],v=j.style[m],l(m,"-")&&(m=a(m)),j.style[m]!==n){if(o||r(s,"undefined"))return f(),"pfx"==t?m:!0;try{j.style[m]=s}catch(h){}if(j.style[m]!=v)return f(),"pfx"==t?m:!0}return f(),!1}function y(e,t,n,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),l=(e+" "+k.join(i+" ")+i).split(" ");return r(t,"string")||r(t,"undefined")?v(l,t,s,o):(l=(e+" "+E.join(i+" ")+i).split(" "),u(l,t,n))}function h(e,t,r){return y(e,n,n,t,r)}var C=[],x=[],S={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){x.push({name:e,fn:t,options:n})},addAsyncTest:function(e){x.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=S,Modernizr=new Modernizr;var w=t.documentElement,b="svg"===w.nodeName.toLowerCase(),_=S._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];S._prefixes=_,Modernizr.addTest("cssgradients",function(){for(var e,t="background-image:",n="gradient(linear,left top,right bottom,from(#9f9),to(white));",r="",s=0,o=_.length-1;o>s;s++)e=0===s?"to ":"",r+=t+_[s]+"linear-gradient("+e+"left top, #9f9, white);";Modernizr._config.usePrefixes&&(r+=t+"-webkit-"+n);var l=i("a"),a=l.style;return a.cssText=r,(""+a.backgroundImage).indexOf("gradient")>-1});var P="CSS"in e&&"supports"in e.CSS,T="supportsCSS"in e;Modernizr.addTest("supports",P||T);var z="Moz O ms Webkit",k=S._config.usePrefixes?z.split(" "):[];S._cssomPrefixes=k;var E=S._config.usePrefixes?z.toLowerCase().split(" "):[];S._domPrefixes=E;var N={elem:i("modernizr")};Modernizr._q.push(function(){delete N.elem});var j={style:N.elem.style};Modernizr._q.unshift(function(){delete j.style}),S.testAllProps=y,S.testAllProps=h,Modernizr.addTest("cssfilters",function(){if(Modernizr.supports)return h("filter","blur(2px)");var e=i("a");return e.style.cssText=_.join("filter:blur(2px); "),!!e.style.length&&(t.documentMode===n||t.documentMode>9)}),Modernizr.addTest("flexbox",h("flexBasis","1px",!0)),s(),o(C),delete S.addTest,delete S.addAsyncTest;for(var A=0;A<Modernizr._q.length;A++)Modernizr._q[A]();e.Modernizr=Modernizr}(window,document);


	// WK main menu
	$('.wk-main-nav-menu .menu-item').hover(function(){

		if($(this).hasClass('menu-is-active')) {

			$(this).removeClass('menu-is-active');

		} else {

			$(this).addClass('menu-is-active');

		}

	});

});
