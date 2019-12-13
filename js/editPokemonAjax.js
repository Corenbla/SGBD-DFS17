$(document).ready(() => {
    const $button = $('.js-edit-pokemon');
    $button.on('click', e => {
        const $clickedButton = $(e.target);
        const $card = $clickedButton.closest('.card');
        const pokemonName = $clickedButton.closest('.card').find('.card-title').text();
        const form = $.ajax({
            url: '/templates/pokemonForm.php',
            method: 'POST',
            data: {
                id: $clickedButton.data('id')
            },
            async: false,
        }).responseText;

        vex.dialog.open({
            message: 'Edit ' + pokemonName + '.',
            input: form,
            callback: function (data) {
                if (!data) {
                    return console.log('Cancelled')
                }
                $.ajax({
                    url: '../controller/pokemon/editOnePokemon.php',
                    method: 'POST',
                    data: {
                        name: data.name,
                        description: data.description,
                        type_1: data.type_1,
                        type_2: data.type_2,
                        id: $clickedButton.data('id'),
                    }
                }).done(() => {
                    $.ajax({
                        url: '/controller/pokemon/getOnePokemon.php',
                        method: 'POST',
                        data: {
                            id: data.id,
                            ajax: true
                        },
                    }).done(json => {
                        $card[0].style['cssText'] = `border-color: #${json.color}80`;
                        $card.find('.js-type1').text(json.type[0]);
                        $card.find('.js-type2').text(json.type[1]);
                        $card.find('.js-name').text(json.name);
                        $card.find('.js-description').text(json.description);
                    });
                })
            }
        })
    })
});