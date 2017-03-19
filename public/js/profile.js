/**
 * Created by Haiyi on 3/5/2017.
 */
let imgUploader = (() => {
    let $imgForm = $("#imgForm");
    let $profileImg = $("#profileImg");

    $imgForm.on("submit", _updateProfileImage);

    function _updateProfileImage(e) {
        console.log("submitting");
        e.preventDefault();
        // send the whole form via ajax
        let $form = $("#imgForm");
        let $file = new FormData($form[0]);
        let $url = $imgForm.attr("action");

        $.post({
            url: $url,
            data: $file,
            contentType: false,
            processData: false,
            dataType: "JSON",
            async: true,
            success: (res) => {
                console.log(res.filePath);
                $profileImg.find("img").attr("src", res.filePath);
            },
            error: (err) => {
                console.log(err);
            }
        });
    }
})();

let submitEmitter = (() => {
    let $btnFileUpload = $("#btnFileUpload");
    let $imgForm = $("#imgForm");

    $btnFileUpload.on("change", _submitImageForm);

    function _submitImageForm() {
        console.log("changed");
        $imgForm.submit();
    }
})();

let clickHelper = (() => {
    let $btnImgSubmit = $("#btnClickHelper");
    let $btnFileUpload = $("#btnFileUpload");

    $btnImgSubmit.on("click", _popUpFileUploader);

    function _popUpFileUploader() {
        $btnFileUpload.trigger("click");
    }
})();