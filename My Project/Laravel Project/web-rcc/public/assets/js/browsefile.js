//proof of payment
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");
const realFileBtn1 = document.getElementById("real-file1");
const customBtn1 = document.getElementById("custom-button1");
const customTxt1 = document.getElementById("custom-text1");
const realFileBtn3 = document.getElementById("real-file3");
const customBtn3 = document.getElementById("custom-button3");
const customTxt3 = document.getElementById("custom-text3");
const realFileBtn2 = document.getElementById("real-file2");
const customBtn2 = document.getElementById("custom-button2");
const customTxt2 = document.getElementById("custom-text2");
const realFileBtn4 = document.getElementById("real-file4");
const customBtn4 = document.getElementById("custom-button4");
const customTxt4 = document.getElementById("custom-text4");
const realFileBtn5 = document.getElementById("real-file5");
const customBtn5 = document.getElementById("custom-button5");
const customTxt5 = document.getElementById("custom-text5");
const realFileBtn6 = document.getElementById("real-file6");
const customBtn6 = document.getElementById("custom-button6");
const customTxt6 = document.getElementById("custom-text6");
const realFileBtn7 = document.getElementById("real-file7");
const customBtn7 = document.getElementById("custom-button7");
const customTxt7 = document.getElementById("custom-text7");

customBtn.addEventListener("click", function () {
    realFileBtn.click();
});

realFileBtn.addEventListener("change", function () {
    if (realFileBtn.value) {
        customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt.innerHTML = "No file chosen, yet.";
    }
});

customBtn3.addEventListener("click", function () {
    realFileBtn3.click();
});

realFileBtn3.addEventListener("change", function () {
    if (realFileBtn3.value) {
        customTxt3.innerHTML = realFileBtn3.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt3.innerHTML = "No file chosen, yet.";
    }
});

customBtn1.addEventListener("click", function () {
    realFileBtn1.click();
});

realFileBtn1.addEventListener("change", function () {
    if (realFileBtn1.value) {
        customTxt1.innerHTML = realFileBtn1.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt1.innerHTML = "No file chosen, yet.";
    }
});

customBtn2.addEventListener("click", function () {
    realFileBtn2.click();
});

realFileBtn2.addEventListener("change", function () {
    if (realFileBtn2.value) {
        customTxt2.innerHTML = realFileBtn2.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt2.innerHTML = "No file chosen, yet.";
    }
});

customBtn4.addEventListener("click", function () {
    realFileBtn4.click();
});

realFileBtn4.addEventListener("change", function () {
    if (realFileBtn4.value) {
        customTxt4.innerHTML = realFileBtn4.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt4.innerHTML = "No file chosen, yet.";
    }
});

customBtn5.addEventListener("click", function () {
    realFileBtn5.click();
});

realFileBtn5.addEventListener("change", function () {
    if (realFileBtn5.value) {
        customTxt5.innerHTML = realFileBtn5.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt5.innerHTML = "No file chosen, yet.";
    }
});

customBtn6.addEventListener("click", function () {
    realFileBtn6.click();
});

realFileBtn6.addEventListener("change", function () {
    if (realFileBtn6.value) {
        customTxt6.innerHTML = realFileBtn6.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt6.innerHTML = "No file chosen, yet.";
    }
});

customBtn7.addEventListener("click", function () {
    realFileBtn7.click();
});

realFileBtn7.addEventListener("change", function () {
    if (realFileBtn7.value) {
        customTxt7.innerHTML = realFileBtn7.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt7.innerHTML = "No file chosen, yet.";
    }
});
