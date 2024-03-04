# Webpack: Использование

Node version: v18.17.0

Чтобы начать, в корне темы:
npm i;
npm run start;

Сбилдить проект:
npm run build;

SCSS:
В папке /src/includes:
variebles - переменные (color, font-family, transition и т.д.);
fonts - подключение шрифтов (@font-face);
pages - стили для страниц. Что бы добавить новую, нужно создать в этой папке файл с названием "\_пример.scss" и подключить в главном файле - "@import "пример".

Использование брейкпоинта:
@include media(w768) {
...
}

JavaScript:
В папке /src/js:
Что бы добавить новый скрипт, нужно создать в этой папке файл с названием "пример.js" и подключить в главном файле - main.js: "import "./пример".

//Подключение шрифтов:
@font-face {
font-family: "MullerRegular";
font-display: swap;
src: url("../fonts/mullerregular.woff2") format("woff2"),
url("../fonts/mullerregular.woff") format("woff");
font-weight: 400;
font-style: normal;
}

$MullerBold: "MullerRegular", sans-serif;

SVG не вставлять через спрайты !!!!
Вставляем через background after/before элементы
clean svg - https://jakearchibald.github.io/svgomg/
convert to bg - https://yoksel.github.io/url-encoder/

ios 100vh problem:
https://dev.to/maciejtrzcinski/100vh-problem-with-ios-safari-3ge9
https://allthingssmitty.com/2020/05/11/css-fix-for-100vh-in-mobile-webkit/
