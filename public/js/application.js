loadListeTache = () => {
    let formulaire = $('#formulaire_filtre_liste_tache'),
        url = $(formulaire).attr('action');

    $.post(url, formulaire.serialize(), function (data) {
        console.log(data)
        $('#div_target_load_liste_tache').html(data);

    })
}

// on écoute le changement de valeur sur les filtres
$(document).on('change', '.select_liste_tache', function () {
    loadListeTache();
});

$(document).ready(function () {
    loadListeTache()
})


