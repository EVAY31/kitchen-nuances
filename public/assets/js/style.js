// let flag = 0;
// window.addEventListener('scroll', function () {
//     let scrollY = window.scrollY;
//     let mapOffset = document.querySelector("#map").offsetTop;
//     if ((scrollY >= mapOffset - 1) && (flag === 0)) {
//         let center = [54.62461917804238, 39.73487543922871];
//         ymaps.ready(init);
//         function init() {
//             let map = new ymaps.Map("map", {
//                     center: center,
//                     zoom: 17,
//                     controls: ['geolocationControl', 'zoomControl']
//                 },
//                 {
//                     suppressMapOpenBlock: true,
//                     geolocationControlSize: "large",
//                     geolocationControlPosition: { top: "354px", right: "13px" },
//                     geolocationControlFloat: 'none',
//                     zoomControlSize: "small",
//                     zoomControlFloat: "none",
//                     zoomControlPosition: { top: "261px", right: "22px" },
//
//                 }
//             );
//             let placemark = new ymaps.Placemark(center, {
//                 balloonContent: `
//           <div class="balloon">
//             <div class="balloon__country">г. Рязань</div>
//             <div class="balloon__address">ул. Чапаева</div>
//             <div class="balloon__street">д. 56</div>
//           </div>
//           `
//             }, {
//                 iconLayout: 'default#image',
//                 iconImageHref: 'assets/image/icon.svg',
//                 iconImageSize: [150, 150],
//                 iconImageOffset: [-110, -110]
//             });
//             map.behaviors.disable('scrollZoom')
//             map.geoObjects.add(placemark);
//             map.container.fitToViewport();
//         }
//         flag = 1;
//     }
// });
ymaps.ready(init);
let center = [54.62461917804238, 39.73487543922871];
function init() {
    const map = new ymaps.Map("map", {

            center: center,
            zoom: 17,
            controls: ['geolocationControl', 'zoomControl']
        },
        {
            suppressMapOpenBlock: true,
            geolocationControlSize: "large",
            geolocationControlPosition: {top: "354px", right: "13px"},
            geolocationControlFloat: 'none',
            zoomControlSize: "small",
            zoomControlFloat: "none",
            zoomControlPosition: {top: "261px", right: "22px"},

        });
    let placemark = new ymaps.Placemark(center, {
        balloonContent: `
          <div class="balloon">
            <div class="balloon__country">г. Рязань</div>
            <div class="balloon__address">ул. Чапаева</div>
            <div class="balloon__street">д. 56</div>
          </div>
          `
    }, {
        iconLayout: 'default#image',
        iconImageHref: 'assets/image/icon.svg',
        iconImageSize: [150, 150],
        iconImageOffset: [-110, -110]
    });

    map.geoObjects.add(placemark);
    map.container.fitToViewport();
    map.controls.remove('geolocationControl'); // удаляем геолокацию
    map.controls.remove('searchControl'); // удаляем поиск
    map.controls.remove('trafficControl'); // удаляем контроль трафика
    map.controls.remove('typeSelector'); // удаляем тип
    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
    // map.controls.remove('zoomControl'); // удаляем контрол зуммирования
    map.controls.remove('rulerControl'); // удаляем контрол правил
    map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
}
// ________________________________________________Конец (кода карты)____________________________________________________
