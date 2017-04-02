/**
 * Created by Haiyi on 4/2/2017.
 */
let galleyImages = (() => {
    let $galleryImg = $('.imgGallery img');
    let $galleryContainer = $('.galleryContainer');
    let $nextBtn = $('#galleryNext');
    let $prevBtn = $('#galleryPrev');
    let $imgBox = $('.imgItemBox');
    let $presentImage;
    let $fadeTime = 300;
    let $index = 0;
    let $maxIndex = parseInt($("#photoCount").html()) - 1;

    $imgBox.on('click', _showGalleryContainer);
    $galleryContainer.on('click', _hideContainer);
    $nextBtn.on('click', _loadNextImage);
    $prevBtn.on('click', _loadPreviousImage);

    function _showGalleryContainer(e) {
        $index = $(this).find('img').attr('alt');
        _loadCurrentImage($index);
        $galleryContainer.fadeIn($fadeTime);
    }

    function _loadCurrentImage($index) {
        $presentImage = $imgBox.find('img[alt='+$index+']');
        $galleryImg.attr('src', $presentImage.attr('fullPath'));
    }

    function _hideContainer(e) {
        if (e.target !== this) return;
        $galleryContainer.fadeOut($fadeTime);
    }

    function _loadNextImage() {
        if ($index < $maxIndex) {
            $index++;
            _loadCurrentImage($index);
        } else {
            console.log("no more photos");
        }
        // alternative way to use fadeIn effect to show images
        // setTimeout(_getNextImage, 500);
        // $imgGallery.fadeOut($fadeTime);
        // $imgGallery.fadeIn($fadeTime);
    }

    function _loadPreviousImage() {
        if ($index > 0) {
            $index--;
            _loadCurrentImage($index);
        } else {
            console.log("no more photos");
        }
    }
})();
