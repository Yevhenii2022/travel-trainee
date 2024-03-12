/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _js_main_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/main.js */ \"./src/js/main.js\");\n/* harmony import */ var _scss_main_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scss/main.scss */ \"./src/scss/main.scss\");\n\n\n\n//# sourceURL=webpack://webpack_theme/./src/index.js?");

/***/ }),

/***/ "./src/js/libraries/add-alt-title.js":
/*!*******************************************!*\
  !*** ./src/js/libraries/add-alt-title.js ***!
  \*******************************************/
/***/ (() => {

eval("jQuery(\"img:not([title])\").each(function () {\n  if (jQuery(this).attr(\"alt\") !== \"\")\n    jQuery(this).attr(\"title\", jQuery(this).attr(\"alt\"));\n});\n\njQuery(\"img:not([alt])\").each(function () {\n  if (jQuery(this).attr(\"title\") !== \"\")\n    jQuery(this).attr(\"alt\", jQuery(this).attr(\"title\"));\n});\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/libraries/add-alt-title.js?");

/***/ }),

/***/ "./src/js/libraries/libraries.js":
/*!***************************************!*\
  !*** ./src/js/libraries/libraries.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _add_alt_title__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add-alt-title */ \"./src/js/libraries/add-alt-title.js\");\n/* harmony import */ var _add_alt_title__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_add_alt_title__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _phone_mask__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./phone-mask */ \"./src/js/libraries/phone-mask.js\");\n/* harmony import */ var _phone_mask__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_phone_mask__WEBPACK_IMPORTED_MODULE_1__);\n\r\n\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/libraries/libraries.js?");

/***/ }),

/***/ "./src/js/libraries/phone-mask.js":
/*!****************************************!*\
  !*** ./src/js/libraries/phone-mask.js ***!
  \****************************************/
/***/ (() => {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\n  var phoneInputs = document.querySelectorAll('input[type=\"tel\"]');\n\n  if (phoneInputs) {\n    phoneInputs.forEach(function (phoneInput) {\n      var phoneMask = IMask(phoneInput, {\n        mask: \"+38(000)000-00-00\",\n      });\n    });\n  }\n});\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/libraries/phone-mask.js?");

/***/ }),

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _parts_parts__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./parts/parts */ \"./src/js/parts/parts.js\");\n/* harmony import */ var _libraries_libraries__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./libraries/libraries */ \"./src/js/libraries/libraries.js\");\n\r\n\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/main.js?");

/***/ }),

/***/ "./src/js/parts/form.js":
/*!******************************!*\
  !*** ./src/js/parts/form.js ***!
  \******************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tconst wpcf7Elm =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.wpcf7',\r\n\t\t\t);\r\n\t\tconst submitButton =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.form__button',\r\n\t\t\t);\r\n\t\tconst formInput =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.wpcf7-form-control',\r\n\t\t\t);\r\n\t\tconst deleteIcon =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.form__icon',\r\n\t\t\t);\r\n\t\tconst popover =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.popup',\r\n\t\t\t);\r\n\r\n\t\tif (wpcf7Elm) {\r\n\t\t\twpcf7Elm.addEventListener(\r\n\t\t\t\t'wpcf7beforesubmit',\r\n\t\t\t\t() => {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tsubmitButton\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\tsubmitButton.setAttribute(\r\n\t\t\t\t\t\t\t'disabled',\r\n\t\t\t\t\t\t\t'disabled',\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t}\r\n\t\t\t\t},\r\n\t\t\t\tfalse,\r\n\t\t\t);\r\n\r\n\t\t\twpcf7Elm.addEventListener(\r\n\t\t\t\t'wpcf7mailsent',\r\n\t\t\t\t// \"wpcf7mailfailed\",\r\n\t\t\t\t// \"wpcf7submit\",\r\n\t\t\t\tevent => {\r\n\t\t\t\t\tconst form =\r\n\t\t\t\t\t\tevent.target;\r\n\t\t\t\t\tform.reset();\r\n\t\t\t\t\tpopover.hidePopover();\r\n\t\t\t\t},\r\n\t\t\t\tfalse,\r\n\t\t\t);\r\n\r\n\t\t\twpcf7Elm.addEventListener(\r\n\t\t\t\t'wpcf7submit',\r\n\t\t\t\t() => {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tsubmitButton\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\tsubmitButton.removeAttribute(\r\n\t\t\t\t\t\t\t'disabled',\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t}\r\n\t\t\t\t},\r\n\t\t\t\tfalse,\r\n\t\t\t);\r\n\r\n\t\t\tif (\r\n\t\t\t\tdeleteIcon &&\r\n\t\t\t\tformInput\r\n\t\t\t) {\r\n\t\t\t\tdeleteIcon.addEventListener(\r\n\t\t\t\t\t'click',\r\n\t\t\t\t\t() => {\r\n\t\t\t\t\t\tWpcf7cf.clearFormFields(\r\n\t\t\t\t\t\t\tformInput,\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t},\r\n\t\t\t\t);\r\n\t\t\t}\r\n\t\t}\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/form.js?");

/***/ }),

/***/ "./src/js/parts/header.js":
/*!********************************!*\
  !*** ./src/js/parts/header.js ***!
  \********************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tlet header =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.header',\r\n\t\t\t);\r\n\t\tlet scrollPrev = 0;\r\n\r\n\t\twindow.addEventListener(\r\n\t\t\t'scroll',\r\n\t\t\tfunction () {\r\n\t\t\t\tvar scrolled =\r\n\t\t\t\t\twindow.pageYOffset ||\r\n\t\t\t\t\tdocument\r\n\t\t\t\t\t\t.documentElement\r\n\t\t\t\t\t\t.scrollTop;\r\n\r\n\t\t\t\tif (\r\n\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t100 &&\r\n\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\tscrollPrev\r\n\t\t\t\t) {\r\n\t\t\t\t\theader.classList.add(\r\n\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t);\r\n\t\t\t\t} else {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\theader.classList.contains(\r\n\t\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t\t)\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.classList.remove(\r\n\t\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t}\r\n\t\t\t\t}\r\n\t\t\t\tscrollPrev =\r\n\t\t\t\t\tscrolled;\r\n\r\n\t\t\t\tconst body =\r\n\t\t\t\t\tdocument.querySelector(\r\n\t\t\t\t\t\t'body',\r\n\t\t\t\t\t);\r\n\t\t\t\tif (\r\n\t\t\t\t\tbody.classList.contains(\r\n\t\t\t\t\t\t'home',\r\n\t\t\t\t\t)\r\n\t\t\t\t) {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t80\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'#547fb8';\r\n\t\t\t\t\t} else {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'';\r\n\t\t\t\t\t}\r\n\t\t\t\t} else {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t80\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'#FFFFFF';\r\n\t\t\t\t\t} else {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'';\r\n\t\t\t\t\t}\r\n\t\t\t\t}\r\n\t\t\t},\r\n\t\t);\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/header.js?");

/***/ }),

/***/ "./src/js/parts/parts.js":
/*!*******************************!*\
  !*** ./src/js/parts/parts.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _slider__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slider */ \"./src/js/parts/slider.js\");\n/* harmony import */ var _slider__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_slider__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./header */ \"./src/js/parts/header.js\");\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_header__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _video__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./video */ \"./src/js/parts/video.js\");\n/* harmony import */ var _video__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_video__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _form__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./form */ \"./src/js/parts/form.js\");\n/* harmony import */ var _form__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_form__WEBPACK_IMPORTED_MODULE_3__);\n\r\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/parts.js?");

/***/ }),

/***/ "./src/js/parts/slider.js":
/*!********************************!*\
  !*** ./src/js/parts/slider.js ***!
  \********************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tconst swiper =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.swiper__swiper',\r\n\t\t\t\t{\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\teffect:\r\n\t\t\t\t\t\t'fade',\r\n\r\n\t\t\t\t\t// If we need pagination\r\n\t\t\t\t\tpagination:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tel: '.swiper__pagination',\r\n\t\t\t\t\t\t\tclickable: true,\r\n\t\t\t\t\t\t},\r\n\r\n\t\t\t\t\t// Navigation arrows\r\n\t\t\t\t\tnavigation:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tnextEl:\r\n\t\t\t\t\t\t\t\t'.swiper__nav--next',\r\n\t\t\t\t\t\t\tprevEl:\r\n\t\t\t\t\t\t\t\t'.swiper__nav--prev',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst homeGallery =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.gallery__slider',\r\n\t\t\t\t{\r\n\t\t\t\t\tslidesPerView: 2.7,\r\n\t\t\t\t\tspaceBetween: 10,\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspeed: 1000,\r\n\t\t\t\t\tcenteredSlides: true,\r\n\t\t\t\t\tkeyboard:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tenabled: true,\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tbreakpoints:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\t541: {\r\n\t\t\t\t\t\t\t\t// slidesPerView: 2,\r\n\t\t\t\t\t\t\t},\r\n\t\t\t\t\t\t\t1024: {\r\n\t\t\t\t\t\t\t\tspaceBetween: 16,\r\n\t\t\t\t\t\t\t\tslidesPerView: 3.7,\r\n\t\t\t\t\t\t\t},\r\n\t\t\t\t\t\t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst galleryPage =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.gallery-page__slider',\r\n\t\t\t\t{\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspaceBetween: 16,\r\n\t\t\t\t\tslidesPerView: 6.5,\r\n\t\t\t\t\tcenteredSlides: true,\r\n\t\t\t\t\tfreeMode: true,\r\n\t\t\t\t\twatchSlidesProgress: true,\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst galleryPage2 =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.gallery-page__slider2',\r\n\t\t\t\t{\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspaceBetween: 10,\r\n\t\t\t\t\tpagination:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tel: '.swiper-pagination',\r\n\t\t\t\t\t\t\ttype: 'fraction',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tnavigation:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tnextEl:\r\n\t\t\t\t\t\t\t\t'.swiper-button-next',\r\n\t\t\t\t\t\t\tprevEl:\r\n\t\t\t\t\t\t\t\t'.swiper-button-prev',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tthumbs: {\r\n\t\t\t\t\t\tswiper:\r\n\t\t\t\t\t\t\tswiper,\r\n\t\t\t\t\t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/slider.js?");

/***/ }),

/***/ "./src/js/parts/video.js":
/*!*******************************!*\
  !*** ./src/js/parts/video.js ***!
  \*******************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tconst video =\r\n\t\t\tdocument.getElementById(\r\n\t\t\t\t'custom-video',\r\n\t\t\t);\r\n\t\tconst playPauseButton =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.video__play',\r\n\t\t\t);\r\n\r\n\t\tconst togglePlayPause =\r\n\t\t\t() => {\r\n\t\t\t\tif (\r\n\t\t\t\t\tvideo.paused\r\n\t\t\t\t) {\r\n\t\t\t\t\tvideo.play();\r\n\t\t\t\t\tplayPauseButton.innerHTML =\r\n\t\t\t\t\t\t'';\r\n\t\t\t\t} else {\r\n\t\t\t\t\tvideo.pause();\r\n\t\t\t\t\tplayPauseButton.innerHTML =\r\n\t\t\t\t\t\t'<svg class=\"video__icon\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 15 19\" fill=\"none\"><path fill=\"#fff\" d=\"M0 0v19l15-9.5L0 0Z\" /></svg> Смотреть видео';\r\n\t\t\t\t}\r\n\t\t\t};\r\n\r\n\t\tvideo.addEventListener(\r\n\t\t\t'click',\r\n\t\t\ttogglePlayPause,\r\n\t\t);\r\n\t\tplayPauseButton.addEventListener(\r\n\t\t\t'click',\r\n\t\t\ttogglePlayPause,\r\n\t\t);\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/video.js?");

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://webpack_theme/./src/scss/main.scss?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;