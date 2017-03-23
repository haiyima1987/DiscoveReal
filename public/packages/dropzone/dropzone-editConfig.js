/**
 * Created by Haiyi on 3/22/2017.
 */
// let photo_counter = 0;
Dropzone.options.drDropzoneEdit = {

    // uploadMultiple: true,
    parallelUploads: 1,
    paramName: 'photo',
    acceptedFiles: '.jpg, .jpeg, .png, .bmp',
    // maxFilesize: 8,
    // previewsContainer: '#dropzonePreview',
    // previewsContainer: '.dz-preview',
    // previewTemplate: document.querySelector('#dropzonePreview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    // dictFileTooBig: 'Image is bigger than 8MB',

    // The setting up of the dropzone
    init: function () {

        // Add server images
        let myDropzone = this;
        let $postId = $("#dropzonePostId").val();
        let $url = '/post/getPostImages/' + $postId;

        $.get($url, function (data) {

            $.each(data.images, function (key, value) {

                let file = {
                    name: value.fileName,
                    size: value.size,
                    photoId: value.photoId
                };
                myDropzone.options.addedfile.call(myDropzone, file);
                // myDropzone.options.thumbnail.call(myDropzone, file, value.fileUrl);
                myDropzone.createThumbnailFromUrl(file, value.fileUrl);
                myDropzone.emit("complete", file);
                // photo_counter++;
                // $("#photoCounter").text( "(" + photo_counter + ")");
            });
        });

        this.on("removedfile", function (file) {

            $.ajax({
                type: 'POST',
                url: '/post/postImageDelete',
                data: {
                    photoId: file.photoId,
                    _token: $('#csrf-token').val()
                },
                // dataType: 'html',
                dataType: 'json',
                success: function (data) {
                    // let rep = JSON.parse(data);
                    if (data.code == 200) {
                        console.log("deleted");
                    }
                }
            });

        });
    },
    error: function (file, response) {
        // if($.type(response) === "string")
        //     let message = response; //dropzone sends it's own error messages in string
        // else
        //     let message = response.message;
        // file.previewElement.classList.add("dz-error");
        // _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        // _results = [];
        // for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        //     node = _ref[_i];
        //     _results.push(node.textContent = message);
        // }
        // return _results;
    },
    success: function (file, done) {
        file.photoId = done.photoId;
        // photo_counter++;
        // $("#photoCounter").text( "(" + photo_counter + ")");
    }
};