    
     const modal = document.getElementById("review-modal");
     const btn = document.getElementById("review-btn");
     const span = document.getElementsByClassName("close")[0];

     
     btn.onclick = function() {
         modal.style.display = "block";
     }

     
     span.onclick = function() {
         modal.style.display = "none";
     }

     // When the user clicks anywhere outside of the modal, close it
    //  window.onclick = function(event) {
    //      if (event.target == modal) {
    //          modal.style.display = "none";
    //      }
     