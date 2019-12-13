const pikachuPaths = []; // Array of image paths
for (let i = 1; i < 6; i++) {
    pikachuPaths.push(`../images/pikachuInvasion/pikachu${i}.gif`)
}


$('#pikachu').on('click', e => {
    vex.dialog.alert('You fool !!');

    const $invasion = $('<div class="row position-absolute d-flex vw-100" id="invasion" style="top: 0; left: 0; z-index: 1031;"></div>');

    $('body').append($invasion);

    let j = 1;
    for (let i = 0; i < 5; i++) {
        shuffle(pikachuPaths);
        const $runningPukachu = $(`
        <div class="test" style="top: ${200 * i}px; z-index: 100000">
            <img src="../images/pikachuInvasion/pikachu6.gif" alt="RunningPikachu">
        </div>  
        `);

        pikachuPaths.forEach(path => {
            j++;

            const $pikachu = $(`
                <div class="col-md-2 d-flex justify-content-center align-items-center invasive" style="height: 200px;">
                    <img src="${path}" alt="Chuuu~~">
                </div>
            `);

            $pikachu.children().hide();
            $pikachu.appendTo($invasion);
            $runningPukachu.appendTo($invasion);
        })
    }
    $('.invasive').each(function (index) {
        $(this).children().delay(300 * index).fadeIn();
    })
});

/**
 * Shuffle an array
 * @param a
 * @returns {*}
 */
function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}