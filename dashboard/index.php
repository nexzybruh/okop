
<?php

include("dias.php");
include("protect.php");
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>DashBoard SyncData</title>
<meta name="viewport" content="width=device-width, user-scalable=yes">
<style>
    @import 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap';

    :root {
    --bg1Table: #5e2c3a;
    --bg2Table: #5e2c3a;
    --bg1: #5e2c3a;
    --bg2: #5e2c3a;
    --fgTituloTable: white;
    --htmlBG: #111111;
    --descriptionButtonColor: white;
    --backgroundButtonColor: #3b1a1d;
    --backgroundSvgColor: #3c0e1f;
    --foregroundSvgColor: #ffffff;
    --backgroundInputComprar: #121212;
    --foregroundLogo: #f5a6a2;
    --backgroundInferiorButton: #6c2d3f;
    --borderInferiorButton: #c94f54;
    --foregroundInferiorButton: #f2a3b7;
    --inputPlaceholder: #f5a6a2;
    --inputBorder: #f2b3b3;
    --backgroundInputConsulta: #2a0d0f;
    --sliderOnColor: #f2a3b7;
    --voltarBG: #52535429;
    --voltarBorder: #7878789c;
    --voltarForeground: #fff;
    --realizarBorder: #c94f54;
    --realizarBG1: #5e2c3a;
    --realizarBG2: #8a2e3d;
    --colorHoverConsulta: #ff4d4d;
    --colorGlowConsulta: #ff4d4d71;
    --floatBtnColor: #f5a6a2;
    --userHC: #010c21;
    --bg2: #040404;
    --bg1: #0f0f0f;
    --backgroundSvgColor: #6b2c3f;
    --colorHoverConsulta: #6e2c32;
    --colorGlowConsulta: #f2a3b7;
    --backgroundInputConsulta: #202020;
    --floatBtnColor: #f5c2c7;
    --voltarBG: #52535429;
    --voltarBorder: #7878789c;
    --realizarBG2: #2f2f31;
    --realizarBorder: #787878;
    --inputPlaceholder: #f5a6a2;
    --inputBorder: #292929;
    --userHC: #100f0f;
}


.ContTable {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.dataframe {
    border-radius: 2vh;
    background: var(--backgroundInputComprar);
    margin: auto;
    font-size: calc(.9vh + .4rem);
    border: var(--foregroundLogo) .2vh solid;
    border-collapse: separate;
    white-space: nowrap;
}

.dataframe tr {
    line-height: 4vh;
    color: var(--descriptionButtonColor);
}

.dataframe * {
    text-decoration: none;
    color: inherit;
}

.dataframe tr:nth-child(even) {
    background: #3d003d; /* Fundo para linhas pares */
}

th {
    border-right: .2vh solid;
    border-image: linear-gradient(transparent 20%, var(--foregroundLogo) 20% 80%, transparent 80%) 0 1 0 0;
    border-radius: 1vh;
}

th:last-child {
    border-image: 0;
    border-right: 0;
}

.titleConsulta:first-of-type {
    margin-top: 1vh;
}

.titleConsulta {
    font-size: 2.5vh;
    color: var(--fgTituloTable);
    text-size-adjust: none;
    margin-top: 5vh;
    border-radius: 1vh;
    padding: .6vh;
    background: var(--backgroundInputComprar);
    border: var(--foregroundLogo) .2vh solid;
}

.tablesCon {
    display: flex;
    justify-content: center;
}

.ContTable > span {
    margin: 1vh;
    padding-left: 1vh;
    padding-top: 1vh;
    font-size: 3vh;
    border-radius: 1vh;
    color: var(--fgTituloTable);
    display: block;
}

h1, span, tr, td, button, input, div {
    font-family: montserrat, Sans-Serif;
}

h1, span {
    user-select: none;
}

html {
    background: var(--htmlBG);
    height: 100%;
    -webkit-tap-highlight-color: transparent;
}

body {
    background: linear-gradient(to bottom right, var(--bg1), var(--bg2)) fixed;
    border-radius: 4vh;
    min-height: 98%;
    margin: 1vh;
}

a {
    text-decoration: none;
}

.btnCon > h1:nth-of-type(1) {
    color: var(--fgTituloTable);
    font-weight: 100;
    text-align: left;
    font-size: 2.3vh;
    margin-left: 1.5vh;
    width: 10vh;
}

.btnCon > h1:nth-of-type(2) {
    color: var(--descriptionButtonColor);
    font-size: 1.3vh;
    font-weight: 100;
    margin-left: 1.5vh;
    margin-right: 1.5vh;
    text-align: left;
}

.btnCon {
    background: #111111;
    width: 19.5vh;
    text-align: center;
    margin: 1.2vh;
    height: 24vh;
    box-sizing: border-box;
    border-radius: 15%;
    transition: all 100ms linear;
    cursor: pointer;
    border: .5vh dotted var(--backgroundSvgColor);
    border: .5vh double var(--backgroundSvgColor);
}

.btnCon:hover {
    background-color: var(--colorHoverConsulta);
    cursor: pointer;
    transition: .3s;
    transform: scale(1.1);
    filter: drop-shadow(0 0 1vh var(--colorGlowConsulta));
}

.btnCon:hover .svgCont > div > svg {
    fill: var(--colorHoverConsulta);
    cursor: pointer;
}

.btnCon:hover .svgCont > div > svg > circle {
    fill: var(--colorHoverConsulta);
}

.btnCon:hover .svgCont > div {
    background-color: #fff;
    cursor: pointer;
}

.svgCont > div:hover {
    cursor: pointer;
    text-align: center;
    width: 5.5vh;
    border-radius: 35%;
    height: 5.5vh;
    margin-left: 1.5vh;
    margin-top: 1.5vh;
}

.btnCon:active {
    transform: scale(.95, .95);
}

.svgCont > div {
    cursor: pointer;
    text-align: center;
    background-color: var(--backgroundSvgColor);
    width: 5.5vh;
    border-radius: 35%;
    height: 5.5vh;
    margin-left: 1.5vh;
    margin-top: 1.5vh;
}

.svgCont > div > svg {
    fill: var(--foregroundSvgColor);
    transform: scale(.7);
}

.svgCont > div > svg > circle {
    fill: var(--foregroundSvgColor);
}

.fatherCon {
    display: flex;
    justify-content: center;
}

.fatherCenter {
    text-align: center;
    display: flex;
    align-items: center;
    flex-direction: column;
}

.comprarForm {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.comprarInputs {
    width: 32vh;
    box-sizing: content-box;
    margin-left: 0;
    margin-right: 0;
    margin-bottom: 1.2vh;
    background-color: var(--backgroundInputComprar);
}

.containerConsultas {
    margin-top: 3.7vh;
    display: flex;
    max-width: 125vh;
    flex-wrap: wrap;
    justify-content: center;
}

.header {
    width: 100%;
    padding-top: 2vh;
    padding-bottom: 6.5vh;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: left;
}

.header > svg {
    margin-left: 2.6vh;
    width: 4.5vh;
    fill: var(--foregroundLogo);
}

.header > span {
    color: var(--foregroundLogo);
    margin-left: .5vh;
    font-size: 4.5vh;
}

.botoes {
    height: 5vh;
    display: flex;
    justify-content: left;
    align-items: center;
    overflow: auto;
}

.botoes > a > span {
    text-transform: capitalize;
    color: var(--floatBtnColor);
    margin-left: 2.5vh;
    font-size: 1.5vh;
    background-color: var(--backgroundButtonColor);
    padding-left: .7vh;
    padding-right: .8vh;
    padding-top: .5vh;
    padding-bottom: .7vh;
    border-radius: .8vh;
    white-space: nowrap;
}

.botoes > a:last-child {
    margin-right: 2.5vh;
}

.botoes > a {
    display: flex;
    justify-content: center;
}

body > span:nth-of-type(1) {
    font-size: 2vh;
    margin-left: 5.5%;
    margin-top: 1vh;
    display: block;
    color: var(--fgTituloTable);
    margin-bottom: 2vh;
}

.centralContainer {
    margin-top: 10vh;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.text404 {
    width: 100%;
    text-align: center;
    color: #fff;
    font-size: 3vh;
}

.centralContainer > form {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 6vh;
    padding-bottom: 6vh;
    flex-wrap: wrap;
    flex-direction: row;
    row-gap: 3vh;
    border-radius: 5vh;
    width: 40vh;
}

.centralContainer > form > div {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    width: 70%;
}

#realizar {
    background: linear-gradient(45deg, var(--realizarBG1), var(--realizarBG2));
    border: .2vh solid var(--realizarBorder)!important;
    width: 13vh;
    padding: 1.2vh;
    border-radius: 1.7vh;
    cursor: pointer;
    color: var(--voltarForeground);
    font-size: 2vh;
    transition: all 100ms;
}

#voltar {
    background: var(--voltarBG);
    border: .2vh solid var(--voltarBorder);
    width: 13vh;
    padding: 1.2vh;
    cursor: pointer;
    border-radius: 1.7vh;
    color: var(--voltarForeground);
    font-size: 2vh;
    transition: all 100ms;
}

.centralContainer > div > div > button:hover {
    box-shadow: rgba(0, 5, 7, .555) 0 1vh 2vh 1vh;
}

.centralContainer > div > div > button:active {
    transform: scale(.95, .95);
}

input::placeholder {
    color: var(--inputPlaceholder);
}

input, select, textarea {
    background: rgba(255, 255, 255, .1);
    border: .2vh solid var(--inputBorder);
    border: .4vh solid var(--inputBorder);
    border: .4vh solid var(--colorHoverConsulta);
    padding: 1vh;
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
    color: var(--fgTituloTable);
    border-radius: 1.5vh;
    font-size: 2.2vh;
    touch-action: none;
}

select {
    background: var(--backgroundInputComprar);
}

td {
    padding: 0 .5vh;
    text-align: left;
    border-radius: 1vh;
}

.botoesInf {
    margin-top: 5vh;
    display: flex;
    width: 100%;
    justify-content: center;
    column-gap: 2vh;
    padding-bottom: 3vh;
}

.botoesInf > button {
    background: var(--backgroundInferiorButton);
    border: .2vh solid var(--borderInferiorButton);
    width: 13vh;
    padding: 1.2vh;
    border-radius: .7vh;
    color: var(--foregroundInferiorButton);
    cursor: pointer;
    font-size: 2vh;
    transition: all 100ms;
    margin-bottom: 5vh;
}

.botoesInf > button:hover {
    box-shadow: rgba(0, 5, 7, .555) 0 1vh 2vh .5vh;
}

.botoesInf > button:active {
    transform: scale(.95, .95);
}

div#CenterDados {
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 1;
    position: fixed;
    bottom: 10px;
}

div#DadosUser {
    
    background: #111111;
    border-radius: 3vh;
    display: flex;
    padding-bottom: 1vh;
    padding-top: 1vh;
    width: 88%;
    max-width: 75vh;
    border: .09vh solid var(--backgroundSvgColor);
}

.ConsultaText {
    background: var(--backgroundInputComprar);
    display: flex;
    flex-direction: column;
    font-size: calc(.9vh + .4rem);
    text-size-adjust: none;
    margin: 1vh;
    padding: 1vh;
    border-radius: 1vh;
    white-space: pre-line;
    text-align: left;
    color: var(--descriptionButtonColor);
    border: var(--foregroundLogo) .2vh solid;
}

.ConsultaText > a {
    text-decoration: none;
    display: contents;
    font-size: inherit;
}

.ConsultaText > hr {
    border: .01vh solid var(--foregroundLogo);
    width: 99%;
}

.tablOverflow {
    max-width: 95vw;
    overflow: auto;
}

div#svgFoto {
    width: 5.5vh;
    background-color: var(--backgroundSvgColor);
    border-radius: 35%;
    margin-right: 3.5vh;
    margin-left: 1.5vh;
}

div#textDadosUser {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

div#svgFoto > svg {
    fill: var(--foregroundSvgColor);
    transform: scale(.7);
}

div#textDadosUser {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

div#textDadosUser > span {
    color: #fff;
    font-size: 1.7vh;
}

div#placeHolderSpace {
    height: 10vh;
}

#FatherCenter {
    display: flex;
    width: 100%;
    justify-content: center;
}

.logo {
    display: flex;
    align-items: center;
}

.logo span {
    color: var(--foregroundLogo);
    font-size: 4vh;
    margin-left: .5vh;
}

.logo svg {
    fill: var(--foregroundLogo);
    width: 4vh;
    height: 4vh;
}

.g-recaptcha {
    margin-top: 2.5vh;
}

.login-screen {
    position: fixed;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-wrap {
    display: flex;
    flex-direction: column;
    margin-right: 2vh;
}

.input-wrap {
    display: flex;
    flex-direction: column;
    margin-top: 1.8vh;
}

.buttons-wrap {
    display: flex;
    justify-content: space-between;
}

.input-wrap > input {
    width: auto;
    margin-left: 0;
    margin-right: 0;
    margin-top: .8vh;
}

.login-wrap > .title {
    margin-top: 4vh;
    color: var(--descriptionButtonColor);
    font-weight: 600;
    font-size: 4.5vh;
}

.input-wrap > .title {
    color: var(--descriptionButtonColor);
    font-weight: 700;
    font-size: 2.4vh;
}

.login-wrap > .description {
    max-width: 35vh;
    color: var(--foregroundLogo);
    font-size: 2.5vh;
    margin-top: .8vh;
}

.login-wrap > form > .buttons-wrap > button {
    background: var(--backgroundButtonColor);
    text-align: center;
    border: none;
    transition: all 100ms linear;
    cursor: pointer;
    font-size: 2vh;
    padding: 1.2vh;
    margin-top: 3vh;
    width: 16vh;
    border-radius: 1.2vh;
    color: var(--foregroundLogo);
}

.login-wrap > form > .buttons-wrap > button:hover {
    background-color: var(--colorHoverConsulta);
    cursor: pointer;
    transition: .3s;
    transform: scale(1.1);
    filter: drop-shadow(0 0 1vh var(--colorGlowConsulta));
}

#inputPesquisa {
    font-size: 2vh;
    width: 35vh;
    margin-left: 0;
    margin-top: 1vh;
    margin-right: 0;
    margin-bottom: 0;
    padding: 0;
}

.faqResponsivo {
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    column-gap: 1vh;
}

.faqContainer {
    margin-bottom: 4vh;
    width: 28vh;
}

.faqContainer > div:first-of-type {
    flex-direction: row;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1;
    position: relative;
    border-radius: 2vh;
    background: var(--htmlBG);
}

.faqContainer > div:first-of-type > span {
    margin-left: 1vh;
    font-size: 1.6vh;
}

.faqContainer > div:first-of-type > button {
    font-size: 2vh;
    color: #fff;
    background: 0 0;
    border: none;
    user-select: none;
    border-radius: 5vh;
    width: 3.5vh;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 3.5vh;
    transform: rotate(270deg);
    transition: all .3s cubic-bezier(.01, .46, .68, 1) 0s;
}

.faqContainer > div:last-of-type {
    margin-top: -2vh;
    overflow: hidden;
}

.faqContainer > div:last-of-type > div {
    overflow: hidden;
    transition: all .3s cubic-bezier(.01, .46, .68, 1) 0s;
    position: relative;
    top: -15vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    max-height: 0;
}

.faqContainer > div:last-of-type > div > span {
    background: var(--htmlBG);
    border-radius: 0 0 2vh 2vh;
    padding: 1vh;
    padding-top: 2vh;
    width: 26vh;
    font-size: 1.8vh;
    color: #fff;
    text-align: start;
}

.usuarioConsultou {
    font-size: 1.7vh;
    color: transparent;
    text-shadow: 0 0 var(--userHC);
    max-width: 22ch;
    white-space: nowrap;
    overflow: hidden;
}

.containerConsultas {
    margin-top: 1vh;
}

#pesquisaContainer {
    display: flex;
    transform: scale(0);
    justify-content: center;
    transition: all .5s cubic-bezier(.4, 0, .2, 1);
}

.divTermos {
    margin: 3vh;
}

.divTermos > h1,
span {
    color: #fff;
}

.comprarContainer {
    align-items: center;
    border-radius: 2vh;
    flex-direction: column;
    display: flex;
    padding: 1vh;
}

.down {
    border-radius: 2vh;
    display: flex;
    justify-content: center;
    background: var(--htmlBG);
    flex-direction: column;
    align-items: center;
    width: 34vh;
}

.hideConsultas {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

span.btnConsulMenuList {
    font-size: 2vh;
    padding: .3vh;
    color: #fff;
    border-radius: 5vh;
    text-align: center;
    width: 28vh;
}

span.btnConsulMenuList:nth-child(odd) {
    background: #202020;
}

.down > button {
    font-size: 2vh;
    color: #fff;
    background: #202020;
    border: none;
    border-radius: 5vh;
    width: 100%;
    border: .35vh solid var(--htmlBG);
}

.switch input {
    display: none;
}

.switch {
    display: flex;
    width: 100%;
    font-size: 2vh;
    flex-direction: column;
    align-items: center;
}

.slider {
    display: flex;
    cursor: pointer;
    height: 4vh;
    width: 7vh;
    background-color: #ccc;
    border-radius: 2vh;
}

.slider:before {
    content: "";
    display: flex;
    height: 3vh;
    margin-top: .5vh;
    margin-left: .4vh;
    width: 3vh;
    background-color: #000;
    border-radius: 2vh;
    transition: .4s;
}

input[type=checkbox]:checked + .slider {
    background-color: var(--sliderOnColor);
}

input[type=checkbox]:checked + .slider:before {
    transform: translateX(3.2vh);
}

.botoesCenterFixed {
    display: flex;
    justify-content: center;
}

.botoesCenterFixed > div {
    position: fixed;
    bottom: 10px;
    background: var(--backgroundInputConsulta);
    border-radius: 10vh;
    max-width: 90%;
} 

.botoesCenterFixed > div > a > span {
    margin-left: 1.5vh;
}

.botoesCenterFixed > div > a:last-child {
    margin-right: 1.5vh;
}

</style>


</head><body>
<div id="FatherCenter">
<div id="CenterDados">
<div id="DadosUser">
<div id="svgFoto">
<svg height="100%" width="100%" viewBox="0 0 30 30" preserveAspectRatio="none">
<path d="M14.5,23.084L13.361,21h1.613h1.665L15.5,23.084L16.695,27H27c0-7-8-5-9-8v-2c0.45-0.223,1.737-1.755,1.872-2.952  c0.354-0.027,0.91-0.352,1.074-1.635c0.088-0.689-0.262-1.076-0.474-1.198c0,0,0.528-1.003,0.528-2.214c0-2.428-0.953-4.5-3-4.5  c0,0-0.711-1.5-3-1.5c-4.242,0-6,2.721-6,6c0,1.104,0.528,2.214,0.528,2.214c-0.212,0.122-0.562,0.51-0.474,1.198  c0.164,1.283,0.72,1.608,1.074,1.635C10.263,15.245,11.55,16.777,12,17v2c-1,3-9,1-9,8h10.305L14.5,23.084z">
</path>
<path d="M19.5,21H17v-2h0.889c0.38,0,0.728,0.216,0.896,0.556L19.5,21z"></path>
<path d="M10.5,21H13v-2h-0.889c-0.38,0-0.728,0.216-0.896,0.556L10.5,21z"></path>
</svg>
</div>
<div id="textDadosUser">
<span>Seu plano acaba em: <?php if($dias < "2"){ echo "$dias Dia ";} else{echo "$dias Dias";} ?></span>
<span>Usuário: <?php echo $_SESSION["usuario"]?></span>
</div>
</div>
</div>
</div>
<div class="header">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 863 898">
<path d="M416 46.4244C397.086 48.9078 377.971 49.4822 359 52.4244C318.1 58.7676 276.436 70.4545 239 88.2554C229.604 92.7234 220.052 96.83 211 102.001C206.965 104.306 202.529 106.396 199.558 110.093C191.716 119.851 195.036 135.884 207 140.437C216.998 144.242 226.577 136.864 235 132.309C252.055 123.085 270.651 115.255 289 109.003C349.328 88.4475 413.449 79.7374 477 84.0895C525.857 87.4352 574.474 99.3144 620 117.203C633.164 122.375 646.332 127.958 659 134.248C666.098 137.771 673.708 142.947 682 140.347C694.234 136.512 702.38 118.935 691.895 109.329C687.189 105.018 680.645 102.575 675 99.7531C661.365 92.9365 647.163 87.22 633 81.6011C583.163 61.8292 530.363 50.5649 477 46.9105C457.373 45.5665 435.587 43.8526 416 46.4244M432 143.424C425.992 144.213 420.023 143.677 414 144.089C396.378 145.296 378.381 147.333 361 150.611C289.446 164.106 219.996 194.439 164 241.438C137.98 263.277 114.672 288.272 95.0008 316C88.4191 325.277 80.8753 341.87 95.0401 348.95C96.8911 349.875 98.962 350.396 101 350.699C119.444 353.446 127.94 333.155 137.804 321C160.17 293.439 187.465 269.045 217 249.355C297.195 195.891 395.341 172.808 491 184.286C570.694 193.848 645.201 222.957 707 274.754C727.031 291.543 745.261 311.221 761.116 332C767.292 340.095 773.818 352.932 786 350.478C788.756 349.923 791.562 348.863 794 347.468C796.132 346.247 798.122 344.719 799.786 342.907C809.518 332.304 800.298 320.199 793.71 311C773.045 282.146 747.704 256.874 720 234.801C659.317 186.452 581.771 156.036 505 146.845C491.95 145.282 479.074 144.806 466 143.911C454.825 143.145 443.193 141.955 432 143.424M426 237.424C415.389 238.818 404.653 238.851 394 240.427C365.554 244.638 337.466 252.102 311 263.427C201.94 310.096 117.584 417.751 116.999 539C116.772 586.07 121.099 632.848 135.999 678C139.21 687.729 142.318 697.448 146.062 707C148.127 712.27 151.177 717.757 157 719.427C169.456 723.002 184.414 713.368 182.816 700C181.851 691.937 177.885 683.684 175.333 676C171.313 663.895 167.868 651.479 165.211 639C153.933 586.044 151.051 528.807 164.63 476C170.62 452.704 180.9 431.351 193.576 411C257.952 307.649 385.407 259.579 503 281.611C603.342 300.411 696.12 376.421 724.709 476C729.828 493.83 732.389 511.603 734.17 530C735.826 547.119 736.065 564.947 728.961 581C723.072 594.305 712.797 605.279 701 613.56C694.054 618.436 686.084 622.12 678 624.653C646.43 634.545 608.794 626.835 586.171 601.996C576.011 590.841 569.24 577.003 567.289 562C565.951 551.703 566.43 541.267 564.714 531C562.613 518.42 558.07 505.965 551.547 495C522.152 445.589 459.891 421.452 405 439.519C378.204 448.339 355.902 466.81 340.217 490C316.909 524.46 320.529 569.601 330.127 608C343.858 662.94 369.229 718.044 409.09 758.961C426.888 777.231 448.158 793.12 470 806.2C490.566 818.515 512.267 828.417 535 836C543.063 838.69 553.388 843.604 562 842.696C577.455 841.066 588.414 818.21 573.957 807.653C570.285 804.972 565.291 804.351 561 803.14C553.263 800.957 545.608 798.599 538 795.997C518.381 789.288 499.554 779.509 482 768.576C418.583 729.079 373.203 663.293 362.87 589C359.341 563.63 356.735 535.024 370.453 512C375.336 503.804 381.76 496.497 389 490.3C427.121 457.675 492.832 468.334 518.124 512C533.237 538.091 525.871 568.836 538.309 596C567.062 658.796 647.121 684.626 708 652.68C718.123 647.368 727.629 640.705 736 632.911C759.557 610.976 771.713 582.988 772.96 551C773.327 541.576 772.079 531.394 771.17 522C768.197 491.286 761.544 461.439 749.281 433C703.543 326.928 595.721 247.394 480 238.911C462.311 237.615 443.741 235.095 426 237.424M433 336.424C425.7 337.383 418.31 337.37 411 338.428C389.101 341.599 366.969 347.597 347 357.258C327.87 366.514 309.984 378.265 294 392.286C277.943 406.371 262.926 422.954 251.436 441C211.072 504.395 213.604 583.941 233.579 654C248.93 707.844 279.536 757.781 315.87 800C322.999 808.284 330.269 816.272 338 824C344.724 830.722 350.82 836.875 361 834.072C371.313 831.232 380.521 819.359 374.633 809C370.211 801.221 362.18 794.723 356.285 788C343.519 773.441 330.917 758.708 319.576 743C307.593 726.405 296.19 709.461 287.258 691C271.661 658.759 264.257 623.407 260.83 588C258.483 563.749 257.608 539.062 262.449 515C269.334 480.781 288.142 448.557 314 425.17C331.182 409.629 350.444 396.184 372 387.453C449.425 356.094 541.916 379.144 594.54 444C611.262 464.608 623.304 488.919 628.551 515C630.316 523.775 631.569 533.062 631.961 542C632.207 547.62 631.254 553.702 633.653 558.999C638.092 568.802 650.776 570.588 660 567.532C673.458 563.072 671.131 548.366 670.996 537C670.644 507.388 659.799 475.367 644.988 450C610.254 390.508 549.18 348.471 481 338.729C465.503 336.515 448.626 334.373 433 336.424M439 531.468C422.656 534.604 422.685 552.753 424.424 566C428.557 597.477 434.734 626.178 451.012 654C490.011 720.657 563.75 760 640 760C652.436 760 664.646 759.489 677 758.166C683.674 757.451 690.821 757.063 696.999 754.201C710.214 748.078 711.614 727.225 697 721.562C685.003 716.914 671.346 719.095 659 720.718C648.483 722.101 637.61 722.637 627 721.911C572.019 718.145 523.684 690.503 491.289 646C477.996 627.74 468.186 605.314 464.435 583C462.261 570.065 463.985 555.476 460.2 543C457.366 533.659 448.168 529.709 439 531.468z">
</path>
</svg>
<span>SyncData</span>
</div>
<div class="botoes">
<a href="../">
<span>home</span>
</a>
<a href="logout.php">
<span>logout</span>
</a>
<a href="mudarsenha.html">
<span>Trocar Senha</span>
</a>
<a onclick="toggleSearch()"><span>Buscar</span></a>
</div>
<div id="pesquisaContainer" style="transform: scale(0);">
<input id="inputPesquisa" oninput="">
</div>
<div class="fatherCon">
<div class="containerConsultas">

<!-- INICIO -->

<div class="btnCon">
<div class="svgCont">
<div>
<svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24,2H4v26h20c1.105,0,2-0.895,2-2V4C26,2.895,25.105,2,24,2z M9,21c0-3.792,4-2.708,4.5-4.333v-1.083  c-0.225-0.121-0.868-0.951-0.936-1.599c-0.177-0.015-0.455-0.191-0.537-0.886c-0.044-0.373,0.131-0.583,0.237-0.649  c0,0-0.264-0.602-0.264-1.199C12,9.474,12.879,8,15,8c1.145,0,1.5,0.812,1.5,0.812c1.023,0,1.5,1.122,1.5,2.438  c0,0.656-0.264,1.199-0.264,1.199c0.106,0.066,0.281,0.276,0.237,0.649c-0.082,0.695-0.36,0.871-0.537,0.886  c-0.068,0.648-0.711,1.478-0.936,1.599v1.083C17,18.292,21,17.208,21,21H9z"></path></svg>
</div>
</div>
<h1>SyncData <br> Nome</h1>
<h1>Documentos</h1>
</div>
<div class="btnCon">
<div class="svgCont">
<div>
<svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24,2H4v26h20c1.105,0,2-0.895,2-2V4C26,2.895,25.105,2,24,2z M9,21c0-3.792,4-2.708,4.5-4.333v-1.083  c-0.225-0.121-0.868-0.951-0.936-1.599c-0.177-0.015-0.455-0.191-0.537-0.886c-0.044-0.373,0.131-0.583,0.237-0.649  c0,0-0.264-0.602-0.264-1.199C12,9.474,12.879,8,15,8c1.145,0,1.5,0.812,1.5,0.812c1.023,0,1.5,1.122,1.5,2.438  c0,0.656-0.264,1.199-0.264,1.199c0.106,0.066,0.281,0.276,0.237,0.649c-0.082,0.695-0.36,0.871-0.537,0.886  c-0.068,0.648-0.711,1.478-0.936,1.599v1.083C17,18.292,21,17.208,21,21H9z"></path></svg>
</div>
</div>
<h1>SyncData <br> CPF</h1>
<h1>Documentos e endereços</h1>
</div>
<div class="btnCon">
<div class="svgCont">
<div>
<svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24,2H4v26h20c1.105,0,2-0.895,2-2V4C26,2.895,25.105,2,24,2z M9,21c0-3.792,4-2.708,4.5-4.333v-1.083  c-0.225-0.121-0.868-0.951-0.936-1.599c-0.177-0.015-0.455-0.191-0.537-0.886c-0.044-0.373,0.131-0.583,0.237-0.649  c0,0-0.264-0.602-0.264-1.199C12,9.474,12.879,8,15,8c1.145,0,1.5,0.812,1.5,0.812c1.023,0,1.5,1.122,1.5,2.438  c0,0.656-0.264,1.199-0.264,1.199c0.106,0.066,0.281,0.276,0.237,0.649c-0.082,0.695-0.36,0.871-0.537,0.886  c-0.068,0.648-0.711,1.478-0.936,1.599v1.083C17,18.292,21,17.208,21,21H9z"></path></svg>
</div>
</div>
<h1>SyncData <br> São Paulo</h1>
<h1>Documentos e foto</h1>
</div>
<div class="btnCon">
<div class="svgCont">
<div>
<svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24,2H4v26h20c1.105,0,2-0.895,2-2V4C26,2.895,25.105,2,24,2z M9,21c0-3.792,4-2.708,4.5-4.333v-1.083  c-0.225-0.121-0.868-0.951-0.936-1.599c-0.177-0.015-0.455-0.191-0.537-0.886c-0.044-0.373,0.131-0.583,0.237-0.649  c0,0-0.264-0.602-0.264-1.199C12,9.474,12.879,8,15,8c1.145,0,1.5,0.812,1.5,0.812c1.023,0,1.5,1.122,1.5,2.438  c0,0.656-0.264,1.199-0.264,1.199c0.106,0.066,0.281,0.276,0.237,0.649c-0.082,0.695-0.36,0.871-0.537,0.886  c-0.068,0.648-0.711,1.478-0.936,1.599v1.083C17,18.292,21,17.208,21,21H9z"></path></svg>
</div>
</div>
<h1>SyncData <br> Placa</h1>
<h1>Documentos e propietario</h1>
</div>

<div class="btnCon">
<div class="svgCont">
<div>
<svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24,2H4v26h20c1.105,0,2-0.895,2-2V4C26,2.895,25.105,2,24,2z M9,21c0-3.792,4-2.708,4.5-4.333v-1.083  c-0.225-0.121-0.868-0.951-0.936-1.599c-0.177-0.015-0.455-0.191-0.537-0.886c-0.044-0.373,0.131-0.583,0.237-0.649  c0,0-0.264-0.602-0.264-1.199C12,9.474,12.879,8,15,8c1.145,0,1.5,0.812,1.5,0.812c1.023,0,1.5,1.122,1.5,2.438  c0,0.656-0.264,1.199-0.264,1.199c0.106,0.066,0.281,0.276,0.237,0.649c-0.082,0.695-0.36,0.871-0.537,0.886  c-0.068,0.648-0.711,1.478-0.936,1.599v1.083C17,18.292,21,17.208,21,21H9z"></path></svg>
</div>
</div>
<h1>SyncData <br> Radar</h1>
<h1>Endereços e fotos</h1>
</div>
<!--FIM DE UM -->

</div>
</div>

<!-- FINALIZA FIM -->

<div id="placeHolderSpace">
</div>


<script type="text/javascript">
    elements = document.getElementsByClassName("btnCon");
    canVibrate = window.navigator.vibrate

    //if ('serviceWorker' in navigator) {
    //    navigator.serviceWorker.register("/static/svcWork.js");
    //}

    function NavegarConsult() {
        if (canVibrate) setTimeout(window.navigator.vibrate(50), 120)
        window.location.href = 'consultar/' + this.children[1].innerText.replace("SyncData", "").trim()
    };


    for (i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', NavegarConsult, false);
    }

    function filtrar() {

        c = document.querySelector("body > div.fatherCon > div").children
        t = document.getElementById("inputPesquisa").value.toLowerCase()
        for (i = 0; i < c.length; i++) {

            if (c[i].children[1].innerHTML.toLowerCase().includes(t) || c[i].children[2].innerHTML.toLowerCase().includes(t)) {
                c[i].style.display = ""
            } else {
                c[i].style.display = "None"
            }
        }
    }

    async function toggleSearch() {

        containerSearch = document.getElementById("pesquisaContainer")

        if (containerSearch.style.transform == "scale(1)") {
            containerSearch.style.transform = "scale(0)"

        } else {
            containerSearch.style.transform = "scale(1)"
            document.querySelector("#inputPesquisa").focus()
        }

    }


</script>
<script src="../jquery.min.js"></script>
<script type="text/javascript">
    function filtrar() {
        const searchTerm = document.getElementById("inputPesquisa").value.toLowerCase();
        const buttons = document.querySelectorAll(".btnCon");

        buttons.forEach(btn => {
            const name = btn.getAttribute("data-name").toLowerCase();
            btn.style.display = name.includes(searchTerm) ? "" : "none";
        });
    }

    function toggleSearch() {
        const containerSearch = document.getElementById("pesquisaContainer");
        containerSearch.style.transform = containerSearch.style.transform === "scale(1)" ? "scale(0)" : "scale(1)";
        
        if (containerSearch.style.transform === "scale(1)") {
            document.getElementById("inputPesquisa").focus();
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "dias.php",
                dataType: 'json',
                success: function(retorno) {
                    if (retorno.success === false) {
                        alert("Seu usuário Expirou, renove agora.");
                        location.href = "renovar.php";		   
                    }
                }
            });
        }, 1000);
    });
</script>
</body>
</html>