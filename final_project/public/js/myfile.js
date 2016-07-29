var j = 0;
myfun();

function myfun() {
    var i;
    var x = document.getElementsByClassName("slider");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    j++;
    if (j > x.length) {j = 1}
    x[j-1].style.display = "block";
	
    setTimeout(myfun, 3000); // Change image every 2 seconds
}