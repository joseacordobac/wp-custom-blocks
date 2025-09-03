/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/utilities/updateQueryParams.js":
/*!********************************************!*\
  !*** ./src/utilities/updateQueryParams.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   onUrlChange: () => (/* binding */ onUrlChange),
/* harmony export */   upDateQueryParams: () => (/* binding */ upDateQueryParams)
/* harmony export */ });
const upDateQueryParams = (key, params) => {
  const url = new URL(window.location.href);
  url.searchParams.set(key, params);
  window.history.pushState({}, '', url);
  if (params.length === 0) {
    url.searchParams.delete(key);
    window.history.pushState({}, '', url);
  }
};
function onUrlChange(callback) {
  window.addEventListener("popstate", () => callback(window.location.href));
  ["pushState", "replaceState"].forEach(method => {
    const original = history[method];
    history[method] = function (...args) {
      const result = original.apply(this, args);
      callback(window.location.href);
      return result;
    };
  });
}

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
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!****************************!*\
  !*** ./src/totals/view.js ***!
  \****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utilities_updateQueryParams__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utilities/updateQueryParams */ "./src/utilities/updateQueryParams.js");

const insertInTotal = total => {
  const getTotal = document.querySelector('.card-list-head__total-count');
  if (getTotal) {
    getTotal.innerHTML = total;
  }
};
const sendOrder = () => {
  const getOrderBtn = document.querySelector('.card-list-head__sort-order');
  if (getOrderBtn) {
    getOrderBtn.addEventListener('click', () => {
      if (getOrderBtn.classList.contains('card-list-head__sort-order--desc')) {
        (0,_utilities_updateQueryParams__WEBPACK_IMPORTED_MODULE_0__.upDateQueryParams)('order', 'ASC');
        getOrderBtn.classList.remove('card-list-head__sort-order--desc');
        getOrderBtn.classList.add('card-list-head__sort-order--asc');
        getOrderBtn.innerText = 'Mayor a Menor';
        return;
      }
      if (getOrderBtn.classList.contains('card-list-head__sort-order--asc')) {
        (0,_utilities_updateQueryParams__WEBPACK_IMPORTED_MODULE_0__.upDateQueryParams)('order', 'DESC');
        getOrderBtn.classList.add('card-list-head__sort-order--desc');
        getOrderBtn.classList.remove('card-list-head__sort-order--asc');
        getOrderBtn.innerText = 'Menor a Mayor';
        return;
      }
    });
  }
};
window.addEventListener('DOMContentLoaded', () => {
  const getDataTotal = document.querySelector('.card-list');
  if (getDataTotal) {
    const total = getDataTotal.getAttribute('data-total');
    insertInTotal(total);
  }
  sendOrder();
});
})();

/******/ })()
;
//# sourceMappingURL=view.js.map