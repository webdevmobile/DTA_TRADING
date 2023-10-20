//DataTables
$(document).ready( function () {
    $('#myTable').DataTable();
} );

//Tom-Select
document.querySelectorAll('.select').forEach((el)=>{
    // let settings = {}
    new TomSelect(el, {plugins: {remove_button: {title: 'Supprimer'}}})
})
// new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})

// let openModal = document.getElementsByClassName('openModal')
// for(let i = 0; i < openModal.length; i++) {
//     openModal[i].addEventListener('click', function () {
//         document.getElementsByClassName('myModal')[i].style.display="block"
//         document.getElementsByClassName('close')[i].addEventListener('click', function () {
//         document.getElementsByClassName('myModal')[i].style.display="none"
//         })
//     })
// }

// upload File
const fileInput = document.getElementById('customFileInput')
const fileInputLabel = document.querySelector('.fileLabel')
fileInput.addEventListener('change', function () {
    const fileName = fileInput.value.split('\\').pop(); //obtenir le nom du fichier sans chemin complet
    fileInputLabel.textContent = fileName || 'Charger une photo de profil'
})

// View large image
function showFullImage(src) {
    document.getElementById('full-image').src = src
    document.getElementById('image-modal').style.display = 'block'
}

function closeModal() {
    document.getElementById('image-modal').style.display = 'none'
}

const userThumbnail = document.getElementById('user-thumbnail')
    userThumbnail.addEventListener('click', showFullImage(userThumbnail.src))

