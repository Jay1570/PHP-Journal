function showData() {
    var page = document.getElementById("page").value;
    var rows = document.getElementById("rows").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET","display.php?rows="+rows+"&page="+page,true);
    xmlhttp.send();
}

function updatePageOptions() {
    var rows = document.getElementById("rows").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var pageSelect = document.getElementById("page");
            pageSelect.innerHTML = this.responseText
            pageSelect.value = 1;
            showData();
        }
    };
    xmlhttp.open("GET", "pages.php?rows="+rows, true);
    xmlhttp.send();
}

function previousPage() {
    var page = document.getElementById("page")
    if (page.selectedIndex > 0) {
        page.selectedIndex -= 1;
        showData();
    }
}

function firstPage() {
    var page = document.getElementById("page")
    page.selectedIndex = 0;
    showData();
}

function nextPage() {
    var page = document.getElementById("page")
    if (page.selectedIndex < page.options.length - 1) {
        page.selectedIndex += 1;
        showData();
    }
}

function lastPage() {
    var page = document.getElementById("page")
    page.selectedIndex = page.options.length - 1;
    showData();
}

window.onload = function() {
    updatePageOptions();
};

window.onreset = function() {
    updatePageOptions();
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    var mybutton = document.getElementById("myBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}