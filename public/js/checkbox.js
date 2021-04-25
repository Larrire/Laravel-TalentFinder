const checkboxs = document.querySelectorAll('.checkbox-input').forEach(
    checkboxInput => {
        const input = checkboxInput.querySelector('input[type="checkbox"]');
        checkboxInput.querySelector('.label').addEventListener('click', function(event){
            checkboxInput.querySelector('.checkbox').click();
        });
        checkboxInput.check = function(){
            this.querySelector('input[type="checkbox"]').setAttribute('checked','checked');
            this.querySelector('i').setAttribute('class','fas fa-check');
            this.querySelector('.checkbox').classList.add('checked');


            
            // document.querySelector(`#checkboxWorkHereToday`).click();
        };
        checkboxInput.uncheck = function(){
            this.querySelector('input[type="checkbox"]').removeAttribute('checked');
            this.querySelector('i').setAttribute('class','fas fa-times');
            this.querySelector('.checkbox').classList.remove('checked');

            
            // document.querySelector(`#checkboxWorkHereToday`).click();
        };
        checkboxInput.querySelector('.checkbox').addEventListener('click', function(event){
            if( input.hasAttribute('checked') ){
                this.classList.remove('checked');
                this.querySelector('i').setAttribute('class','fas fa-times');
                input.removeAttribute('checked')
            } else {
                this.classList.add('checked');
                this.querySelector('i').setAttribute('class','fas fa-check');
                input.setAttribute('checked', "checked")
            }
        })
});