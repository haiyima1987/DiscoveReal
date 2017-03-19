/**
 * Created by Haiyi on 3/13/2017.
 */
let modalController = (() => {
    let $btnModal = $("#userInfo");
    let $img = $("#userImg");
    let $username = $("#userName");
    let $role = $("#userRole");
    let $bday = $("#userBday");
    let $location = $("#userLocation");
    let $year = $("#userYear");
    let $count = $("#userCount");
    let $route = $("#userRoute");

    $btnModal.on("show.bs.modal", _showModal);

    function _showModal(e) {
        console.log("debug");
        $img.attr("src", $(e.relatedTarget).data('img'));
        $username.html("Username: " + $(e.relatedTarget).data('username'));
        $role.html("Role: " + $(e.relatedTarget).data('role'));
        $bday.html("<i class=\"fa fa-gift\"></i> " + $(e.relatedTarget).data('bday'));
        $location.html("<i class=\"fa fa-map-marker\"></i> " + $(e.relatedTarget).data('location'));
        $year.html("Joined at: " + $(e.relatedTarget).data('year'));
        $count.html("Posts: " + $(e.relatedTarget).data('count'));
        $route.attr("href", $(e.relatedTarget).data('route'))
    }
})();