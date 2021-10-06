const showModal = (id) => {
    $('#title').html('Editar');
    const firstname = $(`#firstname_${id}`).text();
    const lastname = $(`#lastname_${id}`).text();
    const email = $(`#email_${id}`).text();
    $('#email').val(email)
    $('#firstname').val(firstname)
    $('#lastname').val(lastname)
    $('#contactId').val(id)
}



const showCreate = () => {
    const id = $('#contactId').val('');
    $('#title').html('Crear');
    $('#email').val('')
    $('#firstname').val('')
    $('#lastname').val('')
    $('#contactId').val('')
}



const hubspotActions = async (e) => {
    e.preventDefault();

    const form = new FormData(e.target);
    const id = $('#contactId').val();
    form.delete('contactId')
    // pending validations update
    if (id) {
        const  update = await fetch('src/hubspot.php?_method=put&contact_id=' + id, {
            method: 'POST',
            body: form
        });

        const {properties} = await update.json();

        $(`#lastname_${id}`).html(properties.lastname);
        $(`#email_${id}`).html(properties.email);
        $(`#firstname_${id}`).html(properties.firstname);
    }
    
    // pending validations created
    if (!id) {
        form.delete('contactId')
        fetch('src/hubspot.php?create=true', {
            method: 'POST',
            body: form
        })
        e.target.reset();
    }

}


$('#myModal2').on('shown.bs.modal', function () {

});

// remove
const archive = (id) => {
    // pending validations
    fetch('src/hubspot.php?archive=true&contact_id=' + id, {
        method: 'DELETE'
    })

    $(`#column_${id}`).remove();

}

window.onload = function () {

    const formularyUpdate = document.getElementById('formulary');

    formularyUpdate.addEventListener('submit', hubspotActions)
};