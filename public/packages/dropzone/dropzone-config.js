/**
 * Created by Haiyi on 3/22/2017.
 */
// let photo_counter = 0;
Dropzone.options.drDropzoneCreate = {

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

        this.on("addedfile", function (file) {
            console.log("Added file.");
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
        // console.log(response);
        // if($.type(response) === "string")
        //     var message = response; //dropzone sends it's own error messages in string
        // else
        //     var message = response.message;
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
        // console.log('love you');
        // this.name = file.name;
        // console.log(file);
        // console.log(done);
        file.photoId = done.photoId;
        // console.log(file.photoId);
        // photo_counter++;
        // $("#photoCounter").text( "(" + photo_counter + ")");
    }
};