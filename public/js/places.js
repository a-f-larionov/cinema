$(document).ready(function () {

    /**
     * Установка клик-обработчка на места(place).
     */
    $('.js-place').on('click', function () {
        var isItPlaceToReserve;

        isItPlaceToReserve = $(this).hasClass('js-place-to-reserve');

        if (!isItPlaceToReserve) {
            $(this).addClass('js-place-to-reserve');
            $(this).addClass('place-to-reserve');
        } else {
            $(this).removeClass('js-place-to-reserve');
            $(this).removeClass('place-to-reserve');
        }
    });


    /**
     * Обработчик кнопка запроса резерва.
     */
    $('.js-send-reserve-button').on('click', function () {
        var eventId, placeIds, userName, _token;

        _token = $('[name=_token]').val();
        eventId = $('[name=event-id]').val();
        userName = $('[name=user-name]').val();

        placeIds = [];
        $('.js-place-to-reserve').each(function (index, place) {
            placeIds.push($(place).data('place-id'));
        });
        if (userName.length === 0) {
            return alert("Введите имя.");
        }
        if (placeIds.length === 0) {
            return alert("Выберите места.");
        }

        $.ajax({
            type: 'POST',
            url: '/api/place/reserve',
            data: {
                _token: _token,
                eventId: eventId,
                placeIds: placeIds,
                userName: userName
            },
            success: function (answer) {
                alert("Ваш номер резерва " + answer.reservationId);
            },

            error: function () {
                alert('Произошла неизвестная ошибка.\r\nОбратитесь к разработчику.');
            }
        });
    });
});
