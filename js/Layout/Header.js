$(function() {
    $('.modal').modal();
    $('.dropdownNavBar-trigger').dropdown({
        'constrainWidth': false,
        'alignment': "right",
        'coverTrigger': false
    });
    $('.dropdownNavBarMobile-trigger').dropdown({
        'constrainWidth': false,
        'alignment': "left",
        'coverTrigger': false
    });
    //$('.dropdown-trigger').dropdown();
})