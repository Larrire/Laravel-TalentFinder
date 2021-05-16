@extends('template_dashboard.template')

@section('head')
    <link href="{{ asset('css/pages/profile.css') }}" rel="stylesheet" type="text/css" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Profile')

@section('breadcrumb')
    <span> <i style="font-size:15px; margin: 0 4px;" class="fa fa-chevron-right"></i> My Profile</span>
@endsection

@section('page-content')
    <div id="profile-data">
        <section>
            <div id="section-profile-image" class="card">
                <div class="card-body">
                    <div class="form-group">
                        <img src="https://www.w3schools.com/w3images/avatar6.png" alt="user image">
                    </div>
                    <div class="form-group">
                        <button id="change-image-button" class="button">Change photo</button>
                    </div>
                    <div id="div-social-media" class="form-group">
                        <div id="div-header-social-medias">
                            <label for="">Social medias</label>
                            <button type="button" class="button button-out-purple modal-opener" data-modal-id="modal-social-medias">Edit</button>
                        </div>
                        <div id="div-list-social-medias">
                            @foreach ($social_medias as $social_media)
                                <div class="social-media-item {{$social_media['social_media_type']}}"><a target="_blank" href="{{$social_media['social_media_link']}}"><i class="fab fa-{{$social_media['social_media_type']}}"></i></a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="section-data" class="card">

                <div class="card-body">
                    <section class="section">
                        <form id="form-user-info"></form>
                        <div id="div-userinfo-actions" class="form-group display-flex justify-content-end">
                            <div>
                                <button type="button" onclick="saveChangesUserInfo()" class="button button-purple">Save changes</button>
                                <button type="button" onclick="clearChangesUserInfo()" class="button button-out-purple">Clear changes</button>
                            </div>
                        </div> {{-- div-actions --}}
                    </section>

                    <section class="section">
                        <label class="label" for="">Experience</label><br>
                        <div id="div-expeciences">
                            @foreach ($experiences as $experience)
                                <div class="div-experience">
                                    <div class="company-data">
                                        <span class="company-name">{{$experience['company_name']}}</span>
                                        <div>
                                            <span class="company-time">
                                                @if (isset($experience['date_start']) && isset($experience['date_end']))
                                                    @date_experience($experience['date_start'])
                                                    <span> - </span>
                                                    @date_experience($experience['date_end'])
                                                @endif
                                            </span>
                                        </div>
                                        <div class="div-options">
                                            <button type="button" onclick="editExperience({{$experience['id']}})">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" onclick="idExperienceDelete={{$experience['id']}}" class="modal-opener" data-modal-id="modal-delete-experience">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="occupation">
                                        {{$experience['occupation']}}
                                    </div>
                                    <div class="description">
                                        {{$experience['description']}}
                                    </div>
                                </div>{{-- div - expecience --}}
                            @endforeach
                            
                            <div id="div-btn-add-experience">
                                <button onclick="addExperience()" class="button button-out-purple modal-opener" data-modal-id="modal-form-experience" id="button-add-experience">
                                    Add Experience
                                </button>
                            </div>{{-- div-add-experience --}}
                        </div>{{-- div - experiences --}}
                    </section>{{-- div-section --}}

                    <section class="section">
                        <label class="label" for="">Skills</label><br>
                        <div id="div-skills">
                            @foreach ($skills as $skill)
                                <div class="skill">
                                    <span class="skill-name">{{$skill['name']}}</span>
                                    <span class="middle-line"></span>
                                    <span class="experience-time">
                                        <select class="input" name="" id="">
                                            <option value="0" @if($skill['pivot']['time_experience']===0)selected @endif>0 - 1 year</option>
                                            <option value="1" @if($skill['pivot']['time_experience']===1)selected @endif>1 - 2 years</option>
                                            <option value="2" @if($skill['pivot']['time_experience']===2)selected @endif>2 - 3 years</option>
                                            <option value="3" @if($skill['pivot']['time_experience']===3)selected @endif>3 - 4 years</option>
                                            <option value="4" @if($skill['pivot']['time_experience']===4)selected @endif>4 - 5 years</option>
                                            <option value="5" @if($skill['pivot']['time_experience']===5)selected @endif>5+ years</option>
                                        </select>
                                    </span>
                                </div>
                            @endforeach
                            <div id="div-btn-add-skill">
                                <button type="button" class="button button-out-purple" id="button-add-skill" data-modal-id="modal-skills">
                                    Add skill
                                </button>
                            </div>{{-- div-add-skill --}}
                        </div>
                    </section>{{-- div-skills --}}

                </div>{{-- div-card-body --}}
            </div>{{-- div-card --}}
        </section>
    </div>

    <div id="modal-form-experience" class="modal display-none modal-blur modal-purple">
        <div class="modal-content large-modal-content">
            <div class="card">
                <div class="card-header bg-purple text-white">
                    <strong id="title-form-experience">Edit experience</strong>
                </div>
                <div class="card-body">
                    <form id="form-experience">
                        @csrf
                        <div class="form-group">
                            <label for="" class="label">Company</label>
                            <input type="text" class="input w100" name="company_name">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Occupation</label>
                            <input type="text" class="input w100" name="occupation">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">From - until</label>
                            <div class="">
                                <input type="date" class="input" name="date_start">
                                <input type="date" class="input" name="date_end">
                            </div>
                        </div>
                        <div class="form-group">
                            <span id="checkboxWorkHereToday" class="checkbox-input">
                                <label class="label mr-5">I work here today</label>
                                <input name="current_job" type="checkbox">
                                <span class="checkbox checkbox-purple border-red">
                                    <span class="checkbox-slider">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Job description</label>
                            <textarea class="input w100" rows="5" name="description"></textarea>
                        </div>
                    </form>
                    <div class="display-flex justify-content-end">
                        <div>
                            <button type="button" class="button button-purple modal-closer" data-modal-id="modal-form-experience" onclick="submitFormExperience()">Save experience</button>
                            <button type="button" class="button modal-closer" data-modal-id="modal-form-experience">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-delete-experience" class="modal modal-blur modal-top-center modal-clickout-close display-none">
        <div class="modal-content small-modal-content">
            <div class="card">
                <div class="card-header bg-red border-red text-white">
                    <strong>Delete experience?</strong>
                </div>
                <div class="card-body">
                    <div>Are you sure you want to delete this item?</div>
                    <div class="display-flex justify-content-end pt-20">
                        <button class="button modal-closer bg-red border-red mr-5 text-white" data-modal-id="modal-delete-experience" onclick="deleteExperience()"> Delete</button>
                        <button class="button modal-closer" data-modal-id="modal-delete-experience">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-social-medias" class="modal modal-blur display-none">
        <div class="modal-content large-modal-content">
            <div class="card">
                <div class="card-header bg-purple text-white">
                    <strong>Social medias</strong>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group display-flex align-items-center">
                            <label class="label w10" for=""><i class="fab fa-facebook-square"></i></label>
                            <input class="input w100" type="text">
                        </div>
                        <div class="form-group display-flex align-items-center">
                            <label class="label w10" for=""><i class="fab fa-instagram"></i></label>
                            <input class="input w100" type="text">
                        </div>
                        <div class="form-group display-flex align-items-center">
                            <label class="label w10" for=""><i class="fab fa-linkedin"></i></label>
                            <input class="input w100" type="text">
                        </div>
                        <div class="form-group display-flex align-items-center">
                            <label class="label w10" for=""><i class="fab fa-behance"></i></label>
                            <input class="input w100" type="text">
                        </div>
                        <div class="form-group display-flex align-items-center">
                            <label class="label w10" for=""><i class="fab fa-github"></i></label>
                            <input class="input w100" type="text">
                        </div>
                        <div class="form-group display-flex align-items-center">
                            <label class="label w10" for=""><i class="fab fa-pinterest"></i></label>
                            <input class="input w100" type="text">
                        </div>
                    </div>
                    <div class="display-flex justify-content-end pt-20">
                        <button class="button modal-closer button-purple mr-5 text-white" data-modal-id="modal-social-medias">Save</button>
                        <button class="button modal-closer" data-modal-id="modal-social-medias">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/checkbox.js')}}"></script>
    <script>
        // init scripts
        csrf = document.querySelector('meta[name="csrf-token"').getAttribute('content');
        
        loadUserInfo();
        loadSkills();
        // End init scripts
        // user info scripts
        let userInfoWatchedElements;

        function setuserInfoWatchedElements(){
            userInfoWatchedElements = document.querySelectorAll('.watch-changes-userInfo');
            userInfoWatchedElements.forEach(element => {
                element.addEventListener('keyup', function(event){
                    if( formUserInfoHasChanges() ){
                        showUserInfoActions();
                    } else {
                        hideUserInfoActions();
                    }
                });
            });
        }

        async function loadUserInfo(userInfo = null){
            if( userInfo === null){
                userInfo = await fetch('{{url("")}}'+`/get_user_info`).then(data => data.json());
            }
            divUserInfo = `
                <div class="form-group">
                    <label class="label" for="">Name</label><br>
                    <input class="input w100 watch-changes-userInfo" name="name" type="text" placeholder="your name" data-prev-value="${userInfo.name.trim()}" value="${userInfo.name.trim()}">
                </div>{{-- div-name --}}
                <div class="form-group">
                    <label class="label" for="">Email</label><br>
                    <input class="input w100 watch-changes-userInfo" name="email" type="text" placeholder="your email" data-prev-value="${userInfo.email.trim()}" value="${userInfo.email.trim()}">
                </div>{{-- div-email --}}
                <div class="form-group">
                    <label class="label" for="">Actual occupation</label><br>
                    <div class="display-flex">
                        <input class="input w100 watch-changes-userInfo" name="actual_occupation" type="text" placeholder="occupation" data-prev-value="${userInfo.email.trim()}" value="${userInfo.email.trim()}">
                        <div class="w25 display-flex align-items-center justify-content-center"><span>at</span></div>
                        <input class="input w100 watch-changes-userInfo" name="actual_company_name" type="text" placeholder="company name" data-prev-value="${userInfo.email.trim()}" value="${userInfo.email.trim()}">
                    </div>
                </div>{{-- div-email --}}
                <div class="form-group">
                    <label class="label" for="">About me</label><br>
                    <textarea id="textarea-user-description" type="text" name="description" class="input w100 watch-changes-userInfo" placeholder="tell something about you" data-prev-value="${userInfo.description}" rows="5">${userInfo.description}</textarea>
                </div> {{-- div-description --}}
            `;
            document.querySelector('#form-user-info').innerHTML = divUserInfo;
            setuserInfoWatchedElements();
        }

        function saveChangesUserInfo(){
            const myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", csrf);
            const form = document.querySelector('#form-user-info');
            const formData = new FormData(form);

            fetch('{{url("update_user_info")}}', {
                method:'POST', 
                headers: myHeaders,
                body: formData
            })
            .then(function(response){
                response.json()
                .then(function(json){
                    hideUserInfoActions();
                    loadUserInfo(json);
                });
            });
        }

        function showUserInfoActions(){
            document.querySelector('div#div-userinfo-actions').classList.add('opened');
        }

        function hideUserInfoActions(){
            document.querySelector('div#div-userinfo-actions').classList.remove('opened');
        }

        function clearChangesUserInfo(){
            userInfoWatchedElements.forEach(element => {
                element.value = element.getAttribute('data-prev-value');
            });
            hideUserInfoActions();
        }

        function formUserInfoHasChanges(){
            let result = 0;
            userInfoWatchedElements.forEach(element => {
                result += (element.value === element.getAttribute('data-prev-value')) ? 0 : 1;
            });
            return result;
        }
        // End user info scripts
        // Experience scripts
        let idExperienceDelete = null;
        let idExperienceEdit = null;
        let isEditingExperience = false;

        function deleteExperience(){
            fetch('{{url("")}}' + `/experience/delete/${idExperienceDelete}`, {csrf})
            .then(function(response){
                alert('experience ' + idExperienceDelete + ' deleted');
            });
        }

        function setModalExperienceTitle(title){
            const element = document.querySelector('#title-form-experience');
            element.innerHTML = title;
        }
        function clearModalExperience(){
            document.querySelectorAll('#modal-form-experience input').forEach(input => input.value = '');
            document.querySelectorAll('#modal-form-experience textarea').forEach(textarea => textarea.value = '');
            document.querySelector(`#checkboxWorkHereToday`).uncheck();
        }

        function submitFormExperience(){
            const form = new FormData(document.querySelector('#form-experience'));
            console.log(form.get('current_job'))
            const is_current_job = (document.querySelector('#form-experience input[name=current_job]').getAttribute('checked')==='checked') ? 1 : 0;
            form.set('current_job', is_current_job);
            if( isEditingExperience ){
                saveChangesExperience(form);
            } else {
                saveNewExperience(form);
            }
        }

        function editExperience(id){
            isEditingExperience = true;
            idExperienceEdit = id;
            clearModalExperience();
            setModalExperienceTitle('Edit Experience');
            openModal('modal-loading');

            fetch('{{url("")}}'+`/experience/getById/${id}`)
            .then(function (response){
                response.json()
                .then(function(json){
                    document.querySelector(`input[name=company_name]`).value = json.company_name;
                    document.querySelector(`input[name=occupation]`).value = json.occupation;
                    document.querySelector(`input[name=date_start]`).value = json.date_start;
                    document.querySelector(`input[name=date_end]`).value = json.date_end;
                    document.querySelector(`textarea[name=description]`).value = json.description;
                    if( json.current_job ) {
                        document.querySelector(`#checkboxWorkHereToday`).check();
                    } else {
                        document.querySelector(`#checkboxWorkHereToday`).uncheck();
                    }
                    closeModal('modal-loading');
                    openModal('modal-form-experience');
                });
            })
            .catch(function (error){
                console.log(error);
            });
        }
        function saveChangesExperience(form){
            const myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", csrf);
            form.append('id', idExperienceEdit);
            console.log(form);
            fetch('{{url("experience/update")}}', {
                method:'POST', 
                headers: myHeaders,
                body: form
            })
            .then(function(response){
                response.json()
                .then(function(json){
                    console.log(json)
                });
            });
            console.log(form);
        }

        function addExperience(){
            isEditingExperience = false;
            clearModalExperience();
            setModalExperienceTitle('Add Experience');
        }
        function saveNewExperience(form){
            const myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", csrf);

            fetch('{{url("experience")}}', {
                method:'POST', 
                headers: myHeaders,
                body: form
            })
            .then(function(response){
                response.json()
                .then(function(json){
                    console.log(json)
                });
            });
        }
        // End experience scripts
        // Skills scripts
        let skills = [];
        function loadSkills(){
            fetch('{{url("")}}'+`/user_skills`)
            .then(function (response){
                response.json()
                .then(function(json){
                    
                });
            })
            .catch(function (error){
                console.log(error);
            });
        }
        function saveChangesSkills(){

        }
        // End skills scripts
    </script>
@endsection