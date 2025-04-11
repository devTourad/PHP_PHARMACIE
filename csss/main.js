$(document).ready(function(){
    $("#search").on("keyup", function(){
       var value = $(this).val().toLowerCase();
       $("#myTable tr").filter(function(){
          $(this).toggle($(this).text().toLocaleLowerCase().indexOf(value)>-1)
       });
    });
 });

      var modeSwitch = document.querySelector('.mode-switch');
      modeSwitch.addEventListener('click', function () {
          document.documentElement.classList.toggle('light');
      modeSwitch.classList.toggle('active');
});