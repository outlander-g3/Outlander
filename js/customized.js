

var x, i, j, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            /* a是目前被選的 For each element, create a new DIV that will act as the selected item: */
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /* For each element, create a new DIV that will contain the option list: */
            // 放option 的地方
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            // console.log(a);
            for (j = 1; j < selElmnt.length; j++) {
                // console.log(selElmnt.length);算出selector裡面option的個數
                /* c是每一座山變成一個div For each option in the original select element,
                create a new DIV that will act as an option item: */
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                // console.log(c.innerHTML);
                c.addEventListener("click", function(e) {
                    /* When an item is clicked, update the original select box,
                    and the selected item: */
                    var y, i, k, s, h;
                    // s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    h = this.parentNode.previousSibling;
                    console.log(this.parentNode.parentNode);
                    // console.log(s.length);
                    for (i = 0; i < s.length; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            // console.log(i);
                            h.innerHTML = this.innerHTML;
                            // console.log(h.innerHTML);
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            for (k = 0; k < y.length; k++) {
                                y[k].removeAttribute("class");
                                // console.log(y);
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                    }
                    // 看不懂
                    h.click();
                });
                //將c所產生的div山名放進div.select-items select-hide中
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /* When the select box is clicked, close any other select boxes,
                and open/close the current select box: */
                e.stopPropagation();
                closeAllSelect(this);
                console.log(this);
                console.log(this.classList);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);


function cuShowScenery(e){
alert(123);
}
function cuAddSceneryC(){
    var cuCustom__zone= document.getElementById("cuCustom__zone");
 
    if(cuCustom__zone.style.display == ''){
        cuCustom__zone.style.display = 'none';
    }

    // e.target;
    // console.log(e.target);
}

function init(){
    var btn_cuAddScenery = document.getElementById("btn_cuAddScenery");
    btn_cuAddScenery.addEventListener("click",cuShowScenery);
    var btn_cuAddSceneryConfirm = document.getElementById("btn_cuAddScenery--confirm");
    btn_cuAddSceneryConfirm.addEventListener("click",cuAddSceneryC);
    // alert(123);
}

window.addEventListener("load",init);