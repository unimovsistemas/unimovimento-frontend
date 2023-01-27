(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["default~components-pages-acerte-acerte-module-ngfactory~components-pages-home-three-home-three-modul~172953cf"],{

/***/ "Aow0":
/*!*********************************************************************!*\
  !*** ./src/app/components/helper/lideres/lideres-helper.service.ts ***!
  \*********************************************************************/
/*! exports provided: LideresHelperService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LideresHelperService", function() { return LideresHelperService; });
/* harmony import */ var _data_volunteer_volunteer_json__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../data/volunteer/volunteer.json */ "SRg+");
var _data_volunteer_volunteer_json__WEBPACK_IMPORTED_MODULE_0___namespace = /*#__PURE__*/__webpack_require__.t(/*! ../../data/volunteer/volunteer.json */ "SRg+", 1);
/* harmony import */ var _data_acerte_volunteer_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../data/acerte/volunteer.json */ "p9yA");
var _data_acerte_volunteer_json__WEBPACK_IMPORTED_MODULE_1___namespace = /*#__PURE__*/__webpack_require__.t(/*! ../../data/acerte/volunteer.json */ "p9yA", 1);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ "8Y7J");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "iInd");




class LideresHelperService {
    constructor(route) {
        this.route = route;
        // pagination
        this.page = 1;
        // Volunteer
        this.lideresData = _data_volunteer_volunteer_json__WEBPACK_IMPORTED_MODULE_0__;
        this.lideresAcerteData = _data_acerte_volunteer_json__WEBPACK_IMPORTED_MODULE_1__;
        this.volunteerdetails = _data_volunteer_volunteer_json__WEBPACK_IMPORTED_MODULE_0__;
        // Show Social
        this.visible = false;
    }
    socialTrigger(item) {
        item.visible = !item.visible;
    }
    // Volunteer Details
    getVolunteer(id) {
        this.volunteerdetails = _data_volunteer_volunteer_json__WEBPACK_IMPORTED_MODULE_0__.filter((item) => {
            return item.id == id;
        });
    }
    ngAfterContentInit() {
        this.getVolunteer(this.route.snapshot.params.id);
    }
}
LideresHelperService.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineInjectable"]({ factory: function LideresHelperService_Factory() { return new LideresHelperService(_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵinject"](_angular_router__WEBPACK_IMPORTED_MODULE_3__["ActivatedRoute"])); }, token: LideresHelperService, providedIn: "root" });


/***/ }),

/***/ "p9yA":
/*!*******************************************************!*\
  !*** ./src/app/components/data/acerte/volunteer.json ***!
  \*******************************************************/
/*! exports provided: 0, 1, 2, 3, 4, default */
/***/ (function(module) {

module.exports = JSON.parse("[{\"id\":1,\"image\":\"assets/img/acerte/i01.png\",\"name\":\"Douglas e Greicyellen Ferreira \",\"post\":\"Coordenadores / Instrutores\",\"contactinfo\":[{\"icon\":\"fas fa-phone\",\"title\":\"Phone\",\"text\":\"(123) 456-7890 8, +987 868 6578 648\"},{\"icon\":\"fas fa-envelope\",\"title\":\"Email\",\"text\":\"info@example.com, example@example.com\"},{\"icon\":\"fas fa-map-marker-alt\",\"title\":\"Address Info\",\"text\":\"24 Fifth st., New York, US\"}],\"social\":[{\"icon\":\"fab fa-facebook-f\",\"title\":\"Facebook\",\"text\":\"https://pt-br.facebook.com/jesse.branco.5\"},{\"icon\":\"fab fa-instagram\",\"title\":\"Instagram\",\"text\":\"https://www.instagram.com/jessebranco/\"}],\"htmltext\":\"<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>\",\"skills\":[{\"title\":\"Marketing Strategy\",\"value\":84},{\"title\":\"Digital Marketing\",\"value\":70},{\"title\":\"Web Design\",\"value\":85},{\"title\":\"IT Consulting\",\"value\":92}]},{\"id\":2,\"image\":\"assets/img/acerte/i02.png\",\"name\":\"Josias e Késede de Azevedo \",\"post\":\"Instrutores\",\"contactinfo\":[{\"icon\":\"fas fa-phone\",\"title\":\"Phone\",\"text\":\"(123) 456-7890 8, +987 868 6578 648\"},{\"icon\":\"fas fa-envelope\",\"title\":\"Email\",\"text\":\"info@example.com, example@example.com\"},{\"icon\":\"fas fa-map-marker-alt\",\"title\":\"Address Info\",\"text\":\"24 Fifth st., New York, US\"}],\"social\":[{\"icon\":\"fab fa-facebook-f\",\"title\":\"Facebook\",\"text\":\"https://pt-br.facebook.com/sheila.branco1\"},{\"icon\":\"fab fa-instagram\",\"title\":\"Instagram\",\"text\":\"https://www.instagram.com/sheilabranco/\"}],\"htmltext\":\"<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>\",\"skills\":[{\"title\":\"Marketing Strategy\",\"value\":84},{\"title\":\"Digital Marketing\",\"value\":70},{\"title\":\"Web Design\",\"value\":85},{\"title\":\"IT Consulting\",\"value\":92}]},{\"id\":3,\"image\":\"assets/img/acerte/i03.png\",\"name\":\"Juan e Ana Maske\",\"post\":\"Instrutores\",\"contactinfo\":[{\"icon\":\"fas fa-phone\",\"title\":\"Phone\",\"text\":\"(123) 456-7890 8, +987 868 6578 648\"},{\"icon\":\"fas fa-envelope\",\"title\":\"Email\",\"text\":\"info@example.com, example@example.com\"},{\"icon\":\"fas fa-map-marker-alt\",\"title\":\"Address Info\",\"text\":\"24 Fifth st., New York, US\"}],\"social\":[{\"icon\":\"fab fa-facebook-f\",\"title\":\"Facebook\",\"text\":\"https://pt-br.facebook.com/sheila.branco1\"},{\"icon\":\"fab fa-instagram\",\"title\":\"Instagram\",\"text\":\"https://www.instagram.com/sheilabranco/\"}],\"htmltext\":\"<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>\",\"skills\":[{\"title\":\"Marketing Strategy\",\"value\":84},{\"title\":\"Digital Marketing\",\"value\":70},{\"title\":\"Web Design\",\"value\":85},{\"title\":\"IT Consulting\",\"value\":92}]},{\"id\":4,\"image\":\"assets/img/acerte/i04.png\",\"name\":\"Josué e Alessandra Kujat\",\"post\":\"Mídia\",\"contactinfo\":[{\"icon\":\"fas fa-phone\",\"title\":\"Phone\",\"text\":\"(123) 456-7890 8, +987 868 6578 648\"},{\"icon\":\"fas fa-envelope\",\"title\":\"Email\",\"text\":\"info@example.com, example@example.com\"},{\"icon\":\"fas fa-map-marker-alt\",\"title\":\"Address Info\",\"text\":\"24 Fifth st., New York, US\"}],\"social\":[{\"icon\":\"fab fa-facebook-f\",\"title\":\"Facebook\",\"text\":\"https://pt-br.facebook.com/sheila.branco1\"},{\"icon\":\"fab fa-instagram\",\"title\":\"Instagram\",\"text\":\"https://www.instagram.com/sheilabranco/\"}],\"htmltext\":\"<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>\",\"skills\":[{\"title\":\"Marketing Strategy\",\"value\":84},{\"title\":\"Digital Marketing\",\"value\":70},{\"title\":\"Web Design\",\"value\":85},{\"title\":\"IT Consulting\",\"value\":92}]},{\"id\":5,\"image\":\"assets/img/acerte/i05.png\",\"name\":\"Emerson e Anelise Volanski\",\"post\":\"Autores e Desenvolvedores do ACERTE\",\"contactinfo\":[{\"icon\":\"fas fa-phone\",\"title\":\"Phone\",\"text\":\"(123) 456-7890 8, +987 868 6578 648\"},{\"icon\":\"fas fa-envelope\",\"title\":\"Email\",\"text\":\"info@example.com, example@example.com\"},{\"icon\":\"fas fa-map-marker-alt\",\"title\":\"Address Info\",\"text\":\"24 Fifth st., New York, US\"}],\"social\":[{\"icon\":\"fab fa-facebook-f\",\"title\":\"Facebook\",\"text\":\"https://pt-br.facebook.com/sheila.branco1\"},{\"icon\":\"fab fa-instagram\",\"title\":\"Instagram\",\"text\":\"https://www.instagram.com/sheilabranco/\"}],\"htmltext\":\"<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>\",\"skills\":[{\"title\":\"Marketing Strategy\",\"value\":84},{\"title\":\"Digital Marketing\",\"value\":70},{\"title\":\"Web Design\",\"value\":85},{\"title\":\"IT Consulting\",\"value\":92}]}]");

/***/ })

}]);
//# sourceMappingURL=default~components-pages-acerte-acerte-module-ngfactory~components-pages-home-three-home-three-modul~172953cf.js.map