@foreach ($jobs as $job)
    <div class="container search-result-container" style="margin-top: 30px">
      <div class="row" style="border:1px solid red;padding:10px">
        <div class="col-sm-2" style="border:1px solid red;">
          <img class="e"
          src="{{asset('company_photo/'.$job->c_image)}}" style="max-width:100px;max-height:100px;    background-size: cover;"/>
        </div>
        <div class="col-sm-10 row" style="border:1px solid yellow;">
          <div class="col-sm-8" style="border:1px solid red;">
              <a href="{{route('job.detail',['id' => $job->id])}}" target="_blank">
                 <h3>
                      {{ $job->name }}({{$job->c_name}})
                </h3>
            </a>
            <p>
            {{ $job->description }}
            </p>
          </div>
          <div class="col-sm-4" style="border:1px solid red;">
            <div class="container">

              Skill :
              @foreach ($job->skill_list as $skill)
                  @if($skill == 1)
                     <abbr title="Front End" style="cursor: help;">
                         <i class="fa fa-desktop"></i>
                     </abbr>
                  @elseif ($skill == 2)
                      <abbr title="Back End" style="cursor: help;">
                          <i class="fa fa-code"></i>
                      </abbr>
                  @elseif ($skill == 3)
                      <abbr title="Android" style="cursor: help;">
                          <i class="fa fa-android"></i>
                      </abbr>
                  @elseif ($skill == 4)
                      <abbr title="IOS" style="cursor: help;">
                          <i class="fa fa-apple"></i>
                      </abbr>
                  @endif
              @endforeach
            </div>
            <div class="container">
              <i class="icomoon icon-coin"></i>
              Total point : {{ $job->point }}
              <img src="{{asset('assets/gold_coin.png')}}" width="20px" height="20px"/>
            </div>
            <div class="container">
              <i class="fa fa-gift"></i>
              Reward : {{5 * $job->point}}$
            </div>
            <div class="container">
              <i class="fa fa-hourglass"></i>
              <?php
              $date1=date_create($job->upload_date);
              $date2=date_create($job->finish_date);
              $diff=date_diff($date1,$date2);
              echo $diff->format("%d days - %h hours");
              ?>
            </div>
        </div>
      </div>
    </div>
    </div>
@endforeach
@if($jobs->links() != "")
<br />
{!! $jobs->links(); !!}
@endif
