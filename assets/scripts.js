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

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://webpack_theme/./src/scss/main.scss?");

/***/ }),

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
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _parts_parts__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./parts/parts */ \"./src/js/parts/parts.js\");\n/* harmony import */ var _libraries_libraries__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./libraries/libraries */ \"./src/js/libraries/libraries.js\");\n/* harmony import */ var _parts_slider__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./parts/slider */ \"./src/js/parts/slider.js\");\n/* harmony import */ var _parts_slider__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_parts_slider__WEBPACK_IMPORTED_MODULE_2__);\n\r\n\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/main.js?");

/***/ }),

/***/ "./src/js/parts/header.js":
/*!********************************!*\
  !*** ./src/js/parts/header.js ***!
  \********************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tlet header =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.header',\r\n\t\t\t);\r\n\t\tlet scrollPrev = 0;\r\n\r\n\t\twindow.addEventListener(\r\n\t\t\t'scroll',\r\n\t\t\tfunction () {\r\n\t\t\t\tvar scrolled =\r\n\t\t\t\t\twindow.PageYOffset ||\r\n\t\t\t\t\tthis\r\n\t\t\t\t\t\t.document\r\n\t\t\t\t\t\t.documentElement\r\n\t\t\t\t\t\t.scrollTop;\r\n\r\n\t\t\t\tif (\r\n\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t100 &&\r\n\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\tscrollPrev\r\n\t\t\t\t) {\r\n\t\t\t\t\theader.classList.add(\r\n\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t);\r\n\t\t\t\t} else {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\theader.classList.contains(\r\n\t\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t\t)\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.classList.remove(\r\n\t\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t}\r\n\t\t\t\t}\r\n\t\t\t\tscrollPrev =\r\n\t\t\t\t\tscrolled;\r\n\t\t\t},\r\n\t\t);\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/header.js?");

/***/ }),

/***/ "./src/js/parts/parts.js":
/*!*******************************!*\
  !*** ./src/js/parts/parts.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./header */ \"./src/js/parts/header.js\");\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_header__WEBPACK_IMPORTED_MODULE_0__);\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/parts.js?");

/***/ }),

/***/ "./src/js/parts/slider.js":
/*!********************************!*\
  !*** ./src/js/parts/slider.js ***!
  \********************************/
/***/ (() => {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\r\n\tconst swiper = new Swiper(\".swiper__swiper\", {\r\n\t\tloop: true,\r\n\t\teffect: \"fade\",\r\n\r\n\t\t// If we need pagination\r\n\t\tpagination: {\r\n\t\t\tel: \".swiper__pagination\",\r\n\t\t\tclickable: true,\r\n\t\t},\r\n\r\n\t\t// Navigation arrows\r\n\t\tnavigation: {\r\n\t\t\tnextEl: \".swiper__nav--next\",\r\n\t\t\tprevEl: \".swiper__nav--prev\",\r\n\t\t},\r\n\t});\r\n\r\n\t\r\n});\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/slider.js?");

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