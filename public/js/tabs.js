document.querySelectorAll('[data-tab-target]').forEach(function(element){
    element.addEventListener('click', function(event){
        const previousElement = document.querySelector(`#${this.getAttribute('data-tab-parent')} .tab.active`);
        const nextElement = document.querySelector(`#${this.getAttribute('data-tab-target')}`);

        if( previousElement && nextElement ){
            previousElement.classList.remove('active');
            nextElement.classList.add('active');
        }
    });
});