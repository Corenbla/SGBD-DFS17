$(document).ready(() => {
    const $button = $('.js-delete-pokemon');
    $button.on('click', e => {
        const $clickedButton = $(e.target);
        vex.dialog.confirm({
            message: 'Are you sure you want to release "' + $clickedButton.closest('.card').find('.card-title').text() + '" ?',
            callback: value => {
                if (value) {
                    $.ajax({
                        url: '/controller/pokemon/deleteOnePokemon.php',
                        method: 'POST',
                        data: {
                            id: $button.data('id'),
                            username: $button.data('username'),
                        }
                    }).done(json => {
                        $clickedButton.closest('.card').fadeOut()
                    }).fail((jqXHR, textStatus, errorThrown) => {
                        console.log(jqXHR, textStatus, errorThrown);
                    })
                }
            },
        });
    })
});