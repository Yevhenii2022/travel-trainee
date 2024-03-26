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

/***/ "./src/js/parts/custom-select.js":
/*!***************************************!*\
  !*** ./src/js/parts/custom-select.js ***!
  \***************************************/
/***/ (() => {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\r\n    var x, i, j, l, ll, selElmnt, a, b, c;\r\n    \r\n    /* Look for any elements with the class \"custom-select\": */\r\n    x = document.getElementsByClassName(\"custom-select\");\r\n\r\n    if(x.length > 0) {\r\n        l = x.length;\r\n    \r\n        for (i = 0; i < l; i++) {\r\n            selElmnt = x[i].getElementsByTagName(\"select\")[0];\r\n\r\n            if(selElmnt){\r\n                ll = selElmnt.length;\r\n            \r\n                /* For each element, create a new DIV that will act as the selected item: */\r\n                a = document.createElement(\"DIV\");\r\n                a.setAttribute(\"class\", \"select-selected\");\r\n                a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;\r\n                x[i].appendChild(a);\r\n            \r\n                /* For each element, create a new DIV that will contain the option list: */\r\n                b = document.createElement(\"DIV\");\r\n                b.setAttribute(\"class\", \"select-items select-hide\");\r\n                \r\n                for (j = 0; j < ll; j++) {\r\n                    /* For each option in the original select element,\r\n                    create a new DIV that will act as an option item: */\r\n                    if (j !== selElmnt.selectedIndex) {\r\n                        c = document.createElement(\"DIV\");\r\n                        c.innerHTML = selElmnt.options[j].innerHTML;\r\n                        \r\n                        c.addEventListener(\"click\", function (e) {\r\n                            /* When an item is clicked, update the original select box,\r\n                            and the selected item: */\r\n                            var y, i, k, s, h, sl, yl;\r\n                            s = this.parentNode.parentNode.getElementsByTagName(\"select\")[0];\r\n                            sl = s.length;\r\n                            h = this.parentNode.previousSibling;\r\n                            \r\n                            for (i = 0; i < sl; i++) {\r\n                                if (s.options[i].innerHTML == this.innerHTML) {\r\n                                    s.selectedIndex = i;\r\n                                    h.innerHTML = this.innerHTML;\r\n                                    y = this.parentNode.getElementsByClassName(\"same-as-selected\");\r\n                                    yl = y.length;\r\n                                    \r\n                                    for (k = 0; k < yl; k++) {\r\n                                        y[k].removeAttribute(\"class\");\r\n                                    }\r\n                                    this.setAttribute(\"class\", \"same-as-selected\");\r\n                                    break;\r\n                                }\r\n                            }\r\n                            h.click();\r\n                            \r\n                            // Добавьте эту строку для генерации события change:\r\n                            var changeEvent = new Event(\"change\", {\r\n                                bubbles: true\r\n                            });\r\n                            s.dispatchEvent(changeEvent);\r\n                        });\r\n                        b.appendChild(c);\r\n                    }\r\n                }\r\n                x[i].appendChild(b);\r\n                \r\n                a.addEventListener(\"click\", function (e) {\r\n                    /* When the select box is clicked, close any other select boxes,\r\n                    and open/close the current select box: */\r\n                    e.stopPropagation();\r\n                    closeAllSelect(this);\r\n                    this.nextSibling.classList.toggle(\"select-hide\");\r\n                    this.classList.toggle(\"select-arrow-active\");\r\n                });\r\n            }\r\n        }\r\n        \r\n        function closeAllSelect(elmnt) {\r\n            /* A function that will close all select boxes in the document,\r\n            except the current select box: */\r\n            var x, y, i, xl, yl, arrNo = [];\r\n            x = document.getElementsByClassName(\"select-items\");\r\n            y = document.getElementsByClassName(\"select-selected\");\r\n            xl = x.length;\r\n            yl = y.length;\r\n            \r\n            for (i = 0; i < yl; i++) {\r\n                if (elmnt == y[i]) {\r\n                    arrNo.push(i)\r\n                } else {\r\n                    y[i].classList.remove(\"select-arrow-active\");\r\n                }\r\n            }\r\n            for (i = 0; i < xl; i++) {\r\n                if (arrNo.indexOf(i)) {\r\n                    x[i].classList.add(\"select-hide\");\r\n                }\r\n            }\r\n        }\r\n        \r\n        /* If the user clicks anywhere outside the select box,\r\n        then close all select boxes: */\r\n        document.addEventListener(\"click\", function (event) {\r\n            var target = event.target;\r\n            if (!target.classList.contains(\"select-selected\")) {\r\n                closeAllSelect(null);\r\n            }\r\n        });\r\n    }\r\n});\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/custom-select.js?");

/***/ }),

/***/ "./src/js/parts/form.js":
/*!******************************!*\
  !*** ./src/js/parts/form.js ***!
  \******************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tconst wpcf7Elm =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.wpcf7',\r\n\t\t\t);\r\n\t\tconst submitButton =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.form__button',\r\n\t\t\t);\r\n\t\tconst formInput =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.wpcf7-form-control',\r\n\t\t\t);\r\n\t\tconst deleteIcon =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.form__icon',\r\n\t\t\t);\r\n\t\tconst popover =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.popup',\r\n\t\t\t);\r\n\t\tconst inputFile =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t\"input[type='file']\",\r\n\t\t\t);\r\n\t\tconst fileNameDisplay =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.reviews-form__file-text',\r\n\t\t\t);\r\n\t\tconst inputClear =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.button__delete',\r\n\t\t\t);\r\n\r\n\t\tinputFile.setAttribute(\r\n\t\t\t'multiple',\r\n\t\t\t'multiple',\r\n\t\t);\r\n\r\n\t\tif (wpcf7Elm) {\r\n\t\t\tdocument.addEventListener(\r\n\t\t\t\t'wpcf7beforesubmit',\r\n\t\t\t\t() => {\r\n\t\t\t\t\t// if (\r\n\t\t\t\t\t// \tsubmitButton\r\n\t\t\t\t\t// ) {\r\n\t\t\t\t\tsubmitButton.setAttribute(\r\n\t\t\t\t\t\t'disabled',\r\n\t\t\t\t\t\t'disabled',\r\n\t\t\t\t\t);\r\n\t\t\t\t\t// }\r\n\t\t\t\t},\r\n\t\t\t\tfalse,\r\n\t\t\t);\r\n\r\n\t\t\tdocument.addEventListener(\r\n\t\t\t\t'wpcf7mailsent',\r\n\t\t\t\t// \"wpcf7mailfailed\",\r\n\t\t\t\t// \"wpcf7submit\",\r\n\t\t\t\tevent => {\r\n\t\t\t\t\tconst form =\r\n\t\t\t\t\t\tevent.target;\r\n\t\t\t\t\tform.reset();\r\n\t\t\t\t\tpopover.hidePopover();\r\n\t\t\t\t\tfileNameDisplay.innerText =\r\n\t\t\t\t\t\t'Добавить фото';\r\n\t\t\t\t\tinputClear.style.display =\r\n\t\t\t\t\t\t'none';\r\n\t\t\t\t},\r\n\t\t\t\tfalse,\r\n\t\t\t);\r\n\r\n\t\t\tdocument.addEventListener(\r\n\t\t\t\t'wpcf7submit',\r\n\t\t\t\t() => {\r\n\t\t\t\t\t// if (\r\n\t\t\t\t\t// \tsubmitButton\r\n\t\t\t\t\t// ) {\r\n\t\t\t\t\tsubmitButton.removeAttribute(\r\n\t\t\t\t\t\t'disabled',\r\n\t\t\t\t\t);\r\n\t\t\t\t\t// }\r\n\t\t\t\t},\r\n\t\t\t\tfalse,\r\n\t\t\t);\r\n\r\n\t\t\tif (\r\n\t\t\t\tdeleteIcon &&\r\n\t\t\t\tformInput\r\n\t\t\t) {\r\n\t\t\t\tdeleteIcon.addEventListener(\r\n\t\t\t\t\t'click',\r\n\t\t\t\t\t() => {\r\n\t\t\t\t\t\tWpcf7cf.clearFormFields(\r\n\t\t\t\t\t\t\tformInput,\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t},\r\n\t\t\t\t);\r\n\t\t\t}\r\n\t\t}\r\n\r\n\t\t// input file\r\n\t\tif (inputFile) {\r\n\t\t\tinputFile.addEventListener(\r\n\t\t\t\t'change',\r\n\t\t\t\tfunction () {\r\n\t\t\t\t\tlet files =\r\n\t\t\t\t\t\tthis\r\n\t\t\t\t\t\t\t.files;\r\n\t\t\t\t\tlet fileNames =\r\n\t\t\t\t\t\t[];\r\n\r\n\t\t\t\t\tfor (\r\n\t\t\t\t\t\tlet i = 0;\r\n\t\t\t\t\t\ti <\r\n\t\t\t\t\t\tfiles.length;\r\n\t\t\t\t\t\ti++\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\tfileNames.push(\r\n\t\t\t\t\t\t\tfiles[\r\n\t\t\t\t\t\t\t\ti\r\n\t\t\t\t\t\t\t]\r\n\t\t\t\t\t\t\t\t.name,\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t}\r\n\r\n\t\t\t\t\tfileNameDisplay.innerHTML =\r\n\t\t\t\t\t\tfileNames.length >\r\n\t\t\t\t\t\t0\r\n\t\t\t\t\t\t\t? fileNames.join(\r\n\t\t\t\t\t\t\t\t\t', ',\r\n\t\t\t\t\t\t\t  )\r\n\t\t\t\t\t\t\t: 'Добавить фото';\r\n\t\t\t\t\tinputClear.style.display =\r\n\t\t\t\t\t\t'block';\r\n\t\t\t\t},\r\n\t\t\t);\r\n\t\t}\r\n\r\n\t\t//clear input\r\n\t\tif (\r\n\t\t\tinputClear\r\n\t\t) {\r\n\t\t\tinputClear.addEventListener(\r\n\t\t\t\t'click',\r\n\t\t\t\tfunction () {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tinputFile\r\n\t\t\t\t\t\t\t.files\r\n\t\t\t\t\t\t\t.length >\r\n\t\t\t\t\t\t0\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\tinputFile.value =\r\n\t\t\t\t\t\t\t'';\r\n\t\t\t\t\t\tfileNameDisplay.innerText =\r\n\t\t\t\t\t\t\t'Добавить фото';\r\n\t\t\t\t\t\tinputClear.style.display =\r\n\t\t\t\t\t\t\t'none';\r\n\t\t\t\t\t}\r\n\t\t\t\t},\r\n\t\t\t);\r\n\t\t}\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/form.js?");

/***/ }),

/***/ "./src/js/parts/header.js":
/*!********************************!*\
  !*** ./src/js/parts/header.js ***!
  \********************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'click',\r\n\tfunction (event) {\r\n\t\tconst headerSearch =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.header__search',\r\n\t\t\t);\r\n\t\tconst isClickInside =\r\n\t\t\theaderSearch.contains(\r\n\t\t\t\tevent.target,\r\n\t\t\t);\r\n\r\n\t\tif (\r\n\t\t\t!isClickInside\r\n\t\t) {\r\n\t\t\theaderSearch.classList.remove(\r\n\t\t\t\t'active',\r\n\t\t\t);\r\n\t\t}\r\n\t},\r\n);\r\n\r\ndocument.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tlet header =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.header',\r\n\t\t\t);\r\n\t\tlet scrollPrev = 0;\r\n\r\n\t\twindow.addEventListener(\r\n\t\t\t'scroll',\r\n\t\t\tfunction () {\r\n\t\t\t\tvar scrolled =\r\n\t\t\t\t\twindow.pageYOffset ||\r\n\t\t\t\t\tdocument\r\n\t\t\t\t\t\t.documentElement\r\n\t\t\t\t\t\t.scrollTop;\r\n\r\n\t\t\t\tif (\r\n\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t100 &&\r\n\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\tscrollPrev\r\n\t\t\t\t) {\r\n\t\t\t\t\theader.classList.add(\r\n\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t);\r\n\t\t\t\t} else {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\theader.classList.contains(\r\n\t\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t\t)\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.classList.remove(\r\n\t\t\t\t\t\t\t'header--hidden',\r\n\t\t\t\t\t\t);\r\n\t\t\t\t\t}\r\n\t\t\t\t}\r\n\t\t\t\tscrollPrev =\r\n\t\t\t\t\tscrolled;\r\n\r\n\t\t\t\tconst body =\r\n\t\t\t\t\tdocument.querySelector(\r\n\t\t\t\t\t\t'body',\r\n\t\t\t\t\t);\r\n\t\t\t\tif (\r\n\t\t\t\t\tbody.classList.contains(\r\n\t\t\t\t\t\t'home',\r\n\t\t\t\t\t)\r\n\t\t\t\t) {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t80\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'#547fb8';\r\n\t\t\t\t\t} else {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'';\r\n\t\t\t\t\t}\r\n\t\t\t\t} else {\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\tscrolled >\r\n\t\t\t\t\t\t80\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'#FFFFFF';\r\n\t\t\t\t\t} else {\r\n\t\t\t\t\t\theader.style.backgroundColor =\r\n\t\t\t\t\t\t\t'';\r\n\t\t\t\t\t}\r\n\t\t\t\t}\r\n\t\t\t},\r\n\t\t);\r\n\r\n\t\t//input\r\n\t\tconst headerSearch =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.header__search',\r\n\t\t\t);\r\n\t\tconst searchInput =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.header__input',\r\n\t\t\t);\r\n\r\n\t\tif (\r\n\t\t\theaderSearch\r\n\t\t) {\r\n\t\t\theaderSearch.addEventListener(\r\n\t\t\t\t'click',\r\n\t\t\t\tfunction (\r\n\t\t\t\t\tevent,\r\n\t\t\t\t) {\r\n\t\t\t\t\tevent.stopPropagation();\r\n\r\n\t\t\t\t\theaderSearch.classList.toggle(\r\n\t\t\t\t\t\t'active',\r\n\t\t\t\t\t);\r\n\r\n\t\t\t\t\tif (\r\n\t\t\t\t\t\theaderSearch.classList.contains(\r\n\t\t\t\t\t\t\t'active',\r\n\t\t\t\t\t\t)\r\n\t\t\t\t\t) {\r\n\t\t\t\t\t\tsearchInput.focus();\r\n\t\t\t\t\t}\r\n\t\t\t\t},\r\n\t\t\t);\r\n\t\t}\r\n\r\n\t\tif (\r\n\t\t\tsearchInput\r\n\t\t) {\r\n\t\t\tsearchInput.addEventListener(\r\n\t\t\t\t'click',\r\n\t\t\t\tfunction (\r\n\t\t\t\t\tevent,\r\n\t\t\t\t) {\r\n\t\t\t\t\tevent.stopPropagation();\r\n\t\t\t\t},\r\n\t\t\t);\r\n\t\t}\r\n\r\n\t\tdocument.addEventListener(\r\n\t\t\t'click',\r\n\t\t\tfunction (\r\n\t\t\t\tevent,\r\n\t\t\t) {\r\n\t\t\t\tif (\r\n\t\t\t\t\t!searchInput.contains(\r\n\t\t\t\t\t\tevent.target,\r\n\t\t\t\t\t)\r\n\t\t\t\t) {\r\n\t\t\t\t\theaderSearch.classList.remove(\r\n\t\t\t\t\t\t'active',\r\n\t\t\t\t\t);\r\n\t\t\t\t}\r\n\t\t\t},\r\n\t\t);\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/header.js?");

/***/ }),

/***/ "./src/js/parts/parts.js":
/*!*******************************!*\
  !*** ./src/js/parts/parts.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _slider__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slider */ \"./src/js/parts/slider.js\");\n/* harmony import */ var _slider__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_slider__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./header */ \"./src/js/parts/header.js\");\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_header__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _video__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./video */ \"./src/js/parts/video.js\");\n/* harmony import */ var _video__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_video__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _form__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./form */ \"./src/js/parts/form.js\");\n/* harmony import */ var _form__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_form__WEBPACK_IMPORTED_MODULE_3__);\n/* harmony import */ var _custom_select__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./custom-select */ \"./src/js/parts/custom-select.js\");\n/* harmony import */ var _custom_select__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_custom_select__WEBPACK_IMPORTED_MODULE_4__);\n\r\n\r\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/parts.js?");

/***/ }),

/***/ "./src/js/parts/slider.js":
/*!********************************!*\
  !*** ./src/js/parts/slider.js ***!
  \********************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tconst swiper =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.swiper__swiper',\r\n\t\t\t\t{\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\teffect:\r\n\t\t\t\t\t\t'fade',\r\n\r\n\t\t\t\t\t// If we need pagination\r\n\t\t\t\t\t// pagination:\r\n\t\t\t\t\t// \t{\r\n\t\t\t\t\t// \t\tel: '.swiper__pagination',\r\n\t\t\t\t\t// \t\tclickable: true,\r\n\t\t\t\t\t// \t},\r\n\r\n\t\t\t\t\t// Navigation arrows\r\n\t\t\t\t\t// navigation:\r\n\t\t\t\t\t// \t{\r\n\t\t\t\t\t// \t\tnextEl:\r\n\t\t\t\t\t// \t\t\t'.swiper__nav--next',\r\n\t\t\t\t\t// \t\tprevEl:\r\n\t\t\t\t\t// \t\t\t'.swiper__nav--prev',\r\n\t\t\t\t\t// \t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst excursions =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.excursions__slider',\r\n\t\t\t\t{\r\n\t\t\t\t\tslidesPerView: 1,\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspeed: 800,\r\n\t\t\t\t\tcenteredSlides: true,\r\n\t\t\t\t\tkeyboard:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tenabled: true,\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tpagination:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tel: '.swiper__pagination',\r\n\t\t\t\t\t\t\ttype: 'fraction',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tnavigation:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tnextEl:\r\n\t\t\t\t\t\t\t\t'.swiper__nav--next',\r\n\t\t\t\t\t\t\tprevEl:\r\n\t\t\t\t\t\t\t\t'.swiper__nav--prev',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tbreakpoints:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\t541: {\r\n\t\t\t\t\t\t\t\tspaceBetween: 16,\r\n\t\t\t\t\t\t\t\tslidesPerView: 2.3,\r\n\t\t\t\t\t\t\t\tpagination: false,\r\n\t\t\t\t\t\t\t},\r\n\t\t\t\t\t\t\t1024: {\r\n\t\t\t\t\t\t\t\tslidesPerView: 3.3,\r\n\t\t\t\t\t\t\t\tspaceBetween: 16,\r\n\t\t\t\t\t\t\t\tpagination: false,\r\n\t\t\t\t\t\t\t},\r\n\t\t\t\t\t\t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst homeGallery =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.gallery__slider',\r\n\t\t\t\t{\r\n\t\t\t\t\tslidesPerView: 2.7,\r\n\t\t\t\t\tspaceBetween: 10,\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspeed: 1000,\r\n\t\t\t\t\tcenteredSlides: true,\r\n\t\t\t\t\tkeyboard:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tenabled: true,\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tbreakpoints:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\t541: {\r\n\t\t\t\t\t\t\t\t// slidesPerView: 2,\r\n\t\t\t\t\t\t\t},\r\n\t\t\t\t\t\t\t1024: {\r\n\t\t\t\t\t\t\t\tspaceBetween: 16,\r\n\t\t\t\t\t\t\t\tslidesPerView: 3.7,\r\n\t\t\t\t\t\t\t},\r\n\t\t\t\t\t\t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst galleryPage =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.gallery-page__slider',\r\n\t\t\t\t{\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspaceBetween: 16,\r\n\t\t\t\t\tslidesPerView: 6.5,\r\n\t\t\t\t\tcenteredSlides: true,\r\n\t\t\t\t\tfreeMode: true,\r\n\t\t\t\t\twatchSlidesProgress: true,\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\tconst galleryPage2 =\r\n\t\t\tnew Swiper(\r\n\t\t\t\t'.gallery-page__slider2',\r\n\t\t\t\t{\r\n\t\t\t\t\tloop: true,\r\n\t\t\t\t\tspaceBetween: 10,\r\n\t\t\t\t\tpagination:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tel: '.swiper-pagination',\r\n\t\t\t\t\t\t\ttype: 'fraction',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tnavigation:\r\n\t\t\t\t\t\t{\r\n\t\t\t\t\t\t\tnextEl:\r\n\t\t\t\t\t\t\t\t'.swiper-button-next',\r\n\t\t\t\t\t\t\tprevEl:\r\n\t\t\t\t\t\t\t\t'.swiper-button-prev',\r\n\t\t\t\t\t\t},\r\n\t\t\t\t\tthumbs: {\r\n\t\t\t\t\t\tswiper:\r\n\t\t\t\t\t\t\tswiper,\r\n\t\t\t\t\t},\r\n\t\t\t\t},\r\n\t\t\t);\r\n\r\n\t\t//fancybox\r\n\t\tFancybox.bind(\r\n\t\t\t'[data-fancybox=\"gallery\"]',\r\n\t\t\t{\r\n\t\t\t\t// compact: false,\r\n\t\t\t\tidle: false,\r\n\t\t\t\t// animated: false,\r\n\t\t\t\tshowClass: false,\r\n\t\t\t\thideClass: false,\r\n\t\t\t\tdragToClose: false,\r\n\t\t\t\tcontentClick: false,\r\n\r\n\t\t\t\tImages: {\r\n\t\t\t\t\t// zoom: false,\r\n\t\t\t\t},\r\n\r\n\t\t\t\tToolbar: {\r\n\t\t\t\t\tdisplay: {\r\n\t\t\t\t\t\tleft: [],\r\n\t\t\t\t\t\tmiddle:\r\n\t\t\t\t\t\t\t[\r\n\t\t\t\t\t\t\t\t'infobar',\r\n\t\t\t\t\t\t\t],\r\n\t\t\t\t\t\tright: [\r\n\t\t\t\t\t\t\t'close',\r\n\t\t\t\t\t\t],\r\n\t\t\t\t\t},\r\n\t\t\t\t},\r\n\r\n\t\t\t\tThumbs: {\r\n\t\t\t\t\ttype: 'classic',\r\n\t\t\t\t},\r\n\t\t\t},\r\n\t\t);\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/slider.js?");

/***/ }),

/***/ "./src/js/parts/video.js":
/*!*******************************!*\
  !*** ./src/js/parts/video.js ***!
  \*******************************/
/***/ (() => {

eval("document.addEventListener(\r\n\t'DOMContentLoaded',\r\n\tfunction () {\r\n\t\tconst video =\r\n\t\t\tdocument.getElementById(\r\n\t\t\t\t'custom-video',\r\n\t\t\t);\r\n\t\tconst playPauseButton =\r\n\t\t\tdocument.querySelector(\r\n\t\t\t\t'.video__play',\r\n\t\t\t);\r\n\r\n\t\tconst togglePlayPause =\r\n\t\t\t() => {\r\n\t\t\t\tif (\r\n\t\t\t\t\tvideo.paused\r\n\t\t\t\t) {\r\n\t\t\t\t\tvideo.play();\r\n\t\t\t\t\tplayPauseButton.innerHTML =\r\n\t\t\t\t\t\t'';\r\n\t\t\t\t} else {\r\n\t\t\t\t\tvideo.pause();\r\n\t\t\t\t\tplayPauseButton.innerHTML =\r\n\t\t\t\t\t\t'<svg class=\"video__icon\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 15 19\" fill=\"none\"><path fill=\"#fff\" d=\"M0 0v19l15-9.5L0 0Z\" /></svg> Смотреть видео';\r\n\t\t\t\t}\r\n\t\t\t};\r\n\r\n\t\tif (video) {\r\n\t\t\tvideo.addEventListener(\r\n\t\t\t\t'click',\r\n\t\t\t\ttogglePlayPause,\r\n\t\t\t);\r\n\t\t}\r\n\r\n\t\tif (\r\n\t\t\tplayPauseButton\r\n\t\t) {\r\n\t\t\tplayPauseButton.addEventListener(\r\n\t\t\t\t'click',\r\n\t\t\t\ttogglePlayPause,\r\n\t\t\t);\r\n\t\t}\r\n\t},\r\n);\r\n\n\n//# sourceURL=webpack://webpack_theme/./src/js/parts/video.js?");

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