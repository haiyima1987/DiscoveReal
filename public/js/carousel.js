/**
 * Created by Haiyi on 1/5/2017.
 */
let pageNumRenewal = (() => {
    let $slides = $(".carousel").find(".slide");
    let $pageIndex = 1;

    let getPageNum = () => {
        return $pageIndex;
    };

    let setPageNum = (newNum) => {
        $pageIndex = newNum;
    };

    let pageNumUp = () => {
        $pageIndex++;
        if ($pageIndex === $slides.length) {
            let $carousel = $(".carousel");
            $carousel.css('margin-left', 0);
            $pageIndex = 1;
        }
        dotControl.switchActiveClass();
    };

    let pageNumDown = () => {
        $pageIndex--;
        dotControl.switchActiveClass();
    };

    return {
        getPageNum: getPageNum,
        setPageNum: setPageNum,
        pageNumUp: pageNumUp,
        pageNumDown: pageNumDown
    }
})();

let dotControl = (() => {
    let $dots = $(".pageDot");
    let $carousel = $(".carousel");
    let $slidingTime = 2000;

    // add event handlers
    $dots.on("click", slideToSpecificPage);

    // go to a specific page
    function slideToSpecificPage() {
        let $index = $dots.index($(this));
        let $marginLeft = -100 * $index + "%";
        $carousel.animate({'margin-left': $marginLeft}, $slidingTime);
        pageNumRenewal.setPageNum($index + 1);
        switchActiveClass();
    }

    // switch the color of dots
    let switchActiveClass = () => {
        let $activeClass = "active";
        let $activeDot = pageNumRenewal.getPageNum();
        $dots.removeClass($activeClass);
        if ($activeDot === 4) {
            $activeDot = 1;
        }
        $($dots[$activeDot - 1]).addClass($activeClass);
    };

    return {
        switchActiveClass: switchActiveClass
    }
})();

// task 3: click buttons to control the carousel
let btnControl = (() => {
    let $prev = $("#prev");
    let $next = $("#next");
    let $start = $("#start");
    let $pause = $("#pause");
    let $carousel = $(".carousel");
    let $slides = $carousel.find(".slide");
    let $sliding = true;
    let $width = '100%';
    let $toggleTime = 100;
    let $slidingTime = 2000;

    // add event handlers
    $start.add($pause).click(toggleVisibility);
    $start.on('click', startSlider);
    $pause.on('click', stopSlider);
    $prev.click(flipPageBack);
    $next.click(flipPageForward);

    // toggle start and stop button visibility
    function toggleVisibility() {
        $sliding = !$sliding;
        if (!$sliding) {
            $pause.delay($toggleTime).show($toggleTime);
            $start.delay($toggleTime).hide();
        }
        else {
            $start.delay($toggleTime).show($toggleTime);
            $pause.delay($toggleTime).hide();
        }
    }

    function startSlider() {
        carouselSetup.startSlider();
    }

    function stopSlider() {
        carouselSetup.stopSlider();
    }

    // flip one page
    function flipPageForward() {
        $carousel.animate({'margin-left': '-=' + $width},
            $slidingTime,
            pageNumRenewal.pageNumUp);
    }

    // flip back one page
    function flipPageBack() {
        if (pageNumRenewal.getPageNum() === 1) {
            pageNumRenewal.setPageNum($slides.length);
            let lastPageMargin = -100 * ($slides.length - 1) + '%';
            $carousel.css('margin-left', lastPageMargin);
        }
        $carousel.animate({'margin-left': '+=' + $width},
            $slidingTime,
            pageNumRenewal.pageNumDown);
    }

    return {
        flipPageForward: flipPageForward,
        flipPageBack: flipPageBack
    }
})();

// run the carousel
let carouselSetup = (() => {
    let $carouselInterval;
    let $pauseTime = 10000;

    // start the slider
    function startSlider() {
        $carouselInterval = setInterval(btnControl.flipPageForward, $pauseTime);
    }

    // stop the slider
    function stopSlider() {
        clearInterval($carouselInterval);
    }

    // startSlider();

    return {
        startSlider: startSlider,
        stopSlider: stopSlider
    }
})();