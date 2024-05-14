/*--------------Date Picker------------------*/
$( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy"
    , duration: "fast"
});

$("button.btn.btn-default.btn-next.action-button").click(function(){
    $("div#ui-datepicker-div").hide();
});
$("input#datepicker").click(function(){
    $("div#ui-datepicker-div").toggle();
})
/*--------------Cases js------------------*/

$(document).on("change", "input[type='checkbox']", 
    function () {
        $(this).parent()[this.checked ? "addClass" : "removeClass"]("checked");
    });

var $radioButtons = $('#change-radio input[type="radio"]');
$radioButtons.click(function() {
  $radioButtons.each(function() {
    $(this).parent().toggleClass('checked', this.checked);
});
});