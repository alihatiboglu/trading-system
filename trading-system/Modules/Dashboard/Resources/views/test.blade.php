@extends('layouts.master')

@section('content')
    <style>
        .formation .icon-player:before {
            display: none !important;
        }

        .match-info li span {
            padding-right: 12px !important;
        }
    </style>

    <div class="row latest-result banner" style="padding-top: 0;padding-bottom: 0;">
        <div class="col-sm-12">
            <div class="single-match"
                 style="background: url('/img/bg.webp') center;background-size: cover;padding: 70px 0;position: relative;">
                <div class="part-team" style="justify-content: center;">
                    <div class="match-details">
                        <div class="match-time">
                    <span class="time" style="color: #fff;margin-bottom: 15px;"><a
                            href="/league/{{$match->league->id}}"
                            style="color: inherit;">{{$match->league->name_ar}}</a>@if(isset($match->visitor_team->standing))
                            - الأسبوع {{$match->visitor_team->standing->round_name}}@endif</span>
                        </div>
                    </div>
                </div>
                <div class="part-team" style="justify-content: center;align-items: flex-start;">
                    <div>
                        <a href="/team/{{$match->local_team->id}}">
                            <div class="single-team asa"
                                 style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
                                <div class="logo" style="height: 60px;">
                                    <img src="{{$match->localTeam_logo_path}}" alt="">
                                </div>
                                <span class="team-name"
                                      style="padding-bottom: 20px;">{{$match->local_team->name_ar}}</span>
                            </div>
                        </a>
                        {{--                        @foreach($match->local_team->goals as $goal)--}}
                        {{--                            <p style="color: #fff;margin: 5px 0;">({{$goal->minute}}) <a--}}
                        {{--                                        href="/player/{{$goal->player_id}}"--}}
                        {{--                                        style="color: inherit;">{{$goal->player_name_ar}} </a></p>--}}
                        {{--                        @endforeach--}}
                    </div>
                    <div class="match-details" style="margin: 0 30px;">
                        <div class="match-time">
                            <span class="time" style="color: #fff;">{{date('H:i',$match->timestamp)}}</span>
                        </div>
                        <div class="goal">
                            <ul>
                                <li style="color: #fff;border-color: #fff;">{{$match->localteam_score}}</li>
                                <li style="color: #fff;border-color: #fff;">{{$match->visitorteam_score}}</li>

                            </ul>
                            @if($match->time_status=='FT')
                                <span class="match-status ms-ended">انتهت</span>
                            @elseif($match->time_status=='NS')
                                <span class="match-status">لم تبدأ</span>
                            @else
                                <span class="match-status ms-live">مباشر</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <a href="/team/{{$match->visitor_team->id}}">
                            <div class="single-team"
                                 style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
                                <div class="logo" style="height: 60px;">
                                    <img src="{{$match->visitorTeam_logo_path}}" alt="">
                                </div>
                                <span class="team-name"
                                      style="padding-bottom: 20px;">{{$match->visitor_team->name_ar}}</span>
                            </div>
                        </a>
                        {{--                        @foreach($match->visitor_team->goals as $goal)--}}
                        {{--                            <p style="color: #fff;margin: 5px 0;">({{$goal->minute}}) <a--}}
                        {{--                                        href="/player/{{$goal->player_id}}"--}}
                        {{--                                        style="color: inherit;">{{$goal->player_name_ar}} </a></p>--}}
                        {{--                        @endforeach--}}
                    </div>
                </div>
                <div class="tab" style="position: absolute;bottom: 0;right: 0;left: 0;">
                    <button class="tablinks active" data-tab="London">نظرة عامة</button>
                    <button class="tablinks" data-tab="Berlin">التشكيل</button>
                    <button class="tablinks" data-tab="Paris">تفاصيل المباراة</button>
                    {{--                    <button class="tablinks" data-tab="Tokyo">وجهاً لوجه</button>--}}
                </div>
            </div>
        </div>
    </div>
    <div id="London" class="tabcontent London active">
        <ul class="match-info">
            <li>
                <i class="fa fa-calendar"></i>
                <span>يوم المباراة: {{date('Y-M-d',$match->timestamp)}}</span>
            </li>
            <li>
                <i class="fa fa-clock-o"></i>
                <span>توقيت المباراة: {{date('H:i',$match->timestamp)}}</span>
            </li>
            <li>
                <i class="fa fa-sun-o"></i>
                <span>الطقس: {{$match->weather_temp}}°C</span>
            </li>
            @if($match->venue)
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>الملعب: {{$match->venue->name_ar}}</span>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <span>سعة الاستاد: {{$match->venue->capacity}}</span>
                </li>
            @endif
            {{--            <li>--}}
            {{--                <i><svg style="width: 15px;height: 15px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <path style="fill: #cccccc;" d="M32,288c-17.648,0-32-14.352-32-32s14.352-32,32-32c2.977,0,5.922,0.406,8.742,1.211    c4.25,1.211,6.719,5.633,5.508,9.883c-1.203,4.266-5.672,6.734-9.883,5.508C34.961,240.203,33.492,240,32,240    c-8.82,0-16,7.18-16,16s7.18,16,16,16c1.461,0,2.906-0.195,4.289-0.578c4.266-1.195,8.672,1.297,9.852,5.555    c1.188,4.258-1.297,8.672-5.555,9.852C37.805,287.609,34.914,288,32,288z"/> </g> <g> <path style="fill: #ffffff;" d="M504,104H292.586c-4.418,0-8,3.582-8,8v6c0,6.627-5.373,12-12,12l0,0c-6.627,0-12-5.373-12-12v-6    c0-4.418-3.582-8-8-8h-68.297c-85.148,0-154.992,67.602-155.695,150.687c-0.344,41.109,15.461,79.742,44.516,108.789    C101.844,392.219,139.961,408,180.57,408c0.445,0,0.883-0.008,1.328-0.008c83.086-0.703,150.687-70.547,150.687-155.695v-16.648    c0-16.258,12.18-29.922,28.539-31.813l122.539-17.437C499.82,184.531,512,170.867,512,154.609V112    C512,107.582,508.418,104,504,104z"/> </g> <g> <path style="fill: #cccccc;" d="M180.586,360c-57.344,0-104-46.656-104-104s46.656-104,104-104s104,46.656,104,104    S237.93,360,180.586,360z M180.586,176c-44.115,0-80,35.885-80,80s35.885,80,80,80s80-35.885,80-80S224.7,176,180.586,176z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg> </i>--}}
            {{--                <span>الحم - المساعد: االاسم - الاسم</span>--}}
            {{--           </li>--}}
            {{--             <li>--}}
            {{--                <i class="fa fa-television"></i>--}}
            {{--                <span>القنوات الناقلة</span>--}}
            {{--            </li>--}}
            {{--            <li style="    padding: 2px 0 10px;">--}}
            {{--                <div class="btn-success btn-sm" style="background: #308a2e">قناة 1</div>--}}
            {{--            </li> --}}
            {{--            <li style="    padding: 2px 0 10px;">--}}
            {{--                <div class="btn-success btn-sm" style="background: #308a2e">قناة 2</div>--}}
            {{--            </li>--}}
        </ul>
        <div class="result row" style="padding: 0;">
            @if(isset($match->visitor_team->standing))

                <div class="col-sm-12">
                    <div class="result-sheet" style="padding-top: 10px;margin-bottom: 20px;">
                        <h4 class="result-title" style="margin-top: 0;">ترتيب الفريقين
                            في {{$match->league->name_ar}}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-shadow">
                            <thead>
                            <tr>
                                <th>الترتيب</th>
                                <th>الفريق</th>
                                <th>لعب</th>
                                <th>له</th>
                                <th>عليه</th>
                                <th>نقاط</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$match->local_team->standing->position}}</td>
                                <td>
                                    <a href="/team/{{$match->local_team->id}}" style="color: #000;">
                                        <img width="30"
                                             height="30"
                                             src="{{$match->localTeam_logo_path}}"
                                             style="margin-left: 10px;">{{$match->local_team->name_ar}}
                                    </a>
                                </td>
                                <td>{{$match->local_team->standing->games_played}}</td>
                                <td>{{$match->local_team->standing->goals_scored}}</td>
                                <td>{{$match->local_team->standing->goals_against}}</td>
                                <td>{{$match->local_team->standing->points}}</td>
                            </tr>
                            <tr>
                                <td>{{$match->visitor_team->standing->position}}</td>
                                <td>
                                    <a href="/team/{{$match->visitor_team->id}}" style="color: #000;">
                                        <img width="30"
                                             height="30"
                                             src="{{$match->visitorTeam_logo_path}}"
                                             style="margin-left: 10px;">{{$match->visitor_team->name_ar}}
                                    </a>
                                </td>
                                <td>{{$match->visitor_team->standing->games_played}}</td>
                                <td>{{$match->visitor_team->standing->goals_scored}}</td>
                                <td>{{$match->visitor_team->standing->goals_against}}</td>
                                <td>{{$match->visitor_team->standing->points}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="result-sheet" style="padding-top: 10px;margin-bottom: 20px;">
                        <h4 class="result-title" style="margin-top: 0;">إحصائيات المباراة</a></h4>
                    </div>
                </div>
            @endif
        </div>
        <div class="row match-stats">
            <div class="col-sm-12">
                <div style="display: flex;justify-content: space-around;">
                    <div class="team">
                        <img width="50" height="50" src="{{$match->localTeam_logo_path}}" alt="">
                        <a href="/team/{{$match->local_team->id}}">{{$match->local_team->name_ar}}</a>
                    </div>
                    <div class="team">
                        <img width="50" height="50" src="{{$match->visitorTeam_logo_path}}" alt="">
                        <a href="/team/{{$match->visitor_team->id}}">{{$match->visitor_team->name_ar}}</a>
                    </div>
                </div>
            </div>
            @if(isset($match->stats[0]))
                <div class="col-sm-12">
                    <ul>
                        <li>
                            <span class="left">{{$match->stats[0]->goals}}</span>
                            <span class="center">الأهداف</span>
                            <span class="right">{{$match->stats[1]->goals}}</span>
                        </li>
                        <li>
                            <span class="left">{{$match->stats[0]->possessiontime}}</span>
                            <span class="center">الاستحواذ</span>
                            <span class="right">{{$match->stats[1]->possessiontime}}</span>
                        </li>
                        <li>
                            <span class="left">{{$match->stats[0]->insidebox}}</span>
                            <span class="center">التسديدات</span>
                            <span class="right">{{$match->stats[1]->insidebox}}</span>
                        </li>
                        <li>
                            <span class="left">{{$match->stats[0]->total_passes}}</span>
                            <span class="center">التمريرات</span>
                            <span class="right">{{$match->stats[1]->total_passes}}</span>
                        </li>
                        <li>
                            <span class="left">{{$match->stats[0]->corners}}</span>
                            <span class="center">الضربات الركنية</span>
                            <span class="right">{{$match->stats[1]->corners}}</span>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div id="Berlin" class="tabcontent Berlin">
        <div class="row row-formation">
            <div class="col-md-4">
                <div class="result" style="padding: 0;">
                    <div class="result-sheet" style="padding-top: 10px;margin-bottom: 20px;">
                        <h4 class="result-title" style="margin-top: 0;">
                            <img src="{{$match->localTeam_logo_path}}"
                                 width="40" height="40"
                                 alt=""> {{$match->localteam_formation}}
                        </h4>
                    </div>
                </div>
                @if(isset($match->localLineups))
                    <div class="result" style="padding: 0;">
                        <div class="result-sheet" style="padding-top: 10px;margin-bottom: 20px;">
                            <h4 class="result-title" style="margin-top: 0;">التشكيل الأساسي</h4>
                        </div>
                    </div>
                @endif
                @foreach($match->localLineups as $local)
                    <div style="display: flex;margin-top: 10px;align-items: center;">
                        <?php
                        if(!empty($local->player->image_path))
                        {
                        ?>
                        <img src="{{$local->player->image_path}}" style="border-radius: 50%;width: 35px;height: 35px;"
                             alt="">
                        <?php
                        }
                        ?>
                        <div style="margin: 0 10px;min-width: 150px;">
                            <p style="margin: 0;line-height: 18px;"><a href="/player/{{$local->player_id}}"
                                                                       style="font-weight: 700;color: #31942e;">{{$local->player_name}}</a>
                                <br>
                                @if($local->position=='G')
                                    حارس مرمى
                                @elseif($local->position=='D')
                                    مدافع

                                @elseif($local->position=='M')
                                    خط وسط
                                @elseif($local->position=='A')
                                    مهاجم

                                @endif
                            </p>
                        </div>
                        <span
                            style="width: 20px;background: #31942e;color: #fff;text-align: center;">{{$local->number}}</span>
                        @if($local->captain==1)
                            <i class="fa fa-copyright" style="color: #ff9800;margin: 0 10px;"></i>
                        @endif
                    </div>
                    <hr>
                @endforeach
                <div class="result" style="padding: 0;">
                    <div class="result-sheet" style="padding-top: 10px;margin: 20px 0;">
                        <h4 class="result-title" style="margin-top: 0;">البدلاء</h4>
                    </div>
                </div>
                @foreach($match->localBench as $local)
                    <div style="display: flex;margin-top: 10px;align-items: center;">
                        <img src="{{$local->player->image_path}}" style="border-radius: 50%;width: 35px;height: 35px;"
                             alt="">
                        <div style="margin: 0 10px;min-width: 150px;">
                            <p style="margin: 0;line-height: 18px;"><a href="/player/{{$local->player_id}}"
                                                                       style="font-weight: 700;color: #31942e;">{{$local->player_name}}</a>
                                <br>
                                @if($local->position=='G')
                                    حارس مرمى
                                @elseif($local->position=='D')
                                    مدافع

                                @elseif($local->position=='M')
                                    خط وسط
                                @elseif($local->position=='A')
                                    مهاجم
                                @endif
                            </p>
                        </div>
                        <span
                            style="width: 20px;background: #31942e;color: #fff;text-align: center;">{{$local->number}}</span>
                        @if($local->captain==1)
                            <i class="fa fa-copyright" style="color: #ff9800;margin: 0 10px;"></i>
                        @endif
                    </div>
                    <hr>
                @endforeach

                {{--  <div class="result" style="padding: 0;">--}}
                {{--                    <div class="result-sheet" style="padding-top: 10px;margin: 20px 0;">--}}
                {{--                        <h4 class="result-title" style="margin-top: 0;">اللعبين الغائبين</h4>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                {{--<div style="display: flex;margin-top: 10px;align-items: center;">--}}
                {{--    <img src="/img/sobhy.png" style="border-radius: 50%;width: 35px;height: 35px;" alt="">--}}
                {{--<div style="margin: 0 10px;min-width: 150px;">--}}
                {{--<p style="margin: 0;line-height: 18px;"><a href="/player/832" style="font-weight: 700;color: #31942e;">ديفيد دي جيا</a>--}}
                {{--<br>--}}
                {{--حارس مرمى--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--<span style="width: 20px;background: #31942e;color: #fff;text-align: center;">1</span>--}}
                {{--</div>--}}
                <hr>
                {{--<div style="display: flex;margin-top: 10px;align-items: center;">--}}
                {{--    <img src="/img/sobhy.png" style="border-radius: 50%;width: 35px;height: 35px;" alt="">--}}
                {{--<div style="margin: 0 10px;min-width: 150px;">--}}
                {{--<p style="margin: 0;line-height: 18px;"><a href="/player/832" style="font-weight: 700;color: #31942e;">ديفيد دي جيا</a>--}}
                {{--<br>--}}
                {{--حارس مرمى--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--<span style="width: 20px;background: #31942e;color: #fff;text-align: center;">1</span>--}}
                {{--</div>--}}

                {{--            </div>--}}
            </div>
            <div class="col-md-4 col-formation">
                <div class="formation">
                    @if($match->localteam_formation!='3-4-2-1' &&$match->localteam_formation!='3-1-4-2')
                        <div class="teamA form{{str_replace('-','',$match->localteam_formation)}}">
                            @elseif($match->localteam_formation=='3-4-2-1')
                                <div class="teamA form343">
                                    @elseif($match->localteam_formation=='3-1-4-2')
                                        <div class="teamA form352">
                                            @endif
                                            <img class="teamBG" src="{{$match->localTeam_logo_path}}" alt="">
                                            @php($x=1)
                                            @foreach($match->localLineups as $local)
                                                @if($x<10)
                                                    <div class="player icon-player p0{{$x}}">
                                                        @else
                                                            <div class="player icon-player p{{$x}}">
                                                                @endif
                                                                <p>
                                                                    <?php
                                                                    if(!empty($local->player->image_path))
                                                                    {
                                                                    ?>
                                                                    <img src="{{$local->player->image_path}}"
                                                                         style="    border-radius: 50%; width: 35px !important; height: 25px !important;"
                                                                         alt="">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    {{$local->number}}</p></div>
                                                            @php($x++)
                                                            @endforeach
                                                    </div>
                                                    @if($match->visitorteam_formation!='3-4-2-1' &&$match->visitorteam_formation!='3-1-4-2')
                                                        <div
                                                            class="teamB form{{str_replace('-','',$match->visitorteam_formation)}}">

                                                            @elseif($match->visitorteam_formation=='3-4-2-1')
                                                                <div class="teamB form343">

                                                                    @elseif($match->visitorteam_formation=='3-1-4-2')
                                                                        <div class="teamB form352">

                                                                            @endif

                                                                            <img class="teamBG"
                                                                                 src="{{$match->visitorTeam_logo_path}}"
                                                                                 alt="">
                                                                            @php($x=1)
                                                                            @foreach($match->localLineups as $local)
                                                                                @if($x<10)
                                                                                    <div
                                                                                        class="player icon-player p0{{$x}}">
                                                                                        @else

                                                                                            <div
                                                                                                class="player icon-player p{{$x}}">
                                                                                                @endif
                                                                                                <p>
                                                                                                    <?php
                                                                                                    if(!empty($local->player->image_path))
                                                                                                    {
                                                                                                    ?>
                                                                                                    <img
                                                                                                        src="{{$local->player->image_path}}"
                                                                                                        style="    border-radius: 50%; width: 35px !important; height: 25px !important;"
                                                                                                        alt="">
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    {{$local->number}}
                                                                                                </p>
                                                                                            </div>
                                                                                            @php($x++)
                                                                                            @endforeach
                                                                                    </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="result" style="padding: 0;">
                                                                        <div class="result-sheet"
                                                                             style="padding-top: 10px;margin-bottom: 20px;">
                                                                            <h4 class="result-title"
                                                                                style="margin-top: 0;"><img
                                                                                    src="{{$match->visitorTeam_logo_path}}"
                                                                                    width="40" height="40"
                                                                                    alt=""> {{$match->visitorteam_formation}}
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                    @if(isset($visitorLineups))

                                                                        <div class="result" style="padding: 0;">
                                                                            <div class="result-sheet"
                                                                                 style="padding-top: 10px;margin-bottom: 20px;">
                                                                                <h4 class="result-title"
                                                                                    style="margin-top: 0;">التشكيل
                                                                                    الأساسي</h4>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @foreach($match->visitorLineups as $local)
                                                                        <div
                                                                            style="display: flex;margin-top: 10px;align-items: center;">
                                                                            <?php
                                                                            if(!empty($local->player->image_path))
                                                                            {
                                                                            ?>
                                                                            <img src="{{$local->player->image_path}}"
                                                                                 style="border-radius: 50%;width: 35px;height: 35px;"
                                                                                 alt="">
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                            <div
                                                                                style="margin: 0 10px;min-width: 150px;">
                                                                                <p style="margin: 0;line-height: 18px;">
                                                                                    <a href="/player/{{ $local->player_id }}"
                                                                                       style="font-weight: 700;color: #31942e;">{{$local->player_name}}</a>
                                                                                    <br>
                                                                                    @if($local->position=='G')
                                                                                        حارس مرمى
                                                                                    @elseif($local->position=='D')
                                                                                        مدافع

                                                                                    @elseif($local->position=='M')
                                                                                        خط وسط
                                                                                    @elseif($local->position=='A')
                                                                                        مهاجم

                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                            <span
                                                                                style="width: 20px;background: #31942e;color: #fff;text-align: center;">{{$local->number}}</span>
                                                                            @if($local->captain==1)
                                                                                <i class="fa fa-copyright"
                                                                                   style="color: #ff9800;margin: 0 10px;"></i>
                                                                            @endif
                                                                        </div>



                                                                        <hr>
                                                                    @endforeach


                                                                    <div class="result" style="padding: 0;">
                                                                        <div class="result-sheet"
                                                                             style="padding-top: 10px;margin: 20px 0;">
                                                                            <h4 class="result-title"
                                                                                style="margin-top: 0;">البدلاء</h4>
                                                                        </div>
                                                                    </div>
                                                                    @foreach($match->visitorBench as $local)
                                                                        <div
                                                                            style="display: flex;margin-top: 10px;align-items: center;">
                                                                            <img src="{{$local->player->image_path}}"
                                                                                 style="border-radius: 50%;width: 35px;height: 35px;"
                                                                                 alt="">
                                                                            <div
                                                                                style="margin: 0 10px;min-width: 150px;">
                                                                                <p style="margin: 0;line-height: 18px;">
                                                                                    <a href="/player/{{ $local->player_id }}"
                                                                                       style="font-weight: 700;color: #31942e;">{{$local->player_name}}</a>
                                                                                    <br>
                                                                                    @if($local->position=='G')
                                                                                        حارس مرمى
                                                                                    @elseif($local->position=='D')
                                                                                        مدافع

                                                                                    @elseif($local->position=='M')
                                                                                        خط وسط
                                                                                    @elseif($local->position=='A')
                                                                                        مهاجم

                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                            <span
                                                                                style="width: 20px;background: #31942e;color: #fff;text-align: center;">{{$local->number}}</span>
                                                                            @if($local->captain==1)
                                                                                <i class="fa fa-copyright"
                                                                                   style="color: #ff9800;margin: 0 10px;"></i>
                                                                            @endif
                                                                        </div>



                                                                        <hr>
                                                                    @endforeach

                                                                    {{--  <div class="result" style="padding: 0;">--}}
                                                                    {{--                    <div class="result-sheet" style="padding-top: 10px;margin: 20px 0;">--}}
                                                                    {{--                        <h4 class="result-title" style="margin-top: 0;">اللعبين الغائبين</h4>--}}
                                                                    {{--                    </div>--}}
                                                                    {{--                </div>--}}

                                                                    {{--<div style="display: flex;margin-top: 10px;align-items: center;">--}}
                                                                    {{--    <img src="/img/sobhy.png" style="border-radius: 50%;width: 35px;height: 35px;" alt="">--}}
                                                                    {{--<div style="margin: 0 10px;min-width: 150px;">--}}
                                                                    {{--<p style="margin: 0;line-height: 18px;"><a href="/player/832" style="font-weight: 700;color: #31942e;">ديفيد دي جيا</a>--}}
                                                                    {{--<br>--}}
                                                                    {{--حارس مرمى--}}
                                                                    {{--</p>--}}
                                                                    {{--</div>--}}
                                                                    {{--<span style="width: 20px;background: #31942e;color: #fff;text-align: center;">1</span>--}}
                                                                    {{--</div>--}}

                                                                    {{--<hr>--}}

                                                                    {{--<div style="display: flex;margin-top: 10px;align-items: center;">--}}
                                                                    {{--    <img src="/img/sobhy.png" style="border-radius: 50%;width: 35px;height: 35px;" alt="">--}}
                                                                    {{--<div style="margin: 0 10px;min-width: 150px;">--}}
                                                                    {{--<p style="margin: 0;line-height: 18px;"><a href="/player/832" style="font-weight: 700;color: #31942e;">ديفيد دي جيا</a>--}}
                                                                    {{--<br>--}}
                                                                    {{--حارس مرمى--}}
                                                                    {{--</p>--}}
                                                                    {{--</div>--}}
                                                                    {{--<span style="width: 20px;background: #31942e;color: #fff;text-align: center;">1</span>--}}
                                                                    {{--</div>--}}
                                                                </div>
                                                        </div>
                                        </div>
                                        <div id="Paris" class="tabcontent Paris" style="padding: 0 15px;">
                                            <ul class="nav nav-tabs" style="display: flex;justify-content: center;">
                                                <!-- <li><a href=".Paris-1" data-toggle="tab">دقيقة بدقيقة</a>
                                                </li> -->
                                                <li class="active"><a href=".Paris-2" data-toggle="tab">أحداث
                                                        المباراة</a></li>
                                            </ul>
                                            <div class="tab-content">
                                            <!-- <div class="tab-pane Paris-1 ">
                                                    <div class="row latest-result"
                                                         style="padding-top: 0;padding-bottom: 0;">
                                                        <div class="col-sm-12">
                                                            <div class="timeline">
                                                                @foreach($match->comments as $comment)

                                                <div class="timeline__group">
@if($comment->extra_minute)
                                                    <span class="timeline__year time"
                                                          aria-hidden="true">{{$comment->minute}}+{{$comment->extra_minute}}</span>
                                                                        @else

                                                    <span class="timeline__year time"
                                                          aria-hidden="true">{{$comment->minute}}</span>
                                                                        @endif
                                                    <div class="timeline__cards">
                                                        <div class="timeline__card card">
                                                            <div class="card__content">
                                                                <p><?php if (!empty($comment->comment_ar)) {
                                                    echo $comment->comment_ar;
                                                } else {
                                                    echo $comment->comment;
                                                } ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                                <div class="tab-pane Paris-2 active">
                                                    <div id="conference-timeline">
                                                        <div class="timeline-end">نهاية المباراة</div>

                                                        <div class="conference-center-line"></div>
                                                        <div class="conference-timeline-content">
                                                            @foreach($match->secondEvents as $event)


                                                                <div class="timeline-article">
                                                                    @if($event->team_id==$match->localteam_id)

                                                                        <div class="content-right-container">
                                                                            <div class="content-right">
                                                                                @else
                                                                                    <div class="content-left-container">
                                                                                        <div class="content-left">
                                                                                            @endif
                                                                                            @if($event->type_ar=='هدف')
                                                                                                @if($event->related_player_name_ar !=null)
                                                                                                    <p>
                                                                                    <span
                                                                                        style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                            src="/img/assist.webp"
                                                                                            style="height: 22px;"
                                                                                            alt=""></span><a
                                                                                                            href="/player/{{ $event->related_player_id }}">{{$event->related_player_name_ar}}</a>
                                                                                                    </p>
                                                                                                @endif
                                                                                                <p>
                                                                                        <span
                                                                                            style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                src="/img/goal.png"
                                                                                                style="height: 20px;"
                                                                                                alt=""></span><a
                                                                                                        href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a>
                                                                                                </p>
                                                                                            @endif
                                                                                            @if($event->type_ar=='الاستبدال')
                                                                                                <p>
                                                                                                    <a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}
                                                                                                        ا</a><span
                                                                                                        style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                            src="/img/red-arrow.png"
                                                                                                            style="height: 12px;"
                                                                                                            alt=""></span>
                                                                                                </p>
                                                                                                <p>
                                                                                                    <a href="/player/{{ $event->related_player_id }}">{{$event->related_player_name_ar}}</a><span
                                                                                                        style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                            src="/img/green-arrow.png"
                                                                                                            style="height: 12px;"
                                                                                                            alt=""></span>
                                                                                                </p>                                                @endif

                                                                                            @if($event->type=='yellowcard')
                                                                                                <p>
                                                                                                    <a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a>
                                                                                                    <span
                                                                                                        style="width: 28px;display: inline-block;">
                                                                                                <img
                                                                                                    src="/img/yellow-card.png"
                                                                                                    style="height: 18px;margin: 0 5px;"
                                                                                                    alt="">
                                                                                            </span>
                                                                                                </p>
                                                                                            @endif

                                                                                            @if($event->type=='redcard')

                                                                                                <p>
                                                                                                    <a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a>
                                                                                                    <span
                                                                                                        style="width: 28px;display: inline-block;">
                                                                                                <img
                                                                                                    src="/img/red-card.png"
                                                                                                    style="height: 18px;margin: 0 5px;"
                                                                                                    alt="">
                                                                                            </span>
                                                                                                </p>
                                                                                            @endif
                                                                                            @if($event->type=='penalty')
                                                                                                <p>
                                                                                                    <a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a>
                                                                                                    <span
                                                                                                        style="width: 28px;display: inline-block;">
                                                                                                <img
                                                                                                    src="/img/penality.png"
                                                                                                    style="height: 18px;margin: 0 5px;"
                                                                                                    alt="">
                                                                                            </span>
                                                                                                </p>
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="meta-date">
                                                                                    <span class="date">{{$event->minute}}
                                                                                        @if($event->extra_minute)

                                                                                            <br>
                                                                                            +{{$event->extra_minute}}
                                                                                        @endif
                                                                                    </span>
                                                                                    </div>
                                                                            </div>

                                                                            @endforeach
                                                                            {{--                        <div class="timeline-article">--}}
                                                                            {{--                            <div class="content-right-container">--}}
                                                                            {{--                                <div class="content-right">--}}
                                                                            {{--                                    <p><a href="#">محمود دونجا</a><span style="width: 28px;display: inline-block;position: relative;top: -2px;"><img src="/img/red-arrow.png" style="height: 12px;" alt=""></span></p>--}}
                                                                            {{--                                    <p><a href="#">عماد حمدي</a><span style="width: 28px;display: inline-block;position: relative;top: -2px;"><img src="/img/green-arrow.png" style="height: 12px;" alt=""></span></p>--}}
                                                                            {{--                                </div>--}}
                                                                            {{--                            </div>--}}
                                                                            {{--                            <div class="meta-date">--}}
                                                                            {{--                                <span class="date">73</span>--}}
                                                                            {{--                            </div>--}}
                                                                            {{--                        </div>--}}
                                                                            {{--                        <div class="timeline-article">--}}
                                                                            {{--                            <div class="content-left-container">--}}
                                                                            {{--                                <div class="content-left">--}}
                                                                            {{--                                    <p><span style="width: 28px;display: inline-block;position: relative;top: -2px;"><img src="/img/red-arrow.png" style="height: 12px;" alt=""></span><a href="#">نبيل دونجا</a></p>--}}
                                                                            {{--                                    <p><span style="width: 28px;display: inline-block;position: relative;top: -2px;"><img src="/img/green-arrow.png" style="height: 12px;" alt=""></span><a href="#">إريك تراوري</a></p>--}}
                                                                            {{--                                </div>--}}
                                                                            {{--                            </div>--}}
                                                                            {{--                            <div class="meta-date">--}}
                                                                            {{--                                <span class="date">82</span>--}}
                                                                            {{--                            </div>--}}
                                                                            {{--                        </div>--}}


                                                                            <div class="timeline-start"
                                                                                 style="margin: 20px auto;">الشوط الثاني
                                                                            </div>
                                                                            <div class="timeline-start"
                                                                                 style="margin: 20px auto;">استراحة
                                                                            </div>
                                                                            @foreach($match->firstEvents as $event)


                                                                                <div class="timeline-article">
                                                                                    @if($event->team_id==$match->localteam_id)

                                                                                        <div
                                                                                            class="content-right-container">
                                                                                            <div class="content-right">
                                                                                                @else
                                                                                                    <div
                                                                                                        class="content-left-container">
                                                                                                        <div
                                                                                                            class="content-left">
                                                                                                            @endif
                                                                                                            <span
                                                                                                                style="width: 28px;display: inline-block;">
                                                                                            @if($event->type_ar=='هدف')
                                                                                                                    @if($event->related_player_name_ar !=null)
                                                                                                                        <p><span
                                                                                                                                style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                                                    src="/img/assist.webp"
                                                                                                                                    style="height: 22px;"
                                                                                                                                    alt=""></span><a
                                                                                                                                href="/player/{{ $event->related_player_id }}">{{$event->related_player_name_ar}}</a></p>
                                                                                                                    @endif
                                                                                                                    <p><span
                                                                                                                            style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                                                src="/img/goal.png"
                                                                                                                                style="height: 20px;"
                                                                                                                                alt=""></span><a
                                                                                                                            href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a></p>
                                                                                                                @endif
                                                                                                                @if($event->type_ar=='الاستبدال')
                                                                                                                    <p><a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}ا</a><span
                                                                                                                            style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                                                src="/img/red-arrow.png"
                                                                                                                                style="height: 12px;"
                                                                                                                                alt=""></span></p>
                                                                                                                    <p><a href="/player/{{ $event->related_player_id }}">{{$event->related_player_name_ar}}</a><span
                                                                                                                            style="width: 28px;display: inline-block;position: relative;top: -2px;"><img
                                                                                                                                src="/img/green-arrow.png"
                                                                                                                                style="height: 12px;"
                                                                                                                                alt=""></span></p>                                                @endif

                                                                                                                @if($event->type=='yellowcard')
                                                                                                                    <p><a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a>
                                                                                                                <span
                                                                                                                    style="width: 28px;display: inline-block;">
                                                                                                                    <img
                                                                                                                        src="/img/yellow-card.png"
                                                                                                                        style="height: 18px;margin: 0 5px;"
                                                                                                                        alt="">
                                                                                                                </span>
                                                                                                            </p>
                                                                                                                @endif
                                                                                                                @if($event->type=='penalty')
                                                                                                                    <p><a href="/player/{{ $event->player_id }}">{{$event->player_name_ar}}</a>
                                                                                                                <span
                                                                                                                    style="width: 28px;display: inline-block;">
                                                                                                                    <img
                                                                                                                        src="/img/penality.png"
                                                                                                                        style="height: 18px;margin: 0 5px;"
                                                                                                                        alt="">
                                                                                                                </span>
                                                                                                            </p>
                                                                                                                @endif

                                                                                                                @if($event->type=='redcard')

                                                                                                                    <p><a href="#">{{$event->player_name_ar}}</a>
                                                                                                                <span
                                                                                                                    style="width: 28px;display: inline-block;">
                                                                                                                    <img
                                                                                                                        src="/img/red-card.png"
                                                                                                                        style="height: 18px;margin: 0 5px;"
                                                                                                                        alt="">
                                                                                                                </span>
                                                                                                            </p>
                                                                                                            @endif

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="meta-date">
                                                                                                        <span
                                                                                                            class="date">{{$event->minute}}
                                                                                                            @if($event->extra_minute)

                                                                                                                <br>
                                                                                                                +{{$event->extra_minute}}
                                                                                                            @endif
                                                                                                        </span>
                                                                                                    </div>
                                                                                            </div>

                                                                                            @endforeach


                                                                                        </div>
                                                                                        <div class="timeline-start">
                                                                                            الشوط الأول
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div id="Tokyo" class="tabcontent Tokyo">
                                                            <div class="row latest-result"
                                                                 style="padding-top: 0;padding-bottom: 0;">
                                                                <div class="col-sm-12">
                                                                    <div class="single-match">
                                                                        <div class="part-team"
                                                                             style="justify-content: center;">
                                                                            <a href="#">
                                                                                <div class="single-team">
                                                                                    <div class="logo"
                                                                                         style="display: block;">
                                                                                        <img src="/img/ismaily.png"
                                                                                             alt="">
                                                                                    </div>
                                                                                    <span
                                                                                        class="team-name">الإسماعيلي</span>
                                                                                </div>
                                                                            </a>
                                                                            <div class="stats-info">
                                                                                <ul>
                                                                                    <li>
                                                                                        <h3>2</h3>
                                                                                        فوز
                                                                                    </li>
                                                                                    <li>
                                                                                        <h3>1</h3>
                                                                                        تعادل
                                                                                    </li>
                                                                                    <li>
                                                                                        <h3>2</h3>
                                                                                        فوز
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <a href="#">
                                                                                <div class="single-team">
                                                                                    <div class="logo"
                                                                                         style="display: block;">
                                                                                        <img src="/img/pyramids.png"
                                                                                             alt="">
                                                                                    </div>
                                                                                    <span
                                                                                        class="team-name">بيراميدز</span>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="result" style="padding: 0;">
                                                                        <div class="result-sheet"
                                                                             style="padding-top: 10px;margin-bottom: 20px;">
                                                                            <h4 class="result-title"
                                                                                style="margin-top: 0;">اللقاءات السابقة
                                                                                بين الفريقين</h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="goals-result" style="padding: 5px;">
                                                                        الدوري المصري<br>24 سبتمبر 2020
                                                                    </div>
                                                                    <div class="goals-result">
                                                                        <a href="#">
                                                                            <img src="/img/ismaily.png" width="20"
                                                                                 height="20" alt=""> الإسماعيلي
                                                                        </a>
                                                                        <span class="goals">
                                                                       <b>1</b> - <b>3</b>
                                                                   </span>
                                                                        <a href="#">
                                                                            <img src="/img/pyramids.png" width="20"
                                                                                 height="20" alt=""> بيراميدز
                                                                        </a>
                                                                    </div>
                                                                    <div class="goals-result" style="padding: 5px;">
                                                                        الدوري المصري<br>7 يناير 2020
                                                                    </div>
                                                                    <div class="goals-result">
                                                                        <a href="#">
                                                                            <img src="/img/ismaily.png" width="20"
                                                                                 height="20" alt=""> الإسماعيلي
                                                                        </a>
                                                                        <span class="goals">
                                                                   <b>0</b> - <b>1</b>
                                                               </span>
                                                                        <a href="#">
                                                                            <img src="/img/pyramids.png" width="20"
                                                                                 height="20" alt=""> بيراميدز
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

@endsection
