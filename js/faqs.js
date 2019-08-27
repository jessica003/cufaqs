//search text in question or answer
(function(){
  var searchTerm, panelContainerId;
  // Create a new contains that is case insensitive
  $.expr[':'].containsCaseInsensitive = function (n, i, m) {
    return jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
  };
  
  $('#accordion_search_bar').on('change keyup paste click', function () {
    searchTerm = $(this).val();
    $('#accordion .card_2> .card').each(function () {
      // alert(searchTerm)
      panelContainerId = '#' + $(this).attr('id');
      // alert(panelContainerId);
      $(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
      $(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show();
    });
  });
}());

//prevent data store on page refresh
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

//toggle question and answer
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
$(".edit_faq").click(function(){
  var id = $(this).attr('id');
  $('#post_faq_'+id).toggle();
});

