
jQuery(document).ready(function($)
{

$(".card").click(function()
  {
if ( $(this).hasClass("dash-expand") ) {
$(this).removeClass("dash-expand");
$(".card").removeClass("dash-expand");
if ($this.is(":nth-child(3n)")) {
        $(".card:nth-of-type(3n)").prev().toggleClass("dash-expand");
    }
}
else {
$(".card").removeClass("dash-expand");
$(this).toggleClass("dash-expand");
}
var $this = $(this);
    // You don't need to use these together, both should work independently
    if ($this.is(":nth-child(3n)")) {
        $(this).prev().toggleClass("dash-expand");
    }
  });
});