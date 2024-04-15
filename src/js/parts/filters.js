document.addEventListener('DOMContentLoaded', function () {
    const headings = document.querySelectorAll('.filter__heading');

    headings.forEach(heading => {
        heading.addEventListener('click', function () {
            const list = this.nextElementSibling;
            list.classList.toggle('open');
        });
    });


    const clearButtons = document.querySelectorAll('.filter__clear');

    clearButtons.forEach(button => {
        button.addEventListener('click', function () {
            const checkboxes = this.parentElement.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        });
    });


    clearButtons.forEach(button => {
        button.addEventListener('click', function () {
            const parent = this.closest('.filter__box');
            const rangeInputs = parent.querySelectorAll('input[type="range"]');
            const numberValues = parent.querySelectorAll('.filter__scroll-value');
            if (rangeInputs[0]) {
                const minPrice = parseFloat(rangeInputs[0].getAttribute('min'));
                const maxPrice = parseFloat(rangeInputs[0].getAttribute('max'));
                rangeInputs[0].value = minPrice;
                rangeInputs[1].value = maxPrice;
                numberValues[0].innerText = minPrice;
                numberValues[1].innerText = maxPrice;

                updateRangeBackground();
            }
        });
    });


    var parent = document.querySelector(".range-slider");
    if (!parent) return;

    var
        rangeS = parent.querySelectorAll("input[type=range]"),
        numberS = parent.querySelectorAll(".filter__scroll-value");

    function updateRangeBackground() {
        var slide1 = parseFloat(rangeS[0].value),
            slide2 = parseFloat(rangeS[1].value);

        var minVal = Math.min(slide1, slide2);
        var maxVal = Math.max(slide1, slide2);

        var rangeMin = parseFloat(rangeS[0].min);
        var rangeMax = parseFloat(rangeS[0].max);

        var gradientValue = (maxVal - minVal) / (rangeMax - rangeMin) * 100;
        var gradientStart = (minVal - rangeMin) / (rangeMax - rangeMin) * 100;

        parent.style.background = 'linear-gradient(to right, #ccc ' + gradientStart + '%, #fff ' + gradientStart + '%, #fff ' + (gradientStart + gradientValue) + '%, #ccc ' + (gradientStart + gradientValue) + '%)';
    }

    rangeS.forEach(function (el) {
        el.oninput = function () {
            var slide1 = parseFloat(rangeS[0].value),
                slide2 = parseFloat(rangeS[1].value);

            if (slide1 > slide2) {
                [slide1, slide2] = [slide2, slide1];
            }

            numberS[0].innerText = slide1;
            numberS[1].innerText = slide2;

            updateRangeBackground();
        }
    });

    numberS.forEach(function (el) {
        el.oninput = function () {
            var number1 = parseFloat(numberS[0].innerText),
                number2 = parseFloat(numberS[1].innerText);

            if (number1 > number2) {
                var tmp = number1;
                numberS[0].innerText = number2;
                numberS[1].innerText = tmp;
            }

            rangeS[0].value = number1;
            rangeS[1].value = number2;

            updateRangeBackground();
        }
    });

    rangeS[0].oninput = function () {
        var slide1 = parseFloat(rangeS[0].value),
            slide2 = parseFloat(rangeS[1].value);

        if (slide1 > slide2) {
            slide2 = slide1;
            rangeS[1].value = slide2;
        }

        numberS[0].innerText = slide1;
        numberS[1].innerText = slide2;

        updateRangeBackground();
    };

    rangeS[1].oninput = function () {
        var slide1 = parseFloat(rangeS[0].value),
            slide2 = parseFloat(rangeS[1].value);

        if (slide2 < slide1) {
            slide1 = slide2;
            rangeS[0].value = slide1;
        }

        numberS[0].innerText = slide1;
        numberS[1].innerText = slide2;

        updateRangeBackground();
    };

    updateRangeBackground();


if(window.innerWidth < 542){

    if(document.querySelector('.excursions-page__filters-button') && document.querySelector('.excursions-page__filters')){
        document.querySelector('.excursions-page__filters-button').addEventListener('click', function() {
            document.querySelector('.excursions-page__filters').classList.add('open');
            document.querySelector('.excursions-page__filters-button').classList.add('open');
        });

        document.addEventListener('click', function(event) {
            const filters = document.querySelector('.excursions-page__filters');
            const button = document.querySelector('.excursions-page__filters-button');
            if (!filters.contains(event.target) && event.target !== button) {
                filters.classList.remove('open');
                document.querySelector('.excursions-page__filters-button').classList.remove('open');
            }
        });
    }
   
    
}
    
    
    
    
});




