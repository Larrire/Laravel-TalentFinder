const modalOpeners = document.querySelectorAll('.modal-opener').forEach(modalOpener => modalOpener.addEventListener('click', function(event){
    document.getElementById(modalOpener.attributes['data-modal-id'].value).classList.remove('display-none');
}));
const modalClosers = document.querySelectorAll('.modal-closer').forEach(modalCloser => modalCloser.addEventListener('click', function(event){
    document.getElementById(modalCloser.attributes['data-modal-id'].value).classList.add('display-none');
}));
const modals = document.querySelectorAll('.modal.modal-clickout-close').forEach(modal => modal.addEventListener('click', function(event){
    modal.classList.add('display-none');
}));
const modalContents = document.querySelectorAll('.modal-content').forEach(modalContent => modalContent.addEventListener('click', function(event){
    event.stopPropagation();
}));

function openModal(id){
    document.getElementById(id).classList.remove('display-none');
}
function closeModal(id){
    document.getElementById(id).classList.add('display-none');
}