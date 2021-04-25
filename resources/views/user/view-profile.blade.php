@extends('template_dashboard.template')

@section('head')
    <link href="{{ asset('css/pages/profile.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('title', 'Profile')

@section('breadcrumb')
    <span> <i style="font-size:15px; margin: 0 4px;" class="fa fa-chevron-right"></i> View Profile</span>
@endsection

@section('page-content')
    <div id="profile-data">
        <section>
            <div id="section-profile-image" class="card">
                <div class="card-body">
                    <div class="form-group">
                        <img src="https://www.w3schools.com/w3images/avatar6.png" alt="user image">
                    </div>
                    <div id="div-social-media" class="form-group">
                        <div id="div-header-social-medias">
                            <label for="">Social medias</label>
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
                    <div class="form-group">
                        <h1 class="user_name">{{$profile_data['name']}}</h1><br>
                    </div>{{-- div-name --}}

                    <div class="form-group">
                        <label class="label" for="">Email</label><br>
                        <input class="input w100 watch-changes-userInfo border-none bg-white" disabled type="text" value="{{$profile_data['email']}}">
                    </div>{{-- div-email --}}

                    <div class="form-group">
                        <label class="label" for="">About me</label><br>
                        <div class="input w100 watch-changes-userInfo border-none">{{$profile_data['description']}}</div>
                    </div> {{-- div-description --}}

                    <div class="form-group">
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
                                    </div>
                                    <div class="occupation">
                                        {{$experience['occupation']}}
                                    </div>
                                    <div class="description">
                                        {{$experience['description']}}
                                    </div>
                                </div>{{-- div - expecience --}}
                            @endforeach
                        </div>{{-- div - experiences --}}
                    </div>{{-- div-experience --}}

                    <div class="form-group">
                        <label class="label">Skills</label><br>
                        <div id="div-skills">
                            @foreach ($skills as $skill)
                                <div class="skill">
                                    <span class="skill-name">{{$skill['name']}}</span>
                                    <span class="middle-line"></span>
                                    <span class="experience-time">
                                        @switch($skill['pivot']['time_experience'])
                                            @case(0)
                                                0 - 1 year
                                                @break
                                            @case(1)
                                                1 - 2 years
                                                @break
                                            @case(2)
                                                2 - 3 years
                                                @break
                                            @case(3)
                                                3 - 4 years
                                                @break
                                            @case(4)
                                                4 - 5 years
                                                @break
                                            @case(5)
                                                5+ years
                                                @break
                                            @default
                                        @endswitch
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>{{-- div-skills --}}
                </div>{{-- div-card-body --}}
            </div>{{-- div-card --}}
        </section>
    </div>
@endsection