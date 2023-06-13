

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navStyle.css">
</head>
<body>
    <h1>VOUS ETES CONNECTER</h1>

    <form action="handle_sugestion.php" method="post">
      <input type="text" id="search" name="search" placeholder="recherche" autocomplete="off"  >
      <button type="submit">send</button>
    </form>     
   
<script>


    
function autocomplete(inp, arr) {
  var currentFocus;
  
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
     
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      
      a = document.createElement("div");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      
      this.parentNode.appendChild(a);
    
      for (i = 0; i < arr.length; i++) {
      
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
         
          b = document.createElement("div");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          
          b.addEventListener("click", function(e) {
         
              inp.value = this.getElementsByTagName("input")[0].value;
             
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
      
        currentFocus++;
  
        addActive(x);
      } else if (e.keyCode == 38) { 
        currentFocus--;
      
        addActive(x);
      } else if (e.keyCode == 13) {
        
        if (currentFocus > -1) {
          
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
  
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var ville = ["Paris 1e", "Paris 2e","Paris 3e", "Paris 4e","Paris 5e","Paris 6e","Paris 7e","Paris 8e","Paris 9e","Paris 10e","Paris 11e", "Paris 12e","Paris 13e", "Paris 14e","Paris 15e","Paris 16e","Paris 17e","Paris 18e","Paris 19e","Paris 20e",];
autocomplete(document.getElementById("search"), ville);
                
</script>
</body>

</html>