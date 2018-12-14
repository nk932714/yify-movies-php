//toogle or checkbox value on click save (it saves the value of checkbox weather its checked or unchecked in browser local storage)
//---start---checkbox save and store and display if checked or unchecked 
function save() {	
	var checkbox = document.getElementById("checkbox");
    localStorage.setItem("checkbox", checkbox.checked);	
}

//for loading
var checked = JSON.parse(localStorage.getItem("checkbox"));
 document.getElementById("checkbox").checked = checked;   
//-----end-----checkbox save and store and display if checked or unchecked 

// =======start======== autoload images with saved values if checkbox is checked when page is loaded

$(function() {
var checked = JSON.parse(localStorage.getItem("checkbox"));
  $(checkbox).ready(function() {
    if ($(checkbox).is(':checked')) {
                // ======---start--- autoload script images uses xhr =======

                   $(document).ready(function() {
                   var number = parseInt($('#test').text(), 10) || 0; // Get the number from paragraph
                            // Called the function in each second
                    var interval = setInterval(function() {
                                    //$('#test').text(number++); // Update the value in paragraph
                    document.getElementsByClassName("pqr")[number++].click(); // myyyy Update the value in paragraph
                    if (number > 19) {
                        clearInterval(interval); // If exceeded 100, clear interval
                                        }
                            }, 1000); // Run for each second
            }); 

                 // ========---end----- autoload script ========
    } else {
       // do nothing it not checked checkbox
    }
  });
});
//==-end-==== autoload images if checkbox is checked -->


//-=======start========- autoload images with click when page is already loaded-->

$(function() {
var checked = JSON.parse(localStorage.getItem("checkbox"));

  $(checkbox).click(function() {
    if ($("#checkbox").is(':checked')) {
            // ====== autoload script start =======

                   $(document).ready(function() {
                   var number = parseInt($('#test').text(), 10) || 0; // Get the number from paragraph
                            // Called the function in each second
                    var interval = setInterval(function() {
                                    //$('#test').text(number++); // Update the value in paragraph
                    document.getElementsByClassName("pqr")[number++].click(); // myyyy Update the value in paragraph
                    if (number > 19) {
                        clearInterval(interval); // If exceeded 100, clear interval
                                        }
                            }, 1000); // Run for each second
            }); 

            // ======== autoload script end ========
    } else {
       // do nothing it not checked checkbox
    }
  });
});

// - ==-end-==== autoload images if checkbox is checked -->
