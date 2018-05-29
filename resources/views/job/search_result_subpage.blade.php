@php $index=0;@endphp
@foreach ($jobs as $job)
    <div class="container search-result-container" style="margin-top: 20px;padding:10px;">
      <div class="row" style="padding:10px;background:rgb(204, 204, 204);border-radius:20px;">
        <div class="col-lg-2" style="">
          <img class="h-100 w-100"
            src="{{asset('assets/world.png')}}" style="background-size:cover;"
          />
        </div>
        <div class="col-lg-7" style="background:white;border-radius:20px;">
            <a href="{{route('job.detail',['id' => $job->id])}}" target="_blank">
                <h3 style="text-align:center">
                    {{ $job->name }}
                </h3>
            </a>
            <p style="text-align:center">
                {{ $job->description }}
            </p>
        </div>
        <div class="col-lg-3" style="text-align:center">
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
      <div id="time-{{$index++}}"
      value="{{strtotime($job->finish_date)-strtotime(date('Y-m-d'))}}"
      class="col-lg-3" style="font-size:15px;text-align:center;background:grey;border-radius:0 0 20px 20px;">
        calculate...
      </div>
    </div>
@endforeach
@if($jobs->links() != "")
<br/>
{!! $jobs->links(); !!}
@endif
